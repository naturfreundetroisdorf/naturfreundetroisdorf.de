<?php

function uploadImage(array $file): ?string
{
    if ($file['error'] !== UPLOAD_ERR_OK) {
        return null;
    }

    // Maximale Dateigröße (5 MB)
    if ($file['size'] > 5 * 1024 * 1024) {
        throw new Exception("Das Bild darf maximal 5 MB groß sein.");
    }

    // Ist es wirklich ein Bild?
    $imageInfo = getimagesize($file['tmp_name']);
    if ($imageInfo === false) {
        throw new Exception("Die Datei ist kein gültiges Bild.");
    }

    // Erlaubte MIME-Typen
    $allowed = [
        'image/jpeg' => 'jpg',
        'image/png'  => 'png',
        'image/webp' => 'webp'
    ];

    if (!isset($allowed[$imageInfo['mime']])) {
        throw new Exception("Erlaubt sind nur JPG, PNG oder WebP.");
    }

    $extension = $allowed[$imageInfo['mime']];
    $filename  = bin2hex(random_bytes(16)) . '.' . $extension;

    // Projekt-Root ermitteln (functions.php liegt in admin/inc/)
    $siteRootFs = realpath(__DIR__ . '/../..');

    $destinationDir = $siteRootFs . '/uploads/images/';

    if (!is_dir($destinationDir)) {
        mkdir($destinationDir, 0755, true);
    }

    $destination = $destinationDir . $filename;

    if (!move_uploaded_file($file['tmp_name'], $destination)) {
        throw new Exception("Das Bild konnte nicht gespeichert werden.");
    }

    return $filename;
}

function formatContent($text)
{
    // Platzhalter für manuelle Links
    $links = [];

    $text = preg_replace_callback(
        '/\[LINK:(https?:\/\/[^\|\]]+)(?:\|([^\]]+))?\]/i',
        function ($matches) use (&$links) {

            $url = htmlspecialchars($matches[1], ENT_QUOTES, 'UTF-8');
            $label = htmlspecialchars($matches[2] ?? $matches[1], ENT_QUOTES, 'UTF-8');

            $placeholder = '###LINK' . count($links) . '###';

            $links[$placeholder] =
                '<a href="' . $url . '" target="_blank" rel="noopener noreferrer">'
                . $label .
                '</a>';

            return $placeholder;
        },
        $text
    );

    // Jetzt erst alles escapen
    $text = htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
    

    // Normale URLs verlinken
    $text = preg_replace(
        '~(https?://[^\s<]+)~i',
        '<a href="$1" target="_blank" rel="noopener noreferrer">$1</a>',
        $text
    );

    // Platzhalter wieder einsetzen
    $text = str_replace(array_keys($links), array_values($links), $text);

    return nl2br($text);
}

function extractYoutubeId($input) {
    $input = trim($input);

    // Falls schon nur die ID eingegeben wurde (11 Zeichen, keine URL)
    if (preg_match('/^[a-zA-Z0-9_-]{11}$/', $input)) {
        return $input;
    }

    // Deckt youtube.com/watch?v=, youtu.be/, youtube.com/embed/, youtube.com/shorts/ ab
    if (preg_match('~(?:youtube\.com/(?:watch\?v=|embed/|shorts/)|youtu\.be/)([a-zA-Z0-9_-]{11})~', $input, $matches)) {
        return $matches[1];
    }

    return null; // ungültige/unbekannte URL
}
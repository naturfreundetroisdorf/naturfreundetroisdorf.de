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
    $filename = bin2hex(random_bytes(16)) . "." . $extension;

    $destination = $_SERVER['DOCUMENT_ROOT'] .
        "/uploads/images/" .
        $filename;

    if (!move_uploaded_file($file['tmp_name'], $destination)) {
        throw new Exception("Das Bild konnte nicht gespeichert werden.");
    }

    return $filename;
}
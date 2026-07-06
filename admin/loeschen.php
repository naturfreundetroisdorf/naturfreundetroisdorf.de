<?php

require_once 'inc/auth.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/../config/config.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Ungültige ID.");
}

$id = (int)$_GET['id'];

/* Beitrag laden */
$stmt = $pdo->prepare("
    SELECT image
    FROM posts
    WHERE id = ?
");

$stmt->execute([$id]);

$post = $stmt->fetch();

if (!$post) {
    die("Beitrag nicht gefunden.");
}

/* Bild löschen */
if (!empty($post['image'])) {

    $file = $_SERVER['DOCUMENT_ROOT'] . "/uploads/images/" . $post['image'];

    if (file_exists($file)) {
        unlink($file);
    }

}

/* Datensatz löschen */
$stmt = $pdo->prepare("
    DELETE FROM posts
    WHERE id = ?
");

$stmt->execute([$id]);

header("Location: index.php");
exit;
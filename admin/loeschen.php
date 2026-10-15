<?php
require_once 'inc/auth.php';
require_once 'inc/functions.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/../config/config.php';
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Ungültige ID.");
}
$id = (int)$_GET['id'];
/* Beitrag laden */
$stmt = $pdo->prepare("
    SELECT type, image
    FROM " . POSTS_TABLE . "
    WHERE id = ?
");
$stmt->execute([$id]);
$post = $stmt->fetch();
if (!$post) {
    die("Beitrag nicht gefunden.");
}
/* Bild bzw. PDF löschen */
deletePostFile($post['type'], $post['image']);
/* Datensatz löschen */
$stmt = $pdo->prepare("
    DELETE FROM " . POSTS_TABLE . "
    WHERE id = ?
");
$stmt->execute([$id]);
header("Location: index.php");
exit;
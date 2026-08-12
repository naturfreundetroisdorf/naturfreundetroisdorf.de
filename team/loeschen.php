<?php

require_once '../admin/inc/auth.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/../config/config.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Ungültige ID.");
}

$id = (int)$_GET['id'];

/* Mitglied laden */
$stmt = $pdo->prepare("
    SELECT image
    FROM " . TEAM_TABLE . "
    WHERE id = ?
");
$stmt->execute([$id]);

$member = $stmt->fetch();

if (!$member) {
    die("Mitglied nicht gefunden.");
}

/* Bild löschen */
if (!empty($member['image'])) {

    $siteRootFs = realpath(__DIR__ . '/..');
    $image = $siteRootFs . "/uploads/images/" . $member['image'];

    if (file_exists($image)) {
        unlink($image);
    }

}

/* Datensatz löschen */
$stmt = $pdo->prepare("
    DELETE
    FROM " . TEAM_TABLE . "
    WHERE id = ?
");

$stmt->execute([$id]);

header("Location: index.php");
exit;
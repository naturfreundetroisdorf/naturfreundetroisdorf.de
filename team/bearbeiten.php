<?php

require_once '../admin/inc/auth.php';
require_once '../admin/inc/functions.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/../config/config.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Ungültige ID.");
}

$id = (int)$_GET['id'];

$stmt = $pdo->prepare("
    SELECT *
    FROM " . TEAM_TABLE . "
    WHERE id = ?
");
$stmt->execute([$id]);

$member = $stmt->fetch();

if (!$member) {
    die("Mitglied nicht gefunden.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = trim($_POST['name']);
    $text = trim($_POST['text']);
    $sort = (int)$_POST['sort_order'];
    $active = isset($_POST['active']) ? 1 : 0;

    $image = $member['image'];

    if (!empty($_FILES['image']['name'])) {

        if (!empty($image)) {

            $siteRootFs = realpath(__DIR__ . '/..');
            $oldFile = $siteRootFs . "/uploads/images/" . $image;

            if (file_exists($oldFile)) {
                unlink($oldFile);
            }

        }

        try {

            $image = uploadImage($_FILES['image']);

        } catch (Exception $e) {

            die($e->getMessage());

        }

    }

    $stmt = $pdo->prepare("
        UPDATE " . TEAM_TABLE . "
        SET
            name = ?,
            text = ?,
            image = ?,
            sort_order = ?,
            active = ?
        WHERE id = ?
    ");

    $stmt->execute([
        $name,
        $text,
        $image,
        $sort,
        $active,
        $id
    ]);

    header("Location: index.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="de">

<head>

<meta charset="UTF-8">

<title>Mitglied bearbeiten</title>

<link rel="stylesheet" href="../css/style.css">

</head>

<body class="admin-body">

<div class="admin">

<h1>Mitglied bearbeiten</h1>

<form method="post" enctype="multipart/form-data">

<p>

<label>Name</label><br>

<input
type="text"
name="name"
value="<?= htmlspecialchars($member['name']) ?>"
required>

</p>

<?php if(!empty($member['image'])): ?>

<p>

Aktuelles Bild

<br><br>

<img
src="/uploads/images/<?= htmlspecialchars($member['image']) ?>"
style="max-width:200px;">

</p>

<?php endif; ?>

<p>

<label>Neues Bild auswählen</label><br>

<input
type="file"
name="image"
accept="image/*">

</p>

<p>

<label>Beschreibung</label><br>

<textarea
name="text"
rows="8"
required><?= htmlspecialchars($member['text']) ?></textarea>

</p>

<p>

<label>Reihenfolge</label><br>

<input
type="number"
name="sort_order"
value="<?= (int)$member['sort_order'] ?>">

</p>

<p>

<label>

<input
type="checkbox"
name="active"
<?= $member['active'] ? 'checked' : '' ?>>

Mitglied anzeigen

</label>

</p>

<p>

<button type="submit">

Speichern

</button>

<a href="index.php">

Abbrechen

</a>

</p>

</form>

</div>

</body>

</html>
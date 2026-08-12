<?php

require_once '../admin/inc/auth.php';
require_once '../admin/inc/functions.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/../config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = trim($_POST['name']);
    $text = trim($_POST['text']);
    $sort = (int)$_POST['sort_order'];
    $active = isset($_POST['active']) ? 1 : 0;

    $image = null;

    if (!empty($_FILES['image']['name'])) {

        try {

            $image = uploadImage($_FILES['image']);

        } catch (Exception $e) {

            die($e->getMessage());

        }

    }

    $stmt = $pdo->prepare("
        INSERT INTO " . TEAM_TABLE . "
        (
            name,
            text,
            image,
            sort_order,
            active
        )
        VALUES
        (
            ?,
            ?,
            ?,
            ?,
            ?
        )
    ");

    $stmt->execute([
        $name,
        $text,
        $image,
        $sort,
        $active
    ]);

    header("Location: index.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="de">

<head>

<meta charset="UTF-8">

<title>Neues Mitglied</title>

<link rel="stylesheet" href="../css/style.css">

</head>

<body class="admin-body">

<div class="admin">

<h1>Neues Mitglied</h1>

<form method="post" enctype="multipart/form-data">

<p>

<label>Name</label><br>

<input
type="text"
name="name"
required>

</p>

<p>

<label>Bild</label><br>

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
required></textarea>

</p>

<p>

<label>Reihenfolge</label><br>

<input
type="number"
name="sort_order"
value="0">

</p>

<p>

<label>

<input
type="checkbox"
name="active"
checked>

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
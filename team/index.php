<?php

require_once '../admin/inc/auth.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/../config/config.php';

$stmt = $pdo->query("
    SELECT *
    FROM " . TEAM_TABLE . "
    ORDER BY sort_order ASC, name ASC
");

$members = $stmt->fetchAll();

?>
<!DOCTYPE html>
<html lang="de">

<head>

<meta charset="UTF-8">

<title>Teamverwaltung</title>

<link rel="stylesheet" href="../css/style.css">

</head>

<body class="admin-body">

<div class="admin">

<div style="display:flex;justify-content:space-between;align-items:center;">

    <h1>Teamverwaltung</h1>

    <div>

        <a href="../admin/index.php">← Beiträge</a>
        |
        <a href="../admin/logout.php">Abmelden</a>

    </div>

</div>

<p>

<a href="neu.php">➕ Neues Mitglied</a>

</p>

<table>

<tr>

    <th>Name</th>

    <th>Reihenfolge</th>

    <th>Status</th>

    <th>Aktionen</th>

</tr>

<?php foreach($members as $member): ?>

<tr>

    <td>

        <?= htmlspecialchars($member['name']) ?>

    </td>

    <td>

        <?= (int)$member['sort_order'] ?>

    </td>

    <td>

        <?= $member['active'] ? 'Aktiv' : 'Inaktiv' ?>

    </td>

    <td>

        <a href="bearbeiten.php?id=<?= $member['id'] ?>">
            Bearbeiten
        </a>

        |

        <a
            href="loeschen.php?id=<?= $member['id'] ?>"
            onclick="return confirm('Mitglied wirklich löschen?');">

            Löschen

        </a>

    </td>

</tr>

<?php endforeach; ?>

</table>

</div>

</body>

</html>
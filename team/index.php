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

<style>
    .team-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        background: white;
    }

    .team-table th {
        background: linear-gradient(135deg, #2c5f2d 0%, #1e4620 100%);
        color: white;
        padding: 15px;
        text-align: left;
        font-weight: 600;
        font-size: 14px;
        border-bottom: 3px solid #1e4620;
    }

    .team-table td {
        padding: 12px 15px;
        border-bottom: 1px solid #e0e0e0;
    }

    .team-table tbody tr {
        transition: background-color 0.2s ease;
    }

    .team-table tbody tr:hover {
        background-color: #f5f5f5;
    }

    .team-table tbody tr:nth-child(odd) {
        background-color: #fafafa;
    }

    .team-table tbody tr:nth-child(even) {
        background-color: #ffffff;
    }

    .team-table tr:last-child td {
        border-bottom: 2px solid #2c5f2d;
    }

    .team-table td:nth-child(1) {
        font-weight: 500;
        color: #1e4620;
        min-width: 200px;
    }

    .team-table td:nth-child(2) {
        background-color: rgba(44, 95, 45, 0.03);
        text-align: center;
        font-weight: 500;
        color: #2c5f2d;
    }

    .team-table td:nth-child(3) {
        text-align: center;
        font-size: 13px;
    }

    .team-table td:nth-child(3)::before {
        content: '';
        display: inline-block;
        width: 8px;
        height: 8px;
        border-radius: 50%;
        margin-right: 6px;
    }

    .team-table td:nth-child(3):has-text('Aktiv')::before {
        background-color: #28a745;
    }

    .team-table td:nth-child(3):has-text('Inaktiv')::before {
        background-color: #dc3545;
    }

    .team-table td:nth-child(4) {
        font-size: 13px;
    }

    .team-table a {
        color: #0066cc;
        text-decoration: none;
        padding: 2px 5px;
        border-radius: 3px;
        transition: all 0.2s ease;
    }

    .team-table a:hover {
        background-color: #e3f2fd;
        color: #0052a3;
    }

    .action-separator {
        color: #ccc;
        margin: 0 5px;
    }

    .btn-group {
        display: flex;
        gap: 10px;
        align-items: center;
        margin-bottom: 20px;
    }

    .btn-group a {
        padding: 10px 15px;
        text-decoration: none;
        border-radius: 4px;
        border: none;
        cursor: pointer;
        font-size: 14px;
        transition: all 0.2s ease;
        background: #28a745;
        color: white;
    }

    .btn-group a:hover {
        background: #218838;
    }

    .btn-back {
        background: #6c757d;
    }

    .btn-back:hover {
        background: #5a6268;
    }

    .status-badge {
        display: inline-block;
        padding: 4px 8px;
        border-radius: 3px;
        font-weight: 500;
        font-size: 12px;
    }

    .status-active {
        background-color: #d4edda;
        color: #155724;
    }

    .status-inactive {
        background-color: #f8d7da;
        color: #721c24;
    }
</style>

</head>

<body class="admin-body">

<div class="admin">

<div style="display:flex;justify-content:space-between;align-items:center;">

    <h1>Teamverwaltung</h1>

    <div>

        <a href="../admin/index.php">← Beiträge</a>
        <a href="../admin/logout.php" style="margin-left: 15px;">Abmelden</a>

    </div>

</div>

<div class="btn-group">
    <a href="neu.php">➕ Neues Mitglied</a>
</div>

<table class="team-table">

<thead>
<tr>

    <th>Name</th>

    <th>Reihenfolge</th>

    <th>Status</th>

    <th>Aktionen</th>

</tr>
</thead>

<tbody>
<?php foreach($members as $member): ?>

<tr>

    <td>

        <?= htmlspecialchars($member['name']) ?>

    </td>

    <td>

        <?= (int)$member['sort_order'] ?>

    </td>

    <td>

        <span class="status-badge <?= $member['active'] ? 'status-active' : 'status-inactive' ?>">
            <?= $member['active'] ? '● Aktiv' : '● Inaktiv' ?>
        </span>

    </td>

    <td>

        <a href="bearbeiten.php?id=<?= $member['id'] ?>">
            Bearbeiten
        </a>

        <span class="action-separator">|</span>

        <a
            href="loeschen.php?id=<?= $member['id'] ?>"
            onclick="return confirm('Mitglied wirklich löschen?');">

            Löschen

        </a>

    </td>

</tr>

<?php endforeach; ?>
</tbody>

</table>

</div>

</body>

</html>
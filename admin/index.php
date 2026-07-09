<?php
require_once 'inc/auth.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/../config/config.php';

$stmt = $pdo->query("
    SELECT *
    FROM " . POSTS_TABLE . "
    ORDER BY pinned DESC, created_at DESC
");     
$posts = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Naturfreunde CMS</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body class="admin-body">
    <div class="admin">
        <div style="display:flex;justify-content:space-between;align-items:center;">
            <h1>Naturfreunde CMS</h1>
            <a href="logout.php">Abmelden</a>
        </div>        
        <p>
            <a href="neu.php">➕ Neuer Beitrag</a>
        </p>
        <table>
            <tr>
                <th>Titel</th>
                <th>Typ</th>
                <th>Datum</th>
                <th>Aktionen</th>
            </tr>
        <?php foreach($posts as $post): ?>
        <tr>
            <td><?= htmlspecialchars($post['title']) ?></td>
            <td><?= ucfirst($post['type']) ?></td>
            <td><?= date('d.m.Y H:i', strtotime($post['created_at'])) ?></td>
            <td>
                <a href="bearbeiten.php?id=<?= $post['id'] ?>">Bearbeiten</a>
                |
                <a href="loeschen.php?id=<?= $post['id'] ?>"
                onclick="return confirm('Diesen Beitrag wirklich löschen?');">
                    Löschen
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
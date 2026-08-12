<?php

$pageTitle = "Wir";
$currentPage = "wir";

require_once $_SERVER['DOCUMENT_ROOT'] . '/../config/config.php';

$stmt = $pdo->query("
    SELECT *
    FROM " . TEAM_TABLE . "
    WHERE active = 1
    ORDER BY sort_order ASC, name ASC
");

$team = $stmt->fetchAll();

include('layout/head.php');
include('layout/header.php');

?>

<main id="main">

    <h2>Wir sind die Bürgerinitiative Naturfreunde Troisdorf</h2>

    <p style="margin-bottom:40px;">
        Hinter unserer Bürgerinitiative stehen engagierte Menschen aus
        Troisdorf und der Umgebung, die sich für den Erhalt unserer Natur,
        unserer Wälder und unserer Lebensqualität einsetzen.
    </p>

    <div class="team-grid">

        <?php foreach ($team as $member): ?>

            <div class="team-card">

                <div class="team-image">

                    <img src="<?= BASE_URL . '/uploads/images/' . htmlspecialchars($member['image']) ?>">

                </div>

                <div class="team-content">

                    <h3><?= htmlspecialchars($member['name']) ?></h3>

                    <p><?= nl2br(htmlspecialchars($member['text'])) ?></p>

                </div>

            </div>

        <?php endforeach; ?>

    </div>

</main>

<?php include('layout/footer.php'); ?>
<?php
$pageTitle = "BI Naturfreunde Troisdorf – Aktionen";
$currentPage = "podcast"; // Setzt das "Worum geht's?"-Item als aktiv
include('../layout/head.php');
include('../layout/header.php');
?>

<main id="main">

    <div class="podcast-container">

    <div class="podcast-content">
    <div class="video-wrapper">
        <iframe
        src="https://www.youtube-nocookie.com/embed/T2ZaP47SyeQ"
        title="YouTube video player"
        frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
        allowfullscreen
        loading="lazy"></iframe>
    </div>
    </div>
    

</div>

<hr style="margin:60px 0;">

<h2 style="text-align:center;">Fotostrecke</h2>

<p style="text-align:center;margin-bottom:35px;">
Einfahrt K20 zur Deponiestraße bis zum Ende AKS Verwertungspark
</p>

<?php

$bilder = glob("daumenkino/*.{jpg,jpeg,png,webp,avif,JPG,JPEG,PNG}", GLOB_BRACE);

sort($bilder);

// Verdoppeln für Endlos-Loop
$bilder = array_merge($bilder, $bilder);

?>

<script>
setTimeout(function () {
    document.querySelector(".kino-wrapper").classList.add("show");
}, 5000);
</script>

<div class="kino-wrapper">

    <div class="kino-track">

        <?php foreach($bilder as $bild): ?>

            <img src="<?= htmlspecialchars($bild) ?>" alt="Daumenkino">

        <?php endforeach; ?>

    </div>

</div>


</main>

<?php include('../layout/footer.php'); ?>
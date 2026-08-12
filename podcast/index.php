<?php
$pageTitle = "BI Naturfreunde Troisdorf – Aktionen";
$currentPage = "podcast"; // Setzt das "Worum geht's?"-Item als aktiv
include('../layout/head.php');
include('../layout/header.php');
?>

<main id="main">

    <div class="podcast-container">

    <div class="podcast-image">

        <img src="podcast.jpeg" alt="Podcast">

    </div>

    <div class="podcast-content">

        <h2>Aktueller Podcast gegen die Aufweitung der Deponiestraße</h2>

        <p>
            Der Podcast erzählt die Geschichte der Bürgerinitiative Naturfreunde Troisdorf: vom Protest gegen die Sondermülldeponie im Spicher Wald ab 2007, über den Widerstand gegen den Kletterwald (2013–2015), bis zum aktuellen Kampf gegen den Ausbau der Deponiestraße (2023/2026).
<br><br>Im Mittelpunkt steht stets der Schutz des Spicher Waldes als Naherholungs- und Landschaftsschutzgebiet. Die Bürgerinitiative warnt vor ökologischen Schäden und zweifelt an einer echten Verkehrsentlastung der B8. Statt der geplanten Straße bringt sie eigene Vorschläge zur Verkehrsoptimierung ins Gespräch. Auch stadtpolitische Themen wie das Haushaltssicherungskonzept und der drohende Wegfall sozialer Zuschüsse, während gleichzeitig Millionen in ein umstrittenes Straßenprojekt fließen sollen, kommen zur Sprache.
<br><br>Der Podcast dokumentiert bürgerschaftliches Engagement für nachhaltige Stadtplanung und den Erhalt lokaler Ökosysteme.

        </p>

        <audio controls>
            <source src="podcast.mp3" type="audio/mpeg">
            Ihr Browser unterstützt keine Audio-Dateien.
        </audio>

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
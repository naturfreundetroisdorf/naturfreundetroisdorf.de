<?php
$pageTitle = "BI Naturfreunde Troisdorf – Aktionen";
$currentPage = "mediathek";
include('../../layout/head.php');
include('../../layout/header.php');

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
    <h2>Bürgerinitiative Naturfreunde Troisdorf - Schutz und Erhalt des Spicher Waldes</h2>
    <p>Aktueller Film gegen die Aufweitung der Deponiestraße</p>

    <p>Der Film erzählt die Geschichte der Bürgerinitiative Naturfreunde Troisdorf zum Schutz und Erhalt des Spicher Waldes gegen den Ausbau des Alten Mauspfades - Deponiestraße ab 2007,
    den bürgerlichen Protest gegen den europaweiten Sondermülltourismus um die Sondermülldeponie ab 2009, den Protest zum Schutz des Spicher Waldes gegen den Kletterpark zw. 2015–2024
    und zum wiederholten und aktuell gewordenen Vorhaben des Troisdorfer Stadtrates 2023-2026, wieder die Deponiestraße aufzuweiten.</p>

    <p>Im Mittelpunkt steht stets der Schutz und Erhalt des Spicher Waldes als Naherholungs- und Landschaftsschutzgebiet.
    Die Bürgerinitiative warnt vor ökologischen Schäden und zweifelt an einer echten Verkehrsentlastung der B8.
    Statt der geplanten Straße bringt sie eigene Vorschläge zur Verkehrsoptimierung ins Gespräch.
    Auch stadtpolitische Themen wie das Haushaltssicherungskonzept und der drohende Wegfall sozialer Zuschüsse,
    während gleichzeitig Millionen in ein umstrittenes Straßenprojekt fließen sollen, kommen zur Sprache.</p>

    <p>Der Podcast dokumentiert bürgerschaftliches Engagement für nachhaltige Stadtplanung und den Erhalt lokaler Ökosysteme.</p>
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

<?php include('../../layout/footer.php'); ?>
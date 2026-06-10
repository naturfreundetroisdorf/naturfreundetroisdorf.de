<?php
$pageTitle = "BI Naturfreunde Troisdorf – Startseite";
$currentPage = "aktuell"; // Setzt das "Worum geht's?"-Item als aktiv
include('layout/head.php');
include('layout/header.php');
?>

<!-- MAIN MIT UNTERSCHIEDLICHEM INHALT IN #content -->
<main id="main">
  <div id="content">
    <!-- HIER KOMMT DER NEUE INHALT FÜR "AKTUELL" -->
    <h2>Aktuelle Meldungen</h2>
    <p>Hier finden Sie die neuesten Informationen zu unseren Aktivitäten und Terminen.</p>

    <div class="news-item">
      <h3>Nächstes Treffen: 15. Juni 2026</h3>
      <p>Wir treffen uns am 15. Juni um 19:00 Uhr im Bürgerhaus Troisdorf. Alle Interessierten sind herzlich eingeladen!</p>
    </div>

    <div class="news-item">
      <h3>Erfolgreiche Demo am 1. Juni</h3>
      <p>Über 200 Teilnehmer haben am 1. Juni gegen die Abholzung des Spicher Waldes demonstriert. Vielen Dank für Ihre Unterstützung!</p>
    </div>
  </div>

  <div id="top-btn-wrap">
    <a href="#" id="top-btn" onclick="window.scrollTo({top:0,behavior:'smooth'});return false;">↑ Seitenanfang</a>
  </div>
</main>

<!-- Vor dem schließenden </body>-Tag oder im <head> -->
<script src="js/script.js"></script>
<?php include('layout/footer.php'); ?>


</body>
</html>
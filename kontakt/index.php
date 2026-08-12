<?php
$pageTitle = "Kontakt - BI Naturfreunde Troisdorf";
$currentPage = "kontakt";

include('../layout/head.php');
include('../layout/header.php');
?>

<main id="main">
<div id="content">

  <div id="kontakt-container">
    
    <!-- Linke Spalte: Kontaktdaten -->
    <div id="kontakt-info">
      <h2>Bürgerinitiative Naturfreunde Troisdorf</h2>
      
      <div class="kontakt-person">
        <h3>Ulrike Schmidt (stellv.)</h3>
        <p>
          Freiheitsstr.12<br>
          53842 Troisdorf<br>
          <a href="mailto:info@naturfreundetroisdorf.de">info@naturfreundetroisdorf.de</a><br>
          0151-20745444
        </p>
      </div>

      <div class="kontakt-person">
        <h3>Norbert Ziegert (stellv.)</h3>
        <p>
          Telegrafstr.72<br>
          53842 Troisdorf<br>
          <a href="mailto:info@naturfreundetroisdorf.de">info@naturfreundetroisdorf.de</a><br>
          Tel: 02241-946188
        </p>
      </div>
    </div>

    <!-- Rechte Spalte: Bild -->
    <div id="kontakt-image">
      <img src="<?php echo BASE_URL; ?>/kontakt/images/herzkontakt.jpg" alt="Naturfreunde Herz">
    </div>

  </div>

</div>
</main>

<?php include('../layout/footer.php'); ?>
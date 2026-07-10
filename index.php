<?php
$pageTitle = "BI Naturfreunde Troisdorf – Startseite";
$currentPage = "index"; // Setzt das "Worum geht's?"-Item als aktiv
include('layout/head.php');
include('layout/header.php');
?>

<main id="main">
  <div id="content">
    <div id="hero-text">
      <h2>Wir, die <a href="#">'Bürgerinitiative Naturfreunde Troisdorf'</a>, sind eine
      <span class="rot">überparteiliche</span> Gruppe von Troisdorfer Bürgern,
      die sich für den Schutz und den Erhalt des 'Spicher Waldes' einsetzen.</h2>
      <p>Unser schönes Landschaftsschutzgebiet, an der östlichen Stadtgrenze von Troisdorf zur Wahner Heide, ist ein wertvolles Juwel und unverzichtbar für Mensch, Tier und Umwelt.</p>
    </div>

    <div id="content-grid">
      <div>
        <img class="content-img" src="https://static.wixstatic.com/media/12c2cd_083cf75a2b304322a9d340c346e05760~mv2_d_2322_4128_s_2.jpg/v1/crop/x_0,y_534,w_2322,h_3088/fill/w_466,h_621,al_c,q_80,usm_0.66_1.00_0.01,enc_avif,quality_auto/12c2cd_083cf75a2b304322a9d340c346e05760~mv2_d_2322_4128_s_2.jpg" alt="Spicher Wald" style="max-height: 420px;">
      </div>
      <div id="benefits">
        <h3>Worin liegt sein besonderer Nutzen?</h3>
        <ul>
          <li>Der Wald ist Naherholungsgebiet.</li>
          <li>Er bietet ein angenehmes, ausgleichendes Kleinklima.</li>
          <li>Der Wald ermöglicht Entspannung durch pures Naturerlebnis.</li>
          <li>Er bietet Raum für <em>kostenlose</em> Freizeitgestaltung.</li>
          <li>Er ist Lebens- und Schutzraum für Tiere und Pflanzen.</li>
          <li>Der Wald erhöht die Lebens- und Wohnattraktivität.</li>
          <li>Er bietet Lärmschutz und fungiert als Feinstaubfilter.</li>
          <li>Er verhindert Starkregenschäden (Wasser im Keller).</li>
          <li>Er reduziert den Grundwasserstand im Anrainerbezirk.</li>
          <li>Er ist Pufferzone für die 'Wahner Heide' und schützt sie vor Überfrequentierung.</li>
        </ul>
      </div>
    </div>

    <hr class="divider">

    <div id="facts">
      <h3>Hier die Fakten im Einzelnen:</h3>

      <h4>1. Die Giftmülldeponie SAD</h4>
      <p>In unserem schönen Waldgebiet befindet sich, zum allgemeinen Leidwesen, seit vielen Jahrzehnten die SAD, eine 27 ha große Giftmülldeponie für mineralischen Sondermüll der Deponieklasse III. <a href="#">weiterlesen</a></p>

      <h4>2. Ehemaliger 'Schießstand Rottweil'</h4>
      <p>Ende 2017 sind dort 3,6 ha Wald gerodet worden, um den bleiverseuchten Boden auszutauschen. Aus finanziellen Gründen sollen aber lediglich 2,6 ha wieder aufgeforstet werden. <a href="#">weiterlesen</a></p>

      <h4>3. Geplanter Kletterwald auf den 'Spicher Höhen'</h4>
      <p>In einem Waldgebiet von ungefähr 2 ha (Ecke Asselbachstrasse/Mauspfad) hat die Stadt Troisdorf einem Investor bereits vertraglich die Zusage zur Errichtung eines Kletterparks erteilt. Hierfür müssten viele Bäume gefällt werden... <a href="#">weiterlesen</a></p>
    </div>

    <div id="cta">
      <p>Immer wieder stehen wirtschaftliche Interessen vor dem Landschaftsschutz und der Naherholung.<br>
      Wollen wir uns das gefallen lassen? <strong>Wir Naturfreunde meinen 'NEIN'!</strong><br>
      Der Wald braucht wieder eine Lobby. Informiert Euch und unterstützt uns bei unserer Arbeit...</p>
    </div>

    <div id="top-btn-wrap">
      <a href="#" id="top-btn" onclick="window.scrollTo({top:0,behavior:'smooth'});return false;">↑ Seitenanfang</a>
    </div>
  </div>
</main>

<?php include('layout/footer.php'); ?>

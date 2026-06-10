<body>
  <div id="header">
    <div id="header-overlay"></div>
    <div id="header-inner">
      <div id="logo">
        <img src="https://static.wixstatic.com/media/12c2cd_530f2e46a0fb4d8bb5ef01ca4daada7d~mv2.jpg/v1/fill/w_305,h_444,al_c,q_80,enc_avif,quality_auto/12c2cd_530f2e46a0fb4d8bb5ef01ca4daada7d~mv2.jpg" alt="Logo Naturfreunde Troisdorf">
      </div>
      <div id="site-title">
        <h1>BI&nbsp;Naturfreunde&nbsp;Troisdorf</h1>
      </div>
    </div>
    <div id="ticker">
      <span id="ticker-inner">+++ Achtung: Unsere wöchentlichen Naturfreundetreffen finden statt – alle sind herzlich eingeladen! +++ Schützt den Spicher Wald! +++ Hände weg vom Spicher Wald! +++ Informiert Euch und unterstützt uns! +++</span>
    </div>
  </div>

  <nav id="navbar">
    <div id="nav-inner" class="nav-container">
      <div class="nav-item <?php echo ($currentPage == 'aktuell' ? 'active' : ''); ?>">
        <a href="aktuell.php">Aktuell</a>
      </div>
      <div class="nav-item <?php echo ($currentPage == 'index' ? 'active' : ''); ?>">
        <a href="index.php">Worum geht's?</a>
        <div class="dropdown">
          <a href="#">Was tun wir?</a>
          <a href="#">Kletterpark-Vorhaben</a>
          <a href="#">Schießplatz Rottweil</a>
          <a href="#">Sondermülldeponie SAD</a>
        </div>
      </div>
      <div class="nav-item <?php echo ($currentPage == 'aktionen' ? 'active' : ''); ?>">
        <a href="aktionen.php">Aktionen</a>
        <div class="dropdown">
          <a href="#">Kreisumweltausschuss 04.06.18</a>
          <a href="#">StEA am 24.05.2018</a>
          <a href="#">Infoveranstaltung 11.10.17</a>
          <a href="#">Bürgerantrag 01.06.2017</a>
          <a href="#">Offener Brief Stadtwerke</a>
        </div>
      </div>
      <div class="nav-item <?php echo ($currentPage == 'presse' ? 'active' : ''); ?>">
        <a href="presse.php">Was sagt die Presse?</a>
        <div class="dropdown">
          <a href="#">Kletterpark-Thematik</a>
          <a href="#">Schießplatz-Thematik</a>
          <a href="#">SAD-Thematik</a>
        </div>
      </div>
      <div class="nav-item <?php echo ($currentPage == 'eindruecke' ? 'active' : ''); ?>">
        <a href="eindruecke.php">Eindrücke</a>
      </div>
      <div class="nav-item <?php echo ($currentPage == 'wer-sind-wir' ? 'active' : ''); ?>">
        <a href="wer-sind-wir.php">Wer sind wir?</a>
        <div class="dropdown">
          <a href="#">Über uns</a>
          <a href="#">ÜPS</a>
          <a href="#">Mach' mit!</a>
          <a href="#">Spende</a>
        </div>
      </div>
      <div class="nav-item <?php echo ($currentPage == 'kontakt' ? 'active' : ''); ?>">
        <a href="kontakt.php">Kontakt</a>
        <div class="dropdown">
          <a href="#">Impressum</a>
        </div>
      </div>
    </div>
  </nav>
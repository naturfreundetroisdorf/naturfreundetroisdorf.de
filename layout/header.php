<body>
  <div id="header">
    <div id="header-overlay"></div>
    <div id="header-inner">
      <div id="site-title">
        <h1>&nbsp;BI&nbsp;Naturfreunde&nbsp;Troisdorf</h1>
        <p>&nbsp;&nbsp;&nbspWir engagieren uns für unserere Umwelt</p>
      </div>
      <div id="logo">
        <img src="<?php echo BASE_URL; ?>/logo.avif" alt="Logo Naturfreunde Troisdorf">
      </div>
    </div>
    <div id="ticker">
      <span id="ticker-inner">Wir bauen unsere Website gerade um! Manche Seiten sind aktuell noch leer oder unvollständig – das ändert sich in Kürze. Danke für eure Geduld.</span>
    </div>
  </div>
  <nav id="navbar">
    <div id="nav-inner" class="nav-container">
      <div class="nav-item <?php echo ($currentPage == 'aktuell' ? 'active' : ''); ?>">
        <a href="<?php echo BASE_URL; ?>/aktuell.php">Aktuell</a>
      </div>
      <div class="nav-item <?php echo ($currentPage == 'index' ? 'active' : ''); ?>">
        <a href="<?php echo BASE_URL; ?>/index.php">Worum geht's?</a>
      </div>
      <div class="nav-item <?php echo ($currentPage == 'aktionen' ? 'active' : ''); ?>">
        <a href="<?php echo BASE_URL; ?>/aktionen">Bisherige Aktionen</a>
      </div>

      <div class="nav-item <?php echo ($currentPage == 'presse' ? 'active' : ''); ?>">
        <a>Pressebeiträge</a>
          <div class="dropdown">
            <a target="_blank" href="https://www.ksta.de/region/rhein-sieg-bonn/troisdorf/troisdorf-mehrheit-bewilligt-geld-fuer-deponiestrasse-1271875">Troisdorf Mehrheit bewilligt Geld für Deponiestraße 1271875</a>
          </div>
      </div>
<!--
      <div class="nav-item <?php echo ($currentPage == 'eindruecke' ? 'active' : ''); ?>">
        <a href="<?php echo BASE_URL; ?>/eindruecke.php">Eindrücke</a>
      </div>

-->
      <div class="nav-item <?php echo ($currentPage == 'wir' ? 'active' : ''); ?>">
        <a href="<?php echo BASE_URL; ?>/wir.php">Wer sind wir?</a>
      </div>
      <div class="nav-item <?php echo ($currentPage == 'podcast' ? 'active' : ''); ?>">
        <a href="<?php echo BASE_URL; ?>/podcast">Podcast</a>
      </div>
      <div class="nav-item <?php echo ($currentPage == 'kontakt' ? 'active' : ''); ?>">
        <a href="<?php echo BASE_URL; ?>/kontakt/impressum.php">Impressum</a>
      </div>
    </div>
  </nav>
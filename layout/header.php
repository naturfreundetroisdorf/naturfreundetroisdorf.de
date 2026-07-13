<body>
  <div id="header">
    <div id="header-overlay"></div>
    <div id="header-inner">
      <div id="logo">
        <img src="<?php echo BASE_URL; ?>/logo.avif" alt="Logo Naturfreunde Troisdorf">
      </div>
      <div id="site-title">
        <h1>&nbspBI&nbsp;Naturfreunde&nbsp;Troisdorf</h1>
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
        <a href="<?php echo BASE_URL; ?>/aktionen.php">Aktionen</a>
      </div>
      <div class="nav-item <?php echo ($currentPage == 'presse' ? 'active' : ''); ?>">
        <a href="<?php echo BASE_URL; ?>/presse.php">Was sagt die Presse?</a>
      </div>
      <div class="nav-item <?php echo ($currentPage == 'eindruecke' ? 'active' : ''); ?>">
        <a href="<?php echo BASE_URL; ?>/eindruecke.php">Eindrücke</a>
      </div>
      <div class="nav-item <?php echo ($currentPage == 'wir' ? 'active' : ''); ?>">
        <a href="<?php echo BASE_URL; ?>/wir.php">Wer sind wir?</a>
      </div>
      <div class="nav-item <?php echo ($currentPage == 'podcast' ? 'active' : ''); ?>">
        <a>Podcast</a>
          <div class="dropdown">
            <a href="<?php echo BASE_URL; ?>/podcast">podcast</a>
          </div>
      </div>
      <div class="nav-item <?php echo ($currentPage == 'impressum' ? 'active' : ''); ?>">
        <a href="<?php echo BASE_URL; ?>/impressum.php">Impressum</a>
        <!--div class="dropdown">
          <a href="#">Impressum</a>
        </div-->
      </div>
    </div>
  </nav>
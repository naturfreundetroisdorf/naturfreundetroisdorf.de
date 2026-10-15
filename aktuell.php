<?php
$pageTitle = "BI Naturfreunde Troisdorf – Aktuelles";
$currentPage = "aktuell";
include('layout/head.php');
include('layout/header.php');
require_once __DIR__ . '/admin/inc/functions.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/../config/config.php';
$stmt = $pdo->query("
    SELECT *
    FROM " . POSTS_TABLE . "
    WHERE published = 1
    ORDER BY sort_order ASC, pinned DESC, created_at DESC
");
$posts = $stmt->fetchAll();
?>
<!-- MAIN MIT UNTERSCHIEDLICHEM INHALT IN #content -->
<main id="main">
  <div id="content">
    <!-- HIER KOMMT DER NEUE INHALT FÜR "AKTUELL" -->
  <h2>Aktuelle Meldungen</h2>
  <?php if(empty($posts)): ?>
      <p>Zurzeit liegen keine aktuellen Meldungen vor.</p>
  <?php endif; ?>
  <?php foreach($posts as $post): ?>
  <div class="news-item">
      <?php
      // Blog mit PDF: Überschrift, Link "zum Artikel", dann Bild
      $pdfFirst = $post['type'] === 'blog' && !empty($post['pdf']);
      $imageHtml = '';
      if ($post['type'] === 'blog' && !empty($post['image'])) {
          $imageHtml = '<img src="' . BASE_URL . '/uploads/images/' . htmlspecialchars($post['image'])
              . '" class="news-image" alt="' . htmlspecialchars($post['title']) . '">';
      }
      ?>
      <?php if($pdfFirst): ?>
          <h3><?= htmlspecialchars($post['title']) ?></h3>
          <small>
              <?= date('d.m.Y', strtotime($post['created_at'])) ?>
          </small>
          <a class="pdf-link"
             href="<?php echo BASE_URL; ?>/uploads/pdf/<?= htmlspecialchars($post['pdf']) ?>"
             target="_blank" rel="noopener noreferrer">
              <svg class="pdf-icon" width="28" height="34" viewBox="0 0 24 30" aria-hidden="true">
                  <path d="M2 0h14l8 8v20a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2z" fill="#fff" stroke="#bbb"/>
                  <path d="M0 2a2 2 0 0 1 2-2h20a2 2 0 0 1 2 2v5H0z" fill="#e2412d"/>
                  <text x="12" y="5.5" font-size="5" font-family="Arial,sans-serif" font-weight="bold" fill="#fff" text-anchor="middle">PDF</text>
                  <path d="M12 12c1 4 1 9-3 13 3-1 6-3 9-5-3-1-5-2-7-4 1-1 3-1 5 0" fill="none" stroke="#e2412d" stroke-width="1.6"/>
              </svg>
              <span>zum Artikel</span>
          </a>
          <?= $imageHtml ?>
      <?php else: ?>
          <?= $imageHtml ?>
      <?php endif; ?>
      <?php if($post['type'] === 'video'): ?>
          <div class="video-wrapper">
               <iframe
                    src="https://www.youtube.com/embed/<?= htmlspecialchars($post['youtube_id']) ?>"
                    title="<?= htmlspecialchars($post['title']) ?>"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen
                    loading="lazy">
                </iframe>
          </div>
      <?php endif; ?>
      <?php if(!$pdfFirst): ?>
      <h3><?= htmlspecialchars($post['title']) ?></h3>
      <small>
          <?= date('d.m.Y', strtotime($post['created_at'])) ?>
      </small>
      <?php endif; ?>
      <p><?= formatContent($post['content']) ?></p>
  </div>
  <hr class="divider">
  <?php endforeach; ?>
  </div>
  <div id="top-btn-wrap">
    <a href="#" id="top-btn" onclick="window.scrollTo({top:0,behavior:'smooth'});return false;">↑ Seitenanfang</a>
  </div>
</main>
<!-- Vor dem schließenden </body>-Tag oder im <head> -->
<?php include('layout/footer.php'); ?>
</html>
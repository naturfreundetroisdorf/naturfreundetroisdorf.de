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
      <?php if($post['type'] === 'blog'): ?>
          <?php if(!empty($post['image'])): ?>
              <img
                  src="<?php echo BASE_URL; ?>/uploads/images/<?= htmlspecialchars($post['image']) ?>"
                  class="news-image"
                  alt="<?= htmlspecialchars($post['title']) ?>">
          <?php endif; ?>
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
      <h3><?= htmlspecialchars($post['title']) ?></h3>
      <small>
          <?= date('d.m.Y', strtotime($post['created_at'])) ?>
      </small>
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
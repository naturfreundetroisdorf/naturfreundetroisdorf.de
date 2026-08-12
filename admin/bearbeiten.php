<?php
require_once 'inc/auth.php';
require_once 'inc/functions.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/../config/config.php';
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Ungültige ID.");
}
$id = (int)$_GET['id'];
/* Beitrag laden */
$stmt = $pdo->prepare("SELECT * FROM " . POSTS_TABLE . " WHERE id = ?");
$stmt->execute([$id]);
$post = $stmt->fetch();
if (!$post) {
    die("Beitrag nicht gefunden.");
}
/* Speichern */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $type = $_POST['type'];
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $image = $post['image'];
    $youtube = trim($_POST['youtube'] ?? '');
    // Neues Bild hochladen
    if ($type === 'blog' && !empty($_FILES['image']['name'])) {
        // altes Bild löschen
        if (!empty($image)) {
            $siteRootFs = realpath(__DIR__ . '/..'); // admin/ -> 1 Ebene hoch zum Projekt-Root
            $oldFile = $siteRootFs . "/uploads/images/" . $image;
            if (file_exists($oldFile)) {
                unlink($oldFile);
            }
        }
        try {
            $image = uploadImage($_FILES['image']);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    if ($type === 'video') {
        $image = null;
    } else {
        $youtube = null;
    }
    $stmt = $pdo->prepare("
        UPDATE " . POSTS_TABLE . "
        SET
            type = ?,
            title = ?,
            content = ?,
            image = ?,
            youtube_id = ?
        WHERE id = ?
    ");
    $stmt->execute([
        $type,
        $title,
        $content,
        $image,
        $youtube,
        $id
    ]);
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="de">
<head>
<meta charset="UTF-8">
<title>Beitrag bearbeiten</title>
<link rel="stylesheet" href="../css/style.css">
</head>
<body class="admin-body">
<div class="admin">
<h1>Beitrag bearbeiten</h1>
<form method="post" enctype="multipart/form-data">
<p>
<label>Art</label><br>
<select name="type" id="type">
<option value="blog" <?= $post['type']=="blog" ? "selected" : "" ?>>Blog</option>
<option value="video" <?= $post['type']=="video" ? "selected" : "" ?>>Video</option>
</select>
</p>
<p>
<label>Titel</label><br>
<input
type="text"
name="title"
value="<?= htmlspecialchars($post['title']) ?>"
required>
</p>
<div id="image-box">
<?php if(!empty($post['image'])): ?>
<p>
Aktuelles Bild
<br><br>
<img
src="<?php echo BASE_URL; ?>/uploads/images/<?= htmlspecialchars($post['image']) ?>"
style="max-width:300px;">
</p>
<?php endif; ?>
<p>
<label>Neues Bild auswählen</label><br>
<input
type="file"
name="image"
accept="image/*">
</p>
</div>
<div id="youtube-box">
<p>
<label>YouTube-Link</label><br>
<input
type="text"
name="youtube"
value="<?= htmlspecialchars($post['youtube_id']) ?>">
</p>
</div>
<p>
<label>Text</label><br>
<textarea
name="content"
rows="10"><?= htmlspecialchars($post['content']) ?></textarea>
</p>
<p>
<button type="submit">
Speichern
</button>
<a href="index.php">
Abbrechen
</a>
</p>
</form>
</div>
<script>
const type=document.getElementById('type');
const image=document.getElementById('image-box');
const youtube=document.getElementById('youtube-box');
function updateForm(){
    if(type.value==="blog"){
        image.style.display="block";
        youtube.style.display="none";
    }else{
        image.style.display="none";
        youtube.style.display="block";
    }
}
type.addEventListener("change",updateForm);
updateForm();
</script>
</body>
</html>
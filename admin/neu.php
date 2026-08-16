<?php
require_once 'inc/auth.php';
require_once 'inc/functions.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/../config/config.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $type = $_POST['type'];
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $image = null;
    $youtube = null;
    // Bild hochladen
    if ($type === 'blog' && !empty($_FILES['image']['name'])) {
        try {
            $image = uploadImage($_FILES['image']);
        } catch (Exception $e) {
            die($e->getMessage());
        }    }
    // Youtube-ID speichern
    if ($type === 'video') {
    $youtube = extractYoutubeId($_POST['youtube']);
    if ($youtube === null) {
        die('Ungültiger YouTube-Link.');
    }
}
    $stmt = $pdo->prepare("
        INSERT INTO " . POSTS_TABLE . "
        (
            type,
            title,
            content,
            image,
            youtube_id
        )
        VALUES
        (
            ?,
            ?,
            ?,
            ?,
            ?
        )
    ");
    $stmt->execute([
        $type,
        $title,
        $content,
        $image,
        $youtube
    ]);
    header("Location: index.php");
    exit;
}
?>
<!doctype html>
<html lang="de">
<head>
<meta charset="UTF-8">
<title>Neuer Beitrag</title>
<link rel="stylesheet" href="../css/style.css">
</head>
<body class="admin-body">
<div class="admin">
<h1>Neuer Beitrag</h1>
<form method="post" enctype="multipart/form-data">
<p>
<label>Art des Beitrags</label><br>
<select name="type" id="type">
<option value="blog">Blog</option>
<option value="video">Video</option>
</select>
</p>
<p>
<label>Titel</label><br>
<input type="text" name="title" required>
</p>
<div id="image-box">
<p>
<label>Bild</label><br>
<input type="file" name="image" accept="image/*">
</p>
</div>
<div id="youtube-box" style="display:none;">
<p>
<label>YouTube-Link</label><br>
<input type="text" name="youtube">
</p>
</div>
<p>
<label>Text</label><br>
<textarea name="content" rows="10"></textarea>
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
const type = document.getElementById('type');
const imageBox = document.getElementById('image-box');
const youtubeBox = document.getElementById('youtube-box');
type.addEventListener('change', function(){
    if(this.value === 'blog'){
        imageBox.style.display = 'block';
        youtubeBox.style.display = 'none';
    }else{
        imageBox.style.display = 'none';
        youtubeBox.style.display = 'block';
    }
});
</script>
</body>
</html>
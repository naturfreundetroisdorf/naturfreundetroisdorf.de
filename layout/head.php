<?php
if (!defined('BASE_URL')) {
    $siteRootFs = realpath(__DIR__ . '/..');           // layout/ + eine Ebene hoch = Site-Root
    $docRoot    = rtrim(realpath($_SERVER['DOCUMENT_ROOT']), '/');
    $rel        = str_replace($docRoot, '', $siteRootFs);
    define('BASE_URL', $rel === false ? '' : $rel);    // z.B. '' auf Prod, '/naturfreunde-dev' auf Dev
}
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle ?? 'BI Naturfreunde Troisdorf'; ?></title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Source+Sans+3:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/style.css">
</head>
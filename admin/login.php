<?php

session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/../config/settings.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = trim($_POST['username']);
    $password = $_POST['password'];

    if (
        $username === ADMIN_USERNAME &&
        password_verify($password, ADMIN_PASSWORD)
    ) {

        $_SESSION['admin'] = true;

        header("Location: index.php");
        exit;

    }

    $error = "Benutzername oder Passwort ist falsch.";

}
?>

<!DOCTYPE html>
<html lang="de">

<head>

<meta charset="UTF-8">

<title>Login</title>

<link rel="stylesheet" href="../css/style.css">

</head>

<body class="admin-body">

<div class="admin">

<h1>Administrator Login</h1>

<?php if($error): ?>

<p style="color:red;margin-bottom:20px;">

<?= htmlspecialchars($error) ?>

</p>

<?php endif; ?>

<form method="post">

<label>Benutzername</label>

<input
type="text"
name="username"
required>

<label>Passwort</label>

<input
type="password"
name="password"
required>

<br><br>

<button type="submit">

Anmelden

</button>

</form>

</div>

</body>

</html>
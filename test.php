<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/../config.php';

try {

    $stmt = $pdo->query("SELECT 1");

    if ($stmt->fetchColumn() == 1) {
        echo "✅ Datenbankverbindung funktioniert.";
    }

} catch (PDOException $e) {

    echo "❌ Fehler: " . $e->getMessage();

}
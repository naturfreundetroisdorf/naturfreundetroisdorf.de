<?php
require_once 'inc/auth.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/../config/config.php';

header('Content-Type: application/json');

$input = json_decode(file_get_contents('php://input'), true);

if (!is_array($input)) {
    echo json_encode(['success' => false, 'message' => 'Ungültige Daten']);
    exit;
}

try {
    foreach ($input as $item) {
        $stmt = $pdo->prepare("
            UPDATE " . POSTS_TABLE . "
            SET sort_order = :sort_order
            WHERE id = :id
        ");
        $stmt->execute([
            ':sort_order' => $item['sort_order'],
            ':id' => $item['id']
        ]);
    }
    echo json_encode(['success' => true]);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
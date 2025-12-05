<?php
require_once '../config/session_manager.php';
require_once '../config/database.php';
require_once '../repository/OrderRepository.php';

header('Content-Type: application/json');

SessionManager::start();
SessionManager::validateSession();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    $orderId = $input['orderId'] ?? null;

    if (!$orderId) {
        echo json_encode(['success' => false, 'message' => 'ID de orden no proporcionado']);
        exit;
    }

    try {
        $orderRepo = new OrderRepository($pdo);
        $updated = $orderRepo->markAsPaid($orderId);

        if ($updated) {
            echo json_encode(['success' => true, 'message' => "Orden {$orderId} marcada como pagada."]);
        } else {
            echo json_encode(['success' => false, 'message' => "No se pudo actualizar la orden {$orderId}."]);
        }
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => 'Error en el servidor. ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Método no permitido.']);
}
?>
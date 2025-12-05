<?php
// filepath: d:\Desarrollos\2025\Aaron_Magnetismo\code\controller\getPrediagnostic.php

require_once '../config/database.php';
require_once '../config/session_manager.php';
require_once '../repository/PrediagnosticRepository.php';

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json');

// Start session and validate user
SessionManager::start();
SessionManager::validateSession();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Get the orderId from the query string
    $orderId = isset($_GET['orderId']) ? intval($_GET['orderId']) : 0;

    // Validate orderId
    if ($orderId <= 0) {
        http_response_code(400);
        echo json_encode([
            'success' => false,
            'message' => '❌ OrderId inválido'
        ]);
        exit;
    }

    try {
        // Create repository instance and fetch data
        $repository = new PrediagnosticRepository($pdo);
        $data = $repository->getPrediagnosticByOrderId($orderId);

        if ($data === null) {
            http_response_code(404);
            echo json_encode([
                'success' => false,
                'message' => '❌ No se encontró el prediagnóstico para la orden especificada'
            ]);
            exit;
        }

        // Verify that the logged-in user has permission to view this data
        $loggedInUserId = $_SESSION['user_id'] ?? null;
        $dataUserId = $data['user']['UserId'] ?? null;

        if ($loggedInUserId != $dataUserId && $_SESSION['role'] !== 'therapist') {
            http_response_code(403);
            echo json_encode([
                'success' => false,
                'message' => '❌ No tienes permiso para acceder a este prediagnóstico'
            ]);
            exit;
        }

        // Return the data
        http_response_code(200);
        echo json_encode([
            'success' => true,
            'data' => [
                'user' => $data['user'],
                'prediagnostic' => $data['prediagnostic'],
                'prediagDate' => $data['prediagDate']
            ]
        ]);
        exit;
    } catch (PDOException $e) {
        // Log the error
        error_log("Database error in getPrediagnostic.php: " . $e->getMessage());

        http_response_code(500);
        echo json_encode([
            'success' => false,
            'message' => '❌ Error al recuperar el prediagnóstico de la base de datos'
        ]);
        exit;
    } catch (Exception $e) {
        // Handle other exceptions
        error_log("Error in getPrediagnostic.php: " . $e->getMessage());

        http_response_code(500);
        echo json_encode([
            'success' => false,
            'message' => '❌ Error inesperado: ' . $e->getMessage()
        ]);
        exit;
    }
} else {
    // Invalid request method
    http_response_code(405);
    echo json_encode([
        'success' => false,
        'message' => '❌ Método HTTP no permitido. Se requiere GET'
    ]);
    exit;
}
?>
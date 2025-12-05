<?php
// DeptorController.php
require_once '../config/database.php'; // Asegúrate de incluir la conexión
require_once '../config/session_manager.php'; // Include session management logic

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/*
echo "<pre>";
var_dump($_POST);
echo "</pre>";
exit;
*/

// Start session and validate user
SessionManager::start();
SessionManager::validateSession();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Validar que el usuario esté autenticado
        $user_id = $_SESSION['user_id'] ?? null;
        if (!$user_id) {
            throw new Exception("El usuario no está autenticado.");
        }

        // Lista blanca de campos aceptados en el formulario
        $allowed_fields = [
            "diagnostico",
            "caracter",
            "puede_obrar",
            "orina_noche",
            "vertigo",
            "mareos",
            "tiroides",
            "azucar_alta",
            "dolor",
            "dolor_constante",
            "sintomas",
            "diagnosticos_previos",
            "embarazo",
            "dias_sangrado",
            "bolita_pecho"
        ];

        // Capturar dinámicamente las respuestas
        $responses = [];
        foreach ($allowed_fields as $field) {
            if (isset($_POST[$field]) && $_POST[$field] !== '') {
                $responses[$field] = $_POST[$field];
            } else {
                $responses[$field] = null; // guardar como null si no responde
            }
        }

        // Convertir a JSON
        $json_response = json_encode($responses, JSON_UNESCAPED_UNICODE);

    // Convert responses to JSON
    $json_response = json_encode($responses);


        // Save the prediagnostic data to the database
        $stmt = $pdo->prepare("INSERT INTO Prediagnostics (UserId, JsonData, PreDiagDate) VALUES (:user_id, :response, NOW())");
        $stmt->execute([
            ':user_id' => $user_id,
            ':response' => $json_response
        ]);

        
        // Obtener el ID del prediagnóstico recién insertado
        $prediag_id = $pdo->lastInsertId();

        // Crear una orden de pago asociada al prediagnóstico
        $stmt = $pdo->prepare("INSERT INTO Orders (UserId, PrediagId, Status, CreationDate) VALUES (:user_id, :prediag_id, 'Pendiente', NOW())");
        $stmt->execute([
            ':user_id' => $user_id,
            ':prediag_id' => $prediag_id
        ]);

        // Set success message and redirect to order
        SessionManager::setSessionData([
            'success' => "✅ Prediagnóstico guardado correctamente."
        ]);
        header("Location: ../views/Orders/order.php");
        exit;
    } catch (Exception $e) {
        // Handle errors and set error message
        // debt #4 log sensitive information
        //error_log("Database error: " . $e->getMessage());
        SessionManager::setError("Error al guardar el prediagnóstico. Por favor, inténtelo de nuevo. ");
        header("Location: ../views/Patients/home.php");
        exit;
    }
} else {
    // Handle invalid request method
    SessionManager::setError("Método de solicitud no permitido.");
    header("Location: ../views/home.php");
    exit;
}
?>

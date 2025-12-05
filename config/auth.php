<?php

// Include database connection and session manager
require_once 'database.php';
require_once 'session_manager.php';

// Start session
SessionManager::start();

// Check if POST data is set
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = isset($_POST['username']) ? trim($_POST['username']) : null;
    $password = isset($_POST['password']) ? trim($_POST['password']) : null;

    // Validate input
    if ($username && $password) {
        try {
            // Prepare SQL query to fetch user
            $query = "SELECT * FROM Users WHERE Email = :username LIMIT 1";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->execute();

            // Fetch user data
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['Password'])) {
                // Authentication successful

                // Validate user role
                if ($user['Rol'] == 'patient') {
                    SessionManager::setSessionData([
                        'user_id' => $user['UserId'],
                        'username' => $user['Name'], // Ensure this matches your database column
                        'success' => 'Paciente logeado con éxito.'
                    ]);
                    header("Location: ../../views/Patients/home.php");
                    exit;
                } elseif ($user['Rol'] == 'therapist') {
                    SessionManager::setSessionData([
                        'user_id' => $user['UserId'],
                        'username' => $user['Name'], // Ensure this matches your database column
                        'success' => 'Terapeuta logeado con éxito.'
                    ]);
                    header("Location: ../../views/Therapists/home.php");
                    exit;
                }
            } else {
                // Generic error message for security
                SessionManager::setError('Usuario o contraseña inválidos.');
                header("Location: ../index.php");
                exit;
            }
        } catch (PDOException $e) {
            // debt #4 log sensitive information
            //error_log('Error en la base de datos: ' . $e->getMessage());
            SessionManager::setError('Error en la base de datos. Por favor, inténtelo de nuevo más tarde.');
            header("Location: ../index.php");
            exit;
        }
    } else {
        SessionManager::setError('Usuario y contraseña son obligatorios.');
        header("Location: ../index.php");
        exit;
    }
} else {
    SessionManager::setError('Método de solicitud no permitido.');
    header("Location: ../index.php");
    exit;
}

?>
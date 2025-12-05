<?php

require_once '../config/database.php'; // Include database connection
require_once '../config/session_manager.php'; // Include session management logic
require_once '../repository/UserRepository.php'; // Include UserRepository

// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Start session
SessionManager::start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and sanitize input data
    $name = htmlspecialchars(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $phone = htmlspecialchars(filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_NUMBER_INT));
    $email = htmlspecialchars(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
    $password = htmlspecialchars(filter_input(INPUT_POST, 'password', FILTER_UNSAFE_RAW)); // Passwords should not be altered
    $birthdate = htmlspecialchars(filter_input(INPUT_POST, 'birthdate', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $gender = htmlspecialchars(filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $maritalStatus = htmlspecialchars(filter_input(INPUT_POST, 'maritalStatus', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $childrens = htmlspecialchars(filter_input(INPUT_POST, 'childrens', FILTER_SANITIZE_NUMBER_INT));
    $residence = htmlspecialchars(filter_input(INPUT_POST, 'residence', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $operations = htmlspecialchars(filter_input(INPUT_POST, 'operations', FILTER_SANITIZE_FULL_SPECIAL_CHARS));

    // Basic validation
    if (empty($name) || empty($phone) || empty($email) || empty($password)) {
        SessionManager::setError("Faltan campos obligatorios.");
        header("Location: ../views/create_account.php");
        exit;
    }

    try {
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Use the UserRepository to insert the user
        $userRepository = new UserRepository($pdo);
        $userRepository->insertUser($name, $email, $phone, $hashedPassword, 'patient', $birthdate, $gender, $maritalStatus, $childrens, $residence, $operations);

        // Set success message and redirect to login page
        SessionManager::setSessionData([
            'success' => "Cuenta creada exitosamente, por favor inicie sesión."
        ]);
        header("Location: ../index.php");
        exit;
    } catch (PDOException $e) {
        // Log the error and display a generic message
        error_log("Database error: " . $e->getMessage());
        //console.error("Database error: " + e.message);
        SessionManager::setError("Error al guardar el cliente.");
        header("Location: ../views/create_account.php");
        exit;
    }
} else {
    // Handle invalid request method
    SessionManager::setError("Método de solicitud no permitido.");
    header("Location: ../views/create_account.php");
    exit;
}
?>
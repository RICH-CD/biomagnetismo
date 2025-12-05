<?php
// filepath: d:\Desarrollos\2025\Aaron_Magnetismo\code\config\session_manager.php

class SessionManager
{
    // Start the session
    public static function start()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    // Validate if the user is logged in
    public static function validateSession()
    {
        if (!isset($_SESSION['user_id'])) {
            header("Location: ../index.php");
            exit;
        }
    }

    // Set session data
    public static function setSessionData(array $data)
    {
        foreach ($data as $key => $value) {
            $_SESSION[$key] = $value;
        }
    }

    // Set an error message
    public static function setError(string $message)
    {
        $_SESSION['error'] = $message;
    }

    // Display alerts for errors or success messages
    public static function displayAlerts()
    {
        if (isset($_SESSION['error'])) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
            echo '<strong>Error!</strong> ' . htmlspecialchars($_SESSION['error']);
            echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
            echo '</div>';
            unset($_SESSION['error']);
        }

        if (isset($_SESSION['success'])) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
            echo '<strong>Éxito!</strong> ' . htmlspecialchars($_SESSION['success']);
            echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
            echo '</div>';
            unset($_SESSION['success']);
        }
    }
}
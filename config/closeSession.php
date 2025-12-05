<?php
// filepath: d:\Desarrollos\2025\Aaron_Magnetismo\code\closeSession.php

// Start the session
session_start();

// Destroy all session variables
session_unset();

// Destroy the session
session_destroy();

// Redirect to the login page
header("Location: index.php");
exit;
?>
<?php
// filepath: d:\Desarrollos\2025\Aaron_Magnetismo\code\views\home.php

require_once '../../config/session_manager.php'; // Include session management logic

// Start session and validate user
SessionManager::start();
SessionManager::validateSession();

// Include the HTML content
?>
<!doctype html>
<html lang="en">
<head>
    <title>BIOMAGNETISMO MEDICO AARONBIOMAG</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">BIOMAGNETISMO MEDICO AARONBIOMAG</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- commented until complete logic is added
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="create_consult.php">Crear Nueva Consulta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="historical.php">Historial</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../closeSession.php">Cerrar Sesión</a>
                    </li>
                </ul>
            </div>
-->
        </div>
    </nav>

    <!-- Display Alerts -->
    <?php SessionManager::displayAlerts(); ?>

    

    <!-- Footer -->
  <footer class="bg-primary text-white text-center py-3 mt-5">
    <p class="mb-0">© 2025 Terapias Online | Todos los derechos reservados</p>
  </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>
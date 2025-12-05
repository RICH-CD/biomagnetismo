<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../../config/session_manager.php'; // Include session management logic
//require_once '../Partials/navbar.php'; // Include navbar partial

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
    <?php include '../Partials/navbar.php'; ?>


    <!-- Display Alerts -->
    <?php SessionManager::displayAlerts(); ?>

    <div class="container py-5">
    <h2 class="text-center mb-4 fw-bold">Menú Principal</h2>
    <p class="text-center text-muted mb-5">Selecciona una opción para continuar</p>

    <div class="row g-4 justify-content-center">
      <!-- Opción Nueva Consulta -->
      <div class="col-12 col-md-5">
        <a href="prediagnostic.php" class="text-decoration-none">
          <div class="card shadow-sm h-100 text-center p-4">
            <div class="card-body">
              <i class="bi bi-journal-plus display-1 text-primary"></i>
              <h5 class="card-title mt-3">Nueva Consulta</h5>
              <p class="card-text text-muted">Completa un nuevo prediagnóstico y solicita tu terapia.</p>
            </div>
          </div>
        </a>
      </div>

      <!-- Opción Historial -->
      <div class="col-12 col-md-5">
        <a href="historical.php" class="text-decoration-none">
          <div class="card shadow-sm h-100 text-center p-4">
            <div class="card-body">
              <i class="bi bi-clock-history display-1 text-success"></i>
              <h5 class="card-title mt-3">Historial de Consultas</h5>
              <p class="card-text text-muted">Consulta el registro de tus terapias anteriores.</p>
            </div>
          </div>
        </a>
      </div>
    </div>
  </div>

    <!-- Footer -->
  <footer class="bg-primary text-white text-center py-3 mt-5">
    <p class="mb-0">© 2025 Terapias Online | Todos los derechos reservados</p>
  </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>
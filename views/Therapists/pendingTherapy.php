<?php

require_once '../../config/session_manager.php'; // Include session management logic
require_once '../../config/database.php'; // conexión PDO
require_once '../../repository/OrderRepository.php';

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
    <?php include '../Partials/therapistNavbar.php'; ?>

    <!-- Display Alerts -->
    <?php SessionManager::displayAlerts(); ?>

    <div class="container py-5">
    <h2 class="text-center mb-4 fw-bold">Terapias pagadas Pendientes por procesar</h2>
    <p class="text-center text-muted mb-5">Ver detalles de las terapias pendientes</p>

    
    <div class="row g-4">
    <!-- Terapia pendiente de redactar -->
    <div class="col-md-6 col-lg-4">
      <div class="card shadow-sm border-success">
        <div class="card-body">
          <h5 class="card-title">Juan Pérez</h5>
          <p class="card-text mb-1"><strong>Monto:</strong> $500</p>
          <p class="card-text mb-1"><strong>Fecha de pago:</strong> 2025-09-18</p>
          <p class="card-text"><strong>Estado:</strong> <span class="badge bg-success">Pagado</span></p>
          <a href="redactarTerapia.php?id=1" class="btn btn-sm btn-primary">Redactar Terapia</a>
        </div>
      </div>
    </div>

    <!-- Terapia pendiente de redactar -->
    <div class="col-md-6 col-lg-4">
      <div class="card shadow-sm border-success">
        <div class="card-body">
          <h5 class="card-title">María López</h5>
          <p class="card-text mb-1"><strong>Monto:</strong> $750</p>
          <p class="card-text mb-1"><strong>Fecha de pago:</strong> 2025-09-19</p>
          <p class="card-text"><strong>Estado:</strong> <span class="badge bg-success">Pagado</span></p>
          <a href="redactarTerapia.php?id=2" class="btn btn-sm btn-primary">Redactar Terapia</a>
        </div>
      </div>
    </div>

    <!-- Terapia pendiente de redactar -->
    <div class="col-md-6 col-lg-4">
      <div class="card shadow-sm border-success">
        <div class="card-body">
          <h5 class="card-title">Carlos Ramírez</h5>
          <p class="card-text mb-1"><strong>Monto:</strong> $600</p>
          <p class="card-text mb-1"><strong>Fecha de pago:</strong> 2025-09-15</p>
          <p class="card-text"><strong>Estado:</strong> <span class="badge bg-success">Pagado</span></p>
          <a href="redactarTerapia.php?id=3" class="btn btn-sm btn-primary">Redactar Terapia</a>
        </div>
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
<?php
// filepath: d:\Desarrollos\2025\Aaron_Magnetismo\code\views\home.php

//require_once '../../config/session_manager.php'; // Include session management logic

// Start session and validate user
//SessionManager::start();
//SessionManager::validateSession();

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
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../create_consult.php">Crear Nueva Consulta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../historical.php">Historial</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../Patients/home.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../closeSession.php">Cerrar Sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Display Alerts -->
    <?php //SessionManager::displayAlerts();
    //  ?>

<div class="container py-5">
    <div class="card shadow-lg border-0">
      <div class="card-header text-center bg-primary text-white">
        <h4 class="mb-0">Orden de Pago</h4>
      </div>
      <div class="card-body">
        <!-- Datos de la clínica -->
        <div class="mb-4">
          <h5 class="fw-bold">BIOMAGNETISMO MEDICO AARONBIOMAG</h5>
          <p class="mb-0">RFC: DEMO123456XXX</p>
          <p class="mb-0">Correo: contacto@aaronbiomag.com</p>
        </div>

        <!-- Datos del paciente -->
        <div class="mb-4">
          <p><strong>Paciente:</strong> Paciente Demo</p>
          <p><strong>ID de Orden:</strong> ORD-0001</p>
          <p><strong>Fecha:</strong> 16/09/2025</p>
        </div>

        <!-- Detalle del servicio -->
        <table class="table table-bordered">
          <thead class="table-light">
            <tr>
              <th>Servicio</th>
              <th>Cantidad</th>
              <th>Precio Unitario</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Sesión de Terapia</td>
              <td>1</td>
              <td>$500.00 MXN</td>
              <td>$500.00 MXN</td>
            </tr>
          </tbody>
        </table>

        <!-- Total -->
        <div class="d-flex justify-content-end">
          <h5 class="fw-bold">Total a pagar: $500.00 MXN</h5>
        </div>

        <!-- Estado -->
        <div class="alert alert-warning text-center mt-3 fw-bold" role="alert">
          Estado: Pendiente de Pago
        </div>

        <!-- Datos bancarios -->
        <div class="mt-4">
          <h6 class="fw-bold">Datos Bancarios</h6>
          <p class="mb-0"><strong>Banco:</strong> BANCO DEMO</p>
          <p class="mb-0"><strong>Cuenta:</strong> 1234567890</p>
          <p class="mb-0"><strong>CLABE:</strong> 012345678901234567</p>
          <p class="mb-0"><strong>Titular:</strong> BIOMAGNETISMO MEDICO AARONBIOMAG</p>
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
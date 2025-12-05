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
    <?php include '../Partials/navbar.php'; ?>

    <!-- Display Alerts -->
    <?php SessionManager::displayAlerts(); ?>

    <?php
// En un futuro aquí incluirás la consulta real a MySQL
// Ejemplo: $consultas = SELECT * FROM consultas WHERE user_id = $_SESSION['user_id'];
// Por ahora usaremos data dummy:
$consultas = [
  [
    "fecha" => "2025-09-01",
    "estado" => "Completada",
    "detalle" => "Terapia de relajación y manejo de estrés"
  ],
  [
    "fecha" => "2025-08-15",
    "estado" => "Pendiente",
    "detalle" => "Consulta sobre dolor de espalda"
  ],
  [
    "fecha" => "2025-08-02",
    "estado" => "Completada",
    "detalle" => "Terapia guiada de respiración"
  ]
];
?>


<!-- Contenido principal -->
  <div class="container py-5">
    <h2 class="text-center fw-bold mb-4">Historial de Consultas</h2>
    <p class="text-center text-muted mb-5">Aquí puedes consultar tus terapias anteriores. Tenga en cuenta que de momento estamos viendo informacion de muestra Informacion de muestra</p>

    <!-- Tabla de historial -->
    <div class="table-responsive">
      <table class="table table-striped table-hover shadow-sm">
        <thead class="table-primary">
          <tr>
            <th><i class="bi bi-calendar-event"></i> Fecha</th>
            <th><i class="bi bi-info-circle"></i> Estado</th>
            <th><i class="bi bi-journal-text"></i> Detalle</th>
            <th><i class="bi bi-journal-text"></i> Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($consultas as $c): ?>
            <tr>
              <td><?= htmlspecialchars($c["fecha"]) ?></td>
              <td>
                <?php if ($c["estado"] === "Completada"): ?>
                  <span class="badge bg-success"><?= $c["estado"] ?></span>
                <?php else: ?>
                  <span class="badge bg-warning text-dark"><?= $c["estado"] ?></span>
                <?php endif; ?>
              </td>
              <td><?= htmlspecialchars($c["detalle"]) ?></td>
              <td>
                <a href="verTerapia.php?id=<?= $c["id"] ?>" class="btn btn-sm btn-primary">Ver Terapia</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Footer -->
  <footer class="bg-primary text-white text-center py-3 mt-5">
    <p class="mb-0">© 2025 Terapias Online | Todos los derechos reservados</p>
  </footer>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>
<?php

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

    <div class="container py-5">
  <div class="card shadow-sm">
    <div class="card-header bg-success text-white">
      <h4 class="mb-0">Terapia enviada por tu terapeuta</h4>
    </div>
    <div class="card-body">
      <h5 class="card-title">Paciente: Juan Pérez</h5>
      <p class="text-muted">Fecha de entrega: 20 de septiembre de 2025</p>
      <hr>

      <!-- Contenido redactado por el terapeuta -->
      <div class="terapia-contenido">
        <p><strong>Introducción:</strong></p>
        <p>Estimado Juan, esta terapia está diseñada para ayudarte a manejar la ansiedad en tu vida diaria. Incluye ejercicios de respiración, pautas de relajación y reflexiones personales.</p>

        <p><strong>Ejercicio de Respiración:</strong></p>
        <ul>
          <li>Respira profundamente por la nariz durante 4 segundos.</li>
          <li>Mantén el aire 4 segundos.</li>
          <li>Exhala lentamente por la boca durante 6 segundos.</li>
          <li>Repite durante 5 minutos, 2 veces al día.</li>
        </ul>

        <p><strong>Reflexión:</strong></p>
        <blockquote class="blockquote">
          “No podemos controlar todo lo que nos sucede, pero sí cómo respondemos a ello.”
        </blockquote>

        <p><strong>Próximos pasos:</strong></p>
        <ol>
          <li>Practicar la técnica de respiración durante una semana.</li>
          <li>Anotar sensaciones y cambios emocionales en un cuaderno.</li>
          <li>Revisar avances en la próxima sesión.</li>
        </ol>
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
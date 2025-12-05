<?php

require_once 'config/session_manager.php'; // Include session management logic

// Start session
SessionManager::start();
?>

<!doctype html>
<html lang="en">
<head>
    <title>BIOMAGNETISMO MEDICO AARONBIOMAG</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body class="bg-light">
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow-lg p-4" style="width: 100%; max-width: 400px;">
            <div class="card-header text-center">
                <h1 class="h4">BIOMAGNETISMO MEDICO AARONBIOMAG</h1>
                <p class="text-muted">Por favor, ingrese sus credenciales para continuar</p>
            </div>
            <div class="card-body">
                <!-- Display Alerts -->
                <?php SessionManager::displayAlerts(); ?>

                <!-- Login Form -->
                <form action="config/auth.php" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Correo Electrónico</label>
                        <input type="email" id="username" name="username" class="form-control" placeholder="Ingrese su correo" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Ingrese su contraseña" required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-success">Iniciar Sesión</button>
                    </div>
                </form>
                <hr>
                <div class="text-center">
                    <button id="createAccountBtn" type="button" class="btn btn-primary">Crear Cuenta</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    <script>
        document.getElementById('createAccountBtn').addEventListener('click', function () {
            window.location.href = 'views/create_account.php'; 
        });
    </script>
</body>
</html>
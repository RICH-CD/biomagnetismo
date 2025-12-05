<?php
require_once '../../config/session_manager.php'; 

// Start session and validate user
SessionManager::start();
SessionManager::validateSession();

// Recibimos el orderId desde GET
$orderId = isset($_GET['orderId']) ? intval($_GET['orderId']) : 0;
?>
<!doctype html>
<html lang="es">
<head>
    <title>Ver Prediagnóstico - Redactar Terapia</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- TinyMCE -->
    <script src="https://cdn.tiny.cloud/1/ckk7zfoeqvmdhjsrvlilv71tsukd0xukwsnlnooqsfilyt2w/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
      tinymce.init({
        selector: '#terapia',
        height: 400,
        menubar: false,
        plugins: 'lists link',
        toolbar: 'undo redo | bold italic underline | bullist numlist | link',
        branding: false
      });
    </script>
</head>
<body>

    <!-- Display Alerts -->
    <?php SessionManager::displayAlerts(); ?>

    <div class="container py-5">
        <!-- 🔹 Sección Prediagnóstico -->
        <h2 class="mb-4 text-center">Prediagnóstico del Paciente</h2>
        <div id="prediagnosticSection" class="mb-5">
            <div class="alert alert-info">Cargando información del paciente...</div>
        </div>

        <!-- 🔹 Sección Terapia -->
        <h2 class="mb-4 text-center">Redactar Terapia</h2>
        <form action="home.php" method="POST">
            <input type="hidden" name="orderId" value="<?= htmlspecialchars($orderId) ?>">
            <textarea id="terapia" name="contenido"></textarea>
            <div class="text-end mt-3">
                <button type="submit" class="btn btn-success">Guardar y Enviar Terapia</button>
            </div>
        </form>
    </div>

    <!-- Footer -->
    <footer class="bg-primary text-white text-center py-3 mt-5">
        <p class="mb-0">© 2025 Terapias Online | Todos los derechos reservados</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

    <script>
    document.addEventListener("DOMContentLoaded", async () => {
        const container = document.getElementById("prediagnosticSection");

        try {
            let response = await fetch(`../../controller/getPrediagnostic.php?orderId=<?= $orderId ?>`);
            let result = await response.json();

            if (result.success) {
                let user = result.data.user;
                let prediag = result.data.prediagnostic;

                // Construimos HTML
                let html = `
                    <div class="card shadow-sm">
                        <div class="card-header bg-secondary text-white">Datos del Paciente</div>
                        <div class="card-body">
                            <p><strong>Nombre:</strong> ${user.nombre}</p>
                            <p><strong>Edad:</strong> ${user.edad} años</p>
                            <p><strong>Email:</strong> ${user.email}</p>
                        </div>
                    </div>
                    <div class="card shadow-sm mt-3">
                        <div class="card-header bg-info text-white">Respuestas del Prediagnóstico</div>
                        <div class="card-body">
                            <ul class="list-group">
                `;

                // Recorrer JSON del prediagnóstico
                for (let key in prediag) {
                    html += `<li class="list-group-item"><strong>${key}:</strong> ${prediag[key]}</li>`;
                }

                html += `
                            </ul>
                        </div>
                    </div>
                `;

                container.innerHTML = html;
            } else {
                container.innerHTML = `<div class="alert alert-warning">${result.message}</div>`;
            }
        } catch (error) {
            console.error(error);
            container.innerHTML = `<div class="alert alert-danger">Error cargando el prediagnóstico.</div>`;
        }
    });
    </script>
</body>
</html>

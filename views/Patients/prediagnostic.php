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
    <title>Aaron Magnetismo</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body>
    <!-- Navbar -->
    <?php include '../Partials/navbar.php'; ?>

    <!-- Display Alerts -->
    <?php SessionManager::displayAlerts(); ?>

    <!-- Main Content -->
    <div class="container py-5">
        <!-- Encabezado -->
        <div class="text-center mb-5">
            <h1 class="fw-bold">Formulario de Prediagnóstico</h1>
            <p class="text-muted">Por favor completa la siguiente información</p>
        </div>

        <form method="POST" action="../../service/save_prediagnostic.php" class="card shadow p-4 rounded-4">
           

            <!-- Sección 1: Diagnóstico -->
            <h4 class="mb-3">🧾 Diagnóstico</h4>
            <div class="mb-3">
                <label class="form-label">¿Qué diagnóstico le han dado?</label>
                <input type="text" class="form-control" name="diagnostico" placeholder="Escribe aquí">
            </div>

            <!-- Sección 3: Carácter -->
            <h4 class="mb-3">😃 Carácter</h4>
            <div class="mb-3">
                <label class="form-label">¿Qué carácter tiene?</label>
                <div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="caracter" value="tranquilo">
                        <label class="form-check-label">Tranquilo</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="caracter" value="explosivo">
                        <label class="form-check-label">Explosivo</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="caracter" value="otro">
                        <label class="form-check-label">Otro</label>
                    </div>
                </div>
            </div>

            <hr class="my-4">

            <!-- Sección 4: Funciones fisiológicas -->
            <h4 class="mb-3">🚻 Funciones fisiológicas</h4>
            <?php 
            $preguntas_si_no = [
                "puede_obrar" => "¿Puede obrar (hacer popo)?",
                "orina_noche" => "¿Se levanta a orinar por las noches?",
                "vertigo" => "¿Tiene vértigo?",
                "mareos" => "¿Tiene mareos?",
                "tiroides" => "¿Tiene problemas de tiroides?",
                "azucar_alta" => "¿Tiene azúcar alta?"
            ];
            foreach ($preguntas_si_no as $name => $label): ?>
                <div class="mb-3">
                    <label class="form-label"><?= $label ?></label>
                    <div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" name="<?= $name ?>" value="si">
                            <label class="form-check-label">Sí</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" name="<?= $name ?>" value="no">
                            <label class="form-check-label">No</label>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

            <hr class="my-4">

            <!-- Sección 5: Dolores -->
            <h4 class="mb-3">🤕 Dolores</h4>
            <div class="mb-3">
                <label class="form-label">¿Tiene algún dolor?</label>
                <input type="text" class="form-control" name="dolor" placeholder="Describe el dolor">
            </div>
            <div class="mb-3">
                <label class="form-label">¿Tiene un dolor fuerte constante en su cuerpo?</label>
                <div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="dolor_constante" value="si">
                        <label class="form-check-label">Sí</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="dolor_constante" value="no">
                        <label class="form-check-label">No</label>
                    </div>
                </div>
            </div>

            <hr class="my-4">

            <!-- Sección 6: Síntomas adicionales -->
            <h4 class="mb-3">🩺 Síntomas adicionales</h4>
            <div class="mb-3">
                <label class="form-label">¿Cuáles son sus síntomas?</label>
                <textarea class="form-control" name="sintomas" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">¿Qué diagnósticos le han dado?</label>
                <input type="text" class="form-control" name="diagnosticos_previos" placeholder="Ejemplo: Migraña, hipertensión...">
            </div>

            <hr class="my-4">

            <!-- Sección 8: Condiciones femeninas (se mostrará solo si género = femenino) -->
            <div id="condiciones_femeninas" style="display:none;">
                <h4 class="mb-3">👩‍🍼 Condiciones femeninas</h4>

                <div class="mb-3">
                    <label class="form-label">¿Está embarazada?</label>
                    <div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" name="embarazo" value="si">
                            <label class="form-check-label">Sí</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" name="embarazo" value="no">
                            <label class="form-check-label">No</label>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">¿Cuántos días dura su sangrado menstrual?</label>
                    <input type="number" class="form-control" name="dias_sangrado" placeholder="Ejemplo: 5">
                </div>

                <div class="mb-3">
                    <label class="form-label">¿Tiene alguna bolita en algún pecho?</label>
                    <div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" name="bolita_pecho" value="si">
                            <label class="form-check-label">Sí</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" name="bolita_pecho" value="no">
                            <label class="form-check-label">No</label>
                        </div>
                    </div>
                </div>
            </div>

                    <!-- Botón Guardar -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg rounded-pill">
                            Guardar Prediagnóstico
                        </button>
                    </div>
                </form>
            </div>

      <!-- Footer -->
        <footer class="bg-primary text-white text-center py-3 mt-5">
            <p class="mb-0">© 2025 Terapias Online | Todos los derechos reservados</p>
        </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>
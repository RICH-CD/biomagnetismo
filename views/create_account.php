<!doctype html>
<html lang="en">
<head>
    <title>Crear Cuenta</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/libphonenumber-js@1.10.39/bundle/libphonenumber-js.min.js"></script>
</head>
<body class="bg-light">
    <div class="container d-flex justify-content-center py-4 ">
        <div class="card shadow-lg p-4" style="width: 100%; max-width: 500px; overflow-y: auto; max-height: 90vh;">
            <div class="card-header text-center">
                <h1 class="h4">Crear Cuenta de Paciente</h1>
                <p class="text-muted">Complete el formulario para registrar un nuevo paciente</p>
            </div>
            <div class="card-body">
                <!-- Form -->
                <form action="../controller/addPacientController.php" method="POST" class="needs-validation" novalidate id="registro">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre Completo</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Ingrese su nombre completo" required>
                        <div class="invalid-feedback">Por favor, ingrese su nombre completo.</div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese su correo electrónico" required>
                        <div class="invalid-feedback">Por favor, ingrese un correo válido.</div>
                    </div>
                    <!-- Teléfono -->
                    <div class="mb-3">
                        <label for="phone" class="form-label">Teléfono</label>
                        <div class="input-group">
                            <!-- Country Selector -->
                            <select class="form-select" id="country" name="country" required>
                                <option value="US" selected>🇺🇸 Estados Unidos</option>
                                <option value="MX">🇲🇽 México</option>
                                <option value="ES">🇪🇸 España</option>
                                <option value="AR">🇦🇷 Argentina</option>
                                <option value="CO">🇨🇴 Colombia</option>
                                <option value="CL">🇨🇱 Chile</option>
                                <option value="PE">🇵🇪 Perú</option>
                                <option value="BR">🇧🇷 Brasil</option>
                                <option value="FR">🇫🇷 Francia</option>
                                <option value="DE">🇩🇪 Alemania</option>
                                <option value="IT">🇮🇹 Italia</option>
                                <option value="GB">🇬🇧 Reino Unido</option>
                                <option value="CA">🇨🇦 Canadá</option>
                            </select>
                            <input type="text" class="form-control" name="phone" placeholder="Ingrese su número de teléfono" required id="telefono">
                        </div>
                        <div id="phoneError" class="alert alert-danger d-none mt-2" role="alert">
                            El número ingresado no es válido. Por favor, verifique e intente nuevamente.
                        </div>
                        <div class="invalid-feedback">Por favor, seleccione un país y un número de teléfono válido.</div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Ingrese su contraseña" required>
                        <div class="invalid-feedback">Por favor, ingrese una contraseña válida.</div>
                    </div>
                    <!-- Fecha de Nacimiento -->
                    <div class="mb-3">
                        <label for="birthdate" class="form-label">Fecha de Nacimiento</label>
                        <input type="date" class="form-control" id="birthdate" name="birthdate" required>
                        <div class="invalid-feedback">Por favor, seleccione su fecha de nacimiento.</div>
                    </div>
                    <!-- Género -->
                    <div class="mb-3">
                        <label class="form-label">Género</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="male" value="Masculino" required>    
                                <label class="form-check-label" for="male">Masculino</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="female" value="Femenino" required>
                                <label class="form-check-label" for="female">Femenino</label>
                            </div>  
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="non-binary" value="No Binario" required>
                                <label class="form-check-label" for="non-binary">No Binario</label>
                            </div>  
                        </div>
                    </div>
                    <!-- Estado Civil -->
                    <div class="mb-3">
                        <label class="form-label">Estado Civil</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="marital_status" id="single" value="Soltero" required>
                                <label class="form-check-label" for="single">Soltero</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="marital_status" id="married" value="Casado" required>
                                <label class="form-check-label" for="married">Casado</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="marital_status" id="divorced" value="Divorciado" required>
                                <label class="form-check-label" for="divorced">Divorciado</label>
                            </div>
                        </div>
                        <div class="invalid-feedback">Por favor, seleccione su estado civil.</div>
                    </div>
                    <!-- Número de Hijos -->
                    <div class="mb-3">
                        <label for="children" class="form-label">Número de Hijos</label>
                        <input type="number" class="form-control" id="children" name="children" placeholder="Ingrese el número de hijos" min="0" required>
                        <div class="invalid-feedback">Por favor, ingrese un número válido.</div>
                    </div>
                    <!-- Lugar de Residencia -->
                    <div class="mb-3">
                        <label for="residence" class="form-label">Lugar de Residencia</label>
                        <input type="text" class="form-control" id="residence" name="residence" placeholder="Ingrese su lugar de residencia" required>
                        <div class="invalid-feedback">Por favor, ingrese su lugar de residencia.</div>
                    </div>
                    <!-- Cuantas operaciones tiene -->
                    <div class="mb-3">
                        <label for="operations" class="form-label">Número de Operaciones</label>
                        <input type="number" class="form-control" id="operations" name="operations" placeholder="Ingrese el número de operaciones" min="0" required>
                        <div class="invalid-feedback">Por favor, ingrese un número válido.</div>
                    </div>
                    <!-- Registrar nueva cuenta-->
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-success">Registrar Paciente</button>
                        <button type="button" class="btn btn-secondary" onclick="location.href='../index.php'">Volver</button>
                    </div>
                </form>
                <div id="phoneError" class="alert alert-danger d-none" role="alert">
                    El número ingresado no es válido. Por favor, verifique e intente nuevamente.
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>

    <script>
  const form = document.getElementById('registro');
  form.addEventListener('submit', function(event) {
    event.preventDefault();
    console.log("Validando teléfono...");
    const input = document.getElementById('telefono').value;
    const country = document.getElementById('country').value; // Get selected country code
    const phoneError = document.getElementById('phoneError'); // Get the alert element

    try {
        const phoneNumber = libphonenumber.parsePhoneNumber(input, country); // Use selected country code

        if (phoneNumber.isValid()) {
            // Hide the error alert if the phone number is valid
            phoneError.classList.add('d-none');
            phoneError.classList.remove('d-block');

            // Submit the form
            form.submit();
        } else {
            // Show the error alert if the phone number is invalid
            phoneError.textContent = "El número ingresado no es válido. Por favor, verifique e intente nuevamente.";
            phoneError.classList.remove('d-none');
            phoneError.classList.add('d-block');
        }
    } catch (e) {
        // Show the error alert for invalid format
        phoneError.textContent = "Formato de número incorrecto. Por favor, verifique e intente nuevamente.";
        phoneError.classList.remove('d-none');
        phoneError.classList.add('d-block');
    }
  });

  const telefonoInput = document.getElementById('telefono');
telefonoInput.addEventListener('input', function () {
    const phoneError = document.getElementById('phoneError'); // Get the alert element
    phoneError.classList.add('d-none'); // Hide the error alert
    phoneError.classList.remove('d-block'); // Remove the visible class
});
</script>
    <script>
        // Bootstrap validation script
        (function () {
            'use strict';
            const forms = document.querySelectorAll('.needs-validation');
            Array.from(forms).forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        })();
    </script>
</body>
</html>
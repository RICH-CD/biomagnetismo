<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../../config/session_manager.php'; // Include session management logic
require_once '../../config/database.php'; // conexión PDO
require_once '../../repository/OrderRepository.php';

// Start session and validate user
SessionManager::start();
SessionManager::validateSession();


// Instanciamos el repositorio
$orderRepo = new OrderRepository($pdo);

// Obtenemos las órdenes pendientes
$pendingOrders = $orderRepo->getPendingOrders();
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
    <div class="card shadow-lg border-0">
      <div class="card-header bg-primary text-white text-center">
        <h4 class="mb-0">Órdenes de Pago Pendientes</h4>
      </div>
      <div class="card-body">
        <div id="alertContainer"></div>
        <table class="table table-bordered table-hover">
          <thead class="table-light">
            <tr>
              <th>ID Orden</th>
              <th>Paciente</th>
              <th>Servicio</th>
              <th>Monto</th>
              <th>Fecha</th>
              <th>Acción</th>
            </tr>
          </thead>
          <tbody>
    <?php if (!empty($pendingOrders)): ?>
        <?php foreach ($pendingOrders as $order): ?>
            <tr>
                <td><?= htmlspecialchars($order['OrderId']) ?></td>
                <td><?= htmlspecialchars($order['Name']) ?></td>
                <td>Sesión de Terapia</td> <!-- luego lo podemos sacar de otra tabla si hay catálogo -->
                <td>$500.00 MXN</td> <!-- también podría venir de BD -->
                <td><?= date('d/m/Y', strtotime($order['CreationDate'])) ?></td>
                <td>
                    <button class="btn btn-success btn-sm" onclick="validarPago('<?= $order['OrderId'] ?>')">
                        Validar Pago
                    </button>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="6" class="text-center">No hay órdenes pendientes.</td>
        </tr>
    <?php endif; ?>
</tbody>
        </table>
      </div>
    </div>
  </div>

  <script>
    function showBootstrapAlert(message, type = 'success') {
    const alertContainer = document.getElementById('alertContainer');
    alertContainer.innerHTML = `
        <div class="alert alert-${type} alert-dismissible fade show" role="alert">
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    `;
}

    async function validarPago(idOrden) {
      let confirmacion = confirm(`¿Estás seguro de que el pago de la orden ${idOrden} se realizó?`);
      if (!confirmacion) {
          showBootstrapAlert(`❌ Validación de la orden ${idOrden} cancelada.`, 'warning');
          return;
      }

      try {
          let response = await fetch('../../controller/validatePayment.php', {
              method: 'POST',
              headers: {
                  'Content-Type': 'application/json'
              },
              body: JSON.stringify({ orderId: idOrden })
          });

          let result = await response.json();

          if (result.success) {
              showBootstrapAlert(`✅ ${result.message}`, 'success');
              setTimeout(() => location.reload(), 1500); // espera antes de recargar
          } else {
              showBootstrapAlert(`⚠️ ${result.message}`, 'danger');
          }
      } catch (error) {
          showBootstrapAlert("❌ Error en la comunicación con el servidor. " + error.message, 'danger');
          console.error(error);
      }
    }
  </script>




    <!-- Footer -->
  <footer class="bg-primary text-white text-center py-3 mt-5">
    <p class="mb-0">© 2025 Terapias Online | Todos los derechos reservados</p>
  </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>
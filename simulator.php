<?php
session_start();
// capturamos los datos que vienen del 'comercio'
$monto = $_POST['amount'] ?? 0;
$token = $_POST['token'] ?? 'sin-token';
$callback = $_POST['callback_url'] ?? '';

// guardamos en sesión para procesar después del 'pago'
$_SESSION['temp_pago'] = [
  'monto' => $monto,
  'token' => $token,
  'callback' => $callback
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Simulador de Pago Seguro</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/bank-style.css">
</head>
<body class="bg-light">
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card shadow-sm">
          <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Banco Simulador - Checkout</h5>
          </div>
          <div class="card-body">
            <p>Estás pagando en: <strong>Classbook.cl</strong></p>
            <h3 class="text-center mb-4">$<?php echo number_format($monto, 0, ',', '.'); ?></h3>
            
            <div class="d-grid gap-2">
              <form action="callback.php" method="POST">
                <input type="hidden" name="status" value="success">
                <button type="submit" class="btn btn-success btn-lg w-100">Simular Pago Exitoso</button>
              </form>
              
              <form action="callback.php" method="POST">
                <input type="hidden" name="status" value="failed">
                <button type="submit" class="btn btn-danger w-100">Simular Pago Rechazado</button>
              </form>
            </div>
          </div>
          <div class="card-footer text-muted text-center">
            <small>Entorno de pruebas para desarrolladores</small>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
<?php
session_start();
// simulando captura de datos de un carrito o pago
$_SESSION['monto_pago'] = $_POST['monto'];
$_SESSION['id_transaccion'] = "TX-" . rand(1000, 9999);

// redirigir al simulador mediante un formulario oculto para mantener el uso de POST
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Redirigiendo al Banco...</title>
</head>
<body onload="document.forms['bank_form'].submit();">
  <form name="bank_form" action="simulador.php" method="POST">
    <input type="hidden" name="token" value="<?php echo session_id(); ?>">
    <input type="hidden" name="amount" value="<?php echo $_SESSION['monto_pago']; ?>">
    <input type="hidden" name="callback_url" value="https://banksimulator.pwa/callback.php">
  </form>
</body>
</html>
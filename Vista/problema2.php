<?php
require_once __DIR__ . '/../vendor/autoload.php';
use App\Controladores\Problema2Controller;
use App\Utilidades\Componentes;

$resultado = Problema2Controller::calcular(); //Llama a la función calcular del controlador para obtener el resultado de la suma del 1 al 1000.
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Problema 2</title>
</head>
<body>

<h1>Suma del 1 al 1000</h1>

<form method="POST">
    <button type="submit" name="calcular">Ver resultado</button>
</form>
<?= Componentes::btnLimpiar() ?>
<?= Componentes::scriptLimpiar() ?>

<?php if ($resultado !== null): ?>
    <h2>Resultado: <?= $resultado ?></h2>
<?php endif; ?>

<?php require_once __DIR__ . '/layout/footer.php'; ?>

</body>
</html>
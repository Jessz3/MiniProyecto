<?php
require_once __DIR__ . '/../vendor/autoload.php';
use App\Controladores\Problema2Controller;
use App\Utilidades\Componentes;

$resultado = Problema2Controller::calcular(); //Llama a la función calcular del controlador para obtener el resultado de la suma del 1 al 1000.

// Variables para el header reutilizable
$numeroProblem = 2;
$tituloPagina  = 'Suma del 1 al 1000';
 
require __DIR__ . '/layout/header.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Problema 2</title>
</head>
<body>

<p class="descripcion">Calcula la suma de todos los enteros del 1 al 1000.</p>

<!-- Mostrar el resultado si se ha calculado -->
<?php if ($resultado !== null): ?>
    <h2 class="resultado">Resultado: <?= $resultado ?></h2>
<?php endif; ?>

<form method="POST">
    <button type="submit" name="calcular">Ver resultado</button>
    <?= Componentes::btnLimpiar() ?>
    <?= Componentes::scriptLimpiar() ?>
</form>

<?php require_once __DIR__ . '/layout/footer.php'; ?>

</body>
</html>
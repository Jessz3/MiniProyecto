<?php 
require_once __DIR__ . '/../vendor/autoload.php';
use App\Controladores\Problema4Controller;
use App\Utilidades\Componentes;

$resultado = Problema4Controller::procesar($_POST);

// Variables para el header reutilizable
$numeroProblem = 4;
$tituloPagina  = 'Suma de Pares e Impares';
 
require __DIR__ . '/layout/header.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Problema 4</title>
    <link rel="stylesheet" href="../CSS/estilos.css">
</head>
<body>

<p class="descripcion">Suma independiente de los enteros pares e impares del 1 al 200.</p>

<?php if ($resultado !== null): ?>
    <h2>Suma de pares: <?= $resultado['par'] ?></h2>
    <h2>Suma de impares: <?= $resultado['impar'] ?></h2>
<?php endif; ?>

<form method="POST">
    <div class="botones">
        <button type="submit" name="calcular">Calcular</button>
        <?= Componentes::btnLimpiar() ?>
        <?= Componentes::scriptLimpiar() ?>
    </div>
</form>

</form>

<?php require_once __DIR__ . '/layout/footer.php'; ?>

</body>
</html>
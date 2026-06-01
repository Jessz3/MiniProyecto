<?php 
require_once __DIR__ . '/../vendor/autoload.php';
use App\Controladores\Problema3Controller;
use App\Utilidades\Componentes;
use App\Utilidades\Sanitizacion;

$resultado = Problema3Controller::procesar($_POST);

// Variables para el header reutilizable
$numeroProblem = 3;
$tituloPagina  = 'N- Múltiplos de 4';
 
require __DIR__ . '/layout/header.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Problema 3</title>
    <link rel="stylesheet" href="../CSS/estilos.css">
</head>
<body>

<p class="descripcion">Ingrese la cantidad de múltiplos de 4 a mostrar.</p>

<form method="POST">
    <div class="campo">
        <label for="cantidad">Ingrese la cantidad de múltiplos de 4 a mostrar:</label>
        <input type="text" id="cantidad" name="cantidad"
               value="<?= Sanitizacion::escaparHTML($_POST['cantidad'] ?? '') ?>">

        <?php if (!empty($resultado['errores'])): ?>
            <p class="error"><?= $resultado['errores'][0] ?></p>
        <?php endif; ?>
    </div>

    <div class="botones">
        <button type="submit" name="calcular">Ver múltiplos</button>
        <?= Componentes::btnLimpiar() ?>
        <?= Componentes::scriptLimpiar() ?>
    </div>
</form>

<?php if (!empty($resultado['multiplos'])): ?>
    <div class="resultado">
        <?php foreach ($resultado['multiplos'] as $i => $multiplo): ?>
            <p><?= $multiplo ?></p>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<?php require_once __DIR__ . '/layout/footer.php'; ?>

</body>
</html>
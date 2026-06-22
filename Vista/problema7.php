<?php 
require_once __DIR__ . '/../vendor/autoload.php';
use App\Controladores\Problema7Controller;
use App\Utilidades\Componentes;
use App\Utilidades\Sanitizacion;

$resultado = Problema7Controller::procesar($_POST);

// Variables para el header reutilizable
$numeroProblem = 7;
$tituloPagina  = 'Calculadora de Datos Estadísticos';
 
require __DIR__ . '/layout/header.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Problema 7</title>
    <link rel="stylesheet" href="../CSS/estilos.css">
</head>
<body>

<p class="descripcion">Calcule promedio, desviación y rango de N notas.</p>

<form method="POST">

    <div class="campo">
        <label>Cantidad de notas:</label>
        <input
            type="number"
            name="cantidad"
            min="1"
            max="30"
            value="<?= $_POST['cantidad'] ?? '' ?>"
            required
        >
    </div>

    <div class="botones">
        <button type="submit" name="generar">Generar campos</button>
        <?= Componentes::btnLimpiar() ?>
        <?= Componentes::scriptLimpiar() ?>
    </div>

    <br><br>

    <!-- Mostrar campos para ingresar las notas si se ha enviado la cantidad -->
    <?php
    $cantidad = 0;
    if (isset($_POST['cantidad']) && $_POST['cantidad'] > 0) {
        $cantidad = (int)$_POST['cantidad'];
    }
    ?>

    <?php if ($cantidad > 0): ?>
        <?php for ($i = 0; $i < $cantidad; $i++): ?>
            <div class="campo">
                <label>Nota <?= $i + 1 ?>:</label>
                <input
                    type="number"
                    name="notas[]"
                    step="0.01"
                    value="<?= Sanitizacion::escaparHTML($_POST['notas'][$i] ?? '') ?>"
                    required
                >
                <?php if (isset($resultado['errores'][$i])): ?>
                    <p class="error"><?= $resultado['errores'][$i] ?></p>
                <?php endif; ?>
            </div>
        <?php endfor; ?>

        <button type="submit" name="calcular">Calcular</button>
    <?php endif; ?>

</form>

<!-- Mostrar resultados si se han calculado -->
<?php if ($resultado && isset($resultado['promedio'])): ?>
    <div class="resultado">
        <h2>Promedio: <?= round($resultado['promedio'], 2) ?></h2>
        <h2>Desviación estándar: <?= round($resultado['desviacion'], 2) ?></h2>
        <h2>Nota mínima: <?= $resultado['minimo'] ?></h2>
        <h2>Nota máxima: <?= $resultado['maximo'] ?></h2>
    </div>
<?php endif; ?>

<?php require_once __DIR__ . '/layout/footer.php'; ?>

</body>
</html>
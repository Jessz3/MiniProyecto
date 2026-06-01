<?php 
require_once __DIR__ . '/../vendor/autoload.php';
use App\Controladores\Problema7Controller;
use App\Utilidades\Componentes;

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

    <label>Cantidad de notas:</label>
    <input
        type="number"
        name="cantidad"
        min="1"
        value="<?= $_POST['cantidad'] ?? '' ?>"
        required
    >

    <div class="botones">
        <button type="submit" name="generar">Generar campos</button>
        <?= Componentes::btnLimpiar() ?>
        <?= Componentes::scriptLimpiar() ?>
    </div>

    <br><br>

    <?php
    if (isset($_POST['generar']) && !empty($_POST['cantidad'])) {

        $cantidad = (int)$_POST['cantidad'];

        for ($i = 0; $i < $cantidad; $i++) {
            echo "<label>Nota " . ($i + 1) . ":</label>";
            echo "<input type='number' name='notas[]' step='0.01' required><br><br>";
        }

        echo "<button type='submit' name='calcular'>Calcular</button>";
    }
    ?>
</form>

<?php if ($resultado && isset($resultado['promedio'])): ?>

    <h2>Promedio: <?= round($resultado['promedio'], 2) ?></h2>
    <h2>Desviación estándar: <?= round($resultado['desviacion'], 2) ?></h2>
    <h2>Nota mínima: <?= $resultado['minimo'] ?></h2>
    <h2>Nota máxima: <?= $resultado['maximo'] ?></h2>

<?php endif; ?>

<?php if ($resultado && !empty($resultado['errores'])): ?>

    <?php foreach ($resultado['errores'] as $error): ?>
        <p><?= $error ?></p>
    <?php endforeach; ?>

<?php endif; ?>

<?php require_once __DIR__ . '/layout/footer.php'; ?>

</body>
</html>
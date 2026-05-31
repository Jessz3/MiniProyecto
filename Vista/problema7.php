<?php 
require_once __DIR__ . '/../vendor/autoload.php';
use App\Controladores\Problema7Controller;
use App\Utilidades\Componentes;
use App\Utilidades\Sanitizacion;

$resultado = Problema7Controller::calcular();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Problema 7</title>
    <link rel="stylesheet" href="../CSS/estilos.css">
</head>
<body>

<h1>Problema 7</h1>

<form method="POST">

    <label>Cantidad de notas:</label>
    <input
        type="number"
        name="cantidad"
        min="1"
        value="<?= $_POST['cantidad'] ?? '' ?>"
        required
    >

    <button type="submit" name="generar">
        Generar campos
    </button>

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

    <div class="botones">
        <?= Componentes::btnLimpiar() ?>
        <?= Componentes::scriptLimpiar() ?>
    </div>

</form>

<?php if ($resultado && isset($resultado['promedio'])): ?>

    <h2>Promedio: <?= $resultado['promedio'] ?></h2>
    <h2>Desviación estándar: <?= $resultado['desviacion'] ?></h2>
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
<?php
require_once __DIR__ . '/../vendor/autoload.php';
use App\Controladores\Problema8Controller;
use App\Utilidades\Sanitizacion;

$resultado = Problema8Controller::procesar($_POST);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Problema 8</title>

    <link rel="stylesheet" href="../CSS/estilos.css">
</head>
<body>

<h1>Estación del Año</h1>
<p>Ingrese una fecha para ver la estación.</p>

<form method="POST">

    <div class="campo">
        <!--Campo de entrada para la fecha, con sanitización para evitar XSS-->
        <input type="date" name="fecha" required value="<?= Sanitizacion::escaparHTML($_POST['fecha'] ?? '') ?>">

        <!--Muestra el error correspondiente si la validación falla para este campo-->
        <?php if (!empty($resultado['errores'])): ?>
            <p class="error">
                <?= $resultado['errores'][0] ?>
            </p>
        <?php endif; ?>
    </div>

    <button type="submit">Mostrar estación</button>
</form>

<?php if ($resultado !== null && empty($resultado['errores'])): ?>
    <p>
        <strong>Fecha ingresada:</strong>
        <?= Sanitizacion::escaparHTML($resultado['fecha']) ?>
    </p>

    <p>
        <strong>La estación es:</strong>
        <?= $resultado['estacion'] ?>
    </p>

    <img src="../assets/img/<?= $resultado['imagen'] ?>" alt="<?= $resultado['estacion'] ?>">

<?php endif; ?>

<?php require_once __DIR__ . '/layout/footer.php'; ?>

</body>
</html>
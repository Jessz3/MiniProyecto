<?php
require_once __DIR__ . '/../vendor/autoload.php';
use App\Controladores\Problema8Controller;
use App\Utilidades\Sanitizacion;
use App\Utilidades\Componentes;

$resultado = Problema8Controller::procesar($_POST);

// Variables para el header reutilizable
$numeroProblem = 8;
$tituloPagina  = 'Estación del Año';
 
require __DIR__ . '/layout/header.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Problema 8</title>

    <link rel="stylesheet" href="../CSS/estilos.css">
</head>
<body>

<p class="descripcion">Ingrese una fecha para ver la estación.</p>
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
    <?= Componentes::btnLimpiar() ?>
    <?= Componentes::scriptLimpiar() ?>
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

    <!--Imagen de la estación. Si no hay imagen, no se muestra nada -->
    <?php if (!empty($resultado['imagen'])): ?>
        <img src="../assets/img/<?= $resultado['imagen'] ?>" alt="<?= $resultado['estacion'] ?>">
    <?php endif; ?>

<?php endif; ?>

<?php require_once __DIR__ . '/layout/footer.php'; ?>
</body>
</html>
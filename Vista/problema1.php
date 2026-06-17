<?php 
require_once __DIR__ . '/../vendor/autoload.php';
use App\Controladores\Problema1Controller;
use App\Utilidades\Componentes;
use App\Utilidades\Sanitizacion;

$resultado = Problema1Controller::procesar($_POST);

// Variables para el header reutilizable
$numeroProblem = 1;
$tituloPagina  = 'Cálculo de Media, Desviación Estándar, Mínimo y Máximo';
 
require __DIR__ . '/layout/header.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Problema 1</title>
    <link rel="stylesheet" href="../CSS/estilos.css">
</head>
<body>

<p class="descripcion">Insertar 5 números para calcular sus estadísticas descriptivas.</p>

<!-- Formulario para ingresar los números -->
<form method="POST">
    <?php for ($i = 0; $i < 5; $i++): ?>
    <div class="campo">
        <input type="number" name="numeros[]" placeholder="Número <?= $i + 1 ?>" step="any"
               value="<?= Sanitizacion::escaparHTML($_POST['numeros'][$i] ?? '') ?>">

               <!-- Mostrar error específico para cada campo si existe -->
        <?php if (isset($resultado['errores'][$i])): ?>
            <p class="error"><?= $resultado['errores'][$i] ?></p>
        <?php endif; ?>
    </div>
    <?php endfor; ?>

    <div class="botones">
        <button type="submit" name="calcular">Calcular</button>
        <?= Componentes::btnLimpiar() ?>
        <?= Componentes::scriptLimpiar() ?>
    </div>
</form>

<!-- Mostrar errores generales si existen -->
<?php if (!empty($resultado['errores'])): ?>
    <?php foreach ($resultado['errores'] as $error): ?>
        <p class="error"><?= $error ?></p>
    <?php endforeach; ?>
<?php endif; ?>

<!-- Mostrar resultados si el cálculo fue exitoso -->
<?php if (isset($resultado['media'])): ?>
    <div class="resultado">
        <p><strong>Media:</strong> <?= round($resultado['media'], 2) ?></p>
        <p><strong>Desviación estándar:</strong> <?= round($resultado['desviacion'], 2) ?></p>
        <p><strong>Mínimo:</strong> <?= $resultado['minimo'] ?></p>
        <p><strong>Máximo:</strong> <?= $resultado['maximo'] ?></p>
    </div>
<?php endif; ?>

<?php require_once __DIR__ . '/layout/footer.php'; ?>

</body>
</html>
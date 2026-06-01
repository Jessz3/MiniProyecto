<?php 
require_once __DIR__ . '/../vendor/autoload.php';
use App\Controladores\Problema1Controller;
use App\Utilidades\Componentes;

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

<form method="POST">
    <input type="number" name="n1" placeholder="Número 1" step="any"
       value="<?= $_POST['n1'] ?? '' ?>">
    <input type="number" name="n2" placeholder="Número 2" step="any"
       value="<?= $_POST['n2'] ?? '' ?>">
    <input type="number" name="n3" placeholder="Número 3" step="any"
       value="<?= $_POST['n3'] ?? '' ?>">
    <input type="number" name="n4" placeholder="Número 4" step="any"
       value="<?= $_POST['n4'] ?? '' ?>">
    <input type="number" name="n5" placeholder="Número 5" step="any"
       value="<?= $_POST['n5'] ?? '' ?>">

    <div class="botones">
        <button type="submit" name="calcular">Calcular</button>
        <?= Componentes::btnLimpiar() ?>
        <?= Componentes::scriptLimpiar() ?>
    </div>
</form>

<?php if (!empty($resultado['errores'])): ?>
    <?php foreach ($resultado['errores'] as $error): ?>
        <p class="error"><?= $error ?></p>
    <?php endforeach; ?>
<?php endif; ?>

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
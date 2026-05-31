<?php 
require_once __DIR__ . '/../vendor/autoload.php';
use App\Controladores\Problema1Controller;
use App\Utilidades\Componentes;

$resultado = Problema1Controller::procesar($_POST);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Problema 1</title>
    <link rel="stylesheet" href="../CSS/estilos.css">
</head>
<body>

<h1>Cálculo de Media, Desviación Estándar, Mínimo y Máximo</h1>

<form method="POST">

    <input type="text" name="n1" placeholder="Número 1" required>
    <input type="text" name="n2" placeholder="Número 2" required>
    <input type="text" name="n3" placeholder="Número 3" required>
    <input type="text" name="n4" placeholder="Número 4" required>
    <input type="text" name="n5" placeholder="Número 5" required>

    <div class="botones">
        <button type="submit" name="calcular">Calcular</button>
        <?= Componentes::btnLimpiar() ?>
        <?= Componentes::scriptLimpiar() ?>
    </div>
</form>

<?php if ($resultado): ?>

    <h2>Media: <?= round($resultado['media'], 2) ?></h2>
    <h2>Desviación estándar: <?= round($resultado['desviacion'], 2) ?></h2>
    <h2>Mínimo: <?= $resultado['minimo'] ?></h2>
    <h2>Máximo: <?= $resultado['maximo'] ?></h2>

<?php endif; ?>

<?php require_once __DIR__ . '/layout/footer.php'; ?>

</body>
</html>
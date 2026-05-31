<?php 
require_once __DIR__ . '/../vendor/autoload.php';
use App\Controladores\Problema1Controller;
use App\Utilidades\Componentes;
use App\Utilidades\Sanitizacion;

$resultado = Problema1Controller::calcular();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Problema 1</title>
    <link rel="stylesheet" href="../CSS/estilos.css">
</head>
<body>

<h1>Problema 1</h1>

<form method="POST">

    <input type="number" name="n1" placeholder="Número 1" required>
    <input type="number" name="n2" placeholder="Número 2" required>
    <input type="number" name="n3" placeholder="Número 3" required>
    <input type="number" name="n4" placeholder="Número 4" required>
    <input type="number" name="n5" placeholder="Número 5" required>

    <button type="submit" name="calcular">Calcular</button>

    <div class="botones">
        <?= Componentes::btnLimpiar() ?>
        <?= Componentes::scriptLimpiar() ?>
    </div>

</form>

<?php if ($resultado): ?>

    <h2>Media: <?= $resultado['media'] ?></h2>
    <h2>Desviación estándar: <?= $resultado['desviacion'] ?></h2>
    <h2>Mínimo: <?= $resultado['minimo'] ?></h2>
    <h2>Máximo: <?= $resultado['maximo'] ?></h2>

<?php endif; ?>

<?php require_once __DIR__ . '/layout/footer.php'; ?>

</body>
</html>
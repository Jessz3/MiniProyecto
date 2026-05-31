<?php 
require_once __DIR__ . '/../vendor/autoload.php';
use App\Controladores\Problema9Controller;
use App\Utilidades\Componentes;
use App\Utilidades\Sanitizacion;

$resultado = Problema9Controller::calcular();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Problema 9</title>
    <link rel="stylesheet" href="../CSS/estilos.css">
</head>
<body>

<h1>Problema 9</h1>

<form method="POST">

    <input
        type="number"
        name="numero"
        placeholder="Ingrese un número"
        required
    >

    <button type="submit" name="calcular">
        Generar
    </button>

    <div class="botones">
        <?= Componentes::btnLimpiar() ?>
        <?= Componentes::scriptLimpiar() ?>
    </div>

</form>

<?php if ($resultado): ?>

    <h2>Potencias</h2>

    <ul>
        <?php foreach ($resultado as $indice => $valor): ?>
            <li>
                <?= $_POST['numero'] ?>
                <sup><?= $indice + 1 ?></sup>
                =
                <?= $valor ?>
            </li>
        <?php endforeach; ?>
    </ul>

<?php endif; ?>

<?php require_once __DIR__ . '/layout/footer.php'; ?>

</body>
</html>
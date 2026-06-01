<?php 
require_once __DIR__ . '/../vendor/autoload.php';
use App\Controladores\Problema9Controller;
use App\Utilidades\Componentes;
use App\Utilidades\Sanitizacion;

$resultado = Problema9Controller::procesar($_POST);

// Variables para el header reutilizable
$numeroProblem = 9;
$tituloPagina  = '15 primeras Potencias de un Número';
 
require __DIR__ . '/layout/header.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Problema 9</title>
    <link rel="stylesheet" href="../CSS/estilos.css">
</head>
<body>

<p class="descripcion">Ingrese un número para generar sus 15 primeras potencias.</p>

<form method="POST">
    <div class="campo">
        <input
            type="number"
            name="numero"
            placeholder="Ingrese un número"
            value="<?= Sanitizacion::escaparHTML($_POST['numero'] ?? '') ?>"
            required
        >

        <?php if (!empty($resultado['errores'])): ?>
            <p class="error"><?= $resultado['errores'][0] ?></p>
        <?php endif; ?>
    </div>

    <div class="botones">
        <button type="submit" name="calcular">Generar</button>
        <?= Componentes::btnLimpiar() ?>
        <?= Componentes::scriptLimpiar() ?>
    </div>
</form>

<?php if (!empty($resultado['potencias'])): ?>
    <div class="resultado">
        <h2>Potencias</h2>
        <ul>
            <?php foreach ($resultado['potencias'] as $indice => $valor): ?>
                <li>
                    <?= Sanitizacion::escaparHTML((string)$resultado['numero']) ?>
                    <sup><?= $indice + 1 ?></sup>
                    = <?= $valor ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<?php require_once __DIR__ . '/layout/footer.php'; ?>

</body>
</html>
<?php 
require_once __DIR__ . '/../vendor/autoload.php';
use App\Controladores\Problema4Controller;
use App\Utilidades\Componentes;

$resultado = Problema4Controller::procesar($_POST);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Problema 4</title>
    <link rel="stylesheet" href="../CSS/estilos.css">
</head>
<body>

<h1>Suma independiente de los pares e impares de 1-200</h1>

<?php if ($resultado !== null): ?>
    <p>Suma de pares: <?= $resultado['par'] ?></p>
    <p>Suma de impares: <?= $resultado['impar'] ?></p>
<?php endif; ?>

<form method="POST">
    <div class="botones">
        <button type="submit" name="calcular">Calcular</button>
        <?= Componentes::btnLimpiar() ?>
        <?= Componentes::scriptLimpiar() ?>
    </div>
</form>

</form>

<?php require_once __DIR__ . '/layout/footer.php'; ?>

</body>
</html>
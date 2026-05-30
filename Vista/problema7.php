<?php 
require_once __DIR__ . '/../vendor/autoload.php';
use App\Controladores\Problema7Controller;
use App\Utilidades\Componentes;
use App\Utilidades\Sanitizacion;


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

    <div class="botones">
        
        <?= Componentes::btnLimpiar() ?>
        <?= Componentes::scriptLimpiar() ?>
    </div>
</form>

<?php require_once __DIR__ . '/layout/footer.php'; ?>

</body>
</html>
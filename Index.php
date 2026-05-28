<?php 
require_once __DIR__ . '/vendor/autoload.php';
use App\Utilidades\Navegacion;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mini Proyecto</title>
</head>
<body>

    <h1>Problemas</h1>
    <p><?= Navegacion::crearEnlace('Vista/problema1.php', 'Problema 1');?></p>
    <p><?= Navegacion::crearEnlace('Vista/problema2.php', 'Problema 2');?></p>
    <p><?= Navegacion::crearEnlace('Vista/problema3.php', 'Problema 3');?></p>
    <p><?= Navegacion::crearEnlace('Vista/problema4.php', 'Problema 4');?></p>
    <p><?= Navegacion::crearEnlace('Vista/problema5.php', 'Problema 5');?></p>
    <p><?= Navegacion::crearEnlace('Vista/problema6.php', 'Problema 6');?></p>
    <p><?= Navegacion::crearEnlace('Vista/problema7.php', 'Problema 7');?></p>
    <p><?= Navegacion::crearEnlace('Vista/problema8.php', 'Problema 8');?></p>
    <p><?= Navegacion::crearEnlace('Vista/problema9.php', 'Problema 9');?></p>

</body>
</html>
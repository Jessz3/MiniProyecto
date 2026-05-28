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
    <p><?= Navegacion::crearEnlace('Vista/problema2.php', 'Problema 2');?></p>

</body>
</html>
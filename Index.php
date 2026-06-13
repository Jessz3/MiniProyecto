<?php 
require_once __DIR__ . '/vendor/autoload.php';
use App\Utilidades\Navegacion;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Proyecto</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="CSS/estilos.css">
</head>
<body>

<header class="site-header">
    <h1 class="header-titulo">Mini Proyecto</h1>
    <p class="header-descripcion">Seleccione un problema para comenzar.</p>
</header>

<nav class="menu-problemas">

    <div class="menu-card">
        <div class="menu-card-titulo"><?= Navegacion::crearEnlace('Vista/problema1.php', 'Problema 1 - Media, Desviación Estándar, Mínimo y Máximo');?></div>
        <div class="menu-card-desc">Estadísticas descriptivas de 5 números.</div>
    </div>

    <div class="menu-card">
        <div class="menu-card-titulo"><?= Navegacion::crearEnlace('Vista/problema2.php', 'Problema 2 - Suma del 1 al 1000');?></div>
        <div class="menu-card-desc">Calcula la suma de todos los enteros entre 1 y 1000.</div>
    </div>

    <div class="menu-card">
        <div class="menu-card-titulo"><?= Navegacion::crearEnlace('Vista/problema3.php', 'Problema 3 - N-Primeros Múltiplos de 4');?></div>
        <div class="menu-card-desc">Genera los primeros N múltiplos de 4.</div>
    </div>

    <div class="menu-card">
        <div class="menu-card-titulo"><?= Navegacion::crearEnlace('Vista/problema4.php', 'Problema 4 - Suma de Pares e Impares (1–200)');?></div>
        <div class="menu-card-desc">Suma independiente de pares e impares del 1 al 200.</div>
    </div>

    <div class="menu-card">
        <div class="menu-card-titulo"><?= Navegacion::crearEnlace('Vista/problema5.php', 'Problema 5 - Clasificación de Edades');?></div>
        <div class="menu-card-desc">Clasifica 5 edades en niño, adolescente, adulto o adulto mayor.</div>
    </div>

    <div class="menu-card">
        <div class="menu-card-titulo"><?= Navegacion::crearEnlace('Vista/problema6.php', 'Problema 6 - Hospital Hou Luo Zheng');?></div>
        <div class="menu-card-desc">Distribuye el presupuesto anual entre departamentos.</div>
    </div>

    <div class="menu-card">
        <div class="menu-card-titulo"><?= Navegacion::crearEnlace('Vista/problema7.php', 'Problema 7 - Calculadora de Datos Estadísticos');?></div>
        <div class="menu-card-desc">Promedio, desviación y rango de N notas.</div>
    </div>

    <div class="menu-card">
        <div class="menu-card-titulo"><?= Navegacion::crearEnlace('Vista/problema8.php', 'Problema 8 - Estación del Año');?></div>
        <div class="menu-card-desc">Determina la estación según la fecha ingresada.</div>
    </div>

    <div class="menu-card">
        <div class="menu-card-titulo"><?= Navegacion::crearEnlace('Vista/problema9.php', 'Problema 9 - 15 Primeras Potencias');?></div>
        <div class="menu-card-desc">Genera las 15 primeras potencias de cualquier número.</div>
    </div>

</nav>

<footer class="site-footer">
    <p>Universidad Tecnológica de Panamá</p>
    <p>Licenciatura en Desarrollo & Gestión de Software - Desarrollo de Software VII</p>
    <p>Erick Hou &nbsp;·&nbsp; Genesis Luo &nbsp;·&nbsp; Jessica Zheng</p>
    <p>Fecha de ejecución: <?= date("d/m/Y") ?></p>
    <p>&copy; 2026 Todos los derechos reservados.</p>
</footer>

</body>
</html>

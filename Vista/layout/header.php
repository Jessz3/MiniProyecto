<?php
$tituloPagina  = $tituloPagina  ?? 'Mini Proyecto';
$descripcion   = $descripcion   ?? '';
$numeroProblem = $numeroProblem ?? '';
$cssExtra      = $cssExtra      ?? '';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($tituloPagina) ?> — Mini Proyecto</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/estilos.css">
    <?php if ($cssExtra): ?>
        <link rel="stylesheet" href="<?= htmlspecialchars($cssExtra) ?>">
    <?php endif; ?>
</head>
<body>

<header class="site-header">
    <?php if ($numeroProblem): ?>
        <span class="header-badge">Problema <?= htmlspecialchars((string)$numeroProblem) ?></span>
    <?php endif; ?>
    <h1 class="header-titulo"><?= htmlspecialchars($tituloPagina) ?></h1>
</header>

<main class="contenido">

<?php require_once '../Controladores/Problema2Controller.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Problema 2</title>
</head>
<body>

    <h1>Suma del 1 al 1000</h1>

    <form method="POST">
        <button type="submit" name="calcular">Ver resultado de la suma</button>
    </form>

    <!--Solo muestra el resultado cuando el usuario presiona el botón-->
    <?php if ($resultado !== null): ?>
        <h2>Resultado: <?= $resultado; ?></h2>
    <?php endif; ?>

    <?php require_once 'layout/footer.php'; ?>

</body>
</html>
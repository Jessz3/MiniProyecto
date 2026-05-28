<?php
require_once __DIR__ . '/../vendor/autoload.php';
use App\Controladores\Problema5Controller;
use App\Utilidades\Sanitizacion;

$resultado = Problema5Controller::procesar($_POST); //Procesa el formulario y obtiene el resultado para mostrarlo en la vista
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Problema 5</title>

    <style>

.contenedor-grafico {
    width: 800px;
    height: 400px;
    margin: 30px auto;
}

.campo {
    width: 300px;
    display: flex;
    flex-direction: column;
    margin-bottom: 15px;
}

.error {
    color: red;
    margin-top: 5px;
    margin-bottom: 0;
}

</style>
</head>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<body>

<h1>Clasificación de Edades</h1>
<p>Ingrese 5 edades para clasificarlas:</p>

<form method="POST">

    <?php for ($i = 0; $i < 5; $i++): ?>

    <div class="campo">

        <input 
            type="number"
            name="edades[]"
            placeholder="Edad <?= $i + 1 ?>"
            min="0"
            required
            value="<?= Sanitizacion::escaparHTML($_POST['edades'][$i] ?? '') ?>"
        >

        <?php if (isset($resultado['errores'][$i])): ?>

            <p class="error">
                <?= $resultado['errores'][$i] ?>
            </p>

        <?php endif; ?>

    </div>

<?php endfor; ?>

    <button type="submit">Clasificar</button>
</form>

<?php if ($resultado !== null && empty($resultado['errores'])): ?>

    <h2>Resultados:</h2>

    <div class="contenedor-grafico">
        <canvas id="graficoEdades"></canvas>
    </div>

    <script>

    const categorias = [
    'Niño (0-12)',
    'Adolescente (13-17)',
    'Adulto (18-64)',
    'Adulto mayor (65+)'
];
    const cantidades = <?= json_encode(array_values($resultado['estadisticas'])) ?>;

    const ctx = document.getElementById('graficoEdades');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: categorias,
            datasets: [{
                label: 'Cantidad de personas',
                data: cantidades,
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            scales: {
                y: {
                    beginAtZero: true,
                    min: 0,
                    max: 5,
                    ticks: {
                        stepSize: 1
                    }
                }
            }
        }
    });

    </script>

<?php endif; ?>

<?php require_once __DIR__ . '/layout/footer.php'; ?>

</body>
</html>
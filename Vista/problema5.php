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
    <link rel="stylesheet" href="../CSS/estilos.css"> 
</head>

<!--Incluye la biblioteca Chart.js para gráficos-->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script> 

<body>

<h1>Clasificación de Edades</h1>
<p>Ingrese 5 edades para clasificarlas:</p>

<!--Formulario para ingresar las edades, con validación y sanitización-->
<form method="POST">

    <!--Genera 5 campos de entrada para las edades-->
    <?php for ($i = 0; $i < 5; $i++): ?>

    <div class="campo">

        
        <!--Campo de entrada para la edad, con sanitización para evitar XSS-->
        <input type="number" name="edades[]" placeholder="Edad <?= $i + 1 ?>" min="0" required 
        value="<?= Sanitizacion::escaparHTML($_POST['edades'][$i] ?? '') ?>"> 

        <!--Muestra el error correspondiente si la validación falla para este campo-->
        <?php if (isset($resultado['errores'][$i])): ?>
            <p class="error">
                <?= $resultado['errores'][$i] ?>
            </p>
        <?php endif; ?>

    </div>

    <?php endfor; ?>
    
    <button type="submit">Clasificar</button>
</form>

<!--Muestra los resultados de la clasificación si no hay errores-->
<?php if ($resultado !== null && empty($resultado['errores'])): ?>

    <!--Muestra las edades que se repitieron y cuántas veces se repitieron-->
    <?php foreach ($resultado['repeticiones'] as $edad => $cantidad): ?>
        <?php if ($cantidad > 1): ?>
            <h2>Repetición de edades</h2>
            <p>La edad <?= $edad ?> se repitió <?= $cantidad ?> veces</p>
        <?php endif; ?>
    <?php endforeach; ?>
    
    <!--Crea un gráfico de barras para mostrar la cantidad de personas en cada categoría de edad utilizando Chart.js-->
    <div class="contenedor-grafico">
        <canvas id="graficoEdades"></canvas>
    </div>
    
    <script>
    
    //Define las categorías de edad 
    const categorias = [
    'Niño (0-12)',
    'Adolescente (13-17)',
    'Adulto (18-64)',
    'Adulto mayor (65+)'
    ];

    //Obtiene las cantidades de personas en cada categoría desde el resultado del controlador y las convierte a formato JSON para usarlas en JavaScript
    const cantidades = <?= json_encode(array_values($resultado['estadisticas'])) ?>;

    //Configura y crea el gráfico de barras utilizando Chart.js
    const ctx = document.getElementById('graficoEdades');

    //Crea el gráfico de barras
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
            plugins: {
                title: {
                    display: true,
                    text: 'Clasificación de edades'
                }
            },
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
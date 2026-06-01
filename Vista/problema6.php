<?php 
require_once __DIR__ . '/../vendor/autoload.php';
use App\Controladores\Problema6Controller;
use App\Utilidades\Componentes;
use App\Utilidades\Sanitizacion;

$resultado = Problema6Controller::procesar($_POST);

// Variables para el header reutilizable
$numeroProblem = 6;
$tituloPagina  = 'Hospital Hou Luo Zheng - Reparto Presupuestario';
 
require __DIR__ . '/layout/header.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Problema 6</title>
    <link rel="stylesheet" href="../CSS/estilos.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.min.js"></script>
</head>
<body>

<p class="descripcion">Ingrese el presupuesto anual para calcular su distribución por departamento.</p>

<form method="POST">
    <div class="campo">
        <label for="presupuesto">Presupuesto anual ($):</label>
        <input type="number" id="presupuesto" name="presupuesto" min="1" step="0.01"
               value="<?= Sanitizacion::escaparHTML($_POST['presupuesto'] ?? '') ?>">

        <?php if (!empty($resultado['errores'])): ?>
            <p class="error"><?= $resultado['errores'][0] ?></p>
        <?php endif; ?>
    </div>

    <div class="botones">
        <button type="submit" name="calcular">Calcular</button>
        <?= Componentes::btnLimpiar() ?>
        <?= Componentes::scriptLimpiar() ?>
    </div>
</form>

<?php if (!empty($resultado['reparto'])): ?>
    <div class="resultado">

        <!-- Tabla de valores -->
        <table>
            <thead>
                <tr>
                    <th>Departamento</th>
                    <th>Porcentaje</th>
                    <th>Monto asignado</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($resultado['reparto'] as $depto => $monto): ?>
                <tr>
                    <td><?= $depto ?></td>
                    <td><?= match($depto) {
                        'Ginecología'   => '40%',
                        'Traumatología' => '35%',
                        'Pediatría'     => '25%',
                    } ?></td>
                    <td>$<?= number_format($monto, 2) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Gráfica -->
        <canvas id="graficaPresupuesto" width="400" height="400"></canvas>

        <script>
        const ctx = document.getElementById('graficaPresupuesto').getContext('2d');
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: <?= json_encode(array_keys($resultado['reparto'])) ?>,
                datasets: [{
                    data: <?= json_encode(array_values($resultado['reparto'])) ?>,
                    backgroundColor: ['#3498db', '#e74c3c', '#2ecc71'],
                }]
            },
            options: {
                plugins: {
                    legend: { position: 'bottom' },
                    tooltip: {
                        callbacks: {
                            label: ctx => '$' + ctx.parsed.toLocaleString('es-PA', {minimumFractionDigits: 2})
                        }
                    }
                }
            }
        });
        </script>

    </div>
<?php endif; ?>

<?php require_once __DIR__ . '/layout/footer.php'; ?>

</body>
</html>
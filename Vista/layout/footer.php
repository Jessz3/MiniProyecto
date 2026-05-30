<!--Footer reutilizable-->

<?php 
use App\Utilidades\Navegacion; 
?>

<footer>
    <p>Por Erick Hou, Génesis Luo y Jessica Zheng</p>
    <p>Fecha de Ejecución: <?php echo date("d-m-Y");?></p>
    <p><?= Navegacion::crearEnlace('../index.php', 'Volver al menú principal');?></p>
</footer>
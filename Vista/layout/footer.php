<!--Footer general-->

<?php require_once '../Utilidades/Navegacion.php'; ?>

<footer>
    <p>Por Erick Hou, Génesis Luo y Jessica Zheng</p>
    <p><?php echo date("d-m-Y");?></p>
    <p><?= Navegacion::crearEnlace('../../index.php', 'Volver al menú principal');?></p>
</footer>
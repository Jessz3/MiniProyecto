<?php 
use App\Utilidades\Navegacion; 
?>

</main><!-- /contenido -->

<footer class="site-footer">
    <p>Erick Hou &nbsp;·&nbsp; Génesis Luo &nbsp;·&nbsp; Jessica Zheng</p>
    <p class="footer-fecha">Fecha de ejecución: <?= date("d/m/Y") ?></p>
    <p class="footer-link"><?= Navegacion::crearEnlace('../index.php', 'Volver al menú principal');?></p>
</footer>

</body>
</html>

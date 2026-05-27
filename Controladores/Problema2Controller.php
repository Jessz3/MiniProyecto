<?php
require_once '../Modelo/Secuencias.php';

//Variable que almacenará el resultado. No muestra nada antes de que se presione el botón
$resultado = null;

//Verifica si se presionó el botón
if (isset($_POST['calcular'])) {

    $resultado = Secuencias::sumarUnoAMil();
}

?>
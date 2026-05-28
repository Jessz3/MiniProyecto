<?php
namespace App\Controladores;
use App\Modelo\Secuencias;

class Problema2Controller {

    public static function calcular() {

        //Verifica si se ha enviado el formulario. Si es así, llama a la función para sumar del 1 al 1000 y devuelve el resultado.
        if (isset($_POST['calcular'])) {
            return Secuencias::sumarUnoAMil();
        }

        return null;
    }
}

?>
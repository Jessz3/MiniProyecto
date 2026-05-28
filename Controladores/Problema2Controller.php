<?php
namespace App\Controladores;
use App\Modelo\Secuencias;

class Problema2Controller {

    public static function calcular() {

        if (isset($_POST['calcular'])) {
            return Secuencias::sumarUnoAMil();
        }

        return null;
    }
}

?>
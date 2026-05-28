<?php
namespace App\Utilidades;

class Navegacion {

    public static function crearEnlace($url, $texto) {
        return "<a href='$url'>$texto</a>";
    }
}

?>
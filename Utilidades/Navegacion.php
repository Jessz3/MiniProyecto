<?php
namespace App\Utilidades;

class Navegacion {

    //Función para crear enlaces de navegación
    public static function crearEnlace($url, $texto) {
        return "<a href='$url'>$texto</a>";
    }
}

?>
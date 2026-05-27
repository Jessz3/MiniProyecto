<?php

class Navegacion {

    //Enlace de navegación reutilizable
    public static function crearEnlace($url, $texto) {
        return "<a href='$url'>$texto</a>";
    }
}

?>
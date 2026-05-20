<?php

class Validaciones {
    public static function limpiarEtiquetas(string $dato): string {
        return $dato = strip_tags($dato);
    }

    public static function quitarEspacios(string $dato): string {
        return $dato = trim($dato);
    }

    public static function unificarEspacios(string $dato): string {
        return $dato = preg_replace('/\s+/', ' ', $dato);
    }

    public static function eliminarCaracteres(string $dato): string {
        return $dato = preg_replace('/[^\p{L} ]/u', '', $dato);
    }
    

}

?>
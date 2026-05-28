<?php

namespace App\Utilidades;

class Sanitizacion {
    //Elimina etiquetas HTML y scripts peligrosos
    public static function limpiarEtiquetas(string $dato): string {
        return strip_tags($dato);
    }

     //Elimina espacios al inicio y final del texto
    public static function quitarEspacios(string $dato): string {
        return trim($dato);
    }

    //Reemplaza múltiples espacios por uno solo
    public static function unificarEspacios(string $dato): string {
        return trim(preg_replace('/\s+/', ' ', $dato));
    }

    //Permite solo letras, números y espacios
    public static function limpiarAlfanumerico(string $dato): string {
        return preg_replace('/[^\p{L}\p{N} ]/u', '', $dato);
    }

    //Convierte caracteres especiales en entidades HTML para prevenir XSS
    public static function escaparHTML(string $dato): string {
        return htmlspecialchars(
            $dato,
            ENT_QUOTES,
            'UTF-8'
        );
    }
    
}

?>
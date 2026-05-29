<?php

namespace App\Utilidades;

class Validaciones {

    //Validar que el campo no puede estar vacío
    public static function validarVacio($dato) {
        return trim($dato) !== '';
    }
    //Validar que sea un número
    public static function validarNumero($dato) {
        return is_numeric($dato);
    }

    //Validar que el número sea positivo
    public static function validarPositivo($dato) {
        return is_numeric($dato) && $dato >= 0;
    }

    //Validar que la edad y el rango de notas estén entre 0 y 100
    public static function validarCeroACien($dato) {
        return is_numeric($dato) && $dato >= 0 && $dato <= 100;
    }

    //Validar que el dato sea un entero
    public static function validarEntero($dato) {
        return filter_var($dato, FILTER_VALIDATE_INT) !== false;
    }
    
}
?>
<?php

namespace App\Utilidades;

class Validaciones {

    //Validar que el campo no puede estar vacío
    public static function validarVacio($dato) {
        return trim($dato) !== '';
    }
    //Validar que sea un número evitando notación científica
    public static function validarNumero($dato): bool {
        return is_numeric($dato) && !preg_match('/[eE]/', (string)$dato);
    }

    //Validar que el número sea positivo
    public static function validarPositivo($dato): bool {
        return is_numeric($dato) && (float)$dato >= 0;
    }

    //Validar que la edad y el rango de notas estén entre 0 y 100
    public static function validarCeroACien($dato): bool {
        return is_numeric($dato) && (float)$dato >= 0 && (float)$dato <= 100;
    }

    //Validar que el dato sea un entero
    public static function validarEntero($dato): bool {
        return filter_var($dato, FILTER_VALIDATE_INT) !== false;
    }
    
}
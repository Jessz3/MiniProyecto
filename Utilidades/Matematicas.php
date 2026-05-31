<?php

namespace App\Utilidades;

class Matematicas {

    public static function potencia($base, $exponente) {
        return pow($base, $exponente);
    }

    public static function raizCuadrada($numero) {
        return sqrt($numero);
    }
}
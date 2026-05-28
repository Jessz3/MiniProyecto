<?php

namespace App\Modelo;

class Clasificaciones {

//Clasificar edades
public static function clasificarEdad(int $edad): string {
    if ($edad >= 0 && $edad <= 12) {
        return "Niño";
    }

    if ($edad <= 17) {
        return "Adolescente";
    }

    if ($edad <= 64) {
        return "Adulto";
    }

    return "Adulto mayor";
}

//Estación del año
}
?>
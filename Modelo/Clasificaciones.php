<?php
namespace App\Modelo;
use DateTime;

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
public static function obtenerEstacion(string $fechaIngresada): array {
    //Convierte la fecha ingresada en un objeto DateTime
    $fecha = new DateTime($fechaIngresada);

    //Obtiene únicamente el mes y el día de la fecha
    $mesDia = $fecha->format('m-d');

    //Verano: 21 diciembre - 20 marzo
    if ($mesDia >= '12-21' || $mesDia <= '03-20') {
        return [
            "estacion" => "Verano",
            "imagen" => "verano.jpg"
        ];
    }

    //Otoño: 21 marzo - 21 junio
    if ($mesDia >= '03-21' && $mesDia <= '06-21') {
        return [
            "estacion" => "Otoño",
            "imagen" => "otono.jpg"
        ];
    }
    
    //Invierno: 22 junio - 22 septiembre
    if ($mesDia >= '06-22' && $mesDia <= '09-22') {
        return [
            "estacion" => "Invierno",
            "imagen" => "invierno.png"
        ];
    }

    //Primavera: 23 septiembre - 20 diciembre
    if ($mesDia >= '09-23' && $mesDia <= '12-20') {
        return [
            "estacion" => "Primavera",
            "imagen" => "primavera.png"
        ];
    }

    //Si por alguna razón no se pudo determinar la estación, retorna un valor por defecto
    return [
    "estacion" => "No se pudo determinar la estación",
    "imagen" => ""
    ];
}}

?>
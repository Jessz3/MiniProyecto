<?php

namespace App\Controladores;

use App\Modelo\Clasificaciones;
use App\Utilidades\Validaciones;
use App\Utilidades\Sanitizacion;

class Problema5Controller {

    public static function procesar($post) {

        $resultados = [];
        $errores = [];

        $estadisticas = [
            "Niño" => 0,
            "Adolescente" => 0,
            "Adulto" => 0,
            "Adulto mayor" => 0
        ];

        //Verifica si el formulario fue enviado
        if (!isset($post['edades'])) {
            return null;
        }

        foreach ($post['edades'] as $index => $edad) {

            //Sanitización
            $edad = Sanitizacion::quitarEspacios($edad);
            $edad = Sanitizacion::limpiarEtiquetas($edad);

            //Validar campo vacío
            if (!Validaciones::validarVacio($edad)) {

                $errores[$index] = "La edad no puede estar vacía";
                continue;
            }

            //Validar rango permitido
            if (!Validaciones::validarCeroACien($edad)) {

                $errores[$index] = "La edad debe estar entre 0 y 100";
                continue;
            }

            //Clasificación
            $categoria = Clasificaciones::clasificarEdad((int)$edad);

            $resultados[] = "Edad #" . ($index + 1) . ": " . $categoria;

            //Contador de estadísticas
            $estadisticas[$categoria]++;
        }

        return [
            "resultados" => $resultados,
            "errores" => $errores,
            "estadisticas" => $estadisticas
        ];
    }
}
<?php
namespace App\Controladores;
use App\Modelo\Clasificaciones;
use App\Utilidades\Validaciones;
use App\Utilidades\Sanitizacion;

class Problema5Controller {

    public static function procesar($post) {
        
        //Inicializa los arreglos para resultados, errores, edades válidas y estadísticas de clasificación
        $resultados = [];
        $errores = [];
        $edadesValidas = [];
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

        //Itera sobre cada edad enviada en el formulario para procesarla
        foreach ($post['edades'] as $index => $edad) {

            //Sanitización
            $edad = Sanitizacion::quitarEspacios($edad);
            $edad = Sanitizacion::limpiarEtiquetas($edad);

            //Validar campo vacío
            if (!Validaciones::validarVacio($edad)) {
                $errores[$index] = "La edad no puede estar vacía";
                continue;
            }

            //Validar que el dato sea un número entero
            if (!Validaciones::validarEntero($edad)) {
                $errores[$index] = "La edad debe ser un número entero";
                continue;
            }

            //Validar rango permitido
            if (!Validaciones::validarCeroACien($edad)) {
                $errores[$index] = "La edad debe estar entre 0 y 100";
                continue;
            }

            //Clasificar la edad utilizando la función del modelo
            $categoria = Clasificaciones::clasificarEdad($edad);

            //Si la clasificación es válida, se agrega la edad a las edades válidas, se guarda el resultado de la clasificación y se actualiza el contador de estadísticas
            $edadesValidas[] = $edad;

            //Guarda el resultado de la clasificación para mostrarlo en la vista
            $resultados[] = "Edad #" . ($index + 1) . ": " . $categoria;

            //Actualiza el contador de estadísticas para la categoría correspondiente
            $estadisticas[$categoria]++;
        }

        //Cuenta cuántas veces se repite cada edad válida utilizando array_count_values y guarda el resultado en el arreglo de repeticiones
        $repeticiones = array_count_values($edadesValidas);

        //Devuelve un arreglo con los resultados de las clasificaciones, los errores de validación, las estadísticas de clasificación y las repeticiones de edades para que la vista pueda mostrar esta información al usuario
        return [
            "resultados" => $resultados,
            "errores" => $errores,
            "estadisticas" => $estadisticas,
            "repeticiones" => $repeticiones
        ];
    }
}
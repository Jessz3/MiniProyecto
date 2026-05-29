<?php
namespace App\Controladores;
use App\Modelo\Clasificaciones;
use App\Utilidades\Sanitizacion;
use App\Utilidades\Validaciones;
use DateTime;

class Problema8Controller {

    public static function procesar($post) {

        //Inicializa el arreglo para errores
        $errores = [];

        //Verifica si el formulario fue enviado
        if (!isset($post['fecha'])) {
            return null;
        }

        //Sanitización
        $fecha = Sanitizacion::quitarEspacios($post['fecha']);
        $fecha = Sanitizacion::limpiarEtiquetas($fecha);

        //Validar campo vacío
        if (!Validaciones::validarVacio($fecha)) {
            $errores[] = "Debe ingresar una fecha";
            return [
                "errores" => $errores
            ];
        }

        //Validar formato de fecha
        $fechaObjeto = DateTime::createFromFormat('Y-m-d', $fecha);

        //Verifica si la fecha es válida y coincide con el formato esperado
        if (!$fechaObjeto || $fechaObjeto->format('Y-m-d') !== $fecha) {
            $errores[] = "La fecha ingresada no es válida";
            return [
                "errores" => $errores
            ];
        }

        //Obtiene la estación del año utilizando la función del modelo
        $resultado = Clasificaciones::obtenerEstacion($fecha);

        return [
            "fecha" => $fecha,
            "estacion" => $resultado['estacion'],
            "imagen" => $resultado['imagen'],
            "errores" => []
        ];
    }
}
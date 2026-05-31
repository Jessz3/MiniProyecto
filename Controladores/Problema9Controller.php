<?php

namespace App\Controladores;

use App\Modelo\Secuencias;
use App\Utilidades\Validaciones;
use App\Utilidades\Sanitizacion;

class Problema9Controller {

    public static function procesar($post) {

        // Inicializa arreglo de errores
        $errores = [];

        // Verifica si el formulario fue enviado
        if (!isset($post['numero'])) {
            return null;
        }

        // Sanitización
        $numero = Sanitizacion::quitarEspacios($post['numero']);
        $numero = Sanitizacion::limpiarEtiquetas($numero);

        // Validar campo vacío
        if (!Validaciones::validarVacio($numero)) {
            $errores[] = "Debe ingresar un número";
        }

        // Validar que sea entero
        elseif (!Validaciones::validarEntero($numero)) {
            $errores[] = "Debe ingresar un número entero";
        }

        // Si existen errores, devolverlos
        if (!empty($errores)) {
            return [
                "errores" => $errores
            ];
        }

        // Generar las potencias utilizando el modelo
        return [
            "numero" => (int)$numero,
            "potencias" => Secuencias::generarPotencias((int)$numero),
            "errores" => []
        ];
    }
}
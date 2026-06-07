<?php

namespace App\Controladores;

use App\Modelo\Estadisticas;
use App\Utilidades\Validaciones;
use App\Utilidades\Sanitizacion;

class Problema1Controller {

    public static function procesar($post) {

        // Inicializa arreglos
        $numeros = [];
        $errores = [];

        // Verifica si el formulario fue enviado
        if (!isset($post['numeros']) || !is_array($post['numeros'])) {
            return null;
        }

        // Procesa los 5 números
        for ($i = 0; $i < 5; $i++) {

            // Sanitización
            $numero = Sanitizacion::quitarEspacios($post["numeros"][$i] ?? '');
            $numero = Sanitizacion::limpiarEtiquetas($numero);

            // Validar vacío
            if (!Validaciones::validarVacio($numero)) {
                $errores[$i] = "El número " . ($i + 1) . " no puede estar vacío";
                continue;
            }

            // Validar positivo
            if (!Validaciones::validarPositivo($numero)) {
                $errores[$i] = "El número " . ($i + 1) . " no puede ser negativo";
                continue;
            }

            $numeros[] = (float)$numero;
        }

        // Si existen errores, devolverlos
        if (!empty($errores)) {
            return [
                "errores" => $errores
            ];
        }

        // Calcular estadísticas utilizando el modelo
        return [
            "media" => Estadisticas::calcularPromedio($numeros),
            "desviacion" => Estadisticas::calcularDesviacionEstandar($numeros),
            "minimo" => Estadisticas::obtenerMinimo($numeros),
            "maximo" => Estadisticas::obtenerMaximo($numeros),
            "errores" => []
        ];
    }
}
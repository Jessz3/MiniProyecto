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
        if (!isset($post['n1'])) {
            return null;
        }

        // Procesa los 5 números
        for ($i = 1; $i <= 5; $i++) {

            // Sanitización
            $numero = Sanitizacion::quitarEspacios($post["n$i"]);
            $numero = Sanitizacion::limpiarEtiquetas($numero);

            // Validar vacío
            if (!Validaciones::validarVacio($numero)) {
                $errores[] = "El número $i no puede estar vacío";
                continue;
            }

            // Validar positivo
            if (!Validaciones::validarPositivo($numero)) {
                $errores[] = "El número $i debe ser positivo";
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
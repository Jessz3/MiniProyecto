<?php

namespace App\Controladores;

use App\Modelo\Estadisticas;
use App\Utilidades\Sanitizacion;
use App\Utilidades\Validaciones;

class Problema7Controller {

    public static function procesar($post) {

        // Inicializa arreglo de errores
        $errores = [];

        // Verifica si el formulario fue enviado
        if (!isset($post['cantidad']) || !isset($post['notas'])) {
            return null;
        }

        // Sanitización de la cantidad
        $cantidad = Sanitizacion::quitarEspacios($post['cantidad']);
        $cantidad = Sanitizacion::limpiarEtiquetas($cantidad);

        // Validar vacío
        if (!Validaciones::validarVacio($cantidad)) {
            $errores[] = "Debe ingresar la cantidad de notas";
        }

        // Validar entero positivo
        elseif (!Validaciones::validarEntero($cantidad) || $cantidad <= 0) {
            $errores[] = "La cantidad de notas debe ser un entero positivo";
        }

        // Validar cantidad de notas recibidas
        elseif (count($post['notas']) != $cantidad) {
            $errores[] = "La cantidad de notas ingresadas no coincide con la cantidad indicada";
        }

        $notasValidas = [];

        // Recorrer colección con foreach
        foreach ($post['notas'] as $indice => $nota) {

            $nota = Sanitizacion::quitarEspacios($nota);
            $nota = Sanitizacion::limpiarEtiquetas($nota);

            if (!Validaciones::validarVacio($nota)) {
                $errores[] = "La nota #" . ($indice + 1) . " está vacía";
                continue;
            }

            if (!Validaciones::validarCeroACien($nota)) {
                $errores[] = "La nota #" . ($indice + 1) . " debe estar entre 0 y 100";
                continue;
            }

            $notasValidas[] = (float)$nota;
        }

        // Si existen errores, devolverlos
        if (!empty($errores)) {
            return [
                "errores" => $errores
            ];
        }

        // Calcular estadísticas utilizando el modelo
        return [
            "cantidad" => $cantidad,
            "promedio" => Estadisticas::calcularPromedio($notasValidas),
            "desviacion" => Estadisticas::calcularDesviacionEstandar($notasValidas),
            "minimo" => Estadisticas::obtenerMinimo($notasValidas),
            "maximo" => Estadisticas::obtenerMaximo($notasValidas),
            "errores" => []
        ];
    }
}
<?php 
namespace App\Controladores;
use App\Modelo\Secuencias;
use App\Utilidades\Validaciones;
use App\Utilidades\Sanitizacion;

class Problema3Controller {

    const LIMITE = 10_000; // Limite para evitar cálculos excesivos

    public static function procesar($post): ?array {
        if (empty($post)) return null;

        // Sanitizar
        $cantidad = Sanitizacion::quitarEspacios($post['cantidad'] ?? '');

        // Validar
        if (!Validaciones::validarVacio($cantidad)) {
            return ['errores' => ['El campo no puede estar vacío.']];
        }

        if (!Validaciones::validarEntero($cantidad)) {
            return ['errores' => ['Ingrese un número entero válido.']];
        }

        $cantidad = (int) $cantidad;

        if (!Validaciones::validarPositivo($cantidad) || $cantidad < 1) {
            return ['errores' => ['El valor debe ser mayor a 0.']];
        }

        if ($cantidad > self::LIMITE) {
            return ['errores' => ['El valor máximo permitido es ' . self::LIMITE . ' para evitar desbordamiento.']];
        }

        // Calcular
        return ['multiplos' => Secuencias::multiplosDeCuatro($cantidad)];
    }
}
?>
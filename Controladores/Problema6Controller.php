<?php 
namespace App\Controladores;
use App\Modelo\Hospital;
use App\Utilidades\Validaciones;
use App\Utilidades\Sanitizacion;

class Problema6Controller {

    public static function procesar(array $post): ?array {
        if (empty($post)) return null;

        // Sanitizar
        $presupuesto = Sanitizacion::quitarEspacios($post['presupuesto'] ?? '');

        // Validar
        if (!Validaciones::validarVacio($presupuesto)) {
            return ['errores' => ['El campo no puede estar vacío.']];
        }

        if (!Validaciones::validarNumero($presupuesto)) {
            return ['errores' => ['Ingrese un número válido.']];
        }

        if (!Validaciones::validarPositivo($presupuesto) || (float)$presupuesto <= 0) {
            return ['errores' => ['El presupuesto debe ser mayor a 0.']];
        }

        return [
            'presupuesto' => (float) $presupuesto,
            'reparto'     => Hospital::repartirPresupuesto((float) $presupuesto),
        ];
    }
}
?>
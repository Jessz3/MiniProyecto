<?php
namespace App\Modelo;

class Hospital {

    public static function repartirPresupuesto(float $presupuesto): array {
        return [
            'Ginecología'   => $presupuesto * 0.40,
            'Traumatología' => $presupuesto * 0.35,
            'Pediatría'     => $presupuesto * 0.25,
        ];
    }
}
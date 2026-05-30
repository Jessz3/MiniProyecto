<?php

namespace App\Modelo;
class Secuencias {

    //Suma 1-1000
    public static function sumarUnoAMil() {
        $suma = 0;
        for ($i = 1; $i <= 1000; $i++) {
            $suma += $i;
        }
        return $suma;
    }
    
    //Múltiplos de 4
    public static function multiplosDeCuatro(int $cantidad): array {
        $multiplos = [];
        for ($i = 1; $i <= $cantidad; $i++) {
            $multiplos[] = 4 * $i;
        }
        return $multiplos;
    }

    //Suma par/impar
        public static function sumarParImpar(): array {
            $sumaPar = 0;
            $sumaImpar = 0;
            for ($i = 1; $i <= 200; $i++) {
                if ($i % 2 === 0) {
                    $sumaPar += $i;
                } else {
                    $sumaImpar += $i;
                }
            }
            return ['par' => $sumaPar, 'impar' => $sumaImpar];
        }

    //Potencias
}   
?>
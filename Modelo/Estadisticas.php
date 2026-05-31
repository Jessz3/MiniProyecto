<?php

namespace App\Modelo;

use App\Utilidades\Matematicas;

class Estadisticas {

    // Promedio
    public static function calcularPromedio(array $numeros): float {

        $suma = 0;

        foreach ($numeros as $numero) {
            $suma += $numero;
        }

        return $suma / count($numeros);
    }

    // Desviación estándar
    public static function calcularDesviacionEstandar(array $numeros): float {

        $promedio = self::calcularPromedio($numeros);
        $sumaCuadrados = 0;

        foreach ($numeros as $numero) {
            $sumaCuadrados += Matematicas::potencia(
                $numero - $promedio,
                2
            );
        }

        return Matematicas::raizCuadrada(
            $sumaCuadrados / count($numeros)
        );
    }

    // Número mínimo
    public static function obtenerMinimo(array $numeros): float {

        $minimo = $numeros[0];

        foreach ($numeros as $numero) {
            if ($numero < $minimo) {
                $minimo = $numero;
            }
        }

        return $minimo;
    }

    // Número máximo
    public static function obtenerMaximo(array $numeros): float {

        $maximo = $numeros[0];

        foreach ($numeros as $numero) {
            if ($numero > $maximo) {
                $maximo = $numero;
            }
        }

        return $maximo;
    }
}
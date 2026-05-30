<?php 
namespace App\Controladores;
use App\Modelo\Secuencias;

class Problema4Controller {
    public static function procesar(array $post): ?array {
        if (!isset($post['calcular'])) return null;

        return Secuencias::sumarParImpar();
    }
}
?>
<?php
namespace App\Utilidades;

class Componentes {

    public static function btnLimpiar(string $texto = 'Limpiar', string $clase = ''): string { 
        $clase = htmlspecialchars($clase);
        $texto = htmlspecialchars($texto);
        return <<<HTML
        <button type="button" class="btn-limpiar {$clase}" onclick="limpiarFormulario(this)">
            {$texto}
        </button>
        HTML;
    }

    public static function scriptLimpiar(): string {
        return <<<HTML
            <script>
            function limpiarFormulario(btn) {
                window.location.href = window.location.pathname;
            }
            </script>
        HTML;
    }
}
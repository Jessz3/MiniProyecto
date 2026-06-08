# Mini Proyecto 

## Introducción

Este es un **mini proyecto educativo** desarrollado en **PHP** con una arquitectura basada en **Programación Orientada a Objetos (POO)**. El proyecto implementa la resolución de 9 problemas matemáticos y estadísticos, demostrando el uso de clases, métodos estáticos, validación de datos, sanitización y funciones matemáticas.

### Objetivos del Proyecto
- Construir aplicaciones web aplicando principios, técnicas, metodologías y herramientas de diseño y desarrollo que permita la optimización, facilidad de mantenimiento, cumpliendo los criterios de usabilidad y accesibilidad.
- Aplicar estructuras de control condicional y repetitiva, funciones matemáticas, funciones de validación, clases con métodos estáticos, para resolver problemas algorítmicos, utilizando buenas prácticas de programación como las recomendaciones de PSR-1, PSR-4, Recomendación OWASP, principio DRY (Don't Repeat Yourself).

---

## Características Principales

### 🏗️ Arquitectura del Proyecto
El proyecto implementa un patrón **MVC (Model-View-Controller)** simplificado con componentes reutilizables:

```
├── Controladores/     → Lógica de procesamiento de formularios
├── Modelo/            → Clases con métodos estáticos para cálculos
├── Vista/             → Archivos PHP con interfaz de usuario
├── Utilidades/        → Clases auxiliares (validación, sanitización, matemáticas)
├── CSS/               → Estilos de la aplicación
└── assets/            → Recursos (imágenes, etc.)
```

### 📚 Problemas Implementados

| Problema | Descripción |
|----------|-------------|
| **Problema 1** | Media, Desviación Estándar, Mínimo y Máximo de 5 números |
| **Problema 2** | Suma de todos los enteros entre 1 y 1000 |
| **Problema 3** | Generador de N-Primeros Múltiplos de 4 |
| **Problema 4** | Suma de Pares e Impares del 1 al 200 |
| **Problema 5** | Clasificación de Edades (niño, adolescente, adulto, adulto mayor) |
| **Problema 6** | Hospital |
| **Problema 7** | Calculadora de Datos Estadísticos |
| **Problema 8** | Estación del Año |
| **Problema 9** | 15 primeras Potencias de un Número |

---

## Documentación de Código

### 🎯 Programación Orientada a Objetos (POO)

El proyecto utiliza POO para organizar el código en clases especializadas:

#### **Clases Implementadas**

1. **Controladores** (`Controladores/`)
   - `Problema1Controller.php` - `Problema9Controller.php`
   - Procesan formularios, validan y sanitizan datos
   - Utilizan métodos estáticos para procesar información

2. **Modelos** (`Modelo/`)
   - `Estadisticas.php` - Cálculos estadísticos
   - `Clasificaciones.php` - Clasificación de datos
   - `Hospital.php` - Repartición de presupuestos
   - `Secuencias.php` - Generación de secuencias numéricas

3. **Utilidades** (`Utilidades/`)
   - `Validaciones.php` - Validación de datos
   - `Sanitizacion.php` - Limpieza de datos
   - `Matematicas.php` - Funciones matemáticas
   - `Navegacion.php` - Generación de enlaces
   - `Componentes.php` - Componentes HTML reutilizables

---

### 🔧 Métodos Estáticos

Todos los métodos de las clases son **estáticos**, lo que permite accederlos sin instanciar la clase:

#### Ejemplo de uso:
```php
// Sin necesidad de crear un objeto
$resultado = Estadisticas::calcularPromedio([10, 20, 30, 40, 50]);

// En lugar de:
// $stats = new Estadisticas();
// $resultado = $stats->calcularPromedio([...]);
```

#### **Métodos Estáticos por Clase**

##### **Validaciones.php**
```php
public static function validarVacio($dato)              // Valida que no esté vacío
public static function validarNumero($dato)            // Valida que sea número
public static function validarPositivo($dato)          // Valida que sea positivo
public static function validarCeroACien($dato)         // Valida rango 0-100
public static function validarEntero($dato)            // Valida que sea entero
```

##### **Sanitizacion.php**
```php
public static function limpiarEtiquetas(string $dato)       // Elimina etiquetas HTML
public static function quitarEspacios(string $dato)         // Elimina espacios inicio/final
public static function unificarEspacios(string $dato)       // Reemplaza espacios múltiples
public static function limpiarAlfanumerico(string $dato)    // Solo letras, números, espacios
public static function escaparHTML(string $dato)            // Convierte a entidades HTML
```

---

### 📐 Funciones Matemáticas

#### **Clase: Matematicas.php**

```php
namespace App\Utilidades;

class Matematicas {
    
    /**
     * Calcula la potencia de un número
     * 
     * @param float $base La base del número
     * @param float $exponente El exponente
     * @return float El resultado de base^exponente
     * 
     * @example
     * Matematicas::potencia(2, 3)  // Retorna 8
     * Matematicas::potencia(5, 2)  // Retorna 25
     */
    public static function potencia($base, $exponente) {
        return pow($base, $exponente);
    }

    /**
     * Calcula la raíz cuadrada de un número
     * 
     * @param float $numero El número a calcular la raíz
     * @return float La raíz cuadrada del número
     * 
     * @example
     * Matematicas::raizCuadrada(16)  // Retorna 4
     * Matematicas::raizCuadrada(25)  // Retorna 5
     */
    public static function raizCuadrada($numero) {
        return sqrt($numero);
    }
}
```

#### **Uso en el Proyecto**

En la clase `Estadisticas.php`, se utilizan estas funciones para cálculos complejos:

```php
// Desviación Estándar - Utiliza potencia
$sumaCuadrados += Matematicas::potencia($numero - $promedio, 2);

// Resultado final - Utiliza raíz cuadrada
return Matematicas::raizCuadrada($sumaCuadrados / count($numeros));
```

---

### ✅ Validación de Datos

#### **Clase: Validaciones.php**

Valida la entrada de usuarios para garantizar integridad de datos:

```php
class Validaciones {
    
    /**
     * Valida que el campo no esté vacío
     * 
     * @param string $dato El dato a validar
     * @return bool true si no está vacío, false si está vacío
     */
    public static function validarVacio($dato) {
        return trim($dato) !== '';
    }
    
    /**
     * Valida que sea un número (evitando notación científica)
     * 
     * @param mixed $dato El dato a validar
     * @return bool true si es número válido
     * 
     * @example
     * validarNumero("123")     // true
     * validarNumero("12.5")    // true
     * validarNumero("1e5")     // false (notación científica)
     */
    public static function validarNumero($dato): bool {
        return is_numeric($dato) && !preg_match('/[eE]/', (string)$dato);
    }
    
    /**
     * Valida que el número sea positivo
     * 
     * @param mixed $dato El dato a validar
     * @return bool true si es positivo o cero
     */
    public static function validarPositivo($dato): bool {
        return is_numeric($dato) && (float)$dato >= 0;
    }
    
    /**
     * Valida que esté en rango 0-100
     * Útil para edades, porcentajes y calificaciones
     * 
     * @param mixed $dato El dato a validar
     * @return bool true si está en rango
     */
    public static function validarCeroACien($dato): bool {
        return is_numeric($dato) && (float)$dato >= 0 && (float)$dato <= 100;
    }
    
    /**
     * Valida que sea un número entero
     * 
     * @param mixed $dato El dato a validar
     * @return bool true si es entero
     */
    public static function validarEntero($dato): bool {
        return filter_var($dato, FILTER_VALIDATE_INT) !== false;
    }
}
```

#### **Ejemplo de Validación en Acción**

```php
// En Problema1Controller.php
$numero = Sanitizacion::quitarEspacios($post["numeros"][$i] ?? '');

// Validar que no esté vacío
if (!Validaciones::validarVacio($numero)) {
    $errores[$i] = "El número " . ($i + 1) . " no puede estar vacío";
    continue;
}

// Validar que sea positivo
if (!Validaciones::validarPositivo($numero)) {
    $errores[$i] = "El número " . ($i + 1) . " no puede ser negativo";
    continue;
}
```

---

### 🛡️ Sanitización de Datos

#### **Clase: Sanitizacion.php**

Protege contra inyecciones XSS y otras vulnerabilidades:

```php
class Sanitizacion {
    
    /**
     * Elimina etiquetas HTML y scripts peligrosos
     * 
     * @param string $dato El dato a limpiar
     * @return string Dato sin etiquetas HTML
     * 
     * @example
     * limpiarEtiquetas("<script>alert('hola')</script>Texto")
     * // Retorna: "Texto"
     */
    public static function limpiarEtiquetas(string $dato): string {
        return strip_tags($dato);
    }

    /**
     * Elimina espacios al inicio y final del texto
     * 
     * @param string $dato El dato a limpiar
     * @return string Dato sin espacios al inicio/final
     */
    public static function quitarEspacios(string $dato): string {
        return trim($dato);
    }

    /**
     * Reemplaza múltiples espacios por uno solo
     * Normaliza espacios en blanco
     * 
     * @param string $dato El dato a limpiar
     * @return string Dato con espacios normalizados
     * 
     * @example
     * unificarEspacios("Hola    mundo")  // Retorna "Hola mundo"
     */
    public static function unificarEspacios(string $dato): string {
        return trim(preg_replace('/\s+/', ' ', $dato));
    }

    /**
     * Permite solo letras, números y espacios
     * Útil para campos de texto seguro
     * 
     * @param string $dato El dato a limpiar
     * @return string Dato con solo caracteres alfanuméricos
     * 
     * @example
     * limpiarAlfanumerico("Hola@123!")  // Retorna "Hola123"
     */
    public static function limpiarAlfanumerico(string $dato): string {
        return preg_replace('/[^\p{L}\p{N} ]/u', '', $dato);
    }

    /**
     * Convierte caracteres especiales en entidades HTML
     * Previene ataques XSS al mostrar en HTML
     * 
     * @param string $dato El dato a escapar
     * @return string Dato con caracteres especiales escapados
     * 
     * @example
     * escaparHTML("<script>alert('xss')</script>")
     * // Retorna: "&lt;script&gt;alert(&#039;xss&#039;)&lt;/script&gt;"
     */
    public static function escaparHTML(string $dato): string {
        return htmlspecialchars($dato, ENT_QUOTES, 'UTF-8');
    }
}
```

#### **Ciclo de Validación y Sanitización**

```
Usuario → Sanitización → Validación → Procesamiento → Almacenamiento
         (limpiar datos) (verificar)   (lógica)      (en HTML)
```

---

## Ejemplos de Uso

### Ejemplo 1: Cálculos Estadísticos (Problema 1)

```php
use App\Modelo\Estadisticas;

$numeros = [10, 20, 30, 40, 50];

// Cálculos estadísticos
$promedio = Estadisticas::calcularPromedio($numeros);           // 30
$desviacion = Estadisticas::calcularDesviacionEstandar($numeros); // ~14.14
$minimo = Estadisticas::obtenerMinimo($numeros);               // 10
$maximo = Estadisticas::obtenerMaximo($numeros);               // 50
```

### Ejemplo 2: Validación y Sanitización

```php
use App\Utilidades\Validaciones;
use App\Utilidades\Sanitizacion;

// Entrada del usuario
$entrada = "  <script>alert('xss')</script>Usuario  ";

// Sanitizar
$limpia = Sanitizacion::limpiarEtiquetas($entrada);
$limpia = Sanitizacion::quitarEspacios($limpia);

// Validar
if (Validaciones::validarVacio($limpia)) {
    echo "Datos válidos: $limpia";
}
```

### Ejemplo 3: Operaciones Matemáticas

```php
use App\Utilidades\Matematicas;

// Potencia
$cuadrado = Matematicas::potencia(5, 2);      // 25
$cubo = Matematicas::potencia(3, 3);          // 27

// Raíz cuadrada
$raiz = Matematicas::raizCuadrada(16);        // 4
```

---

## Estructura del Proyecto

```
MiniProyecto/
├── Index.php                          # Página principal / menú
├── composer.json                      # Configuración de Composer
├── README.md                          # Este archivo
│
├── Controladores/
│   ├── Problema1Controller.php        # Procesa datos para Problema 1
│   ├── Problema2Controller.php        # Procesa datos para Problema 2
│   └── ... (hasta Problema9)
│
├── Modelo/
│   ├── Estadisticas.php              # Cálculos: promedio, desv., min, max
│   ├── Clasificaciones.php           # Clasificación de datos
│   ├── Hospital.php                  # Repartición de presupuestos
│   └── Secuencias.php                # Generación de secuencias numéricas
│
├── Vista/
│   ├── problema1.php                 # Interfaz para Problema 1
│   ├── problema2.php                 # Interfaz para Problema 2
│   └── ... (hasta Problema 9)
│   └── layout/
│       ├── header.php                # Encabezado común
│       └── footer.php                # Pie de página común
│
├── Utilidades/
│   ├── Validaciones.php              # Validación de datos ✓
│   ├── Sanitizacion.php              # Sanitización de datos 🛡️
│   ├── Matematicas.php               # Funciones matemáticas 📐
│   ├── Navegacion.php                # Utilidades de navegación
│   ├── Componentes.php               # Componentes HTML reutilizables
│   └── Componentes.php               # Funciones de ayuda
│
├── CSS/
│   └── estilos.css                   # Estilos de la aplicación
│
├── assets/
│   └── img/                          # Imágenes del proyecto
│
└── vendor/                           # Dependencias de Composer
    └── autoload.php                  # Autocarga de clases PSR-4
```

---

## Configuración de Composer (PSR-4)

El proyecto usa **PSR-4 Autoloading** para cargar automáticamente las clases:

```json
{
  "autoload": {
    "psr-4": {
      "App\\": ""
    }
  }
}
```

Esto permite usar:
```php
use App\Utilidades\Validaciones;
use App\Modelo\Estadisticas;

// Sin necesidad de require_once
```

---

## Flujo de Ejecución

```
1. Usuario accede a Index.php
   ↓
2. Selecciona un problema (Problema 1-9)
   ↓
3. Se carga Vista/problemaX.php
   ↓
4. Usuario completa formulario y lo envía
   ↓
5. Se ejecuta Controladores/ProblemaXController.php
   ├─→ Sanitiza datos con Sanitizacion::
   ├─→ Valida datos con Validaciones::
   ↓
6. Se procesan datos con clases Modelo/
   ├─→ Ejecuta métodos estáticos
   ├─→ Usa funciones de Matematicas::
   ↓
7. Retorna resultados a la Vista
   ↓
8. Vista muestra resultados al usuario
```

---

## Seguridad

✅ **Validación de entrada** - Todos los datos se validan antes de procesarse  
✅ **Sanitización** - Se elimina código peligroso (XSS, inyecciones)  
✅ **Métodos estáticos** - Evita estado compartido indeseado  
✅ **Uso de htmlspecialchars** - Convierte caracteres especiales a entidades HTML  
✅ **Type hints** - PHP 7.4+ con validación de tipos  

---

## Tecnologías Utilizadas

- **PHP 7.4+** - Lenguaje de servidor
- **Composer** - Gestor de dependencias
- **CSS3** - Estilos responsive
- **HTML5** - Estructura semántica
- **JavaScript** - Interactividad (opcional)

---

## Conclusión

Este mini proyecto demuestra:
- ✅ Uso de **Programación Orientada a Objetos** en PHP
- ✅ **Métodos estáticos** para funcionalidades reutilizables
- ✅ **Validación de datos** robusta
- ✅ **Sanitización** para seguridad
- ✅ **Funciones matemáticas** (potencia, raíz cuadrada)
- ✅ Patrón **MVC** simplificado
- ✅ Uso de **Composer** y PSR-4 Autoloading

---

**Última actualización:** 2026-06-08

## Autores
Este proyecto fue desarrollado por los estudiantes de la Universidad Tecnológica de Panamá:

Nombre: Erick Hou 8-1017-473, Genesis Luo 8-1020-1006 y Jessica Zheng 8-1033-370

Correo: erick.hou@utp.ac.pa, genesis.luo@utp.ac.pa y jessica.zheng@utp.ac.pa

Curso: Desarrollo de Software VII

Instructor del Laboratorio: Irina Fong

Fecha de ejecución: 08/06/2026
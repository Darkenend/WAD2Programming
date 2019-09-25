# Funciones de Arrays

Hay un pequeño programa en la carpeta [array_function_examples](array_function_examples/) que muestra un pequeño ejemplo de cada funcion.

## Indice
* [print_r](#print_r)
* [asort](#asort)
* [ksort](#ksort)
* [array_column](#array_column)
* [array_key_exists](#array_key_exists)
* [array_search](#array_search)
* [array_merge](#array_merge)
* [array_pop](#array_pop)
* [array_push](#array_push)
* [array_rand](#array_rand)
* [array_replace](#array_replace)
* [array_reverse](#array_reverse)
* [array_slice](#array_slice)
* [array_diff](#array_diff)
* [array_sum](#array_sum)
* [array_unique](#array_unique)
* [count](#count)
* [in_array](#in_array)
* [array_keys](#array_keys)

---

## print_r
### Descripcion
> Imprime información legible para humanos sobre una variable

### Parametros
```php
print_r ( mixed $expression [, bool $return = FALSE ] ) : mixed
```

`$expression`: La expresión a ser impresa.

`$return`: Si desea capturar la salida de `print_r()`, use el parámetro `$return`. Cuando el parámetro es establecido a `TRUE`, `print_r()` devolverá la información en lugar de imprimirla.

### [Ejemplo](array_function_examples/print_r.php)
```php
print_r([2, 4, 8, 15, 16, 21, 42]);
```

## asort
### Descripcion
> Ordena un array y mantiene la asociación de índices

### Parametros
```php
asort ( array &$array [, int $sort_flags = SORT_REGULAR ] ) : bool
```

`$array`: El array de entrada.

`$sort_flags`: Quizá se necesita cambiar el comportamiento del ordenado usando este parámetro opcional `$sort_flags`, para más información ver [sort()](https://www.php.net/manual/es/function.sort.php).

### [Ejemplo](array_function_examples/asort.php)
```php
$array_fruits = array("d"=>"pear", "a"=>"orange", "b"=>"banana", "c"=>"apricot");
asort($array_fruits);
foreach ($array_fruits as $key => $val) {
    echo "$key = $val<br>";
}
```

## ksort
### Descripcion
> Ordena un array por clave

### Parametros
```php
ksort ( array &$array [, int $sort_flags = SORT_REGULAR ] ) : bool
```

`$array`: El array de entrada.

`$sort_flags`: Quizá se necesita cambiar el comportamiento del ordenado usando este parámetro opcional `$sort_flags`, para más información ver [sort()](https://www.php.net/manual/es/function.sort.php).

### [Ejemplo](array_function_examples/ksort.php)
```php
$array_fruits = array("d"=>"pear", "a"=>"orange", "b"=>"banana", "c"=>"apricot");
ksort($array_fruits);
foreach ($array_fruits as $key => $val) {
    echo "$key = $val<br>";
}
```

## array_column
### Descripcion
> Devuelve los valores de una sola columna del array de entrada

### Parametros
```php
array_column ( array $input , mixed $column_key [, mixed $index_key = null ] ) : array
```

`$input`: Un array multidimensional o un array de objetos desde el que extraer una columna de valores. Si se proporciona un array de objetos, entonces se podrá extraer directamente las propiedades públicas. Para poder extraer las proiedades protegidas o privadas, la clase debe implementar los métodos mágicos `__get()` y `__isset()`.

`$column_key`: La columna de valores a devolver. Este valor podría ser una clave de tipo integer de la columna de la cual obtener los datos, o podría ser una clave de tipo string para un array asociativo o nombre de propiedad. También prodría ser `NULL` para devolver array completos u objetos (útil junto con `$index_key` para reindexar el array).

`$index_key`: La columna a usar como los índices/claves para el array devuelto. Este valor podría ser la clave de tipo integer de la columna, o podría ser el nombre de la clave de tipo string.

### [Ejemplo](array_function_examples/array_column.php)
```php
$clase = array(
    array(
        'id' => 273,
        'nombre' => 'Álvaro',
        'apellido' => 'Real',
    ),
    array(
        'id' => 1337,
        'nombre' => 'Carlos',
        'apellido' => 'Vidal',
    ),
    array(
        'id' => 420,
        'nombre' => 'Fran',
        'apellido' => 'Martos',
    ),
    array(
        'id' => 524,
        'nombre' => 'Javier',
        'apellido' => 'Ramirez',
    )
);
$nombres = array_column($clase, 'nombre');
print_r($nombres);
```

## array_key_exists
### Descripcion
> Verifica si el índice o clave dada existe en el array

### Parametros
```php
array_key_exists ( mixed $key , array $array ) : bool
```

`$key`: Valor para verificar.

`$array`: Un array con las claves para verificar

### [Ejemplo](array_function_examples/array_key_exists.php)
```php
$needle = 'primero';
$haystack = array('primero' => 1, 'segundo' => 4);
if (array_key_exists($needle, $haystack)) {
    echo "$needle existe en el array";
}
```

## array_search
### Descripcion
> Busca un valor determinado en un array y devuelve la primera clave correspondiente en caso de éxito

### Parametros
```php
array_search ( mixed $needle , array $haystack [, bool $strict = false ] ) : mixed
```

`$needle`: El valor a buscar. Sensible a caracteres.

`$haystack`: El array donde buscarlo.

`$strict`: Si el tercer parámetro, `$strict`, se define como `TRUE` entonces la función `array_search()` también buscará elementos idénticos en el `$haystack`. Esto significa que también comprobará los tipos de datos de la `$needle` en el `$haystack`, ya que los objetos deben ser la misma instancia.

### [Ejemplo](array_function_examples/array_search.php)
```php
$array = array(0 => 'terran', 1 => 'zerg', 2 => 'protoss', 3 => 'random');

echo array_search('terran', $array);
echo array_search('elf', $array);
```

## array_merge
### Descripcion
> Combina dos o más arrays

### Parametros
```php
array_merge ( array $array1 [, array $... ] ) : array
```

`$array1`: Array inicial a combinar.

`$...`: Lista variable de arrays para combinar.

### [Ejemplo](array_function_examples/array_merge.php)
```php
$array1    = array("color" => "rojo", 2, 4);
$array2    = array("a", "b", "color" => "verde", "forma" => "trapezoide", 4);
$resultado = array_merge($array1, $array2);
print_r($resultado);
```

## array_pop
### Descripcion
> Extrae el último elemento del final del array

### Parametros
```php
array_pop ( array &$array ) : mixed
```

`$array`: El array de donde obtener el valor.

### [Ejemplo](array_function_examples/array_pop.php)
```php
$stack = array("naranja", "manzana", "banana", "frambuesa");
$fruit = array_pop($stack);
print_r($stack);
```

## array_push
### Descripcion
> Inserta uno o más elementos al final de un array

### Parametros
```php
array_push ( array &$array , mixed $value1 [, mixed $... ] ) : int
```

`$array`: El array de entrada.

`$value1`: El primer valor a colocar al final de array.

`$...`: Valores que seguir colocando al final del array.

### [Ejemplo](array_function_examples/array_push.php)
```php
$pila = array("porsche", "audi");
array_push($pila, "toyota", "mazda");
print_r($pila);
```

## array_rand
### Descripcion
> Seleccionar una o más entradas aleatorias de un array

### Parametros
```php
array_rand ( array $array [, int $num = 1 ] ) : mixed
```

`$array`: El array de entrada.

`$num`: Especifica cuántas entradas deberían seleccionarse.

### [Ejemplo](array_function_examples/array_rand.php)
```php
$entrada = array("Windows", "Linux", "Mac", "Android", "DOS");
$claves_aleatorias = array_rand($entrada, 2);
echo $entrada[$claves_aleatorias[0]]."<br>";
echo $entrada[$claves_aleatorias[1]]."<br>";
```

## array_replace
### Descripcion
> Lorem ipsum

### Parametros
```php
$string = "Hello World!";
```

`$string`: Lorem Ipsum

## array_reverse
### Descripcion
> Lorem ipsum

### Parametros
```php
$string = "Hello World!";
```

`$string`: Lorem Ipsum

## array_slice
### Descripcion
> Lorem ipsum

### Parametros
```php
$string = "Hello World!";
```

`$string`: Lorem Ipsum

## array_unique
### Descripcion
> Lorem ipsum

### Parametros
```php
$string = "Hello World!";
```

`$string`: Lorem Ipsum

## count
### Descripcion
> Lorem ipsum

### Parametros
```php
$string = "Hello World!";
```

`$string`: Lorem Ipsum

## in_array
### Descripcion
> Lorem ipsum

### Parametros
```php
$string = "Hello World!";
```

`$string`: Lorem Ipsum

## array_keys
### Descripcion
> Lorem ipsum

### Parametros
```php
$string = "Hello World!";
```

`$string`: Lorem Ipsum
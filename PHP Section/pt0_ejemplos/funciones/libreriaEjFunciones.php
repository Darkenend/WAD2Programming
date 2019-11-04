<?php
//primero ajustamos la zona horaria
if (date_default_timezone_get() !== 'Europe/Madrid') {
    date_default_timezone_set('Europe/Madrid');
}
//Ponemos formato local para fechas
//Para ver locales instalados en el terminal: locale -a
setlocale(LC_ALL, "es_ES.utf8");

//Helper
function EOL() { return PHP_EOL . '<br>';}

/**
 * función que retorna si un número es par o no
 * @param $num integer
 * @return boolean. true->par false->impar
 */
function par(int $num):bool {
    return (($num % 2) == 0);
}

/**
 * función que incrementa un número pasado por valor
 * es la propia función la que muestra la variable por pantalla.
 */
function incPorValor(int $num) {
    echo 'Dentro de la función ' . ++$num . EOL(); 
}

/**
 * idem anterior pero esta vez se pasa el prámetro por referencia
 * @see incPorValor
 */
function incPorReferencia(int &$num) {
    echo 'Dentro de la función ' . ++$num . EOL(); 
}

/**
 * calcula potencias y muestra por pantalla parámetros y resultado
 * @param $base int
 * @param $exp int. Por defecto 2
 */
function potencia(int $base, int $exp = 2) {
    echo 'base: ' . $base . EOL();
    echo 'exponente: ' . $exp . EOL();
    echo 'resultado: ' .  ($base ** $exp) . EOL();
}
/**
 * suma el contenido de los dos primeros parámetros y lo guarda en el tercero
 * @param $v1 float. Sumando 1
 * @param $v2 float. Sumando 2
 * @param &$res. Suma
 */
function suma(float $v1, float $v2, float &$res) {
    $res = $v1 + $v2;
}

/**
 * función que indica si un trángulo es isósceles, escaleno o equilátero
 * @param l1 float. Primer lado
 * @param l2 float. Segundo lado
 * @param l3 float. Tercer lado
 * @return String. Tipo de triángulo.
 */
function triangulo(float $l1, float $l2, float $l3):string {
    if (!valido($l1, $l2, $l3)) return 'no válido';
    if (($l1 == $l2) && ($l2 == $l3)) return 'equilátero';
    if (($l1 != $l2) && ($l2 != $l3) && ($l1 != $l3)) return 'escaleno';
    return 'isósceles';
}

/**
 * función que indica si un triángulo es posible.
 * dados 3 lados: a, b, c.
 * si a + b > c y a + c > b y b + c > a es válido
 * @return boolean
 */
function valido(float $a, float $b, float $c):bool {
    return ($a + $b > $c) && ($a + $c > $b) && ($b + $c > $a); 
}

/**
 * función que calcula el IVA
 * @param $base float. Base imponible
 * @param $porcentaje float. Opcional, por defecto 18. %IVA
 * @return IVA
 */
function iva(float $base, float $porcentaje = 18):float {
	return $base * $porcentaje / 100;
}

/**
 * función que calcula medias entre dos números
 * @param $n1 float
 * @param $n2 float
 * return media float
 */
function media(float $n1, float $n2):float {
    return ($n1 + $n2) / 2;
 
}

/**
 * función que muestra la fecha en varios formatos
 * @param $formato callable. Retorna la fecha en el formato adecuado
 * @return resultado de la función callable
 */
function fecha(callable $f):string {
    return $f();
}

/**
 * formato FH
 * %d/%m/%y %H:%M:%S
 */
function FH() { 
    return strftime('%d/%m/%y %H:%M:%S');  
}
/**
 * formato F
 * %e-%mesSinCerosIniciales-%y
 * El mes sin ceros iniciales no existe como caracter de formato!!!
 * Don't PANIC!
 */
function F() {
    $dia = strftime('%d');
    $año = strftime('%y');
    //Vamos a por el mes
    $mes = strftime('%m');
    switch ($mes) {
        case '01': $sin = '1'; break;
        case '02': $sin = '2'; break;
        case '03': $sin = '3'; break;
        case '04': $sin = '4'; break;
        case '05': $sin = '5'; break;
        case '06': $sin = '6'; break;
        case '07': $sin = '7'; break;
        case '08': $sin = '8'; break;
        case '09': $sin = '9'; break;
        default: $sin = $mes;
    }
    return $dia . '-' . $sin . '-' . $año;
}

/**
 * formato H
 * %H : %M : %S
 */
function H() {
    return strftime('%H : %M : %S');
}

/**
 * función que indica si una fecha dd-mm-aaaa es correcta o incorrecta
 * @param $ddmmaaaa string. Fecha a comprobar
 * @return boolean.
 */
function comprobarFecha(string $ddmmaaaa):bool {
    
    //DateTime::createFromFormat corrige las fechas incorrectas y las guarda
    //Pej. 2018-2-29 (no bisiesto)-> 2018-3-1 (corregido) 
    $date = DateTime::createFromFormat('d-m-Y', $ddmmaaaa);
    
    //si no puede corregir retorna false
    if ($date !== false) {
        $cadenaFechaDateTime = strftime('%d-%m-%Y', $date->getTimestamp());
    } else {
        return false;
    }
    
    //comparamos la cadena del parámetro con la generada por DateTime
    $correcta = (!strcmp($cadenaFechaDateTime, $ddmmaaaa))?true:false;
    
    return $correcta;
}

/**
 * función que retorna los cuatro parámetros de color rgba
 * @return string.
 */
function rgbaParams():string {
    return rand(0, 255) . ',' . rand(0, 255) . ',' .rand(0,255) . ',0.5';
}

/**
 * función que genera un color en hexadecimal
 * @return string
 */
function hexParams():string {
    return sprintf('#%X%X%X%X%X%X',rand(0,15),rand(0,15),rand(0,15),rand(0,15),rand(0,15),rand(0,15));
}





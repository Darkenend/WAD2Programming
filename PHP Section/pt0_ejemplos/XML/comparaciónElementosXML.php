<?php
$string = '<usuarios>
                <usuario>
                    <nombre>Monnie</nombre>
                </usuario>
            </usuarios>';
$usuarios = new SimpleXMLElement($string);
if((string) $usuarios->usuario->nombre == 'Monnie') {
    echo 'El usuario es efectivamente Monnie';
} else {
    echo 'El usuario NO es Monnie';
}
echo '<br>';
if((string) $usuarios->usuario->nombre === 'Monnie') {
    echo 'El usuario es efectivamente Monnie';
} else {
    echo 'El usuario NO es Monnie';
}
echo '<br>';
//Esta función es idéntica a htmlspecialchars() en todos los aspectos, pero con htmlentities(),
//todos los caracteres que tienen su equivalente HTML son convertidos a estas entidades. 
echo htmlentities('<nombre>' . (string) $usuarios->usuario->nombre . '</nombre>') . '<br>';
// Podemos ver que si hacemos var_dump:
var_dump($usuarios->usuario->nombre);
/*
Devuelve:
object(SimpleXMLElement)[2]
  public 0 => string 'Monnie' (length=6)
*/
?>
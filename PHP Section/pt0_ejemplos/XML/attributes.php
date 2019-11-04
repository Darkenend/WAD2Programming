<?php
//Heredoc
$string = <<<XML
<animales>
    <animal tipo="mamifero">
       <nombre>Tigre</nombre>
    </animal>
    <animal tipo="anfibio">
        <nombre>rana</nombre>
</animal>
</animales>
XML;
// Cargamos el archivo:
$xml = simplexml_load_string($string);
// Se puede obtener el atributo así:
//$xml->animal[0]->attributes(); // Devuelve: mamífero
foreach($xml->animal[0]->attributes() as $a => $b) {
    echo $a . '="' . $b . '"' . '<br>';
}
//$xml->animal[1]->attributes(); // Devuelve: anfibio
foreach($xml->animal[1]->attributes() as $a => $b) {
    echo $a . '="' . $b . '"' . '<br>';
}

//más elegante
for ($i = 0; $i < $xml->count(); ++$i) {
    echo $xml->animal[$i]->nombre->getName() . ': ' . $xml->animal[$i]->nombre . '<br>';
    foreach($xml->animal[$i]->attributes() as $a => $b) {
        echo $a . '="' . $b . '"' . '<br>';
    }
}

?>
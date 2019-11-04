<?php
$fp = fopen("archivo.txt", "w");

fwrite($fp, "Hola que tal");
fwrite($fp, ", ¿Cómo estás? \n");

fclose($fp);
// Escribirá en archivo.txt : Hola que tal, ¿Cómo estás?

// En el ejemplo anterior hemos escrito en el archivo de forma que hemos sobreescrito lo anterior (con el modo w).
//Si ahora queremos añadir nuevo contenido al archivo, podemos abrir un recurso con el modo a de append:

if ($fp = fopen("archivo.txt", "a")){
    fwrite($fp, "Yo muy bien, ¿Y tú?");
}

fclose($fp);

echo file_get_contents("archivo.txt");
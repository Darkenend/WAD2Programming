<?php
//por pantalla
function handler(Throwable $ex):void {
    echo "Excepción no capturada: " . $ex->getMessage();
}

//por pantalla
function erroresComoExcepciones($numError, $description, $file, $line) {
    throw new ErrorException($description, 0, $numError, $file, $line);
}
set_error_handler("erroresComoExcepciones", E_WARNING | E_NOTICE);
set_exception_handler("handler");


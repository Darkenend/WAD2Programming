<?php
function erroresComoExcepciones($numError, $description, $file, $line) {
    throw new ErrorException($description, 0, $numError, $file, $line);
}
set_error_handler("erroresComoExcepciones", E_WARNING | E_NOTICE);

// En /var/log/php_errors.log
function handler(Throwable $ex):void {
    error_log('Excepción no capturada: ' . $ex->getMessage(), 0, "/var/log/php_errors.log");
}
set_exception_handler("handler");

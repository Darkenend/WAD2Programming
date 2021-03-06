<?php
function __autoload($className) {
    $className = ltrim($className, '\\');
    $fileName = '';
    $dirSrc = array(__DIR__.'/../src', __DIR__.'/../fwk');
    $namespace = '';
    if ($lastNsPos = strrpos($className, '\\')) {
        $namespace = substr($className, 0, $lastNsPos);
        $className = substr($className, $lastNsPos + 1);
        $fileName = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }
    $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';
    foreach($dirSrc as $dir) {
        $f = $dir . DIRECTORY_SEPARATOR . $fileName;
        if (file_exists($f)) {
            require $f;
            break;
        }
    }
}

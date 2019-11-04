<?php
if($_SERVER['REQUEST_METHOD']!="GET") {
	require_once "UploadException.php";
	//tomo el valor de un elemento de tipo texto del formulario
	$cadenatexto = $_POST["cadenatexto"];
	echo "Escribió en el campo de texto: " . $cadenatexto."<br><br>";
	//datos del arhivo
	$nombre = $_FILES['userfile']['name'];
	$tipo = $_FILES['userfile']['type'];
	$tamano = $_FILES['userfile']['size'];
	$code = $_FILES['userfile']['error'];
	$ruta = 'subidos/';
	try {
		if ($code != UPLOAD_ERR_OK) {//si no se ha subido bien
			throw new UploadException(codigoPorMensaje($code));
		}
		//compruebo si las características del archivo son las que deseo
		if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg"))))
			throw new UploadException("La extensión no es correcta. Se permiten archivos .gif o .jpeg");
		if (is_uploaded_file($_FILES['userfile']['tmp_name']) === false)
			throw new UploadException("Error, este fichero no ha subido por formulario");
			$rutaDestino = $ruta . $nombre;
		if (is_file($rutaDestino) === true) { 
			//entonces en esa ruta ya existe un archivo con ese nombre, 
			//hay que cambiar el nombre
			$idUnico = time();
			$nombre = $idUnico . '_' . $nombre;
			$rutaDestino = $ruta . $nombre;
		}
		if (move_uploaded_file($_FILES['userfile']['tmp_name'], $rutaDestino)) {
			echo "El archivo ha sido cargado correctamente.";
		} else {
			echo "Error al subir el fichero. No pudo guardarse.";
		}
	} catch (UploadException $e) {
		echo $e->getMessage();
	}
}
function codigoPorMensaje($code) {
	switch ($code){
		case UPLOAD_ERR_INI_SIZE:
			$message="el archivo subido excede el tamaño máximo de
			subida indicado en php.ini";
			break;
		case UPLOAD_ERR_FORM_SIZE:
			$message="El archivo subido excede el tamaño máximo de
			subida indicado en el formulario HTML";
			break;
		case UPLOAD_ERR_PARTIAL:
			$message="el archvio subido fue subido parcialmente";
			break;
		case UPLOAD_ERR_NO_FILE:
			$message="Ningún fichero fue subido";
			break;
		case UPLOAD_ERR_NO_TMP_DIR:
			$message="No se encuentra la carpeta temporal";
			break;
		case UPLOAD_ERR_CANT_WRITE:
			$message="Fallo al escribir en disco";
			break;
		case UPLOAD_ERR_EXTENSION:
			$message="Parado por una extensión de php";
			break;
		default:
			$message="error de subida desconocido";
			break;
	}
	return $message;
}

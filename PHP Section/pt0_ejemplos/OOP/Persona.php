<!DOCTYPE html>
<html>
<head>
	<title>Persona</title>
</head>

<body>

<?php
class Persona {
	private $DNI;
	private $nombre;
	private $apellido;
	
	function __construct($DNI, $nombre, $apellido) {
		$this->DNI = $DNI;
		$this->nombre = $nombre;
		$this->apellido = $apellido;
	}
	public function getNombre() {
		return $this->nombre;
	}
	public function getApellido() {
		return $this->apellido;
	}
	public function setNombre($nombre) {
		$this->nombre = $nombre;
	}
	public function setApellido($apellido) {
		$this->apellido = $apellido;
	}
	
	public function __toString() {
		return "Persona: " . $this->nombre . " " . $this->apellido;
	}
}
//Crear una persona
$per = new Persona("11111111A", "Ana", "Puertas");
//Mostrarla
echo $per . "<br>";
//Cambiar el apellido
$per->setApellido("Montes");
//Volver a mostrar
echo $per . "<br>";
?>

</body>
</html>

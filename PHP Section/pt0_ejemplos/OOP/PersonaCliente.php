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
class Cliente extends Persona {
	private $saldo = 0;
	function __construct($DNI, $nombre, $apellido, $saldo) {
		parent::__construct($DNI, $nombre, $apellido);
		$this->saldo = $saldo;
	}
	public function getSaldo() {
		return $this->saldo;
	}
	public function setSaldo($saldo) {
		$this->saldo = $saldo;
	}
	public function __toString() {
		return "Cliente: " . $this->getNombre();
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
//Crear Cliente
$cli = new Cliente("22222245A", "Pedro", "Sales", 100);
//Mostrar
echo $cli . "<br>";
?>

</body>
</html>

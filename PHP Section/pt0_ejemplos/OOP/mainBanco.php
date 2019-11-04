<?php
require_once 'ClasesBanco.php';
/*
 * clase para simular las cuentas de un Banco
 * @property $cuentas. Array de cuentas.
 */ 
class Banco {
    //propiedades
    private $cuentas;
    //los intereses los establece el banco
    private $interesFijo;
    private $interesVariable;
    public static $interesVariableSimulado; //Nuevo interes variable al paso de un mes
    
    //constructor
    public function __construct() {
        $this->cuentas = [];
        $this->interesFijo = rand(5, 10) / 10;
        $this->interesVariable = rand(-15, 15) / 10;
    }
    
    //getters y setters para los intereses
    public function getInteresFijo() {return $this->interesFijo;}
    public function setInteresFijo(float $InteresFijo) {$this->interesFijo = $interesFijo;}
    
    public function getInteresVariable() {return $this->interesVariable;}
    public function setInteresVariable(float $interesVariable) {$this->interesVariable = $interesVariable;}
    
    public static function getInteresVariableSimulado() {return self::$interesVariableSimulado;}
    public static function setInteresVariableSimulado() {self::$interesVariableSimulado = rand(-15, 15) / 10;}
    
    /**
     * Añade cuentas válidas que no estén ya en el array
     * @param &$cuenta. Cuenta. Por referencia para poderla borrar si no es válida o ya está.
     */
    public function añadirCuenta(Cuenta &$cuenta) {
        if ($cuenta->getEsValida() === false) $cuenta = null; //se borra
        elseif ($this->buscar($cuenta) === false) $this->cuentas[] = $cuenta; //se añade
        else echo '<br>' . 'La cuenta ya existe con ese número de cuenta: no se añade (revise)' . '<br>';
        //En este último caso no se borra por si se ha intentado añadir la misma cuenta varias veces.
    }
    
    /**
     * Borra aquella/s cuenta/s del banco que tiene/n el mismo número de cuenta que la cuenta pasada.
     * @param &$cuentaBorrar. Por referencia. Borra el parámetro siempre
     */
    public function borrarCuenta(Cuenta &$cuentaBorrar) {
        $borrada = false;
        foreach ($this->cuentas as &$cuenta)
            if ($cuenta->getNCuenta() === $cuentaBorrar->getNCuenta()) {
                $cuenta = null;
                echo '<br>' . 'Cuenta borrada!' . '<br>';
                $borrada = true;
            }
        $this->cuentas = array_filter($this->cuentas); //quita nulos  
        if ($borrada === false) echo '<br>' . 'No existe ninguna cuenta: ' . $cuentaBorrar->getNCuenta() . '<br>';
        $cuentaBorrar = null; //no está de más cargarse esta cuenta
    }
    
    /**
     * Imprime las distintas cuentas del banco
     */
    public function imprimir() {
        echo '<br>' . '----CUENTAS DEL BANCO----' . '<br>';
        foreach ($this->cuentas as $cuenta){
            echo $cuenta->imprimir();
        }
    }
    
    /**
     * método que busca un número de cuenta y retorna la cuenta
     * @param $nCuenta. String.
     * @return Cuenta. El objeto correspondiente o null si no existe
     */
    public function obtenerCuenta(string $nCuenta) {
        foreach($this->cuentas as $cuenta)
            if ($cuenta->getNCuenta() === $nCuenta) return $cuenta;
        return null;
    }
    
    /**
     * método que devuelve true/false si el número de cuenta ya está/no está en el array de cuentas.
     * @param $cuentaBuscada. Cuenta. Cuenta a buscar
     * @return bool.
     */
    private function buscar(Cuenta $cuentaBuscada): bool {
        foreach($this->cuentas as $cuenta)
            if ($cuentaBuscada->getNCuenta() === $cuenta->getNCuenta()) return true;
        return false;
    }
    
}

$miBanco = new Banco();

$cuentaJoven1 = new CuentaJoven("Juan Ignacio Febrer", "CJ-123-123-1111", 25.5, "03-02-1969");
echo $cuentaJoven1->imprimir();

$miBanco->añadirCuenta($cuentaJoven1);
$miBanco->imprimir();

$cuentaJoven2 = new CuentaJoven("Pepito", "CJ-123-123-1112" , 25.5, "03-05-2020");
echo $cuentaJoven2->imprimir();

$miBanco->añadirCuenta($cuentaJoven2); //La borra por inválida
$miBanco->imprimir();
//echo $cuentaJoven2->imprimir(); //null

$cuentaJoven3 = new CuentaJoven("Aprobaré DWES", "CJ-123-123-1113", 5000, "01-10-2019");
echo $cuentaJoven3->imprimir();

$miBanco->añadirCuenta($cuentaJoven3);
$miBanco->imprimir();

$miBanco->borrarCuenta($cuentaJoven1);
$miBanco->imprimir();
//print_r($miBanco);

$cuentaJoven4 = new CuentaJoven("Estudio mucho DWES", "CJ-123-123-1114", 500, "01-10-2018");
echo $cuentaJoven4->imprimir();
$miBanco->borrarCuenta($cuentaJoven4);
// echo $cuentaJoven4->imprimir(); //null
$miBanco->imprimir();

$cuentaJoven1 = new CuentaJoven("Juan Ignacio Febrer", "CJ-123-123-1111", 25.5, "03-02-1969");
$miBanco->añadirCuenta($cuentaJoven1);
$miBanco->imprimir();

if ($cuentaJoven3->transferencia(2565.5, "CJ-123-123-1111", $miBanco) === false)
    echo '<br>' . 'No se realizó la transferencia' . '<br>';
$miBanco->imprimir();

if ($cuentaJoven3->transferencia(3565.5, "CJ-123-123-1111", $miBanco) === false)
    echo '<br>' . 'No se realizó la transferencia' . '<br>';
$miBanco->imprimir();

if ($cuentaJoven3->transferencia(2565.5, "CJ-123-123-NOEXISTE", $miBanco) === false)
    echo '<br>' . 'No se realizó la transferencia' . '<br>';
$miBanco->imprimir();

$cuentaJoven1->pagoTarjeta(100.0);
echo $cuentaJoven1->imprimir();

$cuentaJoven3->pagoTarjeta(100.0);
echo $cuentaJoven3->imprimir();

$cuentaNomina1 = new CuentaNomina("Currito", "CN-123-123-1111", 15000, "indefinido");
$cuentaNomina2 = new CuentaNomina("A veces curro", "CN-123-123-1112", 4500, CuentaNomina::TEMPORAL);
$cuentaNomina3 = new CuentaNomina("NiNi", "CN-123-123-1113", 100, "NINI");
$miBanco->añadirCuenta($cuentaNomina1);
$miBanco->añadirCuenta($cuentaNomina2);
$miBanco->añadirCuenta($cuentaNomina3);
$miBanco->imprimir();

//probar transferencias, ingresos, extracciones y pagos tarjeta
if ($cuentaNomina1->transferencia(1000.70, "CN-123-123-1111", $miBanco) === false)
    echo '<br>' . 'No se realizó la transferencia' . '<br>';
$miBanco->imprimir();

if ($cuentaNomina1->transferencia(5000.70, "CJ-123-123-1111", $miBanco) === false)
    echo '<br>' . 'No se realizó la transferencia' . '<br>';
$miBanco->imprimir();

if ($cuentaNomina1->transferencia(1000, "CN-123-123-1112", $miBanco) === false)
    echo '<br>' . 'No se realizó la transferencia' . '<br>';
$miBanco->imprimir();

$cuentaNomina2->pagoTarjeta(6154.85);
$miBanco->imprimir();

$cuentaNomina1->pagoTarjeta(5000.70);
$miBanco->imprimir();

//Le hacen fishing y le clonan la SIM
while ($cuentaNomina1->extraer(50.0) !== false);
$miBanco->imprimir();

$cuentaAhorroF1 = new CuentaAhorro("Poquet a poquet", "CA-123-123-1111", 10000, CuentaAhorro::FIJO, $miBanco->getInteresFijo(), "01-07-2018", 5);
$miBanco->añadirCuenta($cuentaAhorroF1);
$miBanco->imprimir();
$cuentaAhorroF1->simulacionInteres(12);

$cuentaAhorroF2 = new CuentaAhorro("Ahorrador 2", "CA-123-123-1112", 5000, CuentaAhorro::FIJO, $miBanco->getInteresFijo(), "05-10-2016", 2);
$miBanco->añadirCuenta($cuentaAhorroF2);
$miBanco->imprimir();

$cuentaAhorroV1 = new CuentaAhorro("Poquet a poquet variable", "CA-123-123-1113", 10000, CuentaAhorro::VARIABLE, $miBanco->getInteresVariable(), "01-09-2017", 5);
$miBanco->añadirCuenta($cuentaAhorroV1);
$miBanco->imprimir();
$cuentaAhorroV1->simulacionInteres(12);

$miBanco->añadirCuenta($cuentaAhorroF2); //no se añade por repetida
$miBanco->imprimir();

$cuentaAhorroF1->actualizarIntereses();

//revisar
$cuentaAhorroV1->actualizarIntereses();

$cuentaAhorroF2->actualizarIntereses();
if ($cuentaAhorroF2->extraer(5500) === false) echo '<br>' . 'No se pudo extraer 5500' . ' por algún motivo' . '<br>';
if ($cuentaAhorroF2->extraer(5050) === false) echo '<br>' . 'No se pudo extraer 5050' . ' por algún motivo' . '<br>';
$miBanco->imprimir();

$cuentaAhorroF1->ingresar(20000);

$miBanco->imprimir();


?>
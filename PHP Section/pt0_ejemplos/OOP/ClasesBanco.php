<?php

//primero ajustamos la zona horaria
if (date_default_timezone_get() !== 'Europe/Madrid') {
	date_default_timezone_set('Europe/Madrid');
}
//Ponemos formato local para fechas
//Para ver locales instalados en el terminal: locale -a
setlocale(LC_ALL, "es_ES.utf8");

/**
 * Clase cuenta
 * @property $dueño. String. Nombre y Apellidos
 * @property nCuenta. String de caracteres numéricos.
 * @property saldo. float.
 */
abstract class Cuenta {
    //Propiedades
    private $dueño;
    private $nCuenta;
    private $saldo;
    private $esValida = true;
    
    //Constructor
    public function __construct(string $dueño, string $nCuenta, float $saldo) {
        try {
            //con que haya una cadena no vacía $dueño y $cuenta se dan por buenas
            if (Empty($dueño)) {
               $this->esValida = false;
               $this->dueño = '--INVALIDO--';
               throw new Exception('Parámetro $dueño no válido');
            } else {
               $this->dueño = $dueño;
            }
            if (Empty($nCuenta)) {
               $this->esValida = false;
               $this->nCuenta = '--INVALIDO--';
               throw new Exception('Parámetro $nCuenta no váĺido');
            } else {
               $this->nCuenta = $nCuenta;
            }
            
            //los saldos negativos al crear una cuenta se ponen a cero
            if ($saldo < 0.0) $saldo = 0.0;
            $this->saldo = $saldo;
            
        } catch (Exception $e) {
            echo '<br>' . 'Excepción: ' . $e->getMessage() . '<br>';
            echo 'La cuenta no se añadirá al banco!' . '<br>';
        }
    }
    
    //Getters y setters
    public function getDueño() {return $this->dueño;}
    public function setDueño(string $dueño) {$this->dueño = $dueño;}
    
    public function getNCuenta() {return $this->nCuenta;}
    public function setNCuenta(string $nCuenta) {$this->nCuenta = $nCuenta;}
    
    public function getSaldo() {return $this->saldo;}
    public function setSaldo(float $saldo) {$this->saldo = $saldo;}
    
    public function getEsValida() {return $this->esValida;}
    public function setEsValida(bool $esValida) {$this->esValida = $esValida;}
    
    //Métodos abstractos
    abstract public function ingresar(float $dinero):bool;
    abstract public function extraer(float $dinero):bool;
    abstract public function imprimir():string;
    
}

/**
 * clase CuentaJoven
 * @property fNac. String con formato %d-%m-%Y. Para saber la edad
 * 
 */
class CuentaJoven extends Cuenta {
    //Propiedades
    private $fNac;
    
    //Constructor
    public function __construct(string $dueño, string $nCuenta, float $saldo, string $fNac) {
        parent::__construct($dueño, $nCuenta, $saldo);
        try {
            if ($this->fechaValida($fNac) === false) {
               //$this->esValida = false; //Ha de ser protected ...
               $this->setEsValida(false);
               $this->fNac = '--INVALIDO--';
               throw new Exception("Fecha no válida");
            } else {
               $this->fNac = $fNac;
            }
        }catch (Exception $e) {
            echo '<br>' .'Excepción: ' . $e->getMessage() . '<br>';
            echo 'La cuenta no se añadirá al banco!' . '<br>';
        }
   }
   
   //Getters y setters
   public function getFNac() {return $this->fNac;}
   public function setFNac(DateTime $fNac) {$this->fNac = $fNac;}
   
   
   //Métodos
   /**
    * Valida una fecha para el banco:
    * fecha válida:
    *    formato correcto
    *    existe
    *    es inferior al momento actual
    * @param $ddmmaaaa. String: %a-$m%-%Y
    * @return bool. Correcta/incorrecta
    */
   private function fechaValida(string $ddmmaaaa):bool {
    
      //DateTime::createFromFormat corrige las fechas incorrectas y las guarda
      //Pej. 2018-2-29 (no bisiesto)-> 2018-3-1 (corregido) 
      $date = DateTime::createFromFormat('d-m-Y', $ddmmaaaa);
    
      //si no puede corregir retorna false
      if ($date !== false) {
          $cadenaFechaDateTime = strftime('%d-%m-%Y', $date->getTimestamp());
      } else {
          return false;
      }
      
      //comparamos la cadena del parámetro con la generada por DateTime
      $correcta = (!strcmp($cadenaFechaDateTime, $ddmmaaaa))?true:false;
      
      //no se considera una fecha válida si es mayor que el instante actual
      if ($correcta === true) return ($date < new DateTime());
      return $correcta;
   }
   
   /*
    * Transferir una cantidad a otra cuenta.
    * Se entiende que puede ser cualquier tipo de cuenta.
    * No se permiten números rojos
    * @param $cantidad. Float. Cantidad a transferir.
    * @param $nCuenta. String. Cuenta bancaria.
    * @param $banco. instancia clase Banco. Alternativa usar método estático de clase Banco.
    * @return bool. true éxito, false fallida.
    */
   public function transferencia(float $cantidad, string $nCuenta, Banco $entidad):bool {
        if ($cantidad <= 0) return false; 
        //comprobar si existe la cuenta 
        if (is_null($cuentaDestino = $entidad->obtenerCuenta($nCuenta))) return false;
        //comprobar si hay suficiente dinero
        if ($cantidad > $this->getSaldo()) return false;
        //transferencia
        if ($this->extraer($cantidad) === true) {
            if ($cuentaDestino->ingresar($cantidad) === true) return true;
        }
        return false; //en teoría nunca debe llegar aquí
   }
   
   /*
    * Si dueño.edad < 25 años -> dto 3%
    * Si dueño.edad >=25 y <=30 -> dto 1%
    * En otro caso no hay descuento
    */
   public function pagoTarjeta(float $cantidad) {
        $años = $this->calcularEdad(); 
        if ($años < 25) {
            //descuento 3%
            echo '<br>' . 'EDAD: ' . $años . ' Descuento:  ' . ($cantidad * 0.03) . '<br>';
            $cantidad *= 0.97;
        }
        if ($años >= 25 && $años <= 30) {
            //descuento 1%
            echo '<br>' . 'EDAD: ' . $años . ' Descuento:  ' . ($cantidad * 0.01) . '<br>';
            $cantidad *= 0.99;
        }
        if ($años > 30) {
            //sin descuento
            echo '<br>' . 'EDAD: ' . $años . ' Descuento:  ' . ($cantidad * 0.0) . '<br>';
        }
        if ($this->extraer($cantidad) === false) echo '<br>' . 'SALDO INSUFICIENTE-> PAGO NO REALIZADO' . '<br>';
   }
   
   /**
    * función que calcula la edad del dueño de la cuenta
    * a partir de la fecha de nacimiento.
    * @return DateInterval->format(%y). String equivalente a los años.
    */
   private function calcularEdad():string {
      $date = DateTime::createFromFormat("d-m-Y", $this->fNac);
      return $date->diff(new DateTime)->format("%Y");
   }
   
   /**
    * función que insgresa una cierta cantidad en la cuenta
    * @param $cantidad. Float.
    * @return boolean. true ok, false no ok.
    */
   public function ingresar(float $cantidad):bool {
      if ($cantidad <= 0) return false;
      $this->setSaldo($this->getSaldo() + $cantidad);
      return true;
   }
   
   /**
    * función que extrae cierta cantidad de la cuenta. No permite números rojos
    * @param $cantidad. Float. Cantidad a extraer.
    * @return boolean. Extrae y no números rojos: true. No extrae por que no hay suficiente: false.
    */
   public function extraer(float $cantidad):bool {
      if ($cantidad <= 0) return false;
      //No hay suficiente dinero
      if ($cantidad > $this->getSaldo()) return false;
      $this->setSaldo($this->getSaldo() - $cantidad);
      return true;
   }
   
   //OJO: Las propiedades heredadas del padre se deben acceder mediante getters
   public function imprimir():string {
        $str = '--Cuenta Joven-- ' . '<br>';
        $str .= 'Dueño: ' . $this->getDueño() . '<br>';
        $str .= 'Número de cuenta: ' . $this->getNCuenta() . '<br>';
        $str .= 'Saldo: ' . $this->getSaldo() . '<br>';
        $str .= 'Fecha de nacimiento: ' . $this->fNac . '<br>';
        return $str;
   }
}

/**
 * clase CuentaNomina
 * @property trabajo. String. Temporal o indefinido
 */
class CuentaNomina extends Cuenta {
    const TEMPORAL = 'temporal';
    const INDEFINIDO = 'indefinido';
    
    //Propiedades
    private $trabajo;
    
    //Constructor
    public function __construct(string $dueño, string $nCuenta, float $saldo, string $trabajo) {
        parent::__construct($dueño, $nCuenta, $saldo);
        try {
            if ($trabajo !== self::TEMPORAL && $trabajo !== self::INDEFINIDO) {
               $this->setEsValida(false);
               $this->trabajo = '--INVALIDO--';
               throw new Exception("Tipo de trabajo no válido");
            } else {
               $this->trabajo = $trabajo;
            }
        }catch (Exception $e) {
            echo '<br>' .'Excepción: ' . $e->getMessage() . '<br>';
            echo 'La cuenta no se añadirá al banco!' . '<br>';
        }
    }
    
    //Getters y setters
    public function getTrabajo() {return $this->trabajo;}
    public function setTrabajo(string $trabajo) {$this->trabajo = $trabajo;}
    
    //Métodos
    /*
    * Transferir una cantidad a otra cuenta.
    * Se entiende que puede ser cualquier tipo de cuenta.
    * No se permiten números rojos
    * @param $cantidad. Float. Cantidad a transferir.
    * @param $nCuenta. String. Cuenta bancaria.
    * @param $banco. instancia clase Banco. Mejora: usar método estático de Banco y no hace falta pasar un parámetro tan pesado
    * @return bool. true éxito, false fallida.
    */
   public function transferencia(float $cantidad, string $nCuenta, Banco $entidad):bool {
        //comprobar si existe la cuenta 
        if (is_null($cuentaDestino = $entidad->obtenerCuenta($nCuenta))) return false;
        //comprobar si hay suficiente dinero (números rojos hasta 100)
        if ($cantidad > $this->getSaldo() + 100) return false;
        //transferencia
        if ($this->extraer($cantidad) === true) {
            if ($cuentaDestino->ingresar($cantidad) === true) return true;
        }
        return false; //en teoría nunca debe llegar aquí
   }
    /*
     * Si trabajo = indefinido -> dto 2%
     */
    public function pagoTarjeta(float $cantidad) { 
      
        if ($this->getTrabajo() === self::INDEFINIDO) {
            //descuento 2%
            echo '<br>' . 'TRABAJO: ' . self::INDEFINIDO . ' Descuento:  ' . ($cantidad * 0.02) . '<br>';
            $cantidad *= 0.98;
        } else {
            //en otro caso no hay descuento
            echo '<br>' . 'TRABAJO: ' . $this->getTrabajo() . ' SIN Descuento.' . '<br>';
        }
        
        if ($this->extraer($cantidad) === false) echo '<br>' . 'SALDO INSUFICIENTE-> PAGO NO REALIZADO' . '<br>';
   }
    
    /**
     * función que ingresa una cierta cantidad en la cuenta
     * @param $cantidad. Float.
     * @return boolean. true ok, false no ok.
     */
    public function ingresar(float $cantidad):bool {
         //por si las moscas;
         if ($cantidad <= 0) return false;
         
         $this->setSaldo($this->getSaldo() + $cantidad);
         return true;
    }
   
    /**
     * función que extrae cierta cantidad de la cuenta. Permite números rojos hasta 100
     * @param $cantidad. Float. Cantidad a extraer.
     * @return boolean. Extrae y no números rojos (superiores a 100): true.
     * No extrae por que no hay suficiente (o se pasa el límite): false.
     */
    public function extraer(float $cantidad):bool {
         //Por si las moscas ...
         if ($cantidad <= 0) return false;
         
         //No hay suficiente dinero
         if ($cantidad > $this->getSaldo() + 100) return false;
         $this->setSaldo($this->getSaldo() - $cantidad);
         return true;
    }
    
    public function imprimir():string {
        $str = '--Cuenta Nómina-- ' . '<br>';
        $str .= 'Dueño: ' . $this->getDueño() . '<br>';
        $str .= 'Número de cuenta: ' . $this->getNCuenta() . '<br>';
        $str .= 'Saldo: ' . $this->getSaldo() . '<br>';
        $str .= 'Tipo trabajo: ' . $this->getTrabajo() . '<br>';
        return $str;
    }
    
}

//NOTA: si la clase CuentaAhorro se divide en dos queda mejor y más sencillo ...
//Lo hago así por puro reto ...
/**
 * clase CuentaAhorro
 * @property $tipoInteres. String. Fijo o variable
 * @property $interes. float.
 * @property $interesAcumulado. float.
 * @property fechaApertura.%d-%m-%Y String. Anterior o igual al día de hoy.
 * @property tiempoInmovilizado. Integer. En años enteros (de 1 a 5 años) 
 */
class CuentaAhorro extends Cuenta {
    
    const FIJO = "fijo";
    const VARIABLE = "variable";
    
    //Propiedades
    private $tipoInteres;
    private $interes; //anual
    private $interesAcumulado = 0.0; //para ver el interés acumulado
    private $fechaApertura;
    private $tiempoInmovilizado;
    private $premiado = false;
    
    //Constructor
    /*
     * interés fijo [0.5 .. 1.0]
     * interés variable [-1.5 y +1.5]
     * Se supone que todo el saldo está inmovilizado (para ahorro)
     * Los intereses los decide el banco.
     */
    public function __construct(string $dueño, string $nCuenta, float $saldo,
                                 string $tipoInteres, float $interes, string $fechaApertura,
                                 int $tiempoInmovilizado) {
         parent::__construct($dueño, $nCuenta, $saldo);
         try {
            if ($tipoInteres !== self::FIJO && $tipoInteres !== self::VARIABLE) {
               $this->setEsValida(false);
               $this->tipoInteres = '--INVALIDO--';
               throw new Exception("Tipo de interés no válido");
            } else {
               $this->tipoInteres = $tipoInteres;
            }
            
            $this->interes = $interes;
            //Se supone que la fecha de apertura es la de crear la cuenta, no obstante se recoge por flexibilidad
            
            if ($this->fechaValida($fechaApertura) === false) {
                  $this->setEsValida(false);
                  $this->fechaApertura = '--INVALIDO--';
                  throw new Exception("Fecha de apertura no válida");
               
            } else {
                  $this->fechaApertura = $fechaApertura;
            }
            
            if ($tiempoInmovilizado < 1 or $tiempoInmovilizado > 5) {
                  $this->setEsValida(false);
                  $this->tiempoInmovilizado = 0;
                  throw new Exception("Tiempo inmovilizado no válido");
            }
            $this->tiempoInmovilizado = $tiempoInmovilizado;
            
        }catch (Exception $e) {
            echo '<br>' .'Excepción: ' . $e->getMessage() . '<br>';
            echo 'La cuenta no se añadirá al banco!' . '<br>';
        }
         
    }
    
    // Getters y setters
    public function getTipoInteres() {return $this->tipoInteres;}
    public function setTipoInteres($tipoInteres) {$this->tipoInteres = $tipoInteres;}
    
    public function getInteres() {return $this->interes;}
    public function setInteres(float $interes) {$this->interes = $interes;}
    
    public function getFechaApertura() {return $this->fechaApertura;}
    public function setFechaApertura(string $fechaApertura) {$this->fechaApertura = $fechaApertura;}
    
    public function getTiempoInmovilizado() {return $this->tiempoInmovilizado;}
    public function setTiempoInmovilizado(int $tiempoInmovilizado) { $this->tiempoInmovilizado = $tiempoInmovilizado; }
    
    //Métodos
    /**
    * Valida una fecha para el banco:
    * fecha válida:
    *    formato correcto
    *    existe
    *    es inferior o igual a la fecha de hoy
    * @param $ddmmaaaa. String: %a-$m%-%Y
    * @return bool. Correcta/incorrecta
    */
   private function fechaValida(string $ddmmaaaa):bool {
    
      //DateTime::createFromFormat corrige las fechas incorrectas y las guarda
      //Pej. 2018-2-29 (no bisiesto)-> 2018-3-1 (corregido) 
      $date = DateTime::createFromFormat('d-m-Y', $ddmmaaaa);
    
      //si no puede corregir retorna false
      if ($date !== false) {
          $cadenaFechaDateTime = strftime('%d-%m-%Y', $date->getTimestamp());
      } else {
          return false;
      }
      
      //comparamos la cadena del parámetro con la generada por DateTime
      $correcta = (!strcmp($cadenaFechaDateTime, $ddmmaaaa))?true:false;
      
      //no se considera una fecha válida si es mayor que %d-%m-%Y actual
      if ($correcta === true) {
         //para comparar ponemos HH:MM:SS a 00:00:00
         $date->setTime(0,0,0);
         $today = new DateTime(); $today->setTime(0,0,0);
         return $date <= $today;
      }
      return $correcta;
   }
   
    /*
     * Simulación de intereses
     * Si los intereses son mayores a 100€ el banco regala un 1€.
     * Los intereses se calculan por meses.
     * En las cuentas con interés variable cada mes se ajusta el interés.
     */
    public function simulacionInteres(int $meses) {
         if ($this->tipoInteres === self::FIJO) echo $this->fijo($meses);
         if ($this->tipoInteres === self::VARIABLE) echo $this->variable($meses);
    }
    private function fijo(int $meses):string {
         //pasamos el interés a mensual
         $mensual = $this->interes / (12*100);
         echo '<br>' . $mensual . '<br>';
         $acumulado = 0.0;
         $saldo = $this->getSaldo();
         $str = $this->imprimir();
         $str .= '<br>' . '----SIMULACIÓN ' . $meses . ' MESES----' . '<br>';
         for ($i = 1; $i <= $meses; ++$i) {
               $interesMes = $saldo * $mensual;
               $saldo += $interesMes;
               $acumulado += $interesMes;
               $str .= 'Mes ' . $i . ': saldo-->' . $saldo . ' interes-->' . $interesMes . ' interes acumulado->' . $acumulado . '<br>';
         }
         if ($acumulado > 100) $str .= '+ 1 Euro por ahorrador' . '<br>';
         return $str;
    }
    
    private function variable(int $meses):string {
         //pasamos el interés a mensual
         $mensual = $this->interes / (12*100);
         echo '<br>' . $mensual . '<br>';
         $acumulado = 0.0;
         $saldo = $this->getSaldo();
         $str = $this->imprimir();
         $str .= '<br>' . '----SIMULACIÓN ' . $meses . ' MESES----' . '<br>';
         for ($i = 1; $i <= $meses; ++$i) {
               $interesMes = $saldo * $mensual;
               $saldo += $interesMes;
               $acumulado += $interesMes;
               $str .= 'Mes ' . $i . ': saldo-->' . $saldo . ' interes-->' . $interesMes . ' interes acumulado->' . $acumulado . '<br>';
               //para el tipo variable cada mes es un tipo diferente
               Banco::setInteresVariableSimulado();
               $mensual = Banco::getInteresVariableSimulado() / (12 * 100);
         }
         if ($acumulado > 100) $str .= '+ 1 Euro por ahorrador' . '<br>';
         return $str;
    }
    
    /**
     * Pone en interesAcumulado los intereses correspondientes desde la fecha de apertura hasta la fecha de hoy.
     * Los intereses se calculan en periodos de meses enteros
     */
    public function actualizarIntereses() {
         if ($this->tipoInteres === self::FIJO) $this->actualizarInteresesFijo();
         if ($this->tipoInteres === self::VARIABLE) $this->actualizarInteresesVariable();
    }
    
    private function actualizarInteresesFijo() {
         
         //calcular el número de meses desde la fecha de apertura hasta hoy
         $date = new DateTime();
         $dateFechaApertura = DateTime::createFromFormat("d-m-Y", $this->fechaApertura);
         $intervaloMeses = $dateFechaApertura->diff($date);
         $meses = $intervaloMeses->format("%m");
         $años = $intervaloMeses->format("%y");
         echo '<br>' . $años . '<br>';
         $meses = (int) $años * 12 + (int) $meses;
         echo '<br>' . $meses . '<br>';
         
         
         //pasamos el interés a mensual
         $mensual = $this->interes / (12*100);
         
         //echo '<br>' . $mensual . '<br>';
         $acumulado = 0.0;
         $saldo = $this->getSaldo();
         $str = $this->imprimir();
         $str .= '<br>' . '----SIMULACIÓN ' . $meses . ' MESES----' . '<br>';
         for ($i = 1; $i <= $meses; ++$i) {
               $interesMes = $saldo * $mensual;
               $saldo += $interesMes;
               $acumulado += $interesMes;
               $str .= 'Mes ' . $i . ': saldo-->' . $saldo . ' interes-->' . $interesMes . ' interes acumulado->' . $acumulado . '<br>';
         }
         
         //premio por ahorrador
         if ($acumulado > 100 && $this->premiado === false) {
               $str .= '+ 1 Euro por ahorrador' . '<br>';
               $this->premiado = true;
               $acumulado += 1;
         }
         echo $str;
         $this->interesAcumulado = $acumulado;
         
         echo '<br>' . '--INTERESES FIJO--' . '<br>';
         echo $this->imprimir();
      
    }
    
    private function actualizarInteresesVariable() {
      
         //calcular el número de meses desde la fecha de apertura hasta hoy
         $date = new DateTime();
         $dateFechaApertura = DateTime::createFromFormat("d-m-Y", $this->fechaApertura);
         $intervaloMeses = $dateFechaApertura->diff($date);
         $meses = $intervaloMeses->format("%m");
         $años = $intervaloMeses->format("%y");
         //echo '<br>' . $años . '<br>';
         $meses = (int) $años * 12 + (int) $meses;
         //echo '<br>' . $meses . '<br>';
         
         
         //pasamos el interés a mensual
         $mensual = $this->interes / (12*100);
         
         //echo '<br>' . $mensual . '<br>';
         $acumulado = 0.0;
         $saldo = $this->getSaldo();
         $str = $this->imprimir();
         $str .= '<br>' . '----SIMULACIÓN ' . $meses . ' MESES----' . '<br>';
         for ($i = 1; $i <= $meses; ++$i) {
               $interesMes = $saldo * $mensual;
               $saldo += $interesMes;
               $acumulado += $interesMes;
               $str .= 'Mes ' . $i . ': saldo-->' . $saldo . ' interes-->' . $interesMes . ' interes acumulado->' . $acumulado . '<br>';
               //para el tipo variable cada mes es un tipo diferente
               Banco::setInteresVariableSimulado();
               $mensual = Banco::getInteresVariableSimulado() / (12 * 100);
         }
         
         //premio por ahorrador
         if ($acumulado > 100 && $this->premiado === false) {
               $str .= '+ 1 Euro por ahorrador' . '<br>';
               $this->premiado = true;
               $acumulado += 1;
         }
         
         echo $str;
         
         //actualiza el interés del último mes
         $this->interes = Banco::getInteresVariableSimulado();
         
         //actualiza el acumulado 
         $this->interesAcumulado = $acumulado;
         
         echo '<br>' . '--INTERESES VARIABLE--' . '<br>';
         echo $this->imprimir();    
      
    }
    
    /*
     * Actualiza intereses lo primero.
     * Se ingresa:
     *   Se suman los intereses acumulados al saldo y se resetea el interes acumulado
     *   Se ingresa
     *   La cuenta sigue generando intereses pero se cambia la fecha de apertura a la fecha actual
     *      Interes FIJO: el mismo
     *      Interés VARIABLE: se consulta y se obtiene del banco.
     *   El periodo de inmovilización se mantiene ya que al haber nuevo dinero este ha de estar inmovilizado el tiempo
     *   contratado. Se podría restar el tiempo transcurrido al periodo de inmovilización pero al final me quedo con
     *   esta decisión de diseño. En el mundo real los cálculos son más complejos.
     * @param $cantidad. Float. Cantidad a ingresar.
     * @return bool. Ingreso con éxito -> true (siempre). False en caso contrario.
     */
    public function ingresar(float $cantidad):bool {
         //tonto pero hay que hacerlo
         if ($cantidad <= 0) return false;
         
         //actualiza intereses
         $this->premiado = false; //Calcula desde el principio ... se resetea premiado
         $this->actualizarIntereses();
         
         $this->setSaldo($this->getSaldo() + $this->interesAcumulado); //sumo intereses
         $this->interesAcumulado = 0.0; //reseteo interesAcumulado
         
         //obtener fecha actual
         $date = new DateTime();
         //poner fechaApertura a fecha actual
         $this->fechaApertura = strftime("%d-%m-%Y", $date->getTimestamp());
         
         //para las cuentas tipo de interés VARIABLE
         if ($this->tipoInteres === self::VARIABLE) {
               Banco::setInteresVariableSimulado();
               $this->interes = Banco::getInteresVariableSimulado();
         }
               
         $this->setSaldo($this->getSaldo() + $cantidad); //ingreso
                  
         return true;
    }
    
    /*
     * Actualiza intereses se pueda o no extraer.
     * El banco no permite extraer de las cuentas de ahorro hasta que transcurra el periodo
     * de inmovilización.
     * Transcurrido el periodo de inmovilización se puede extraer si hay dinero suficiente:
     *   Se suman los intereses acumulados al saldo y se resetea el interés acumulado
     *   Se extrae
     *   La cuenta sigue generando intereses pero se cambia el la fecha de apertura a la fecha actual
     *      Interés FIJO: el mismo.
     *      Interés VARIABLE: se consulta y se obtiene del banco.
     *   El periodo de inmovilización se pone a 0 (ya se puede extraer siempre)
     * @param $cantidad. Float. Cantidad a extraer.
     * @return bool. True extracción exitosa. False extracción sin éxito.
     */
    public function extraer(float $cantidad):bool {
         //tonto pero hay que hacerlo
         if ($cantidad <= 0) return false;
         
         //actualiza intereses
         $this->premiado = false; //Calcula desde el principio ... se resetea premiado
         $this->actualizarIntereses();
         
         //antes que nada comprobar si hay dinero
         if ($this->getSaldo() + $this->interesAcumulado < $cantidad) return false;
         
         //obtener fecha actual
         $date = new DateTime();
         //obtener fecha apertura
         $dateFechaApertura = DateTime::createFromFormat("d-m-Y", $this->fechaApertura);
         
         if ($dateFechaApertura->add(new DateInterval('P'.$this->tiempoInmovilizado.'Y')) < $date) {
               //se puede extraer
               $this->setSaldo($this->getSaldo() + $this->interesAcumulado); //sumo intereses
               $this->interesAcumulado = 0.0; //reseteo interes acumulado
               $this->setFechaApertura(strftime("%d-%m-%Y", $date->getTimestamp())); //cambio fecha de apertura
               $this->tiempoInmovilizado = 0; //pasado el periodo de inmovilización se puede extraer siempre
               
               //para las cuentas tipo deinterés VARIABLE
               if ($this->tipoInteres === self::VARIABLE) {
                     Banco::setInteresVariableSimulado();
                     $this->interes = Banco::getInteresVariableSimulado();
               }
               
               $this->setSaldo($this->getSaldo() - $cantidad); //extracción
         } else { //No se puede extraer
               return false;
         }
         
         return true;
    }
    
    /* Método estático que compara cuentas:
     * @param $c1. CuentaAhorro.
     * @param $c2. CuentaAhorro.
     * @return -1 (interés c1 mejor), 0 (intereses iguales), 1(interés c2 mejor)
     */
    static public function compararCuentas(CuentaAhorro $c1, CuentaAhorro $c2):int {
        if ($c1->interes > $c2->interes) return -1;
        if ($C1->interes < $c2->interes) return 1;
        return 0;
    }
    
    public function imprimir():string {
         $str = '--Cuenta Ahorro-- ' . '<br>';
         $str .= 'Dueño: ' . $this->getDueño() . '<br>';
         $str .= 'Número de cuenta: ' . $this->getNCuenta() . '<br>';
         $str .= 'Saldo: ' . $this->getSaldo() . '<br>';
         $str .= 'Tipo de interés: ' . $this->tipoInteres . '<br>';
         $str .= 'Interés: ' . $this->interes . '<br>';
         $str .= 'Fecha de apertura: ' . $this->fechaApertura . '<br>';
         $str .= 'Interés acumulado: ' . $this->interesAcumulado . '<br>';
         $str .= 'Tiempo inmovilizado: ' . $this->tiempoInmovilizado . '<br>';
         return $str;
   }    
}
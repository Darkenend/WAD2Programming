<?php

abstract class Cuenta
{
    /** @var string */
    private $owner_name;
    /** @var string */
    private $account_number;
    /** @var float */
    private $balance;
    /** @var string */
    private $account_type;

    /**
     * Ingresa dinero en la cuenta
     * @param float $delta Dinero a ingresar en la cuenta
     */
    public function ingresar(float $delta) {
        $this->setBalance($this->getBalance()+$delta);
    }

    /**
     * @param float $delta
     * @return boole Exito de la operacion
     */
    public function extraer(float $delta) {
        if ($delta > $this->getBalance()) {
            debug_to_console("Current Money: ".$this->getBalance());
            debug_to_console("Delta: ".$delta);
            return false;
        } else {
            $this->setBalance($this->getBalance()-$delta);
            return true;
        }
    }

    abstract function imprimir();

    /**
     * @return string
     */
    public function getOwnerName(): string
    {
        return $this->owner_name;
    }

    /**
     * @param string $owner_name
     */
    public function setOwnerName(string $owner_name): void
    {
        $this->owner_name = $owner_name;
    }

    /**
     * @return string
     */
    public function getAccountNumber(): string
    {
        return $this->account_number;
    }

    /**
     * @param string $account_number
     */
    public function setAccountNumber(string $account_number): void
    {
        $this->account_number = $account_number;
    }

    /**
     * @return float
     */
    public function getBalance(): float
    {
        return $this->balance;
    }

    /**
     * @param float $balance
     */
    public function setBalance(float $balance): void
    {
        $this->balance = $balance;
    }

    /**
     * @return string
     */
    public function getAccountType(): string
    {
        return $this->account_type;
    }

    /**
     * @param string $account_type
     */
    public function setAccountType(string $account_type): void
    {
        $this->account_type = $account_type;
    }
}
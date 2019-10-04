<?php

abstract class Cuenta_Ahorro extends Cuenta
{
    /**
     * @var float
     */
    private $interest_rate;
    /**
     * @var int
     */
    private $months_frozen;

    function modifyCurrentBalance()
    {
        $this->setBalance($this->getBalance() - $this->calculateInterestRate());
    }

    abstract function calculateInterestRate();

    /**
     * This function compares this Cuenta_Ahorro and another one's `$interest_rate`
     * @param Cuenta_Ahorro $other_account Other account
     * @return bool
     */
    function compareInterest(Cuenta_Ahorro $other_account): bool
    {
        if ($other_account->getInterestRate() < $this->getInterestRate()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * This function returns a string with the most important data of the account in a certain order, formatted for a table row in HTML
     * @return string Data of account in a HTML Table Row
     */
    function imprimir()
    {
        return "<tr><td>".$this->getOwnerName()."</td><td>".$this->getAccountNumber()."</td><td>".$this->getAccountType()."</td><td>".$this->getBalance()."€</td><td>".$this->getInterestRate()."%</td></tr>";
    }

    /**
     * @return float
     */
    public function getInterestRate(): float
    {
        return $this->interest_rate;
    }

    /**
     * @param float $interest_rate
     */
    public function setInterestRate(float $interest_rate): void
    {
        $this->interest_rate = $interest_rate;
    }

    /**
     * @return int
     */
    public function getMonthsFrozen(): int
    {
        return $this->months_frozen;
    }

    /**
     * @param int $months_frozen
     */
    public function setMonthsFrozen(int $months_frozen): void
    {
        $this->months_frozen = $months_frozen;
    }
}
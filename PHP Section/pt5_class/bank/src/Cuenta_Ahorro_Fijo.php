<?php
class Cuenta_Ahorro_Fijo extends Cuenta implements Cuenta_Ahorro
{
    /**
     * @var float
     */
    private $interest_rate;
    /**
     * @var int
     */
    private $months_frozen;

    /**
     * Cuenta_Ahorro_Fijo constructor.
     * @param string $owner_name Name of the account owner.
     * @param string $account_number Account's identification number.
     * @param float $balance Account's balance
     * @param float $interest_rate Account's Interest Rate
     * @param int $months_frozen Amount of months that the account is frozen
     */
    public function __construct(string $owner_name,string $account_number,float $balance,float $interest_rate,int $months_frozen) {
        $this->setOwnerName($owner_name);
        $this->setAccountNumber($account_number);
        $this->setBalance($balance);
        $this->setInterestRate($interest_rate);
        $this->setMonthsFrozen($months_frozen);
        $this->setAccountType("Ahorro Fijo");
    }

    function imprimir()
    {
        return "<tr><td>".$this->getOwnerName()."</td><td>".$this->getAccountNumber()."</td><td>".$this->getAccountType()."</td><td>".$this->getBalance()."€</td><td>".$this->getInterestRate()."%</td></tr>";
    }

    function calculateInterestRate()
    {
        $prev = $this->getInterestRate()/100*$this->getBalance();
        if ($prev > 100) {
            $prev+=1;
        }
        return $prev;
    }

    function modifyCurrentBalance()
    {
        $this->setBalance($this->getBalance()-$this->calculateInterestRate());
    }

    function compareInterest($other_account): int
    {
        if ($other_account->getInterestRate() < $this->getInterestRate()) {
            return 1;
        } else {
            return 0;
        }
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
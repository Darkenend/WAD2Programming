<?php


class Cuenta_Ahorro_Variable extends Cuenta_Ahorro
{
    /**
     * Cuenta_Ahorro_Variable constructor.
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
        $this->setAccountType("Ahorro Variable");
    }

    function changeInterest() {
        try {
            $roll = random_int(1, 20);
        } catch (Exception $e) {
            debug_to_console($e->getMessage());
        }
        if ($roll > 10) {
            $this->setInterestRate($this->getInterestRate()-0.1*($roll-10));
        } else {
            $this->setInterestRate($this->getInterestRate()+0.1*(11-$roll));
        }
        //Sanity checks
        if ($this->getInterestRate() > 1.5) {
            $this->setInterestRate(1.5);
        }
        if ($this->getInterestRate() < -1.5) {
            $this->setInterestRate(-1.5);
        }
    }

    function calculateInterestRate()
    {
        return $this->getInterestRate()/100*$this->getBalance();
    }
}
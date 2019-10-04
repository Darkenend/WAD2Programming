<?php

class Cuenta_Ahorro_Fijo extends Cuenta_Ahorro
{
    /**
     * Cuenta_Ahorro_Fijo constructor.
     * @param string $owner_name Name of the account owner.
     * @param string $account_number Account's identification number.
     * @param float $balance Account's balance
     * @param float $interest_rate Account's Interest Rate
     * @param int $months_frozen Amount of months that the account is frozen
     */
    public function __construct(string $owner_name, string $account_number, float $balance, float $interest_rate, int $months_frozen)
    {
        $this->setOwnerName($owner_name);
        $this->setAccountNumber($account_number);
        $this->setBalance($balance);
        $this->setInterestRate($interest_rate);
        $this->setMonthsFrozen($months_frozen);
        $this->setAccountType("Ahorro Fijo");
    }

    function calculateInterestRate()
    {
        $prev = $this->getInterestRate() / 100 * $this->getBalance();
        if ($prev > 100) {
            $prev += 1;
        }
        return $prev;
    }
}
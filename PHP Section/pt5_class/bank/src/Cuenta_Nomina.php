<?php

class Cuenta_Nomina extends Cuenta
{
    /** @var string */
    private $work_status;
    /** @var int */
    private $CARD_DISCOUNT;
    /** @var float */
    private $ACCOUNT_NEGATIVE_LIMIT;

    /**
     * Cuenta_Nomina constructor.
     * @param string $owner_name Name of the account owner.
     * @param string $account_number int Account's identification number.
     * @param float $balance Account's balance
     * @param string $work_status Account owner's work status
     */
    public function __construct(string $owner_name,string $account_number,float $balance,string $work_status) {
        $this->setOwnerName($owner_name);
        $this->setAccountNumber($account_number);
        $this->setBalance($balance);
        $this->setACCOUNTNEGATIVELIMIT(-100);
        if ($work_status != "temporal" && $work_status != "indefinido") {
            $this->setWorkStatus("indefinido");
        } else {
            $this->setWorkStatus($work_status);
        }
        $this->setAccountType("Nomina");
        $this->setCARDDISCOUNT($this->calculeCARDDISCOUNT());
    }

    /**
     * Calculates the Card's Discount Percent
     * @return int Card Discount Percent
     */
    function calculeCARDDISCOUNT() {
        if ($this->getWorkStatus() == "indefinido") {
            return 2;
        } else {
            return 0;
        }
    }

    /**
     * This function returns a string with the most important data of the account in a certain order, formatted for a table row in HTML
     * @return string Data of account in a HTML Table Row
     */
    public function imprimir() {
        return "<tr><td>".$this->getOwnerName()."</td><td>".$this->getAccountNumber()."</td><td>".$this->getAccountType()."</td><td>".$this->getBalance()."€</td><td>".$this->getCARDDISCOUNT()."%</td></tr>";
    }

    // GETTERS AND SETTERS
    /**
     * @return string
     */
    public function getWorkStatus(): string
    {
        return $this->work_status;
    }
    /**
     * @param string $work_status
     */
    public function setWorkStatus(string $work_status): void
    {
        $this->work_status = $work_status;
    }
    /**
     * @return int
     */
    public function getCARDDISCOUNT(): int
    {
        return $this->CARD_DISCOUNT;
    }
    /**
     * @param int $CARD_DISCOUNT
     */
    public function setCARDDISCOUNT(int $CARD_DISCOUNT): void
    {
        $this->CARD_DISCOUNT = $CARD_DISCOUNT;
    }

    /**
     * @return float
     */
    public function getACCOUNTNEGATIVELIMIT(): float
    {
        return $this->ACCOUNT_NEGATIVE_LIMIT;
    }

    /**
     * @param int $ACCOUNT_NEGATIVE_LIMIT
     */
    private function setACCOUNTNEGATIVELIMIT(float $ACCOUNT_NEGATIVE_LIMIT): void
    {
        $this->ACCOUNT_NEGATIVE_LIMIT = $ACCOUNT_NEGATIVE_LIMIT;
    }
}
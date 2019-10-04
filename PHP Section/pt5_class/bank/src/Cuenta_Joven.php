<?php

class Cuenta_Joven extends Cuenta
{
    /** @var int */
    private $age;
    /** @var int */
    private $card_discount;

    /**
     * Cuenta_Joven constructor.
     * @param string $owner_name Name of the account owner.
     * @param string $account_number Account's identification number.
     * @param float $balance Account's balance
     * @param int $age Account owner's age.
     */
    public function __construct(string $owner_name,string $account_number,float $balance,int $age)
    {
        $this->setOwnerName($owner_name);
        $this->setAccountNumber($account_number);
        $this->setAccountType("Joven");
        $this->setBalance($balance);
        $this->setAge($age);
        $this->setCardDiscount($this->calculeCardDiscount());
    }

    /**
     * This method calculates the discount that the card will have when it's used to pay things.
     * @return int Discount that the card has for paying with it
     */
    function calculeCardDiscount()
    {
        if ($this->getAge() < 25) {
            return 3;
        } else {
            return 1;
        }
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @param int $age
     */
    public function setAge(int $age): void
    {
        //TODO: Replace direct insertion with date of birth based method
        $this->age = $age;
    }

    /**
     * This function returns a string with the most important data of the account in a certain order, formatted for a table row in HTML
     * @return string Data of account in a HTML Table Row
     */
    function imprimir()
    {
        return "<tr><td>" . $this->getOwnerName() . "</td><td>" . $this->getAccountNumber() . "</td><td>" . $this->getAccountType() . "</td><td>" . $this->getBalance() . "€</td><td>" . $this->getCardDiscount() . "%</td></tr>";
    }

    private function generateAge(): int {
        $to = new DateTime('now');
        $xd = $this->generateDate($to);
        try {
            $from = new DateTime($xd);
        } catch (Exception $e) {
            debug_to_console($e->getMessage());
        }
        return $from->diff($to)->y;
    }

    private function generateDate(DateTime $to): string {
        try {
            $y = random_int((int)$to->format('y')-30, (int)$to->format('y'));
        } catch (Exception $e) {
            $y = (int)$to->format('y')-30;
            debug_to_console($e->getMessage());
        }
        try {
            $m = random_int(1, 12);
        } catch (Exception $e) {
            $m = 1;
            debug_to_console($e->getMessage());
        }
        try {
            $tempdate = new DateTime("$y-$m-01");
            $tempdate->modify('+1 month');
            $tempdate->modify('-1 day');
            $d = random_int(1, (int) $tempdate->format('d'));
        } catch (Exception $e) {
            $d = 1;
            debug_to_console($e->getMessage());
        }
        return "$y-$m-$d";
    }

    /**
     * @return int
     */
    public function getCardDiscount(): int
    {
        return $this->card_discount;
    }

    /**
     * @param int $card_discount
     */
    public function setCardDiscount(int $card_discount): void
    {
        $this->card_discount = $card_discount;
    }
}
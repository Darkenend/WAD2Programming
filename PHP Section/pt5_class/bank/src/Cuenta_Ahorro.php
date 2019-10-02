<?php

interface Cuenta_Ahorro
{
    function calculateInterestRate();
    function modifyCurrentBalance();
    function compareInterest($other_account):int;
}
<?php
require_once "src/Cuenta.php";
require_once "src/Cuenta_Ahorro.php";
require_once "src/Cuenta_Joven.php";
require_once "src/Cuenta_Nomina.php";
require_once "src/Cuenta_Ahorro_Fijo.php";
require_once "src/Cuenta_Ahorro_Variable.php";

$DATA_NAMES = ['Carlos', 'Álvaro', 'Javier', 'María', 'Francisco', 'Francesco', 'Laura', 'Nuria'];
$DATA_LASTNAMES = ['Vidal', 'Real', 'Ramírez', 'Vadillo', 'Martos', 'Virgolini', 'Pérez', 'Gómez', 'Martín'];
$account_1 =
$accounts_normal = [];
$accounts_savings = [];
$transaction_history = [];
// Account creation loop
for ($i = 0; $i < 4; $i++) {
    $temp_fullname = $DATA_NAMES[mt_rand(0, 7)]." ".$DATA_LASTNAMES[mt_rand(0, 8)];
    $temp_balance = randomFloat(0, 1000000, 2);
    $temp_age = mt_rand(16, 30);
    if ($i % 2 == 0) {
        array_push($accounts_normal, new Cuenta_Joven($temp_fullname, "100".$i, $temp_balance, $temp_age));
    } else {
        if ($i > 1) {
            $xd = "indefinido";
        } else {
            $xd = "temporal";
        }
        array_push($accounts_normal, new Cuenta_Nomina($temp_fullname, "100".$i,$temp_balance, $xd));
    }
}
for ($i = 0; $i < 4; $i++) {
    $temp_fullname = $DATA_NAMES[mt_rand(0, 7)]." ".$DATA_LASTNAMES[mt_rand(0, 8)];
    $temp_balance = randomFloat(0, 100000000, 2);
    $temp_interest = randomFloat(5, 10, 1);
    $temp_months = mt_rand(6, 12);
    if ($i % 2 == 0) {
        array_push($accounts_savings, new Cuenta_Ahorro_Fijo($temp_fullname, "200".$i, $temp_balance, $temp_interest, $temp_months));
    } else {
        $interest = randomFloat(0, 15, 1);
        if ($i > 1) {
            $interest = -($interest);
        }
        array_push($accounts_savings, new Cuenta_Ahorro_Variable($temp_fullname, "200".$i, $temp_balance, $interest, $temp_months));
    }
}

require "views/html_top.view.php";

// First account table
foreach ($accounts_normal as $account) {
    echo $account->imprimir();
}
foreach ($accounts_savings as $account) {
    echo $account->imprimir();
}
echo "</table><br><br><br>";
//Things after table has been done (Log of things done)
array_push($transaction_history, transaction($accounts_normal[0], $accounts_normal[1], mt_rand(0,500)));
array_push($transaction_history, transaction($accounts_normal[0], $accounts_normal[2], mt_rand(0,500)));
array_push($transaction_history, transaction($accounts_normal[0], $accounts_normal[3], mt_rand(0,500)));
array_push($transaction_history, transaction($accounts_normal[1], $accounts_normal[0], mt_rand(0,500)));
array_push($transaction_history, transaction($accounts_normal[1], $accounts_normal[2], mt_rand(0,500)));
array_push($transaction_history, transaction($accounts_normal[1], $accounts_normal[3], mt_rand(0,500)));
array_push($transaction_history, transaction($accounts_normal[2], $accounts_normal[0], mt_rand(0,500)));
array_push($transaction_history, transaction($accounts_normal[2], $accounts_normal[1], mt_rand(0,500)));
array_push($transaction_history, transaction($accounts_normal[2], $accounts_normal[3], mt_rand(0,500)));
array_push($transaction_history, transaction($accounts_normal[3], $accounts_normal[0], mt_rand(0,500)));
array_push($transaction_history, transaction($accounts_normal[3], $accounts_normal[1], mt_rand(0,500)));
array_push($transaction_history, transaction($accounts_normal[3], $accounts_normal[2], mt_rand(0,500)));
foreach ($accounts_savings as $account) {
    for ($i = 0; $i < $account->getMonthsFrozen(); $i++) {
        $message_string = recalculate($account, $i+1);
        array_push($transaction_history, $message_string);
    }
}

//Account summary after operations
echo "<table><tr><th>Nombre Dueño</th><th>Numero Cuenta</th><th>Tipo Cuenta</th><th>Saldo</th><th>Interes/Descuento</th></tr>";
foreach ($accounts_normal as $account) {
    echo $account->imprimir();
}
foreach ($accounts_savings as $account) {
    echo $account->imprimir();
}
echo "</table>";

//History of actions
echo "<h1>Historial</h1><span class='subtitle'>Acciones realizadas</span><br>";
echo "<table>";
echo "<tr><th>Mensaje</th></tr>";
foreach ($transaction_history as $message) {
    echo "<tr><td>".$message."</td></tr>";
}
echo "</table>";
require "views/html_bot.view.php";

function randomFloat($min, $max, $zeros) {
    $str = "1";
    for ($i = 0; $i < $zeros; $i++) {
        $str = $str."0";
    }
    settype($str, 'float');
    try {
        $int = mt_rand($min, $max);
    } catch (Exception $e) {
        debug_to_console("Error in randomFloat(): ".$e);
    }
    $num = (float) $int / $str;
    return $num;
}

/**
 * This function sends money from an account to another, and adds it to the registry.
 * @param Cuenta $account_send Object Account which sends the money
 * @param Cuenta $account_recieve Object Account which recieves the money
 * @param float $money Amount of money being sent
 * @return string Message to add to $transaction_history
 */
function transaction($account_send, $account_recieve, $money) {
    // We check if the account is a Cuenta Nomina so we can use the -100 limit
    if ($account_send instanceof Cuenta_Nomina) {
        if ($account_send->getBalance()+100 < $money) {
            $account_send->extraer($money);
            $account_recieve->ingresar($money);
            return $account_send->getAccountNumber()." ha transferido ".$money."€ a ".$account_recieve->getAccountNumber();
        } else {
            return "No se ha podido transferir entre las cuentas debido a que la cuenta de origen no dispone de fondos suficientes.";
        }
    } else {
        if ($account_send->getBalance() < $money) {
            $account_send->extraer($money);
            $account_recieve->ingresar($money);
            return $account_send->getAccountNumber()." ha transferido ".$money."€ a ".$account_recieve->getAccountNumber();
        } else {
            return "No se ha podido transferir entre las cuentas debido a que la cuenta de origen no dispone de fondos suficientes.";
        }
    }
}

/**
 * This function recalculates the balance (and the new interest rate) after a month, adds a message to the transaction history
 * @param $account Object Account which is worked on
 * @param $month int Months since beginning of account freeze
 * @return string String with message to add to $transaction_history
 */
function recalculate($account, $month) {
    $account->modifyCurrentBalance();
    $modificated = 0;
    if ($account->getAccountType() == "Ahorro Variable") {
        $roll = mt_rand(1, 20);
        if ($roll > 10) {
            if ($roll > 18) {
                $modificated = 0.2;
            } else {
                $modificated = 0.1;
            }
        } else {
            if ($roll < 3) {
                $modificated = -0.2;
            } else {
                $modificated = -0.1;
            }
        }
        $account->setInterestRate($account->getInterestRate()+$modificated);
        return "Se han añadido los intereses a la cuenta ".$account->getAccountNumber()." del mes ".$month." de su congelamiento. Se han modificado los intereses en un: ".$modificated."%";
    } else {
        return "Se han añadido los intereses a la cuenta ".$account->getAccountNumber()." del mes ".$month." de su congelamiento.";
    }
}

/**
 * This method is used to pump out data to the console.
 * @param $data String to be logged in the console, be very careful
 */
function debug_to_console($data) {
    $output = $data;
    if (is_array($output)) {
        $output = implode( ',', $output);
    }
    echo "<script>console.log('Debug: ".$output."');</script>";
}
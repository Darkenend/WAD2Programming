<?php

class Password {
    /**
     * This function returns a hashed password from a string
     * @param string $password The string which we wanna hash
     * @param int $cost Cost of the hash
     * @return false|string Should always return a string with the hashed password or a false if there's an error
     */
    public static function hash($password, $cost) {
        return password_hash($password, PASSWORD_DEFAULT, ['cost' =>
            $cost]);
    }

    /**
     * We check if the password given, matches the hashed password that we have
     * @param string $password Password to check
     * @param string $hash Hash to check against it
     * @return bool If the match is a success or not
     */
    public static function verify($password, $hash) {
        return password_verify($password, $hash);
    }
}
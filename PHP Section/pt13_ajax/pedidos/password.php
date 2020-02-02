<?php

/**
 * This class is the one responsible of storing the password-related functions that will be used in the software
 */
class Password {
    const HASH = PASSWORD_DEFAULT;
    const COST = 14;

    /**
     * This function returns a hashed password from a string
     * @param string $password The string which we wanna hash
     * @return false|string Should always return a string with the hashed password or a false if there's an error
     */
    public static function hash($password) {
        return password_hash($password, HASH, ['cost' => COST]);
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

    /**
     * Logs in a user
     * @param string $contraseña Password of the user
     * @return bool Success or failure in user log in
     */
    public function login(string $contraseña): bool
    {
        if (Password::verify($contraseña, $this->data->passwordHash)) {
            $login = true;
            if (password_needs_rehash($this->data->passwordHash, HASH, COST)) {
                $this->setPassword($contraseña);
                $this->save();
            }
        }
        return $login;
    }
}
<?php

namespace Plugo\Services\Auth;

use Plugo\Services\FlashMessage\FlashMessage;

class CheckCredentials {

    public function checkPassword(string $password1, string $password2) {
        $result = true;

        if(strcmp($password1, $password2) != 0){
            $result = false;
            $flash = new FlashMessage();
            $flash->generateFlashMessage('AuthenticationEmail', 'Error', "Les mots de passe ne correspondent pas.");
        }

        return $result;
    }

    public function checkEmail(string $email) {
        $result = true;

        if(preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $email) == 0){
            $result = false;
            $flash = new FlashMessage();
            $flash->generateFlashMessage('AuthenticationPassword', 'Error', "L'email n'est pas valide");
        }

        return $result;
    }

}
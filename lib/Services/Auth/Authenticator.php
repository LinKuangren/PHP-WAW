<?php

namespace Plugo\Services\Auth;

use App\Manager\UserManager;
use Plugo\Services\FlashMessage\FlashMessage;

class Authenticator {

    public function __construct(){
        $this->checkCredentials = new CheckCredentials();
        $this->flashMessage = new FlashMessage();
    }

    public function logout() {
        if(isset($_SESSION['user'])){
            unset($_SESSION['user']);
        }
    }

    public function login(array $userInfo) {
        $em = new UserManager();
        $user = $em->findOneBy(['email' => $userInfo['email']]);
        $userPassword = $user->getPassword();
        if(password_verify($userInfo['password'], $userPassword)){
            $_SESSION['user']['id'] = $user->getId();
            $_SESSION['user']['email'] = $user->getEmail();
            $_SESSION['user']['created_at'] = $user->getCreatedAt();
            return true;
        }else{
            return false;
        }
    }

}
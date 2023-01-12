<?php

namespace App\Controller;

use Plugo\Controller\AbstractController;
use App\Entity\User;
use App\Manager\UserManager;
use Plugo\Services\Auth\Authenticator;
use Plugo\Services\Auth\CheckCredentials;
use Plugo\Services\FlashMessage\FlashMessage;

class UserController extends AbstractController {

    public function __construct() {
        $this->flashMessage = new FlashMessage();
        $this->flashMessage->clearFlashMessage();
    }

    public function register() {
        if(isset($_POST) && !empty($_POST)){
            $checkCredentials = new CheckCredentials();
            $UserManager = new UserManager();

            $isError = false;

            if(!$checkCredentials->checkEmail($_POST['email'])){
                $isError = true;
            }

            if(!$checkCredentials->checkPassword($_POST['password'], $_POST['passwordVerif'])){
                $isError = true;
            }

            if(!$isError){
                if(empty($UserManager->findOneBy(['email' => $_POST['email']]))){
                    $user = new User();
                    $user->setEmail($_POST['email']);
                    $user->setPassword($_POST['password']);
                    $user->setCreatedAt(date('Y-m-d H:i:s'));

                    $UserManager->add($user);

                    $this->flashMessage->generateFlashMessage('AuthenticationSuccess', 'Success', 'Le compte a bien été créé !');

                    return $this->redirectToRoute('login');
                }else{
                    $this->flashMessage->generateFlashMessage('AuthenticationErrorInscription', 'Error', 'Un compte existe déjà avec cette adresse email');
                }
            }

        }
        return $this->renderView('User/register.php');
    }

    public function login() {
        if(isset($_POST) && !empty($_POST)){
            $authenticator = new Authenticator();
            $result = $authenticator->login($_POST);
            if($result){
                return $this->redirectToRoute('home');
            }else{
                $this->flashMessage->generateFlashMessage('AuthenticationErrorLogin', 'Error', 'Erreur lors de la connexion. L\'adresse email ou le mot de passe ne correrspondent pas');
            }
        }

        return $this->renderView('user/login.php');
    }

    public function logout() {
        $authenticator = new Authenticator();
        $authenticator->logout();

        return $this->redirectToRoute('login');
    }

    public function profil() {
        $userManager = new UserManager();

        $user = $userManager->findOneBy(['id' => $_SESSION['user']['id']]);

        $iserror = false;
        
        if(isset($_POST) && !empty($_POST)){
            
            $checkCredentials = new CheckCredentials();
            if(!$checkCredentials->checkPassword($_POST['password'], $_POST['passwordVerif'])){
                $iserror = true;
            }

            if(!$iserror){
                $user->setPassword($_POST['password']);
                print_r($user);
                $userManager->edit($user);

                return $this->redirectToRoute('logout');
            }
    }

        return $this->renderView('User/profil.php',['user' => $user]);   
    }

    public function changePassword() {
        $userManager = new  UserManager();

        $user = $userManager->findOneBy(['id' => $_GET['id']]);

        $iserror = false;
        dd('coucou');
        if(isset($_POST) && !empty($_POST)){
            
            $checkCredentials = new CheckCredentials();
            if(!$checkCredentials->checkPassword($_POST['password'], $_POST['passwordVerif'])){
                $iserror = true;
            }

            if(!$iserror){
                $user->setPassword($_POST['password']);
                print_r($user);
                $userManager->edit($user);

                $this->flashMessage->generateFlashMessage('PasswordUpdateSuccess', 'success', 'Le mot de passe bien à était modifié !');
                return $this->redirectToRoute('logout');
            }else{
                $this->flashMessage->generateFlashMessage('PasswordUpdate', 'Error', 'Error');
            }
    }
    return $this->renderView('User/profil.php');
    }
}
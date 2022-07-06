<?php

class LoginController extends AppController
{
    public function __construct(){
        $this->init();
    }

    public function init(){
        session_start();
        $user = new UsersModel;
        $userName = $_POST['userName'];

        if($user->verifyUser($userName)){
            $parola = $user->verifyUser($userName);
            if($user->isAuth($userName, $parola)){
                $_SESSION['userName'] = $userName;
                $userDetails = $user->getUserDetails($userName);
                $_SESSION['tipUser'] = $userDetails["tipUser"];
                header('Location: ?page=home');
            }
        }
    }
}
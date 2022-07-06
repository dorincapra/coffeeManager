<?php

class AdaugaUserController extends AppController
{
    public function __construct(){
        $this->init();
    }

    public function init(){

        $user = new UsersModel;

        $userName = $_POST["userName"];
        $tipUser = $_POST["tipUser"];
        $parola = $_POST["parola"];

        if($user->addUser($userName, $parola, $tipUser)){
            echo "user-ul a fost adaugat";
            header('Refresh: 3; ?page=mngStoc');
        }
    }
}
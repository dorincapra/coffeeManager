<?php

class UsersModel extends DBModel
{
    protected $name;
    protected $email;
    protected $password;

    public function __construct($userName='.', $pass='.'){
        $this->name = $userName;
        $this->password = $pass;
    }


    public function verifyUser($userName){
        //verifica daca este acest username in baza de date si returneaza parola
        $q = "SELECT `parola` FROM `users` WHERE `userName` = ?";
        $myPrep = $this->db()->prepare($q);
        $myPrep->bind_param("s", $userName);
        $myPrep->execute();
        return $myPrep->get_result()->fetch_assoc()['parola'];
    }

    public function isAuth($userName, $parola){
    //verifica daca user si parola sunt in BD 
        $q = "SELECT * FROM `users` WHERE `userName`= ? AND `parola` = ?";
        $myPrep=$this->db()->prepare($q);
        $myPrep->bind_param("ss", $userName, $parola);
        return $myPrep->execute();
    }


    public function addUser($userName, $parola, $tipUser){
        $hash = password_hash($parola, PASSWORD_DEFAULT);

        $q = "INSERT INTO `users`(`tipUser`, `userName`, `parola`) VALUES (?, ?, ?);";
        $myPrep = $this->db()->prepare($q);
        $myPrep->bind_param("sss", $tipUser, $userName, $hash);
        return $myPrep->execute();
    }



    public function getUserDetails($userName){
        $q = "SELECT * FROM `users` where `userName` = ?";
        $myPrep = $this->db()->prepare($q);
        $myPrep->bind_param("s", $userName);
        $myPrep->execute();

        return $myPrep->get_result()->fetch_assoc();
    }

   




}
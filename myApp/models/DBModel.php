<?php

class DBModel
{
    protected $conn;

    public function db(){
        $this->conn = new mysqli('localhost', 'user', '123', 'cafea');
       // $this->conn = new mysqli('92.114.98.228', 'cityroas_admin', '33Decalamari', 'cityroas_cafea');
        if($this->conn->connect_error){
            die('Connection error!');
        }
        return $this->conn;
    } 
}
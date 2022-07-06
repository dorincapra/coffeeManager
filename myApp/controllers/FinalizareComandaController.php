<?php

class FinalizareComandaController extends AppController 
{
    public function __construct(){
        $this->init();
    }

    public function init(){

        $idComanda = $_GET['id'];
        $comanda = new ComenziModel;

        if($comanda->stergeComanda($idComanda)){
            echo "comanda a fost stearsa";
            header('Refresh: 2; ?page=comenzi');
        }


    }
}
<?php

class AdaugaComandaController extends AppController 
{
    public function __construct(){
        $this->init();
    }

    public function init(){


        $comanda = new ComenziModel;

        $cantitate=$_POST["cantitate"];
        $idSortiment=$_POST["selectSortiment"];
        $dataLimita = $_POST["data"];



  

        if($comanda->adaugaComenzi($cantitate, $idSortiment, $dataLimita)){
            echo "comanda a fost adaugata";
            header('Refresh: 3; ?page=mngStoc');
        }

    }

}
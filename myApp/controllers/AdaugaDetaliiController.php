<?php

class AdaugaDetaliiController extends AppController 
{
    public function __construct(){
        $this->init();
    }

    public function init(){

        session_start(); 
        $sortiment = new SortimentModel;

        $idSortiment = $_SESSION["idSortiment"];
        $detalii = $_POST["detalii"];
        $detaliiPrajire = $_POST["detaliiPrajire"];        

        if($sortiment -> updateDetaliiSortiment($idSortiment, $detalii, $detaliiPrajire)){
            echo "detaliile au fost adaugate";
            header('Refresh: 3; ?page=mngStoc');
        }
    }

 

}

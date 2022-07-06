<?php

class ScoateStocController extends AppController 
{
    public function __construct(){
        $this->init();
    }

    public function init(){



        $comanda = new ComenziModel;
        $sortiment = new SortimentModel;


        $idSortiment = $_POST["selectSortiment"];
        $cantitate = $_POST["cantitate"];
        $scop = $_POST["scop"];
        $data = date("Y-m-d");

 

        $stoc = $sortiment->getStocPrajita($idSortiment)["cantitate"];
        $stocFinal = $stoc - $cantitate;

        if($comanda->adaugaVanzare($idSortiment, $cantitate, $scop, $data)){
            if($sortiment->setStocPrajita($stocFinal, $idSortiment)){
                echo "vanzarea a fost adaugata si stoc-ul a fost updatat";
                header('Refresh: 2; ?page=mngStoc');
            }
        }
    }

}
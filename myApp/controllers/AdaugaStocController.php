<?php

class AdaugaStocController extends AppController 
{
    public function __construct(){
        $this->init();
    }

    public function init(){

        $sortiment = new SortimentModel;

        $idSortiment = $_POST["selectSortiment"];
        $cantitate = $_POST["cantitate"];


        $cantitateExistenta = $sortiment->getStocVerde($idSortiment)["cantitate"];
        $stocFinal = $cantitate + $cantitateExistenta;

        if($sortiment->setStocVerde($stocFinal, $idSortiment)){
            echo "stoc-ul a fost updatat";
            header('Refresh: 3; ?page=mngStoc');
        }
    }
}
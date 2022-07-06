<?php

class PrajireEfectuataController extends AppController 
{
    public function __construct(){
        $this->init();
    }

    public function init(){
        session_start();

        $prajeala = new PrajealaModel;
        $sortiment = new SortimentModel;
        $cuptor = new CuptorModel;
        
        $cantitateVerde = $_POST['cantitateVerde'];
        $cantitatePrajita = $_POST['cantitatePrajita'];
        $numePrajitor = $_SESSION["userName"];
        $dataAzi = date("Y-m-d");
        $idSortiment = $_GET['id'];
        $temperaturaIesire = $_POST["temperaturaIesire"];
        $temperaturaIntrare = $_POST["temperaturaIntrare"];
        $note = $_POST["note"];
        $durataPrajire = $_POST["durataPrajire"];
        $timpFunctionareInitial = $cuptor->getTimpFunctionare()["timpFunctionare"];
        $timpFunctionare = $durataPrajire + $timpFunctionareInitial;


        $stocPrajita = $sortiment->getStocPrajita($idSortiment);
        $stocVerde = $sortiment->getStocVerde($idSortiment);

        $stocFinalPrajita = $cantitatePrajita + $stocPrajita["cantitate"];
        $stocFinalVerde = $stocVerde["cantitate"] - $cantitateVerde;


        
        if($prajeala->prajealaNoua($idSortiment, $numePrajitor, $cantitatePrajita, $cantitateVerde, $dataAzi, $temperaturaIntrare, $temperaturaIesire, $note, $durataPrajire)){
            if($sortiment->setStocVerde($stocFinalVerde, $idSortiment) &  $sortiment->setStocPrajita($stocFinalPrajita, $idSortiment) && $cuptor->setTimpFunctionare($timpFunctionare)){
                echo "update-ul a fost facut si prajeala adaugata";
                header('Refresh: 1; ?page=mngStoc');
            }
        }

    }

}

//$idSortiment, $numePrajitor, $cantitatePrajita, $cantitateVerde, $data
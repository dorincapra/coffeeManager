<?php

class AdaugaSortimentController extends AppController 
{
    public function __construct(){
        $this->init();
    }

    public function init(){

            session_start();

            $numeSortiment = $_POST['numeSortiment'];
            $cantitate = $_POST['cantitate'];


            $sortiment = new SortimentModel;

            if($sortiment->doubleSortiment($numeSortiment) == ""){
                $idSortimentAdaugat = $sortiment -> adaugaSortiment($numeSortiment, '', '');
            } else {
                echo "exista deja un sortiment " . $numeSortiment;
            }

           if(isset($idSortimentAdaugat)){
            $_SESSION["idSortiment"] = $idSortimentAdaugat;
            if($sortiment -> insertStocVerde($idSortimentAdaugat, $cantitate) && $sortiment -> insertStocPrajita($idSortimentAdaugat, 0))
            
           $data["idSortiment"] = $idSortimentAdaugat;
           $data["mainContent"] = $this->render(APP_PATH.VIEWS.'adaugaDetaliiView.html');
           if($_SESSION["tipUser"] == "manager"){
            echo $this->render(APP_PATH.VIEWS.'baseLayoutManager.html', $data);   
        } else if ($_SESSION["tipUser"] == "prajitor"){
            echo $this->render(APP_PATH.VIEWS.'baseLayoutPrajitor.html', $data);   
        }
           }
        }
}
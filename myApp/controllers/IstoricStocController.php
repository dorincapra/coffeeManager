<?php

class IstoricStocController extends AppController 
{
    public function __construct(){
        $this->init();
    }

    public function init(){

        session_start();


        $comanda = new ComenziModel; 
        $sortiment = new SortimentModel;

        $data1 = $_POST["data1"];
        $data2 = $_POST["data2"];

        $vanzari = $comanda->istoricStoc($data1, $data2);
        $tabelVanzari = '';

        foreach($vanzari as $vanzare){

            $numeSortiment = $sortiment->getNumeSortiment($vanzare["idSortiment"]);
            $dataScoaterii = strtotime($vanzare["data"]);
            $dataScoaterii = date("d-M-y", $dataScoaterii);

            $tabelVanzari .= "<th scope='row'>" . $numeSortiment["nume"] . "</th>";
            $tabelVanzari .= "<td>" . $vanzare["scop"] . "</td>";
            $tabelVanzari .= "<td>" . $vanzare["cantitate"] . "</td>";
            $tabelVanzari .= "<td>" . $dataScoaterii . "</td></tr>";
        }


        
        $dataVanzari['vanzari'] = $tabelVanzari;
        $data['mainContent'] = $this->render(APP_PATH.VIEWS.'istoricStocView.html', $dataVanzari);
            

        $data['title'] = 'Istoric stoc';

        if($_SESSION["tipUser"] == "manager"){
          echo $this->render(APP_PATH.VIEWS.'baseLayoutManager.html', $data);   
        } else if($_SESSION["tipUser"] == "prajitor"){
          echo $this->render(APP_PATH.VIEWS.'baseLayoutPrajitor.html', $data);   
        }
    }
}
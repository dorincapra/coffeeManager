<?php

class HelperPrajireController extends AppController
{
    public function __construct(){
        $this->init();
    }

    public function init(){

        session_start();

        $sortiment = new SortimentModel;


        $idSortiment = $_POST["selectSortiment"];
        $dataHelperPrajire['linkForm'] = "<form action=?page=prajireEfectuata&id=$idSortiment method='POST'>";
        $detaliiPrajire = $sortiment -> getDetaliiPrajire($idSortiment)["detaliiPrajire"];
        $numeSortiment = $sortiment -> getNumeSortiment($idSortiment)["nume"];
        $dataHelperPrajire["detaliiPrajire"] = $detaliiPrajire;

        $data['dropdownSortimente'] = $this->dropDownSortimente();

        $data["title"] = 'Helper Prajire';
        $data["mainContent"] =  $this->render(APP_PATH.VIEWS.'helperPrajireView.html', $dataHelperPrajire);
        if($_SESSION["tipUser"] == "manager"){
            echo $this->render(APP_PATH.VIEWS.'baseLayoutManager.html', $data);   
        } else if ($_SESSION["tipUser"] == "prajitor"){
            echo $this->render(APP_PATH.VIEWS.'baseLayoutPrajitor.html', $data);   
        }
     }
    }
    
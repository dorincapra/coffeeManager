<?php

class MngStocController extends AppController 
{
    public function __construct(){
        $this->init();
    }

    public function init(){

      session_start();

        //ia stocurile de verde si prajita si pune-le in tabel??

        $sortiment = new SortimentModel;


        if($sortiment->getIdSortiment()){
          $idSortimente = $sortiment->getIdSortiment();

            $tabelStocuri = "";
          //creeaza liniile din tabelul de stocuri
          foreach($idSortimente as $idSortiment){
            $tabelStocuri .= "<th scope='row'>" . $sortiment->getNumeSortiment($idSortiment['id'])["nume"] . "</th>";
            $tabelStocuri .= "<td>" . $sortiment->getStocVerde($idSortiment['id'])["cantitate"] . "</td>";
            $tabelStocuri .= "<td>" . $sortiment->getStocPrajita($idSortiment['id'])["cantitate"] . "</td></tr>";
          }
        } 

        $listaSortimente = $this->dropDownSortimente();
            
        $dataMngStoc['stoc'] = $tabelStocuri;
        $data['dropdownSortimente'] = $this->dropDownSortimente();
        $data['mainContent'] = $this->render(APP_PATH.VIEWS.'mngStocView.html', $dataMngStoc);
            

        $data['title'] = 'Manager stoc';

        if($_SESSION["tipUser"] == "manager"){
          echo $this->render(APP_PATH.VIEWS.'baseLayoutManager.html', $data);   
        } else if($_SESSION["tipUser"] == "prajitor"){
          echo $this->render(APP_PATH.VIEWS.'baseLayoutPrajitor.html', $data);   
        }
      }
}    

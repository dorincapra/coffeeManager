<?php

class PrajeliController extends AppController 
{
    public function __construct(){
        $this->init();
    }

    public function init(){

        session_start();

        $prajeala = new PrajealaModel;
        $sortiment = new SortimentModel;

        $dataPrajeli['prajeli'] = '';
       
        $prajeli = $prajeala->getPrajeli();

        foreach($prajeli as $prajeala){
            $numeSortiment = $sortiment->getNumeSortiment($prajeala["idSortiment"])["nume"];
            $dataPrajeli['prajeli'] .= "<th scope = row>" . $numeSortiment . "</th>";
            $dataPrajeli['prajeli'] .= "<td>" . $prajeala["cantitateVerde"] . "</td>";
            $dataPrajeli['prajeli'] .= "<td>" . $prajeala["cantitatePrajita"] . "</td>";
            $dataPrajeli['prajeli'] .= "<td>" . $prajeala["numePrajitor"] . "</td>";
            $dataPrajeli['prajeli'] .= "<td>" . $prajeala["note"] . "</td>";
            $dataPrajeli['prajeli'] .= "<td>" . $prajeala["temperaturaIntrare"] . "</td>";
            $dataPrajeli['prajeli'] .= "<td>" . $prajeala["temperaturaIesire"] . "</td>";
            $dataPrajeli['prajeli'] .= "<td>" . $prajeala["durataPrajire"] . "</td>";
            $dataPrajeli['prajeli'] .= "<td>" . $prajeala["dataPrajelii"] . "</td></tr>";
        }

        $data['dropdownSortimente'] = $this->dropDownSortimente();
        $data['title'] = 'Prajeli';
        $data['mainContent'] = $this->render(APP_PATH.VIEWS.'prajeliView.html', $dataPrajeli);
        if($_SESSION["tipUser"] == "manager"){
            echo $this->render(APP_PATH.VIEWS.'baseLayoutManager.html', $data);   
        } else if ($_SESSION["tipUser"] == "prajitor"){
            echo $this->render(APP_PATH.VIEWS.'baseLayoutPrajitor.html', $data);   
        }
 

    }
}

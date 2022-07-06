<?php

class ComenziController extends AppController
{
    public function __construct(){
        $this->init();
    }

    public function init(){

      session_start();
        $comanda = new ComenziModel;
        $sortiment = new SortimentModel;

        $result = $comanda->getComenzi(NULL);
        $tabelComenzi = "<table class='table table-hover'>
            <thead>
            <tr>
              <th scope='col'>Nume sortiment</th>
              <th scope='col'>Cantitate</th>
              <th scope='col'>Data Limita</th>
            </tr>
          </thead><tbody><tr>";

        if($result){
            foreach($result as $comanda){

                $dataLimita = strtotime($comanda["dataLimita"]); 
                $dataLimita = date('d-M-y', $dataLimita);

                $tabelComenzi .= "<th scope='row'>" . $sortiment->getNumeSortiment($comanda['idSortiment'])["nume"] . "</th>";
                $tabelComenzi .= "<td>" . $comanda["cantitate"] . "</td>";
                $tabelComenzi .= "<td>" . $dataLimita . "</td>";
                $tabelComenzi .= "<td><a class='btn btn-success' href='?page=finalizareComanda&id=" . $comanda['id'] . "'>Finalizeaza comanda</a></td></tr>";
            }

            $tabelComenzi .= "</tbody></table>";

        }

        
          $data['dropdownSortimente'] = $this->dropDownSortimente();

            $data["title"] = 'Helper Prajire';
            $dataHelperPrajire["tabelComenzi"] = $tabelComenzi;
            $data["mainContent"] = $this->render(APP_PATH.VIEWS.'comenziView.html', $dataHelperPrajire);
            if($_SESSION["tipUser"] == "manager"){
              echo $this->render(APP_PATH.VIEWS.'baseLayoutManager.html', $data);   
          } else if ($_SESSION["tipUser"] == "prajitor"){
              echo $this->render(APP_PATH.VIEWS.'baseLayoutPrajitor.html', $data);   
          }}      }
    
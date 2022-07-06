<?php

class ServiceCuptorController extends AppController 
{
    public function __construct(){
        $this->init();
    }

    public function init(){

        session_start();

        $cuptor = new CuptorModel; 

        $ungereInfo = $cuptor->getUngereInfo();

        $timpFunctionare = $ungereInfo["timpFunctionare"];
        $dataUltimeiUngeri = $ungereInfo["dataUngere"];


        $dataService["infoService"] = "Cuptorul a fost uns ultima data pe " . date("d-M-y", strtotime($dataUltimeiUngeri)) . " si de atunci a functionat " . $timpFunctionare . " minute.";


        $data['title'] = 'Service Info';
        $data['mainContent'] = $this->render(APP_PATH.VIEWS.'serviceCuptorView.html', $dataService);
        

        $data['dropdownSortimente'] = $this->dropDownSortimente();

        
        if($_SESSION["tipUser"] == "manager"){
          echo $this->render(APP_PATH.VIEWS.'baseLayoutManager.html', $data);   
        } else if($_SESSION["tipUser"] == "prajitor"){
          echo $this->render(APP_PATH.VIEWS.'baseLayoutPrajitor.html', $data);   
        }

        

    }
}
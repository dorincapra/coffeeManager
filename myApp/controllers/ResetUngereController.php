<?php

class ResetUngereController extends AppController 
{
    public function __construct(){
        $this->init();
    }

    public function init(){

        $data = date("Y-m-d");
        $cuptor = new CuptorModel;

        if($cuptor->resetUngere($data)){
            echo "s-a inregistrat ungerea azi";
            header('Refresh: 2; ?page=serviceCuptor');
        }
    }
}
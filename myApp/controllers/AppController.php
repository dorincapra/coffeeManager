<?php

class AppController extends DBModel
{

    protected $routes = [
                            'home' => 'HomeController',
                            'login' => 'LoginController',
                            'firstPage' => 'FirstPageController',
                            'mngStoc' => 'MngStocController',
                            'adaugaSortiment' => 'AdaugaSortimentController',
                            'adaugaDetalii' => 'AdaugaDetaliiController',
                            'helperPrajire' => 'HelperPrajireController',
                            'comenzi' => 'ComenziController',
                            'prajireEfectuata' => 'PrajireEfectuataController',
                            'prajeli' => 'PrajeliController',
                            'adaugaStoc' => 'AdaugaStocController',
                            'adaugaUser' => 'AdaugaUserController',
                            'scoateStoc' => 'ScoateStocController', 
                            'adaugaComanda' => 'AdaugaComandaController',
                            'finalizareComanda' => 'FinalizareComandaController',
                            'istoricStoc' => 'IstoricStocController',
                            'serviceCuptor' => 'ServiceCuptorController',
                            'resetUngere' => 'ResetUngereController'
                        ];

    public function __construct(){

        $this->init();
    }

    public function init(){
        // redirectarea, navigarea între pagini
        if(isset($_GET['page'])){
            $page = $_GET['page'];
        }
        else {
            $page = '?page=firstPage';
        }

        if(array_key_exists($page, $this->routes)){
            $className = $this->routes[$page];
        }
        else {
            $className = $this->routes['firstPage'];
        }
        new $className;
    }

    public function render($page, $data=array()){
        $template = file_get_contents($page);
            
        // caută toate placeholerele
        preg_match_all("[{{\w+}}]", $template, $matches);


        foreach($matches[0] as $value){
            // scoate toate acoladele
            // înlocuiește-le cu informația din array-ul data
            $item = str_replace('{{', '', $value);
            $item = str_replace('}}', '', $item);

            if(array_key_exists($item, $data)){
                $template = str_replace($value, $data[$item], $template);
            }
        }
        return $template;
    }



    public function dropDownSortimente(){
        $sortiment = new SortimentModel;

          $sortimente = $sortiment -> listSortimente();
          $listaSortimente = "";
          foreach($sortimente as $sortiment){
              $listaSortimente .= "<option value= '" . $sortiment['id'] . "'>" . $sortiment['nume'] . "</option>";
          }
          return $listaSortimente;
    }


}
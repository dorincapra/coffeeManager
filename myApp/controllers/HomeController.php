<?php

class HomeController extends AppController
{
    public function __construct(){
        $this->init();
    }

    public function init(){

            session_start();
            $userName = $_SESSION['userName'];
            $data['title'] = 'Home';
            $data['mainContent'] = '<H1>Bine ai venit ' . $userName . '</h1>';

            $data['dropdownSortimente'] = $this->dropDownSortimente();

            if($_SESSION["tipUser"] == "manager"){
                echo $this->render(APP_PATH.VIEWS.'baseLayoutManager.html', $data);   
            } else if ($_SESSION["tipUser"] == "prajitor"){
                echo $this->render(APP_PATH.VIEWS.'baseLayoutPrajitor.html', $data);   
            }
        }
    }
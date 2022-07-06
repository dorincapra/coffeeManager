<?php

class FirstPageController extends AppController
{
    public function __construct(){
        $this->init();
    }

    public function init(){
            $data['title'] = 'Login';
            echo $this->render(APP_PATH.VIEWS.'loginView.html', $data);   
        }
    }
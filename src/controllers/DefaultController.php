<?php

require_once 'AppController.php';

class DefaultController extends AppController
{
    public function index()
    {
        $this->render('index');
    }

    public function error()
    {
        $this->render('errors');
    }
}

?>
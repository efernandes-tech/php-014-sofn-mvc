<?php

namespace App\Controllers;

use System\Controller\Action;

class IndexController extends Action
{
    public function index()
    {
        $this->view->cars = array("Mustang","Ferrari");

        $this->render('index');
    }

    public function contact()
    {
        $this->view->cars = array("Mustang","Ferrari");

        $this->render('contact');
    }
}

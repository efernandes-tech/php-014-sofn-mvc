<?php

namespace App\Controllers;

use System\Controller\Action;
use System\DI\Container;

class IndexController extends Action
{
    public function index()
    {
        $client = Container::getModel("Client");

        $this->view->clients = $client->fetchAll();

        $this->render('index');
    }

    public function contact()
    {
        $this->view->cars = array("Mustang","Ferrari");

        $this->render('contact');
    }
}

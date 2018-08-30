<?php

namespace App\Controllers;

use App\Conn;
use App\Models\Client;
use System\Controller\Action;

class IndexController extends Action
{
    public function index()
    {
        $client = new Client(Conn::getDb());

        $this->view->clients = $client->fetchAll();

        $this->render('index');
    }

    public function contact()
    {
        $this->view->cars = array("Mustang","Ferrari");

        $this->render('contact');
    }
}

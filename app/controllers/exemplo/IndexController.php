<?php

namespace App\Controllers\Exemplo;

use System\Core\Container;
use System\MVC\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $client = Container::getModel("Client");

        $this->data['clients'] = $client->fetchAll();

        $this->render('index');
    }

    public function add()
    {
        $this->render('add');
    }

    public function edit($id = false)
    {
        $client = Container::getModel("Client");

        $this->data['clients'] = $client->find($id);

        $this->render('edit');
    }

    public function delete($id = false)
    {
        $client = Container::getModel("Client");

        $this->data['client'] = $client->delete($id);

        $this->render('', 'json');
    }
}

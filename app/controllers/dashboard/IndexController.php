<?php

namespace App\Controllers\Dashboard;

use System\Core\Container;
use System\MVC\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $this->render('index');
    }

    public function contact($id = false, $name = false)
    {
        $this->data['id'] = $id;
        $this->data['name'] = $name;

        $this->render('contact');
    }
}

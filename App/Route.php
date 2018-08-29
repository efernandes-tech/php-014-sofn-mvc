<?php

namespace App;

use System\Init\Bootstrap;

class Route extends Bootstrap
{
    protected function initRoutes()
    {
        $routes['home'] = array('route' => '/', 'controller' => 'indexController', 'action' => 'index');
        $routes['contact'] = array('route' => '/contact', 'controller' => 'indexController', 'action' => 'contact');

        $this->setRoutes($routes);
    }
}

<?php

namespace App\Config;

use System\Core\Bootstrap;

class Route extends Bootstrap
{
    protected function initRoutes()
    {
        $routes[] = array(
            'route'      => '/',
            'dir'        => 'dashboard',
            'controller' => 'IndexController',
            'action'     => 'index',
        );

        $routes[] = array(
            'route'      => '/dashboard/contact',
            'parans'      => array('(:num)', '(:any)'),
            'dir'        => 'dashboard',
            'controller' => 'IndexController',
            'action'     => 'contact',
        );

        $routes['exemplo'] = array(
            array(
                'route'      => '/exemplo',
                'dir'        => 'exemplo',
                'controller' => 'IndexController',
                'action'     => 'index',
            ),
            array(
                'route'      => '/exemplo/add',
                'dir'        => 'exemplo',
                'controller' => 'IndexController',
                'action'     => 'add',
            ),
            array(
                'route'      => '/exemplo/edit',
                'parans'     => array('(:num)'),
                'dir'        => 'exemplo',
                'controller' => 'IndexController',
                'action'     => 'edit',
            ),
            array(
                'route'      => '/exemplo/delete',
                'parans'     => array('(:num)'),
                'dir'        => 'exemplo',
                'controller' => 'IndexController',
                'action'     => 'delete',
            ),
        );

        $this->setRoutes($routes);
    }
}

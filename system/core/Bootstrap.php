<?php

namespace System\Core;

use App\Config\Config;

abstract class Bootstrap
{
    private $routes;

    public function __construct()
    {
        // Monta o array com as rotas (app/config/Route.php).
        $this->initRoutes();

        // Inicia a aplicação.
        $this->run($this->getUrl());
    }

    abstract protected function initRoutes();

    protected function run($url)
    {
        // Limpa a url.
        $cleanUrl = $this->cleanUrl($url);

        array_walk($this->routes, function ($route) use ($url, $cleanUrl) {

            // Acessa se a url foi registrada.
            if ($cleanUrl == $route['route']) {

                $class = $this->getClass($route);

                $controller = new $class;

                $action = $route['action'];

                $parans = '';

                // Se a rota espera parametros.
                if (isset($route['parans'])) {
                    $urlParans = $this->getUrlParans($url, $cleanUrl);

                    $parans = $this->prepareParans($route['parans'], $urlParans);
                }

                // Executa o funcao do controller.
                eval('$controller->$action('.$parans.');');

            }

        });
    }

    protected function prepareParans($routeParans, $urlParans)
    {
        $p = '';
        for ($i = 0; $i < count($routeParans); $i++) {
            switch ($routeParans[$i]) {
                case '(:any)':
                    $p .= (isset($urlParans[$i]) ? '"' . $urlParans[$i] . '", ' : '');
                    break;
                case '(:num)':
                    $p .= (isset($urlParans[$i]) && is_numeric($urlParans[$i]) ? '"' . $urlParans[$i] . '", ' : '');
                    break;
            }
        }
        $p = substr($p, 0, -2);
        return $p;
    }

    protected function getUrlParans($url, $cleanUrl)
    {
        $parans = substr($url, strpos($url, $cleanUrl) + strlen($cleanUrl) + 1);
        if (strlen($parans) > 0)
            $parans = explode('/', $parans);
        else
            $parans = false;
        return $parans;
    }

    protected function getClass($route)
    {
        if (isset($route['dir'])) {
            return "App\\Controllers\\" . $route['dir'] . "\\" . ucfirst($route['controller']);
        } else {
            return "App\\Controllers\\" . ucfirst($route['controller']);
        }
    }

    protected function cleanUrl($url)
    {
        // Remove a url base.
        $url = str_replace(Config::getConstBASE_URL(), '', $url);
        // Remove o ultimo "/".
        $url = (substr_count($url, '/') > 1 && $url[strlen($url)-1] === '/') ? substr($url, 0, -1) : $url;
        // Remove os parametros.
        if (substr_count($url, '/') > 2) {
            $pos1 = strpos($url, '/');
            $pos2 = strpos($url, '/', $pos1+1);
            $pos3 = strpos($url, '/', $pos2+1);
            $url = substr($url, 0, $pos3);
        }
        return $url;
    }

    protected function setRoutes(array $routes)
    {
        $r = array();
        foreach ($routes as $key => $value) {
            if (is_numeric($key)) {
                $r[] = $value;
            } else {
                foreach ($value as $k => $v) {
                    $r[] = $v;
                }
            }
        }

        $this->routes = $r;
    }

    protected function getUrl()
    {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }
}

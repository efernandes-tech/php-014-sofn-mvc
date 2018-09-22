<?php

if ($_SERVER["HTTP_HOST"] == "www.site.com.br") {
    define('ENVIRONMENT', 'production');
    error_reporting(0); // Não reporta erros.
    ini_set("display_errors", false); // Não exibe erros.
} else {
    define('ENVIRONMENT', 'development');
    error_reporting(E_ALL); // Reporta todos os tipos de erro.
    ini_set("display_errors", true); // Exibe todos os tipos de erro.
}

require_once "../vendor/autoload.php";

require_once "../system/core/Helper.php";

use System\Core\Helper;
use App\Config\Route;

$helper = new Helper();

$route = new Route();

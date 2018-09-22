<?php

namespace System\Core;

use App\Config\Config;

class Helper
{
    public function __construct()
    {
        $this->loadHelpers();
    }

    protected function loadHelpers()
    {
        $diretorioHelpers = $_SERVER['DOCUMENT_ROOT'] . Config::getConstBASE_URL() . "/app/helpers";

        if ($handle = opendir($diretorioHelpers)) {
            while (false !== ($file = readdir($handle))) {
                if (strpos($file,".php")) {
                    include($diretorioHelpers."/".$file);
                }
            }
            closedir($handle);
        }
    }
}



<?php

namespace System\Core;

use App\Config\Conn;

class Container
{
    public static function getModel($model)
    {
        $class = "\\App\\Models\\" . ucfirst($model);

        return new $class(Conn::getDb());
    }
}

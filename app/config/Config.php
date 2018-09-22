<?php

namespace App\Config;

class Config
{
    const BASE_URL_PRODUCTION   = "/php-014-sofn-mvc";
    const PUBLIC_URL_PRODUCTION = "/php-014-sofn-mvc/public";
    const ASSETS_URL_PRODUCTION = "/php-014-sofn-mvc/public/assets";

    const BASE_URL_DEVELOPMENT   = "/php-014-sofn-mvc";
    const PUBLIC_URL_DEVELOPMENT = "/php-014-sofn-mvc/public";
    const ASSETS_URL_DEVELOPMENT = "/php-014-sofn-mvc/public/assets";

    public static function getConstBASE_URL()
    {
        if (ENVIRONMENT == 'production')
            return self::BASE_URL_PRODUCTION;
        else
            return self::BASE_URL_DEVELOPMENT;
    }

    public static function getConstPUBLIC_URL()
    {
        if (ENVIRONMENT == 'production')
            return self::PUBLIC_URL_PRODUCTION;
        else
            return self::PUBLIC_URL_DEVELOPMENT;
    }

    public static function getConstASSETS_URL()
    {
        if (ENVIRONMENT == 'production')
            return self::ASSETS_URL_PRODUCTION;
        else
            return self::ASSETS_URL_DEVELOPMENT;
    }
}

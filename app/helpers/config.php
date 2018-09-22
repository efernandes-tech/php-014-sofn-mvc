<?php

use App\Config\Config;

function base_url()
{
    return Config::getConstBASE_URL();
}

function public_url()
{
    return Config::getConstPUBLIC_URL();
}

function assets_url()
{
    return Config::getConstASSETS_URL();
}

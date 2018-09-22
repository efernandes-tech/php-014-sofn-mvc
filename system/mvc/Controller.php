<?php

namespace System\MVC;

abstract class Controller
{
    protected $view;
    public $data;
    public $page;

    public function __construct()
    {
        $this->data = array();
    }

    protected function render($view, $layout = 'default')
    {
        $this->view = $view;

        $singleClassName = $this->getSingleClassName();

        $this->page = $singleClassName . '/' . $view;

        if (file_exists("../app/layouts/".$layout.".php")) {
            include_once "../app/layouts/".$layout.".php";
        } else {
            $this->content();
        }
    }

    protected function content()
    {
        $singleClassName = $this->getSingleClassName();

        if (file_exists("../app/views/".$singleClassName."/".$this->view.".php")) {
            include_once "../app/views/".$singleClassName."/".$this->view.".php";
        } else {
            include_once "../app/errors/error_404.php";
        }
    }

    private function getSingleClassName()
    {
        $current = get_class($this);

        $singleClassName = strtolower(str_replace("Controller", "", str_replace("App\\Controllers\\", "", $current)));

        if (strpos($singleClassName, "\\") > 0) {
            $singleClassName = explode("\\", $singleClassName)[0];
        }

        return $singleClassName;
    }
}

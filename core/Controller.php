<?php

namespace app\core;

use app\core\Application;

/**
 * Class Controller
 * @author Celio Natti <celionatti@gmail.com>
 * @package app\core
 */

 class Controller
 {
    public string $layout = "main";

    public function __construct()
    {
        $this->onConstruct();
    }

    public function setLayout($layout)
    {
        $this->layout = $layout;
    }

    public function render($view, $params = [])
    {
        return Application::$app->router->renderView($view, $params);
    }

    public function onConstruct()
    {}
 }
<?php 

/**
 * Class Application
 * 
 * @author Celio Natti <celionatti@gmail.com>
 * @package app\core
 */

namespace app\core;

use app\core\Router;

 class Application
 {
    public static string $ROOT_DIR;
    public Router $router;
    public Request $request;
    public Response $response;
    public static Application $app;
    public Controller $controller;

    public function __construct($rootPath)
    {
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
    }

    public function run()
    {
        echo $this->router->resolve();
    }

    /**
     * Get the value of controller
     * 
     * @return \app\core\Controller
     */ 
    public function getController()
    {
        return $this->controller;
    }

    /**
     * Set the value of controller
     *
     * @param  \app\core\Controller
     */ 
    public function setController(Controller $controller): void
    {
        $this->controller = $controller;
    }
 }
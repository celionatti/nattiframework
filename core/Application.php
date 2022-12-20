<?php 

/**
 * Class Application
 * 
 * @author Celio Natti <celionatti@gmail.com>
 * @package app\core
 */

namespace app\core;

use app\core\database\Database;
use app\core\Router;
use app\models\User;
use app\models\UserModel;

 class Application
 {
    public static string $ROOT_DIR;
    public string $userClass;
    public Router $router;
    public Request $request;
    public Response $response;
    public Database $database;
    public Session $session;
    public static Application $app;
    public Controller $controller;
    public ?UserModel $user;

    public function __construct($rootPath, array $config)
    {
        $this->user = null;
        $this->userClass = $config['userClass'];
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->session = new Session();
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);

        $this->database = new Database($config['database']);

        /** */
        $userId = Application::$app->session->get('user');
        if ($userId) {
            $key = $this->userClass::primaryKey();
            $this->user = $this->userClass::findOne([$key => $userId]);
        }
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

    public static function isGuest()
    {
        return !self::$app->user;
    }

    public function login(UserModel $user)
    {
        $this->user = $user;
        $primaryKey = $user->primaryKey();
        $value = $user->{$primaryKey};
        $this->session->set('user', $value);
        return true;
    }

    public function logout()
    {
        $this->user = null;
        self::$app->session->remove('user');
    }
 }
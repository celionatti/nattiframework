<?php 

/** User: Celio Natti ***/

namespace app\controllers;

use app\core\Application;
use app\core\Request;
use app\core\Controller;
use app\core\Response;
use app\models\LoginForm;
use app\models\User;

/**
 * Class SiteController
 * 
 * @author celio natti <celionatti@gmail.com>
 * @package app\controllers
 */

 class AuthController extends Controller
 {
    public function login(Request $request, Response $response)
    {
        $this->setLayout('auth');

        $loginForm = new LoginForm();

        if($request->isPost()) {
            $loginForm->loadData($request->getBody());
            if($loginForm->validate() && $loginForm->login()) {
                $response->redirect('/');
                return;
            }
        }

        return $this->render('login', [
            'model' => $loginForm
        ]);
    }

    public function register(Request $request)
    {
        $this->setLayout('auth');

        $user = new User();

        if($request->isPost()) {
            $user->loadData($request->getBody());

            if($user->validate() && $user->save()) {
                Application::$app->session->setFlash('success', "Thanks for Registering.");
                Application::$app->response->redirect('/');
                exit;
            }

            return $this->render('register', [
                'model' => $user
            ]);
        }
        return $this->render('register', [
            'model' => $user
        ]);
    }

    public function logout(Request $request, Response $response)
    {
        Application::$app->logout();
        $response->redirect('/');
    }

 }
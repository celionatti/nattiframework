<?php 

/** User: Celio Natti ***/

namespace app\controllers;

use app\core\Application;
use app\core\Request;
use app\core\Controller;
use app\models\User;

/**
 * Class SiteController
 * 
 * @author celio natti <celionatti@gmail.com>
 * @package app\controllers
 */

 class AuthController extends Controller
 {
    public function login()
    {
        $this->setLayout('auth');
        return $this->render('login');
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

 }
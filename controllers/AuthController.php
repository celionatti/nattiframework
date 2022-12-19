<?php 

/** User: Celio Natti ***/

namespace app\controllers;

use app\core\Request;
use app\core\Controller;
use app\models\RegisterModel;

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

        $registerModel = new RegisterModel();

        if($request->isPost()) {
            $registerModel->loadData($request->getBody());

            if($registerModel->validate() && $registerModel->register()) {
                return "Success";
            }

            return $this->render('register', [
                'model' => $registerModel
            ]);
        }
        return $this->render('register', [
            'model' => $registerModel
        ]);
    }

 }
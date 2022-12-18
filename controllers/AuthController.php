<?php 

/** User: Celio Natti ***/

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;

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

        if($request->isPost()) {
            return "Handling Submitted Data";
        }
        return $this->render('register');
    }

 }
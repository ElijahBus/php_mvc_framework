<?php

namespace app\controllers;

use app\core\Request;
use app\core\Controller;
use app\core\Application;
use app\models\RegisterModel;

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
        
        if ($request->isPost()) {
            $registerModel->loadData($request->getBody());

            if ($registerModel->validate() && $registerModel->register()) {
                
                Application::$app->session->setFlash('success', "Thanks for registering");
                Application::$app->response->redirect('/');
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

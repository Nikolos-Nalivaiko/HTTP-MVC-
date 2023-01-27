<?php

namespace application\controllers;

use application\core\Controller;

class MainController extends Controller {

    public function indexAction() {

        $vars = [];

        if(isset($_POST['login_submit'])) {
            if(!$this->model->validSymbol(['user_login', 'user_pass'], $_POST)) {
                $error = $this->model->error;
                $vars = [
                    'error' => $error,
                ];
            } elseif (!$this->model->checkLogin($_POST['user_login'])){
                $error = $this->model->error;
                $vars = [
                    'error' => $error,
                ];
            } elseif(!$this->model->checkPass($_POST['user_login'],$_POST['user_pass'])) {
                $error = $this->model->error;
                $vars = [
                    'error' => $error,
                ];
            }
        } 

        $this->view->render('Главная страница', $vars);
    }

}
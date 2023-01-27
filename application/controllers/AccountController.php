<?php

namespace application\controllers;

use application\core\Controller;

class AccountController extends Controller {

    public function loginAction() {
        $this->view->render('Вход');
    }

    public function registerAction() {

        $cities = $this->model->getCities(5);
        $regions = $this->model->getRegions();
        $vars = [
            'cities' => $cities,
            'regions' => $regions,
        ];

        if(!empty($_POST)) {
        if(!$this->model->validSymbol(['login', 'password', 'user_name', 'user_middle_name', 'user_surname', 'pass_confirm'], $_POST)) {
            $error = $this->model->error;
            $vars = [
                'error' => $error,
            ];
        } elseif (!$this->model->validLenght(['login', 'password'], $_POST)) {
            $error = $this->model->error;
            $vars = [
                'error' => $error,
            ];
        } elseif (!$this->model->checkPassConfirm($_POST['password'],$_POST['pass_confirm'])) {
            $error = $this->model->error;
            $vars = [
                'error' => $error,
            ];
        } elseif(!$this->model->checkLogin($_POST['login'])) {
            $error = $this->model->error;
            $vars = [
                'error' => $error,
            ];
        } else {
            $this->model->addUsers($_POST);
            $success = $this->model->success;
            $vars = [
                'success' => $success,
            ];
        }
    }

        $this->view->render('Регистрация', $vars);
    }


}
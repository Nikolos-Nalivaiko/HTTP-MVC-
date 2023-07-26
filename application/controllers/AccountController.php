<?php

namespace application\controllers;

use application\core\Controller;

class AccountController extends Controller {


    public function loginAction() {

        $vars = [];

        $this->view->render('Авторизація', $vars);
    }

    public function selectAction() {

        $vars = [];

        $this->view->render('Тип профілю', $vars);
    }

    public function userCreateAction() {

        $valid = $this->validation->validFields($_POST);

        $success = null;

        if(isset($_POST['submit']) and $valid == false) {
            if($this->model->createUser($_POST)) {
                $success = $this->view->showSuccess('Профіль успішно зареєстровано !');
            } 
        }

        $regions = $this->model->selectRegions(); 

        $vars = [
            'error' => $valid,
            'success' => $success,
            'regions' => $regions
        ];

        if(isset($_POST['data'])) {
            $data = array("message" => "Це дані з AJAX-запиту!");
            echo json_encode($data);
            die();
        }

        $this->view->render('Створення профілю', $vars);
    }

    public function companyCreateAction() {

        $vars = [];

        $this->view->render('Створення профілю', $vars);
    }

}
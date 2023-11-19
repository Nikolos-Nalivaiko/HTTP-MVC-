<?php

namespace application\controllers;

use application\core\Controller;

class AccountController extends Controller {


    public function loginAction() {
        $valid = null;

        if(isset($_POST['formData'])) {
            $data = $_POST['formData'];

            $valid = $this->validation->validLogin($data);
            if($valid == null) {
                $id_user = $this->model->activeUser($data['login_auth']);
                $this->session->set('auth', true);
                $this->session->set('id_user', $id_user);
                if(isset($data['remember_auth'])) {
                    $key = $this->model->rememberUser($data['login_auth']);
                    $this->cookie->set('login', $data['login_auth']);
                    $this->cookie->set('key', $key);
                }
                echo json_encode(true);
            } else {
                echo json_encode($valid);
            }

            header('Content-Type: application/json');
            die();
        }

        $vars = [
            'auth' => $this->AuthInfoUser()
        ];

        $this->view->render('Авторизація', $vars);
    }

    public function selectAction() {

        $vars = [
            'auth' => $this->AuthInfoUser()
        ];

        $this->view->render('Тип профілю', $vars);
    }

    public function userCreateAction() {

        if(isset($_POST['formData'])) {
            $data = $_POST['formData'];

            $valid = $this->validation->validUserCreate($data);

            if($valid === null) {
                $create = $this->model->createUser($data);
                if($create['status'] == true) {
                    $this->session->set('auth', true);
                    $this->session->set('id_user', $create['id']);
                    $response = [
                        'status' => true,
                        'id_user' => $create['id']
                    ];
                    echo json_encode($response);
                }
            } else {
                echo json_encode($valid);
            }

            header('Content-Type: application/json');
            die();
        }

        $regions = $this->model->selectRegions(); 

        $vars = [
            'regions' => $regions,
            'auth' => $this->AuthInfoUser()
        ];

        if(isset($_POST['isAjax']) && $_POST['isAjax']) {
            $cities = $this->model->selectCity($_POST['region']);

            header('Content-Type: application/json');
            echo json_encode($cities);
            die();
        }

        if(isset($_FILES['file'])) { 
            $file = $_FILES['file'];
            $id_user = $_POST['user_id'];
            $this->model->uploadImage($file, $id_user);
        }

        $this->view->render('Створення профілю', $vars);
    }

    public function companyCreateAction() {

        $valid = null;

        if(isset($_POST['formData'])) {
            $data = $_POST['formData'];

            $valid = $this->validation->validCompanyCreate($data);

            if($valid === null) {
                $create = $this->model->createCompany($data);
                if($create['status'] == true) {
                    $this->session->set('auth', true);
                    $this->session->set('id_company', $create['id']);
                    echo json_encode(true); 
                }
            } else {
                echo json_encode($valid);
            }

            header('Content-Type: application/json');
            die();
        }

        $regions = $this->model->selectRegions(); 

        $vars = [
            'regions' => $regions,
            'auth' => $this->AuthInfoUser()
        ];

        if(isset($_POST['isAjax']) && $_POST['isAjax']) {
            $cities = $this->model->selectCity($_POST['region']);

            header('Content-Type: application/json');
            echo json_encode($cities);
            die();
        }

        if(isset($_FILES['file'])) { 
            $file = $_FILES['file'];
            $id_user = $_POST['user_id'];
            $this->model->uploadImage($file, $id_user);
        }

        $this->view->render('Створення профілю', $vars);
    }


}
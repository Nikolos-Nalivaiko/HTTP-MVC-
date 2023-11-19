<?php

namespace application\controllers;

use application\core\Controller;

class CargoController extends Controller {

    public function addAction() {

        $regions = $this->model->selectRegions();
        $payments = $this->model->selectPayment();
        $bodies = $this->model->selectBody();

        $currentURL = $_SERVER['REQUEST_URI'];

        if(isset($_POST['loadRegion'])) {
            $cities = $this->model->selectCities($_POST['loadRegion']);

            header('Content-Type: application/json');
            echo json_encode($cities);
            die();
        }

        if(isset($_POST['formData'])) {
            $data = $_POST['formData'];

            $valid = $this->validation->validCargo($data);

            if($valid == null) {
                $id_user = $this->session->get('id_user');
                $create = $this->model->createCargo($data, $id_user);
                if($create['status'] == true) {
                    $response = [
                        'status' => true,
                        'id_cargo' => $create['id_cargo']
                    ];
                    $qr_code = $this->qr->generateQr($create['id_cargo'], $currentURL, 'qr_cargos');
                    $this->model->setQr($create['id_cargo'], $qr_code);
                }
            } else {
                $response = [
                    'status' => false,
                    'message' => $valid
                ];
            }

            echo json_encode($response);
            header('Content-Type: application/json');
            die();
        }


        $vars = [
            'regions' => $regions,
            'bodies' => $bodies,
            'payments' => $payments,
            'auth' => $this->AuthInfoUser()
        ];

        $this->view->render('Додавання вантажу', $vars);
    }

    public function listAction() {

        $cargos = $this->model->getCargos();

        if(!$cargos) {
            $cargos = null;
        }

        $vars = [
            'cargos' => $cargos,
            'auth' => $this->AuthInfoUser()
        ];

        $this->view->render('Список вантажів', $vars);
    }

    public function infoAction() {

        preg_match('/cargo\/info\/(\d+)/', $_SERVER['REQUEST_URI'], $matches);

        $id_cargo = $matches[1];
        $cargo = $this->model->getCargo($id_cargo);

        if($cargo == null){
            $this->view::errorCode(404);
            $cargo = null;
        };

        $vars = [
            'cargo' => $cargo,
            'auth' => $this->AuthInfoUser()
        ];

        $this->view->render('Розширена інформація', $vars);
    }

}
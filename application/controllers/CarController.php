<?php

namespace application\controllers;

use application\core\Controller;

class CarController extends Controller {

    public function addAction() {

        $regions = $this->model->selectRegions();
        $bodies = $this->model->selectBodies();
        $brands = $this->model->getBrands();

        if(isset($_POST['region'])) {
            $cities = $this->model->selectCities($_POST['region']);

            header('Content-Type: application/json');
            echo json_encode($cities);
            die();
        }
 
        if(isset($_POST['brand'])) {
            $models = $this->model->getModels($_POST['brand']);

            header('Content-Type: application/json');
            echo json_encode($models);
            die();
        }

        if(isset($_POST['formData'])) {
            $data = $_POST['formData'];

            $currentURL = $_SERVER['REQUEST_URI'];

            $valid = $this->validation->validCar($data);

            if($valid == null) {
                $id_user = $this->session->get('id_user');
                $create = $this->model->createCar($data, $id_user);
                if ($create['status'] == true) {

                    $response = [
                        'status' => true,
                        'id_car' => $create['id_car']
                    ];
                    $qr_code = $this->qr->generateQr($create['id_car'], $currentURL, 'qr_cars');
                    $this->model->setQr($create['id_car'], $qr_code);
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

        if(isset($_FILES['files'])) { 
            $files = $_FILES['files'];
            $car_id = $_POST['car_id'];
            $previews_status = $_POST['preview'];
            $this->model->uploadImage($files, $car_id, $previews_status);
        }

        $vars = [
            'regions' => $regions,
            'bodies' => $bodies,
            'brands' => $brands,
            'auth' => $this->AuthInfoUser()
        ];

        $this->view->render('Додавання транспорту', $vars);
    }

    public function listAction() {

        $vars = [
            'auth' => $this->AuthInfoUser(),
            'cars' => $this->model->getCars()
        ];

        $this->view->render('Біржа вантажу', $vars);
    }

    public function infoAction() {

        preg_match('/car\/info\/(\d+)/', $_SERVER['REQUEST_URI'], $matches);

        $id_car = $matches[1];
        
        $vars = [
            'auth' => $this->AuthInfoUser(),
            'car' => $this->model->getCar($id_car)
        ];

        $this->view->render('Інформація про транспорт', $vars);
    }
} 
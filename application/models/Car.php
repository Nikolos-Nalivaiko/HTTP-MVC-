<?php

namespace application\models;
use application\core\Model;

class Car extends Model {

    public function selectRegions() {
        $sql = "SELECT * FROM regions";
        return $this->db->row($sql);
    }

    public function selectBodies() {
        $sql = "SELECT * FROM bodies";
        return $this->db->row($sql);        
    }

    public function selectCities($region) {
        $params = [
            'region' => $region
        ];

        $sql = "SELECT * FROM cities WHERE cities.region = :region";
        return $this->db->row($sql, $params);
    }

    public function getModels($brand) {
        $params = [
            'brand' => $brand
        ];

        $sql = "SELECT * FROM models WHERE models.brand_id = :brand";
        return $this->db->row($sql, $params);        
    }

    public function getBrands() {
        $sql = "SELECT * FROM brands";
        return $this->db->row($sql);        
    }

    public function createCar($data, $id_user) {
        $sql = "INSERT INTO `cars` (`brand`, `model`, `engine`, `wheel_mode`, `gearbox`, `power`, `mileage`, `engine_type`, `body`, `load_volume`, `region`, `city`, `description`, `price`, `id_user`) 
        VALUES (:brand, :model, :engine, :wheel_mode, :gearbox, :power, :mileage, :engine_type, :body, :load_volume, :region, :city, :description, :price, :id_user)";

        $params = [
            'brand' => $data['brand'],
            'model' => $data['model'],
            'engine' => $data['engine'],
            'wheel_mode' => $data['wheel-mode'],
            'gearbox' => $data['gearbox'],
            'power' => $data['power'],
            'mileage' => $data['mileage'],
            'engine_type' => $data['engine-type'],
            'body' => $data['body'],
            'load_volume' => $data['load-volume'],
            'region' => $data['region'],
            'city' => $data['city'],
            'description' => $data['description'],
            'price' => $data['price'],
            'id_user' => $id_user
        ];

        $execute = $this->db->query($sql, $params);

        return ['status' => true, 'id_car' => $execute['id']];
    }

    public function uploadImage($files, $car_id, $previews_status) {
        foreach ($files['name'] as $key => $file_name) {
            $preview_status = $previews_status[$key];
            $file_type = $files['type'][$key];
            $file_tmp = $files['tmp_name'][$key];
            $preview_status = $previews_status[$key];

            $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);

            $identifier = $this->generatePrefix($car_id);

            $new_file_name = $identifier.'.'.$file_extension;


            if ($this->checkFormat($file_type)) {
                $root_directory = $_SERVER['DOCUMENT_ROOT'];
                $upload_directory = $root_directory . '/HTTP-platform/public/car_uploads/';
                $file_destination = $upload_directory . $new_file_name;

                move_uploaded_file($file_tmp, $file_destination);
                $this->setImageDB($new_file_name, $car_id, $preview_status);
            } 
        }
    }

    private function generatePrefix($car_id) {
        $prefix = 'car-'.$car_id.'-';
        $randomNumber = mt_rand(1, 999999); 
        $identifier = $prefix . $randomNumber;
        return $identifier;
    }

    private function checkFormat($type) {
        if($type == 'image/png' || $type == 'image/jpg' || $type == 'image/jpeg' || $type == 'image/webp') {
            return true;
        } else {
            return false;
        }
    }

    public function setImageDB($image, $car_id, $previews_status) {
        $sql = "INSERT INTO `images` (`car_id`, `name`, `preview`) VALUES (:car_id, :image, :preview)";

        $params = [
            'car_id' => $car_id,
            'image' => $image,
            'preview' => $previews_status
        ];

        return $this->db->query($sql, $params);
    }

    public function getCars() {
        $sql = "SELECT * FROM cars";
        $car_list = $this->db->row($sql);
        foreach($car_list as $car) {
            $car['brand'] = $this->getBrand($car['brand']);
            $car['model'] = $this->getModel($car['model']);
            $car['region'] = $this->getRegion($car['region']);
            $car['city'] = $this->getCity($car['city']);
            $car['body'] = $this->getBody($car['body']);

            if($this->getPreview($car['id_car']) != null) {
                $car['image'] = $this->getPreview($car['id_car']);
            } else {
                $car['image'] = 'default.jpg';
            }

            $cars[] = $car;
        }
        return $cars;
    }

    private function getBrand($id_brand) {
        $sql = "SELECT name FROM brands WHERE id_brand = :id_brand";

        $params = [
            'id_brand' => $id_brand
        ];

        return $this->db->column($sql, $params);
    }

    private function getModel($id_model) {
        $sql = "SELECT name FROM models WHERE id_model = :id_model";

        $params = [
            'id_model' => $id_model
        ];

        return $this->db->column($sql, $params);
    }

    private function getRegion($id_region) {
        $params = [
            'id_region' => $id_region
        ];

        $sql = "SELECT name FROM regions WHERE id_region = :id_region";
        return $this->db->column($sql, $params);
    }

    private function getCity($id_city) {
        $params = [
            'id_city' => $id_city
        ];

        $sql = "SELECT name FROM cities WHERE id_city = :id_city";
        return $this->db->column($sql, $params);
    }

    private function getBody($id_body) {
        $params = [
            'id_body' => $id_body
        ];

        $sql = "SELECT name FROM bodies WHERE id_body = :id_body";
        return $this->db->column($sql, $params);
    }

    private function getPreview($id_car) {
        $sql = "SELECT name FROM images WHERE car_id=:car_id AND preview = :preview";

        $params = [
            'car_id' => $id_car,
            'preview' => 1
        ];

        return $this->db->column($sql, $params);
    }

    public function setQr($id_car, $qr_code) {
        $sql = "UPDATE `cars` SET `qr_code` = :qr_code WHERE `cars`.`id_car` = :id_car";

        $params = [
            'id_car' => $id_car,
            'qr_code' => $qr_code
        ];

        return $this->db->query($sql, $params);
    }

    public function getCar($id_car) {
        $sql = "SELECT * FROM cars JOIN users ON users.id_user = cars.id_user WHERE id_car=:id_car";

        $params = [
            'id_car' => $id_car
        ];

        $data_array = $this->db->row($sql, $params);

        foreach($data_array as $car) {
            $car['brand'] = $this->getBrand($car['brand']);
            $car['model'] = $this->getModel($car['model']);
            $car['region'] = $this->getRegion($car['region']);
            $car['city'] = $this->getCity($car['city']);
            $car['body'] = $this->getBody($car['body']);
            $car['images'] = $this->getImages($car['id_car']);

            if($car['status'] == 'user') {
                $car['status'] = 'Фізична особа';
            } else {
                $car['status'] = 'Підприємство';
            }
            
            return $car;
        }
    }

    private function getImages($id_car) {
        $sql = "SELECT name FROM images WHERE car_id=:id_car";

        $params = [
            'id_car' => $id_car
        ];

        $data_array = $this->db->row($sql, $params);

        foreach($data_array as $img) {
            $images[] = $img['name'];
        }
        return $images;
    }
}
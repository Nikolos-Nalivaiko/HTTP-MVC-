<?php

namespace application\models;
use application\core\Model;

class Cargo extends Model {

    public function selectRegions() {
        $sql = "SELECT * FROM regions";
        return $this->db->row($sql);
    }

    public function selectCities($region) {
        $params = [
            'region' => $region
        ];

        $sql = "SELECT * FROM cities WHERE cities.region = :region";
        return $this->db->row($sql, $params);
    }

    public function createCargo($data, $id_user) {

        $sql = "INSERT INTO `cargos` (`name`, `description`, `load_region`, `load_city`, `load_date`, `weight`, `id_body`, `distance`, `unload_region`, `unload_city`, `unload_date`, `price`, `payment`, `urgent`, `id_user`)
        VALUES (:name, :description, :load_region, :load_city, :load_date, :weight, :body, :distance, :unload_region, :unload_city, :unload_date, :price, :payment, :urgent, :id_user)";

        if(isset($data['urgent'])) {
            $urgent = 'yes';
        } else {
            $urgent = 'no';
        }

        $params = [
            'name' => $data['name'],
            'description' => $data['description'],
            'load_region' => $data['load_region'],
            'load_city' => $data['load_city'],
            'load_date' => $data['load_date'],
            'weight' => $data['weight'],
            'body' => $data['body'],
            'distance' => $data['distance'],
            'unload_region' => $data['unload_region'],
            'unload_city' => $data['unload_city'],
            'unload_date' => $data['unload_date'],
            'price' => $data['price'],
            'payment' => $data['pay_method'],
            'urgent' => $urgent,
            'id_user' => $id_user
        ];

        $execute = $this->db->query($sql, $params);

        return ['status' => true, 'id_cargo' => $execute['id']];
    }

    public function selectPayment() {
        $sql = "SELECT * FROM payments";
        return $this->db->row($sql);        
    }

    public function selectBody() {
        $sql = "SELECT * FROM bodies";
        return $this->db->row($sql);        
    }

    public function getCargos() {
        $sql = "SELECT * FROM cargos";
        $cargos_list = $this->db->row($sql);
        foreach($cargos_list as $cargo) {
            $cargo['load_region'] = $this->getRegion($cargo['load_region']);
            $cargo['load_city'] = $this->getCity($cargo['load_city']);
            $cargo['unload_region'] = $this->getRegion($cargo['unload_region']);
            $cargo['unload_city'] = $this->getCity($cargo['unload_city']);
            $cargo['id_body'] = $this->getBody($cargo['id_body']);
            $cargo['payment'] = $this->getPayment($cargo['payment']);
            $cargos[] = $cargo;
        };

        return $cargos;
    }

    public function getCargo($id_cargo) {
        $params = [
            'id_cargo' => $id_cargo
        ];

        $sql = "SELECT * FROM cargos WHERE id_cargo = :id_cargo";
        $data_array = $this->db->row($sql, $params);
        foreach($data_array as $cargo) {
            $cargo['load_region'] = $this->getRegion($cargo['load_region']);
            $cargo['load_city'] = $this->getCity($cargo['load_city']);
            $cargo['unload_region'] = $this->getRegion($cargo['unload_region']);
            $cargo['unload_city'] = $this->getCity($cargo['unload_city']);
            $cargo['id_body'] = $this->getBody($cargo['id_body']);
            $cargo['payment'] = $this->getPayment($cargo['payment']);

            if($cargo['id_cargo'] != $id_cargo) {
                return $cargo = null;
            } else {
                return $cargo;
            }
        };
    }

    public function getRegion($id_region) {
        $params = [
            'id_region' => $id_region
        ];

        $sql = "SELECT name FROM regions WHERE id_region = :id_region";
        return $this->db->column($sql, $params);
    }

    public function getCity($id_city) {
        $params = [
            'id_city' => $id_city
        ];

        $sql = "SELECT name FROM cities WHERE id_city = :id_city";
        return $this->db->column($sql, $params);
    }

    public function getBody($id_body) {
        $params = [
            'id_body' => $id_body
        ];

        $sql = "SELECT name FROM bodies WHERE id_body = :id_body";
        return $this->db->column($sql, $params);
    }

    public function getPayment($id_payment) {
        $params = [
            'id_payment' => $id_payment
        ];

        $sql = "SELECT name FROM payments WHERE id_payment = :id_payment";
        return $this->db->column($sql, $params);
    }
}
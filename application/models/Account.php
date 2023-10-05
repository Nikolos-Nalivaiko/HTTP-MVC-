<?php

namespace application\models;
use application\core\Model;

class Account extends Model {

    public function createUser($data) {

        $sql = "INSERT INTO `users` (`userName`, `middleName`, `lastName`, `login`, `password`, `region`, `city`, `phone`, `image`, `status`, `tariff`)
        VALUES (:user_name, :middle_name, :last_name, :login, :password, :region_id, :city_id, :phone, :image, :role, :tariff)";

        if(empty($data['file'])) {
            $file = 'default.jpg';
        } else {
            $file = $data['file'];
        }

        $password = password_hash($data['password'], PASSWORD_DEFAULT);

        $params = [
            'user_name' => $data['user-name'],
            'middle_name' => $data['middle-name'],
            'last_name' => $data['last-name'],
            'login' => $data['login'],
            'password' => $password,
            'region_id' => $data['region'],
            'city_id' => $data['city'],
            'phone' => $data['phone'],
            'image' => $file,
            'role' => 'user',
            'tariff' => $this->getBaseTariff()
        ];

        $execute = $this->db->query($sql, $params);

        return ['status' => true, 'id' => $execute['id']];
    }

    public function createCompany($data) {

        $sql = "INSERT INTO `users` (`companyName`, `login`, `password`, `region`, `city`, `phone`, `image`, `status`) 
        VALUES (:company_name, :login, :password, :region_id, :city_id, :phone, :image, :role)";

        if(empty($data['file'])) {
            $file = 'default.jpg';
        } else {
            $file = $data['file'];
        }

        $password = password_hash($data['password'], PASSWORD_DEFAULT);

        $params = [
            'company_name' => $data['company-name'],
            'login' => $data['login'],
            'password' => $password,
            'region_id' => $data['region'],
            'city_id' => $data['city'],
            'phone' => $data['phone'],
            'image' => str_replace(' ', '', $file),
            'role' => 'company',
        ];

        $execute = $this->db->query($sql, $params);

        return ['status' => true, 'id' => $execute['id']];
    }

    public function selectRegions() {
        $sql = "SELECT * FROM regions";
        return $this->db->row($sql);
    }

    public function selectCity($region) {
        $params = [
            'region' => $region
        ];

        $sql = "SELECT * FROM cities WHERE cities.region = :region";
        return $this->db->row($sql, $params);
    }

    public function activeUser($login) {
        $params = [
            'login' => $login,
        ];
        $sql = "SELECT id_user FROM users WHERE login=:login";
        $id_user = $this->db->column($sql, $params);
        return $id_user;
    }

    public function rememberUser($login) {
         $key = $this->generateSalt();

         $params = [
            'key' => $key,
            'login' => $login
         ];
         
        $sql = "UPDATE users SET cookie=:key WHERE login=:login";
        $this->db->query($sql,$params);
        return $key;
    }

    private function generateSalt() {
        $salt = '';
        $saltLenght = 10;

        for($i = 0; $i < $saltLenght; $i++) {
            $salt .= chr(mt_rand(33,126));
        }

        return $salt;
    }

    private function getBaseTariff() {
        $params = [
            'tariff_name' => 'basic'
        ];

        $sql = "SELECT `id_tariff` FROM tariffs WHERE tariff_name = :tariff_name";
        return $this->db->column($sql, $params);
    }
}
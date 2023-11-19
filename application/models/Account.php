<?php

namespace application\models;
use application\core\Model;

class Account extends Model {

    public function createUser($data) {

        $sql = "INSERT INTO `users` (`userName`, `middleName`, `lastName`, `login`, `password`, `region`, `city`, `phone`, `image`, `status`, `tariff`)
        VALUES (:user_name, :middle_name, :last_name, :login, :password, :region_id, :city_id, :phone, :image, :role, :tariff)";

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
            'image' => 'default.jpg',
            'role' => 'user',
            'tariff' => $this->getBaseTariff()
        ];

        $execute = $this->db->query($sql, $params);

        return ['status' => true, 'id' => $execute['id']];
    }

    public function createCompany($data) {

        $sql = "INSERT INTO `users` (`companyName`, `login`, `password`, `region`, `city`, `phone`, `image`, `status`) 
        VALUES (:company_name, :login, :password, :region_id, :city_id, :phone, :image, :role)";

        $password = password_hash($data['password'], PASSWORD_DEFAULT);

        $params = [
            'company_name' => $data['company-name'],
            'login' => $data['login'],
            'password' => $password,
            'region_id' => $data['region'],
            'city_id' => $data['city'],
            'phone' => $data['phone'],
            'image' => 'default.jpg',
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

    public function uploadImage($file, $id_user) {
            $file_type = $file['type'];
            $file_tmp = $file['tmp_name'];

            $file_name = $file['name'];

            $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);

            $identifier = $this->generatePrefix($id_user);

            $new_file_name = $identifier.'.'.$file_extension;


            if ($this->checkFormat($file_type)) {
                $root_directory = $_SERVER['DOCUMENT_ROOT'];
                $upload_directory = $root_directory . '/HTTP-platform/public/user_uploads/';
                $file_destination = $upload_directory . $new_file_name;

                move_uploaded_file($file_tmp, $file_destination);
                $this->setImageDB($new_file_name, $id_user);
            } 
    }

    private function generatePrefix($id_user) {
        $prefix = 'user-'.$id_user.'-';
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

    public function setImageDB($image, $user_id) {
        $sql = "UPDATE `users` SET `image` = :image WHERE `id_user` = :user_id";

        $params = [
            'user_id' => $user_id,
            'image' => $image,
        ];

        return $this->db->query($sql, $params);
    }

}
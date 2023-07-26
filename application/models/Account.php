<?php

namespace application\models;
use application\core\Model;

class Account extends Model {

    function createUser($data) {

        $sql = "INSERT INTO `users` (`login`, `password`, `name_user`,`middle_name`, `last_name`, `region_id`, `city_id`, `phone`, `image_id`, `role`, `rank`)  VALUES (:login, :password, :user_name, :middle_name, :last_name, :region_id, :city_id, :phone, :image_id, :role, :rank)";

        if(empty($data['file'])) {
            $file = 'default.jpg';
        } else {
            $file = $data['file'];
        }

        $params = [
            'login' => $data['login'],
            'password' => $data['password'],
            'user_name' => $data['user-name'],
            'middle_name' => $data['middle-name'],
            'last_name' => $data['last-name'],
            'region_id' => $data['region'],
            'city_id' => $data['city'],
            'phone' => $data['phone'],
            'image_id' => $file,
            'role' => 'user',
            'rank' => '0', 
        ];

        $this->db->query($sql, $params);

        return true;
    }

    function selectRegions() {
        $sql = "SELECT * FROM regions";
        return $this->db->row($sql);
    }

}
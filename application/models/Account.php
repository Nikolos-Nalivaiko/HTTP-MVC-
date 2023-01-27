<?php

namespace application\models;
use application\core\Model;

class Account extends Model {

    public $error;
    public $success;

    public function getCities($region) {
        $cities = $this->db->row("SELECT city_id, city_name FROM regions JOIN cities ON cities.id_region = regions.region_id WHERE region_id='$region'");
        foreach($cities as $val) {
            $city[] = '<option value="'.$val['city_id'].'">'.$val['city_name'].'</option>';
            
        }
        return $city;
    }

    public function getRegions() {
        $regions = $this->db->row("SELECT region_id, region_name FROM regions ");
        foreach($regions as $region) {
            $regions[] = '<option value="'.$region['region_id'].'">'.$region['region_name'].'</option>';
        }
        return $regions;
    }

    public function checkPassConfirm($pass, $confirm) {
        if($pass != $confirm) {
            $this->error = '<h3 class="error_mes">Паролі не співпадають</h3>';
            return false;
        }
        return true;
    }

    public function checkLogin($login) {
        $login = $this->db->column("SELECT `login` FROM users WHERE `login` = '$login'");
        if(!empty($login)) {
            $this->error = '<h3 class="error_mes">Такий пароль вже існує</h3>';
            return false;
        }
        return true;
    }

    public function addUsers($post){
        $params = [
            'login' => $post['login'],
            'password' => password_hash($post['password'], PASSWORD_DEFAULT),
            'user_name' => $post['user_name'],
            'user_middle_name' => $post['user_middle_name'],
            'user_surname' => $post['user_surname'],
            'user_type' => '0',
            'image' => 'no-image.jpg'
        ];

        $this->db->query('INSERT INTO users SET login = :login, password = :password, user_name = :user_name, middle_name = :user_middle_name,
        surname = :user_surname, user_type = :user_type, user_image = :image', $params);
        $this->success = '<h3 class="success_mes">Користувач зареєстрован</h3>';
    }

    public function validSymbol($inputs, $post) {
        foreach($inputs as $input) {
        $valid_string = preg_match("/[^0-9a-zа-яёієї\"\s\-_]+/ui", $post[$input]);
            if($valid_string == 1) {
                $this->error = '<h3 class="error_mes"> Невірний символ </h3>';
                return false;
            }
        }
        return true;
    }

    public function validLenght($inputs, $post) {
        foreach($inputs as $input) {
            if(strlen($post[$input]) > 15) {
                $this->error = '<h3 class="error_mes"> Багато символів </h3>';
                return false;
            } 
        }
        return true;
    }


}
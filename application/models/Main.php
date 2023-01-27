<?php

namespace application\models;
use application\core\Model;

class Main extends Model {

    public $error;

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

    public function checkLogin($login) {
        $params = [
            'login' => $login
        ];
        $user = $this->db->column('SELECT * FROM users WHERE login = :login', $params);
        if(empty($user)) {
            $this->error = '<h3 class="error_mes"> Логіну не існує </h3>';
            return false;
        }
        return true;
    }

    public function checkPass($pass,$login) {
        $params = [
            'login' => $login
        ];
        $user = $this->db->column('SELECT password FROM users WHERE login = :login', $params);
        if(password_verify($pass,$user)) {
            return true;
        } else {
            $this->error = '<h3 class="error_mes"> Невірний пароль </h3>';
            return false;
        }
    }

}
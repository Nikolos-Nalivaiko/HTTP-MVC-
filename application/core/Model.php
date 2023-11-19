<?php

namespace application\core;

use application\lib\Db;

abstract class Model {

    public $db;

    public function __construct()
    {
        $this->db = new Db;
    }

    public function checkLogin($login, $key) {
        $sql = "SELECT * FROM users WHERE login=:login AND cookie=:key";

        $params = [
            'login' => $login,
            'key' => $key,
        ];

        $result = $this->db->column($sql, $params);
        return $result;
    }

    public function selectUserRemember($login) {
        $sql = "SELECT * FROM `users` WHERE login = :login";
        $params = [
            'login' => $login
        ];
        $user = $this->db->row($sql, $params);
        return $user;
    }

    public function selectUser($id_user) {
        $sql = "SELECT * FROM users WHERE id_user = :id";
        $params = [
            'id' => $id_user
        ];
        $user = $this->db->row($sql, $params);     
        return $user;
    }

}
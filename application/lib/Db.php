<?php

namespace application\lib;

use PDO;

class Db {

    protected $db;

    public function __construct()
    {
        // Подключаемся к БД
       $config = require 'application/config/db.php';
       $this->db = new PDO('mysql:host='.$config['host'].';dbname='.$config['name'].'', $config['user'], $config['password']);
    }

    // Функция на выполнение запроса 
    public function query($sql, $params = []) {
        $stmt = $this->db->prepare($sql);
        if(!empty($params)) {
            foreach($params as $key => $val) {
                $stmt->bindValue(':'.$key, $val);
            }
        }
        $stmt->execute();
        $id = $this->db->lastInsertId();
        return ['stmt' => $stmt, 'id' => $id];
    }

    public function row($sql, $params = []) {
        $result = $this->query($sql, $params);
        return $result['stmt']->fetchAll(PDO::FETCH_ASSOC);
    }

    public function column($sql, $params = []) {
        $result = $this->query($sql, $params);
        return $result['stmt']->fetchColumn();
    }
}  
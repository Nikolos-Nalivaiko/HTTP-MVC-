<?php

namespace application\core;

use application\core\View;
use application\helper\Validation;

abstract class Controller {

    public $route;
    public $view;
    public $model;
    public $acl;
    public $validation;


    public function __construct($route)
    {
        // Пишем данные о текущем маршруте
       $this->route = $route;
        // Проверка на контроль доступа к странице    
       if(!$this->checkAcl()) {
        View::errorCode(404);
       }
        // Передаем маршрут классу View     
       $this->view = new View($route);
        // Подгружаем модели контроллеров     
       $this->model = $this->loadModel($route['controller']);
       $this->validation = new Validation;
    } 

    // Автозагрузчик моделей  
    public function loadModel($name) {
        $path = 'application\models\\'.ucfirst($name);

        if(class_exists($path)) {
            return new $path;
        }
    }

    public function checkAcl() {
        $this->acl = require 'application/acl/'.$this->route['controller'].'.php';
        if($this->isAcl('all')) {
            return true;
        } elseif (isset($_SESSION['auth']['id']) and $this->isAcl('authorize')) {
            return true;
        }
        return false;
    }

    public function isAcl($key) {
        return in_array($this->route['action'], $this->acl[$key]);
    }


}
<?php

namespace application\core;

class Router {

    // Массив маршрутов
    protected $routes = [];
    // Массив параметров
    protected $params = [];

    // Конуструктор вызываеться автоматически при вызове класса и этот код исполняеться 
    function __construct() 
    {
        // Подключаем наши маршруты в конструкторе
        $arr = require 'application/config/routes.php';
        // Цикл, который перебирает массив и записывает в функцию ключ и значение $route(account/login) и $params('controller' => 'account','action' => 'login')
        foreach($arr as $key => $val) {
            $this->add($key, $val);
        }
    }
    
    /* Метод который добавляет маршрут, параметрами принимает 
    $route - маршрут
    $params - параметры 
    */
    public function add($route, $params){
        $route = '#^'.$route.'$#';
        // Добавляем параметры в ключи массива $routes
        $this->routes[$route] = $params;
    }

    // Метод проверки есть ли такой маршрут
    public function match(){
        // Получаем наш текущий УРЛ, и обрезаем лишнее
        $url = trim($_SERVER['REQUEST_URI'], 'HTTP(MVC)/');

        // Перебираем массив маршрутов $routes  
        foreach($this->routes as $route => $params) {
            // Проверяем совпадения в текущем УРЛ
            if(preg_match($route, $url, $matches)) {
                // Запишем в массив текущие параметры 
                $this->params = $params;
                return true;
            } 
        }
        return false;
    }

    public function run(){
        // Если у нас проверка успешна, вывело true тогда:
        if ($this->match()) {
            // Путь к  контроллеру 
            $path = 'application\controllers\\'.ucfirst($this->params['controller']).'Controller';
            // Проверка на существоание контроллера
            if(class_exists($path)) {
                // Путь к action 
                $action = $this->params['action'].'Action';
                // Проверка на существование action
                if(method_exists($path, $action)) {
                    // Создаем экземпляр класса
                    $controller = new $path($this->params);
                    // Вызываем наш экшн
                    $controller->$action();
                } else {
                    View::errorCode(404);
                }
            } else {
                View::errorCode(404);
            }
        } else {
            View::errorCode(404);
        }
    }

}
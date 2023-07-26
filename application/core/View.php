<?php

namespace application\core;

class View {

    // Путь к виду
    public $path;
    public $route;
    // Шаблон
    public $layout = 'default';

    // Получаем наш маршрут с Сontroller 
    public function __construct($route)
    {
        $this->route = $route;
        $this->path = $route['controller'].'/'.$route['action'];
    }

    // Загружает шаблон и вид
    public function render($title, $vars = []) {

        if(file_exists('application/views/'.$this->path.'.php')) {

            extract($vars);

            ob_start();
            require 'application/views/'.$this->path.'.php';
            $content = ob_get_clean();
            require 'application/views/layouts/'.$this->layout.'.php';

        } else {
            echo "Вид не найден";
        }
    }


    public static function errorCode($code) {
        http_response_code($code);

        require 'application/views/errors/'.$code.'.php';
        exit;
    }
    
    // Функция редиректа
    public function redirect($url) {
        header('Location: '.$url);
        exit;
    }

    public function showSuccess($message) {
        return "
        <div class='success-message message'>
            <div class='success-message__info-bar'>
                <p class='success-message__icon __icon-check'></p>
                <p class='success-message__text'>$message</p>
            </div>
            <p class='message-close __icon-close'></p>
        </div>
        ";
    }

}
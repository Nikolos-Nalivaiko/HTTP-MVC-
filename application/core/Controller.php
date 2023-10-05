<?php

namespace application\core;

use application\core\View;
use application\helper\Validation;
use application\helper\Session;
use application\helper\Cookie;

abstract class Controller {

    public $route;
    public $view;
    public $model;
    public $acl;
    public $validation;
    public $session;
    public $cookie;


    public function __construct($route)
    {
       $this->route = $route;
       $this->view = new View($route);
       $this->model = $this->loadModel($route['controller']);
       $this->validation = new Validation;
       $this->session = new Session;
       $this->cookie = new Cookie;
       if(!$this->checkAcl()) {
        View::errorCode(403);
       }
    } 

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
        } elseif ($this->session->has('auth') == true  && $this->isAcl('authorize')) {
            return true;
        }
        return false;
    }

    public function isAcl($key) {
        return in_array($this->route['action'], $this->acl[$key]);
    }


}
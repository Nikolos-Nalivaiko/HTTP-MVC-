<?php

namespace application\core;

use application\core\View;
use application\helper\Validation;
use application\helper\Session;
use application\helper\Cookie;
use application\helper\Qr;

abstract class Controller {

    public $route;
    public $view;
    public $model;
    public $acl;
    public $validation;
    public $session;
    public $cookie;
    public $qr;


    public function __construct($route)
    {
       $this->route = $route;
       $this->view = new View($route);
       $this->model = $this->loadModel($route['controller']);
       $this->validation = new Validation;
       $this->session = new Session;
       $this->cookie = new Cookie;
       $this->qr = new Qr;
       if(!$this->checkAcl()) {
        View::errorCode(403);
       }
       $this->checkAuthUser();
       $this->AuthInfoUser();
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

    public function checkAuthUser() {
        $session_login = $this->session->get('auth');

        $cookie_login = $this->cookie->get('login');
        $cookie_key = $this->cookie->get('key');

        // $this->session->remove('auth');
        // $this->session->remove('id_user');
        // $this->cookie->delete('key');
        // $this->cookie->delete('login');

        if(empty($session_login) or $session_login == false) {
            if(!empty($cookie_login) && !empty($cookie_key)) {

                $login = $cookie_login;
                $key = $cookie_key;

                $result = $this->model->checkLogin($login, $key);

                if(!empty($result) or $result != false) {

                    $user = $this->model->selectUserRemember($login);
                    foreach($user as $value) {
                        $this->session->set('id_user', $value['id_user']);
                        $this->session->set('auth', true);
                    }
                } 
            } 
        } 
    }

    public function AuthInfoUser() {
        if($this->session->get('auth') == true) {
            $id_user = $this->session->get('id_user');
            $user = $this->model->selectUser($id_user);
            
            foreach ($user as $value) {}

            if($value['status'] == 'user') {
                $value['status'] = 'Фізична особа';
            } else {
                $value['status'] = 'Підприємство';
            }

            return [
                'auth' => true,
                'last_name' => $value['lastName'],
                'middle_name' => mb_substr($value['middleName'], 0, 1, 'UTF-8').'.',
                'user_name' => mb_substr($value['userName'], 0, 1, 'UTF-8').'.',
                'status' => $value['status'],
                'image' => $value['image'],
            ];
        } else {
            return ['auth' => false];
        }
    }

}
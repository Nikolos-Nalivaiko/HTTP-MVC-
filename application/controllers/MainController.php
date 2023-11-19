<?php

namespace application\controllers;

use application\core\Controller;

class MainController extends Controller {

    public function indexAction() {

        $vars = [
            'auth' => $this->AuthInfoUser()
        ];

        $this->view->render('Головна сторінка', $vars);
    }

}
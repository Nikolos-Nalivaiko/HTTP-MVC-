<?php

namespace application\controllers;

use application\core\Controller;

class MainController extends Controller {

    public function indexAction() {

        $vars = [];
 
        $this->view->render('Головна сторінка', $vars);
    }

}
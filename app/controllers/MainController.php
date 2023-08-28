<?php

namespace app\controllers;
use app\core\Controller;

class MainController extends Controller  {

    public function index() {
        $vars = [
        ];
        $this->view->render("Registration form", $vars);
    }
}
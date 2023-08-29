<?php

namespace app\controllers;
use app\core\Controller;

class MainController extends Controller  {

    public function index() {
        $vars = [
        ];
        $this->view->render("Registration form", $vars);
    }

    public function social_buttons() {
        $this->model->saveForm($_POST);
        $vars = [
        ];
        $this->view->render("Social buttons", $vars);
    }
}
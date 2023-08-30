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

        $targetDir = "public/img/";
        $targetFile = $targetDir . basename($_POST["photo"]);
        strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        $number = $this->model->recordsNumber();
        $vars = [
            'number' => $number[0][0]
        ];
        // var_dump($_POST);
        $this->view->render("Social buttons", $vars);
    }

    public function all_members() {
        $users = $this->model->showData();
        $vars = [
            'users' => $users
        ];
        $this->view->render("All members", $vars);
    }
}
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
        // $targetDir = "public/img/";
        // $targetFile = $targetDir . basename($_POST["photo"]);
        // strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        if ($_FILES['photo']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'public/img/';
            $photo = uniqid() . '_' . $_FILES['photo']['name'];
            $targetFile = $uploadDir . $photo;
            move_uploaded_file($_FILES['photo']['tmp_name'], $targetFile);
        } else {
            $photo = '';
        }

        $this->model->saveForm($_POST, $photo);
        

        $number = $this->model->recordsNumber();
        $tw = require 'app/config/tw_share.php';
        $vars = [
            'number' => $number[0][0],
            'tw' => $tw
        ];

        // var_dump($_FILES);
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
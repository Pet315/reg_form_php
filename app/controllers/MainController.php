<?php

namespace app\controllers;
use app\core\Controller;
use app\core\View;

class MainController extends Controller  {

    public function index() {
        $vars = [
        ];
        $this->view->render("Registration form", $vars);
    }

    public function step2() {
        $_SESSION['POST'] = $_POST;
        if ($this->model->checkEmail($_POST['email'])[0][0] > 0) {
            return View::errorDefine('Main page', 'Wrong email');
        }
        $this->model->saveForm($_POST);

        $vars = [
            'step1' => $_POST
        ];
        $this->view->render("Step 2", $vars);
    }

    public function social_buttons() {
         if ($_FILES['photo']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'public/img/';
            $photo = uniqid() . '_' . $_FILES['photo']['name'];
            $targetFile = $uploadDir . $photo;
            move_uploaded_file($_FILES['photo']['tmp_name'], $targetFile);
        } else {
            $photo = '';
        }

        $this->model->deleteByEmail($_POST['email']);
        $this->model->saveForm($_POST, false, $photo);
        

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
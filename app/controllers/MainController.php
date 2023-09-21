<?php

namespace app\controllers;
use app\core\Controller;
use app\core\View;

class MainController extends Controller  {

    public function index() {
        session_destroy();
        session_start();
        $this->view->render("Main page");
    }

    public function step2() {
        $this->ifNotPost();

        session_destroy();
        session_start();
        $_SESSION['POST'] = $_POST;

        $errors = [];

        foreach ($_POST as $key => $value) {
            if ($value === '') {
                $key = str_replace("_", " ", $key);
                $errors[] = "Please enter $key";
            }
        }

        if (strpos($_POST['phone'], "_")) {
            $errors[] = "Enter your phone number in full";
        }

        if (!strpos($_POST['email'], "@")) {
            $errors[] = "Please use @ in your email";
        }

        $emailRepeats = $this->model->checkField($_POST['email'], 'email')[0][0];
        $phoneRepeats = $this->model->checkField($_POST['phone'], 'phone')[0][0];

        if ($emailRepeats < 1 or $phoneRepeats < 1) {
            if ($emailRepeats > 0) {
                $errors[] = 'This email already exists';
            }

            if ($phoneRepeats > 0) {
                $errors[] = 'This phone number already exists';
            }
        }

        if (!empty($errors)) {
            return View::errorDefine('Main page', $errors);
        }

        $this->model->deleteByEmailAndPhone($_POST['email'], $_POST['phone']);
        $this->model->saveForm($_POST);

        $this->view->render("Step 2");
    }

    public function social_buttons() {
        $this->ifNotPost();
        
        var_dump($_FILES);
        if ($_FILES['photo']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'public/img/';
            $photo = uniqid() . '_' . $_FILES['photo']['name'];
            $targetFile = $uploadDir . $photo;
            move_uploaded_file($_FILES['photo']['tmp_name'], $targetFile);
        } else {
            $photo = '';
        }

        $this->model->deleteByEmailAndPhone($_POST['email'], $_POST['phone']);
        $this->model->saveForm($_POST, false, $photo);
        
        $number = $this->model->recordsNumber();
        $tw = require 'app/config/tw_share.php';
        $vars = [
            'number' => $number[0][0],
            'tw' => $tw
        ];

        $this->view->render("Social buttons", $vars);
    }

    public function all_members() {
        $users = $this->model->showData();
        $vars = [
            'users' => $users
        ];
        $this->view->render("All members", $vars);
    }

    public function ifNotPost() {
        if (!isset($_POST['first_name'])) {
            return View::errorDefine('Main page');
        }
    }
}
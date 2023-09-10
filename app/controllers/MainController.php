<?php

namespace app\controllers;
use app\core\Controller;
use app\core\View;

class MainController extends Controller  {

    public function index() {
        session_destroy();
        session_start();
        $vars = [
        ];
        $this->view->render("Main page", $vars);
    }

    public function step2() {
        if (!isset($_POST['first_name'])) {
            return View::errorDefine('Main page');
        }

        session_destroy();
        session_start();
        $_SESSION['POST'] = $_POST;

        foreach ($_POST as $key => $value) {
            if ($value === '') {
                $key = str_replace("_", " ", $key);
                return View::errorDefine('Main page', "Please enter $key");
            }
        }

        if (strpos($_POST['phone'], "_")) {
            return View::errorDefine('Main page', "Enter your phone number in full");
        }

        if (!strpos($_POST['email'], "@")) {
            return View::errorDefine('Main page', "Please use @ in your email");
        }

        $emailRepeats = $this->model->checkField($_POST['email'], 'email')[0][0];
        $phoneRepeats = $this->model->checkField($_POST['phone'], 'phone')[0][0];

        if ($emailRepeats < 1 or $phoneRepeats < 1) {
            if ($emailRepeats > 0) {
                return View::errorDefine('Main page', 'This email already exists');
            }

            if ($phoneRepeats > 0) {
                return View::errorDefine('Main page', 'This phone number already exists');
            }
        }

        $this->model->deleteByEmailAndPhone($_POST['email'], $_POST['phone']);
        $this->model->saveForm($_POST);

        $vars = [
        ];
        $this->view->render("Step 2", $vars);
    }

    public function social_buttons() {
        if (!isset($_POST['first_name'])) {
            return View::errorDefine('Main page');
        }
        
        // var_dump($_FILES);
        if ($_FILES['photo']['error'] === UPLOAD_ERR_OK) {
            // $maxFileSize = 2 * 1024 * 1024;
            // if ($_FILES['photo']['size'] > $maxFileSize) {
            //     session_destroy();
            //     session_start();
            //     $_SESSION['POST'] = $_POST;
            //     return View::errorPhoto('Step 2', 'The file size exceeds the maximum allowed (2MB)');
            // }

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
}
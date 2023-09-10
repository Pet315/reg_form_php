<?php

namespace app\core;

class View {
    public $path;

    public function __construct($route) {
        $this->route = $route;
        $this->path = $route['controller'].'/'.$route['action'];
    }

    public function render($title, $vars=[], $content='') {
        extract($vars);
        $path = 'app/views/'.$this->path.'.php';
        if (file_exists($path)) {
            ob_start();
            require $path;
        } else {
            $this->error();
        }
    }

    public function error($title='Page not found', $content='') {
        ob_start();
        require 'app/views/main/index.php';
        exit();
    }

    public static function errorDefine($title='Main page', $content='') {
        ob_start();
        require 'app/views/main/index.php';
        exit();
    }

    public static function errorPhoto($title='Step 2', $content='') {
        ob_start();
        require 'app/views/main/step2.php';
        exit();
    }
}
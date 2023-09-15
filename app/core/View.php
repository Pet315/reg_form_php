<?php

namespace app\core;

class View {
    public $path;

    public function __construct($route) {
        $this->route = $route;
        $this->path = $route['controller'].'/'.$route['action'];
    }

    public function render($title, $vars=[], $error='') {
        extract($vars);
        $path = 'app/views/'.$this->path.'.php';
        if (file_exists($path)) {
            ob_start();
            require $path;
            $content = ob_get_clean();
            require 'app/views/layout.php';
        } else {
            $this->error();
        }
    }

    public function error($title='Page not found', $error='') {
        ob_start();
        require 'app/views/main/index.php';
        $content = ob_get_clean();
        require 'app/views/layout.php';
        exit();
    }

    public static function errorDefine($title='Main page', $error='') {
        ob_start();
        require 'app/views/main/index.php';
        $content = ob_get_clean();
        require 'app/views/layout.php';
        exit();
    }
}
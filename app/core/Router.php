<?php

namespace app\core;

class Router {
    protected $routes = [];
    protected $params = [];

    public function __construct() {
        $arr = require 'app/config/routes.php';
        foreach ($arr as $key => $value) {
            $this->add($key, $value);
        }
    }

    public function add($route, $params) {
        $route = '#^'.$route.'$#'; // regular expression
        $this->routes[$route] = $params;
    }

    public function match() {
        $url = trim($_SERVER['REQUEST_URI'], '/'); // delete slash
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url) or stristr($url, $params['action'], true)) {
                $this->params = $params;
                return true;
            }
        }
        return false;
    }

    public function run() {
        if($this->match()) {
            $path = 'app\controllers\\' . ucfirst($this->params['controller']) . 'Controller';
            if (class_exists($path)) {
                $action = $this->params['action'];
                if (method_exists($path, $action)) {
                    $controller = new $path($this->params);
                    $controller->$action();
                } else {
                    View::errorDefine();
                }
            } else {
                View::errorDefine();
            }
        } else {
            if ($path == '') {
                View::errorDefine('aaa');
            }
        }
    }

}
<?php

namespace app\core;

use app\core\View;

class Router {

    private $route = [];
    private $routes = [];

    public function __construct() {
        $arr = require_once 'app/config/routes.php';
        foreach ($arr as $k => $v) {
            $this->add($k, $v);
        }
    }

    private function add($regex, $route) {
        $this->routes[$regex] = $route;
    }

    public function dispatch($url) {
        $url = $this->cleanQuery($url);
        if($this->match($url)) {
            $controller = 'app\controllers\\' . $this->route['controller'] . 'Controller';
            if (class_exists($controller)) {
                $controllerObject = new $controller($this->route);
                $action = self::lowerCamalCase($this->route['action']) . 'Action';
                if (method_exists($controllerObject, $action)) {
                    $controllerObject->$action();
                } else {
                    View::errorCode(404);
                }
            } else {
                View::errorCode(404);
            }
        } else {
            View::errorCode(404);
        }
    }
    private function match($url) {
        foreach ($this->routes as $pattern => $route) {
            if(preg_match("#^{$pattern}$#", $url, $matches)) {
                foreach ($matches as $k => $v) {
                    if(is_string($k)) {
                        $route[$k] = $v;
                    }
                }
                $route['controller'] = self::upperCamalCase($route['controller']);
                $this->route = $route;
                return true;
            }
        }
        return false;
    }

    private static function upperCamalCase($name) {
        $name = str_replace(' ', '', ucwords(str_replace('-', ' ', $name)));
        return $name;
    }

    private  static  function  lowerCamalCase($name) {
        $name = lcfirst(self::upperCamalCase($name));
        return $name;
    }

    public function cleanQuery($url) {
        if($url) {
            $params = explode('&', $url, 2);
            if(false === strpos($params[0], '=')) {
                return rtrim($params[0], '/');
            } else{
                return '';
            }
        }
    }
}
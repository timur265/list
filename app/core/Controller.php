<?php


namespace app\core;

use app\core\View;
use app\core\Model;

abstract class Controller {

    protected $model;
    protected $view;
    protected $route;


    public function __construct($route) {
        $this->route = $route;
        $this->view = new View($route);
        $this->model = $this->loadModel($route['controller']);
    }

    private function loadModel($name) {
        $path = 'app\models\\' . $name;
        if (class_exists($path)) {
            return new $path;
        }
    }


}
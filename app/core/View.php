<?php


namespace app\core;


class View {

    public $route;
    public $layout = 'default';

    public function __construct($route) {
        $this->route = $route;
    }

    public function render($vars = []) {
        extract($vars);
        $viewFile = "app/views/{$this->route['controller']}/{$this->route['action']}.php";
        if(is_file($viewFile)) {
            ob_start();
            require_once $viewFile;
            $content = ob_get_clean();
        }
        require 'app/views/layouts/'.$this->layout.'.php';
    }

    function redirect($http = false) {
        if($http) {
            $redirect = $http;
        }else{
            $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '/';
        }
        header("Location: $redirect");
        exit;
    }


    public static function errorCode($code) {
        http_response_code($code);
        $path = 'application/views/errors/'.$code.'.php';
        if (file_exists($path)) {
            require $path;
        }
        exit;
    }

    public function message($status, $message) {
        exit(json_encode(['status' => $status, 'message' => $message]));
    }


}
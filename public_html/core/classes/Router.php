<?php

class Router {

    private $module = 'index';
    private $controller = 'index';
    private $action = 'index';
    private $params = [];

    function __construct() {
        $url = trim($_SERVER['REQUEST_URI'], '/');
        $params = explode('/', $url);
        if (!empty($params[0])) {
            $this->module = $params[0];
            if (!empty($params[1])) {
                $this->controller = $params[1];
            }
            if (!empty($params[2])) {
                $this->action = $params[2];
            }

            if (!empty($params[3])) {
                $this->params = array_splice($params, 3);
            }
        }
    }

    public function run() {
        $controllerName = "\\App\\" . ucfirst($this->module) . "\\Controllers\\" . ucfirst($this->controller) . "Controller";
        if (!class_exists($controllerName)) {
            throw new \Exception('Error: '.$controllerName.' Controller not found');
        }
        $controller = new $controllerName;
        
        $action = $this->action . 'Action';
        if (!method_exists($controller, $action)) {
            throw new \Exception('Error: '.$controllerName.'->'.$action.' not found');
        }
        
        call_user_func_array([$controller, $action], $this->params);
    }

}

?>
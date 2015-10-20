<?php
use Controller\Controller;
use Controller\User;
/**
 * Created by IntelliJ IDEA.
 * User: adi
 * Date: 14.10.2015
 * Time: 13:37
 */
class Router
{
    private $controller;
    private $function;

    public function __construct($params) {
        $parts = array_filter(explode('/', $params));
        $this->controller = $parts[1];
        $this->function = !empty($parts[2]) ? $parts[2] : "index";
        require_once BASE . 'lib\DbHandler.php';
        require_once BASE . 'lib\DbConnection.php';
        require_once BASE . 'views\User\displayuser.php';
       /* $handler = new DbHandler(); */

        if(file_exists(BASE . 'controller' . DS . ucfirst($this->controller) . '.php')) {
            require_once BASE . 'controller' . DS . 'Controller.php';
            require_once BASE . 'controller' . DS . ucfirst($this->controller) . '.php';
            $c = "Controller\\" .ucfirst($this->controller);
            $controllerObject = new $c();

            if(method_exists($controllerObject, $this->function)) {
                //call_user_func(array($controllerObject, $this->function));
                $controllerObject->{$this->function}();
                //$controllerObject->$this->function();
            }
        }
        else{
            require_once ('./myproject/404.html');
            }
        }
}
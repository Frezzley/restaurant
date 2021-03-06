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
    private $id;

    public function __construct($params)
    {
        //User/restaurantList?term=migr
        $parts = array_filter(explode('/', $params));
        $parts2 = explode('?', $parts[2]);
        $parts[2] = $parts2[0];
        if ($parts2[1] != null){
        $get = $parts2[1];
        }
        $this->controller = !empty($parts[1]) ? $parts[1] : "home";
        $this->function = !empty($parts[2]) ? $parts[2] : "index";

        $this->id = !empty($parts[3]) ? $parts[3] : null;
        require_once BASE . 'lib\DbHandler.php';
        require_once BASE . 'lib\DbConnection.php';
        /* $handler = new DbHandler(); */

        if (file_exists(BASE . 'controller' . DS . ucfirst($this->controller) . '.php')) {
            require_once BASE . 'controller' . DS . 'Controller.php';
            require_once BASE . 'controller' . DS . ucfirst($this->controller) . '.php';
            $c = "Controller\\" . ucfirst($this->controller);

            $controllerObject = new $c();

            if (method_exists($controllerObject, $this->function)) {
                //call_user_func(array($controllerObject, $this->function));
                $controllerObject->{$this->function}($this->id);
                //$controllerObject->{$this->function}();
                //$controllerObject->$this->function();
            }
            //require_once BASE . 'LayoutFooter.php';

        } elseif ($this->controller == 'home') {
           // require_once BASE . 'views\Home.php';
            require_once BASE . 'controller\Home.php';

        } elseif ($this->controller == '') {
            //header('Location: \home')
            require_once BASE . 'controller\Home.php';
        } else {
            require_once BASE . '404.html';
        }
    }
}
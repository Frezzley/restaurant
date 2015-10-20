<?php
namespace Controller;

use View;
use Model;

require_once BASE . 'controller' . DS . 'Controller.php';
require_once BASE . 'views' . DS . 'User' . DS . 'create.php';
require_once BASE . 'lib\DbConnection.php';
require_once BASE . 'lib\DbHandler.php';
/**
 * Created by IntelliJ IDEA.
 * User: adi
 * Date: 14.10.2015
 * Time: 09:35
 */
class User extends Controller {

    public function create() {
        if(!empty($_POST)) {
            var_dump($_POST);

            $user = new Model\User();
            $user->setName($_POST['FirstName']);
            createUser();




            displayuser();
        } else {
            $view = new View\Create();
            echo $view->render();





            return $view;
        }
    }
}
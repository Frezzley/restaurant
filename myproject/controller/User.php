<?php
namespace Controller;

use View;
use Model;
use Lib;

require_once BASE . 'controller' . DS . 'Controller.php';
require_once BASE . 'views' . DS . 'User' . DS . 'create.php';
require_once BASE . 'lib\DbConnection.php';
require_once BASE . 'lib\DbHandler.php';
require_once BASE . 'model\user.php';
/**
 * Created by IntelliJ IDEA.
 * User: adi
 * Date: 14.10.2015
 * Time: 09:35
 */
class User extends Controller {

    public function create() {
        if(!empty($_POST)) {
            $user = new Model\User();
            $user->setFirstName($_POST['Firstname']);
            $user->setName($_POST['Lastname']);

            /**
             * @var $dbHandler DbHandler
             */
            $dbHandler = new Lib\DbHandler();
            $dbHandler->createUser($user);

        } else {
            $view = new View\CreateUser();
            echo $view->render();
            return $view;
        }
    }
}
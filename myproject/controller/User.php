<?php
namespace Controller;

use View;
use Model;
use Lib;

require_once BASE . 'controller' . DS . 'Controller.php';
require_once BASE . 'views' . DS . 'User' . DS . 'Create.php';
require_once BASE . 'views' . DS . 'User' . DS . 'Detail.php';
require_once BASE . 'views' . DS . 'User' . DS . 'Edit.php';
require_once BASE . 'views' . DS . 'User' . DS . 'Show.php';
require_once BASE . 'views' . DS . 'User' . DS . 'EditmoreUserPreferences.php';
require_once BASE . 'views' . DS . 'User' . DS . 'Login.php';
require_once BASE . 'lib\DbConnection.php';
require_once BASE . 'lib\DbHandler.php';
require_once BASE . 'model\Model.php';
require_once BASE . 'model\User.php';
require_once BASE . 'model\Restaurant.php';

/**
 * Created by IntelliJ IDEA.
 * User: adi
 * Date: 14.10.2015
 * Time: 09:35
 */
class User extends Controller
{

    public function create()
    {
        if (!empty($_POST)) {
            $user = new Model\User();

            $user->setFirstName($_POST['Firstname']);
            $user->setName($_POST['Lastname']);
            /**
             * @var $dbHandler DbHandler
             */
            $dbHandler = new Lib\DbHandler();
            $result = $dbHandler->createUser($user);
           if($result)
           {
               header('Location: /user/detail/' . $result);
               exit;
           };
        } else {
            $view = new View\CreateUser();
            $view->show($view);
            return $view;
        }
    }

    public function detail($id)
    {
        $dbHandler = new Lib\DbHandler();
        $user = $dbHandler->getUser($id);
        if(empty($user))
        {
            header('Location: /user/create');
            exit;
        }

        /**
         * @var $dbHandler DbHandler
         */
        $view = new View\DetailUser();
        $view->setVars($user);
        ?><div><?php
        echo $view->render();
        ?></div><?php
    }

    public function edit($id)
    {
        $dbHandler = new Lib\DbHandler();
        $user = $dbHandler->getUser($id);
        if (!empty($_POST)) {
            $user->setFirstName($_POST['Firstname']);
            $user->setName($_POST['Lastname']);
            $user->setPreferences($_POST['Preferences']);

            if ($dbHandler->updateUser($user) == false) {
                $error = "Error";
                $values = array("User" => $user, "Error" => $error);
                $view = new View\EditUser();
                $view->setVars($values);
                echo $view->render();
            } else {
                header('Location: /user/detail/' . $user->getId());
                exit;
            }
        } else {
            if ($user != null) {
                $view = new View\EditUser();
                $list = $dbHandler->getRestaurants();

                $view->setVars(array("User" => $user),$list);
                echo $view->render();
            } else {
                header('Location: /user/create');
                exit;
            }
        }
    }

    public function index ()
    {
        $dbHandler = new Lib\DbHandler();

        //objekte in ein array
        $list = $dbHandler->getUsers();
        $view = new View\ShowUsers();
        $view->setVars($list);
        echo $view->render();
    }

    public function editmore($ID){
        $dbHandler = new Lib\DbHandler();
        //objekte in ein array
        $user = $dbHandler->getUser($ID);
        $restaurants = $dbHandler->getRestaurants();

        $view = new View\Editmore();
        echo $view->render($user, $restaurants);
    }


    public function login()
    {

        $view = new View\LogIn();
        echo $view->render();

    }
}
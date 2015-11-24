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
require_once BASE . 'views' . DS . 'User' . DS . 'Login.php';


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
        //echo $view->render();
        $view->show($view);
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


            $user->setPreferedRestaurantIds($_POST['restaurant']);

          //  $dbHandler->updateUser($user);
          //  $dbHandler->updateUserRestaurants($user);

            if ($dbHandler->updateUser($user) == false) {
                $error = "Error";
                $values = array("User" => $user, "Error" => $error);
                $view = new View\EditUser();
                $view->setVars($values);
                $view->show($view);
                //echo $view->render();
            } else {
                header('Location: /user/detail/' . $user->getId());
                exit;
            }
        } else {
            if ($user != null) {
                $view = new View\EditUser();
                $list = $dbHandler->getRestaurants();

                $view->setVars(array("User" => $user),$list);
                $view->show($view);
               // $this->restaurantList();
                //echo $view->render();
            } else {
                header('Location: /user/create');
                exit;
            }
        }
    }

    public function restaurantList()
    {
        $dbHandler = new Lib\DbHandler();
        $restaurants = $dbHandler->getRestaurants($_GET["term"]);

        echo json_encode($restaurants);
        die;
    }

    public function index ()
    {
        $dbHandler = new Lib\DbHandler();

        //objekte in ein array
        $list = $dbHandler->getUsers();
        $view = new View\ShowUsers();
        $view->setVars($list);
             $view->show($view);
     //   echo $view->render();
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
        $view->show($view);
        //echo $view->render();
    }
}
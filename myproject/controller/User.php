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
require_once BASE . 'views' . DS . 'User' . DS . 'EditmoreUserCriterias.php';
require_once BASE . 'views' . DS . 'User' . DS . 'EditmoreUserPreferences.php';


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
            //$dbHandler = new Lib\DbHandler();
            $dbHandler = Lib\DbHandler::getDbHandler();
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
        //$dbHandler = new Lib\DbHandler();
        $dbHandler = Lib\DbHandler::getDbHandler();
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
        //$dbHandler = new Lib\DbHandler();
        $dbHandler = Lib\DbHandler::getDbHandler();

        $user = $dbHandler->getUser($id);
        if (!empty($_POST)) {
            $user->setFirstName($_POST['Firstname']);
            $user->setName($_POST['Lastname']);
            //$user->setPreferences($_POST['Preferences']);
            if (!empty($_POST['restaurant'])) {
                $user->setPreferedRestaurantIds($_POST['restaurant']);
            }
           // $user->setPreferedRestaurantIds($_POST['restaurant']);
     //       $user->updatePreferedRestaurantIds($_POST['restaurant']);

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
              //  $list = $dbHandler->getRestaurants();
                $list = $dbHandler->getUserRestaurant($id);

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
      //  $dbHandler = new Lib\DbHandler();
        $dbHandler = Lib\DbHandler::getDbHandler();
        $restaurants = $dbHandler->getRestaurants($_GET["term"]);
        echo json_encode($restaurants);
        die;
    }

    public function index ()
    {
        //$dbHandler = new Lib\DbHandler();
        $dbHandler = Lib\DbHandler::getDbHandler();

        //objekte in ein array
        $list = $dbHandler->getUsers();
        $view = new View\ShowUsers();
        $view->setVars($list);
             $view->show($view);
     //   echo $view->render();
    }

    public function editmore($ID){
        //$dbHandler = new Lib\DbHandler();
        $dbHandler = Lib\DbHandler::getDbHandler();
        //objekte in ein array
        $user = $dbHandler->getUser($ID);
        $restaurants = $dbHandler->getRestaurants();

        $view = new View\Editmore();
        $view->setVars($user, $restaurants);
        echo $view->render();
    }

    public function editcriterias($ID){
        //$dbHandler = new Lib\DbHandler();
        $dbHandler = Lib\DbHandler::getDbHandler();
        //objekte in ein array
        $user = $dbHandler->getUser($ID);
        $criterias = $dbHandler->getCriterias();

        $view = new View\EditmoreUserCriterias();
        $view->setVars($user, $criterias);
        echo $view->render();
    }

    public function login()
    {
        $view = new View\LogIn();
        $view->show($view);
        //echo $view->render();
    }

    public function getAllUserpreferences(){
       // $dbHandler = new Lib\DbHandler();
        $dbHandler = Lib\DbHandler::getDbHandler();
        $userlist = $dbHandler->getUsers();

    }

    public function getIsPresentIds()
    {
        $dbHandler = Lib\DbHandler::getDbHandler();
        $isPresentlist = $dbHandler->getIsPresentIds();
    }

    public function activeButton($id)
    {
        $dbHandler = Lib\DbHandler::getDbHandler();
        $user = $dbHandler->getUser($id);
        $present = $user->getIsPresentStatus();

        if ($present == "true"){
            $present = "false";
        } else {
            $present = "true";
        }
        $user->setIsPresentStatus($present);
        $dbHandler->updateUser($user);
        header('Location: /user/');

    }
}
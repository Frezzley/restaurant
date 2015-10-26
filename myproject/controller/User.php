<?php
namespace Controller;

use View;
use Model;
use Lib;

require_once BASE . 'controller' . DS . 'Controller.php';
require_once BASE . 'views' . DS . 'User' . DS . 'Create.php';
require_once BASE . 'views' . DS . 'User' . DS . 'Detail.php';
require_once BASE . 'views' . DS . 'User' . DS . 'Edit.php';
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

    public function Create($id) {
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
        echo $view->Render();
        return $view;
    }
}

    public function detail($id) {
        $id = !empty($id) ? $id : 2;


        $dbHandler = new Lib\DbHandler();
        $user = $dbHandler->getUser($id);
        $user = !empty($user) ? $user : $this->Create($id);

        If($user = empty($user))

        {
            $this->Create($id);
            header('Location: detail/');
        }


        /**
         * @var $dbHandler DbHandler
         */
        $view = new View\DetailUser();
        $view->setVars($user);
        echo $view->render();
    }


    public function edit($id){
        $id = !empty($id) ? $id : 2;

        $dbHandler = new Lib\DbHandler();
        $user = $dbHandler->getUser($id);
        if(!empty($_POST)){
            $user->setFirstName($_POST['Firstname']);
            $user->setName($_POST['Lastname']);
            if($dbHandler->updateUser($user) == true){
                $error = "Error";
                $values = array("User" => $user, "Error" => $error);
                $view = new View\EditUser();
                $view->setVars($values);
                echo $view->render();
            }
            else
            {
                header('Location: detail/');
                exit;
            }

        }
        else
        {
            if ($user != null)
            {
            $view = new View\EditUser();
            $view->setVars(array("User" => $user));
            echo $view->render();
            }
            else
            {
                header('Location: ../Create/' . $id . '/');
                exit;
            }

        }
    }

}
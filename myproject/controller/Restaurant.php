<?php
/**
 * Created by IntelliJ IDEA.
 * User: adi
 * Date: 30.10.2015
 * Time: 14:31
 */

namespace Controller;

use View;
use Model;
use Lib;
require_once BASE . 'views' . DS . 'Restaurant' . DS . 'Create.php';
require_once BASE . 'lib\DbConnection.php';
require_once BASE . 'lib\DbHandler.php';
require_once BASE . 'model\Model.php';
require_once BASE . 'model\Restaurant.php';

class Restaurant extends Controller{
public function create(){

        if (!empty($_POST)) {
            $restaurant = new Model\Restaurant();

            $restaurant->setFood($_POST['Food']);
            $restaurant->setName($_POST['Name']);

            /**
             * @var $dbHandler DbHandler
             */
            $dbHandler = new Lib\DbHandler();
            $result = $dbHandler->createRestaurant($restaurant);
            if($result)
            {
             //   header('Location: /restaurant/detail/' . $result);
                exit;
            };

        } else {
            $view = new View\CreateRestaurant();
            echo $view->render();
            return $view;
        }


}
 public $id = 1;
    public function edit($id){

            $dbHandler = new Lib\DbHandler();
            $restaurant = $dbHandler->getRestaurant($id);
            if (!empty($_POST)) {
                $restaurant->setFood($_POST['Food']);
                $restaurant->setName($_POST['Name']);
                if ($dbHandler->updateRestaurant($restaurant) == false) {
                    $error = "Error";
                    $values = array("Restaurant" => $restaurant, "Error" => $error);
                    $view = new View\EditRestaurant();
                    $view->setVars($values);
                    echo $view->render();
                } else {
                    header('Location: /restaurant/detail/' . $restaurant->getId());
                    exit;
                }
            } else {
                if ($restaurant != null) {
                    $view = new View\EditUser();
                    $view->setVars(array("User" => $restaurant));
                    echo $view->render();
                } else {
                    header('Location: /restaurant/create');
                    exit;
                }

            }




    }
}
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

require_once BASE . 'controller' . DS . 'Controller.php';
require_once BASE . 'views' . DS . 'Restaurant' . DS . 'Create.php';
require_once BASE . 'views' . DS . 'Restaurant' . DS . 'Edit.php';
require_once BASE . 'views' . DS . 'Restaurant' . DS . 'Show.php';
require_once BASE . 'views' . DS . 'Restaurant' . DS . 'Detail.php';


class Restaurant extends Controller{
public function create(){

        if (!empty($_POST)) {
            $restaurant = new Model\Restaurant();

            $restaurant->setFood($_POST['Food']);
            $restaurant->setName($_POST['Name']);
            $restaurant->setPrice($_POST['Price']);
            /**
             * @var $dbHandler DbHandler
            */
            //$dbHandler = new Lib\DbHandler();
            $dbHandler = Lib\DbHandler::getDbHandler();
            $result = $dbHandler->createRestaurant($restaurant);
            if($result)
            {
                header('Location: /restaurant/detail/' . $result);
                exit;
            };
        } else {
            $view = new View\CreateRestaurant();
            //echo $view->render();
            $view->show($view);
            return $view;
        }
}
    /**
     * @param $id
     */
    public function edit($id)
    {

       // $dbHandler = new Lib\DbHandler();
        $dbHandler = Lib\DbHandler::getDbHandler();
        $restaurant = $dbHandler->getRestaurant($id);
        if (!empty($_POST)) {
            $restaurant->setFood($_POST['Food']);
            $restaurant->setName($_POST['Name']);
            if ($dbHandler->updateRestaurant($restaurant) == false) {
                $error = "Error";
                $values = array("Restaurant" => $restaurant, "Error" => $error);
                $view = new View\EditRestaurant();
                $view->setVars($values);
                //echo $view->render();
                $view->show($view);
            } else {
                header('Location: /restaurant/detail/' . $restaurant->getId());
                exit;
            }
        } else {
            if ($restaurant != null) {
                $view = new View\EditRestaurant();
                $view->setVars(array("Restaurant" => $restaurant));
                //echo $view->render();
                $view->show($view);
            } else {
                header('Location: /restaurant/create');
                exit;
            }
        }
    }

    public function index ()
    {
       // $dbHandler = new Lib\DbHandler();
        $dbHandler = Lib\DbHandler::getDbHandler();
        //objekte in ein array
        $list = $dbHandler->getRestaurants();
        $view = new View\ShowRestaurant();
         $view->setVars($list);
        //echo $view->render();
        $view->show($view);
    }

    public function detail($id)
    {
       // $dbHandler = new Lib\DbHandler();
        $dbHandler = Lib\DbHandler::getDbHandler();
        $restaurant = $dbHandler->getRestaurant($id);
        if(empty($restaurant))
        {
            header('Location: /restaurant/create');
            exit;
        }
        /**
         * @var $dbHandler DbHandler
         */
        $view = new View\DetailRestaurant();
        $view->setVars($restaurant);
        //$view->render();
        $view->show($view);
    }
}

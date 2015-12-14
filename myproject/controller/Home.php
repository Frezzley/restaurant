<?php
namespace Controller;

use View;
use Model;
use Lib;

require_once BASE . 'views' . DS . 'Home.php';
require_once BASE . 'lib' . DS . 'DbHandler.php';




/**
 * Created by IntelliJ IDEA.
 * User: adi
 * Date: 14.10.2015
 * Time: 09:35
 */
class Home extends Controller
{

    public function index()
    {
        if (date(N) == "1") {
            $winner = "Lenzos";
        } else {
            $allIdsInCommon = $this->findRestaurandsInCommon();
            $winner = $this->calculateWinner($allIdsInCommon);
            if ($winner == null) {
                $winner = $this->defaultValues();
            }
        }
        $view = new View\Home();
        echo $view->render($winner);
    }

    public function defaultValues()
    {
        $forecast = "Migros";

        // $dbHandler = new Lib\DbHandler();
        $dbHandler = Lib\DbHandler::getDbHandler();
       // $dbHandler = Lib\DbHandler::getDbHandler();
        $list = $dbHandler->getRestaurants();
        $winner = $list[(rand(0, ((count($list)) - 1)))];
        $luckywinner = $winner->getName();

        $comingup = $list[(rand(0, ((count($list)) - 1)))];
        $forecast = $comingup->getName();

        $return = array("luckywinner" => $luckywinner, "forecast" => $forecast);
        return $return;
    }


    public function getAllUserpreferences()
    {
        //$dbHandler = new Lib\DbHandler();
        $dbHandler = Lib\DbHandler::getDbHandler();
        $restaurantID = array();
        $userlist = $dbHandler->getUsers();
        $numberOfUsers = count($userlist);
        foreach ($userlist as $user) {
            $restaurants = $user->getPreferedRestaurantIds();

            foreach ($restaurants as $restaurant) {
                $restaurantID[] .= $restaurant[ID];

            }

        }
        $this->getMostlikedRestaurants($restaurantID);
    }


    private function getMostlikedRestaurants($restaurantID)
    {
        $mostlikedrestaurant = array();

// shows key and how many times it's mentioned
        $values = array_count_values($restaurantID);
        // evaluates the highest number of mentions
        $highestnumber = max($values);
        //searches for a key, that has the highest number of mentions
        $mostlikedrestaurant[] .= array_search($highestnumber, $values);
        echo $mostlikedrestaurant;
        return $mostlikedrestaurant;
    }

    private function findRestaurandsInCommon()
    {
        //$dbHandler = new Lib\
        $dbHandler = Lib\DbHandler::getDbHandler();

        $allRestaurantIDs = array();
        $userlist = $dbHandler->getUsers();

        $restaurants = $dbHandler->getRestaurants();
        foreach ($restaurants as $restaurant) {
            $allRestaurantIDs[] = $restaurant->getId();
        }
       foreach ($userlist as $user) {
           $restaurants = $user->getPreferedRestaurantIds();
           if ($user->getisPresentStatus() == "true") {

           $restaurantID = array();
           foreach ($restaurants as $restaurant) {
               $restaurantID[] = $restaurant["Id"];

           }
           $allRestaurantIDs = array_intersect($restaurantID, $allRestaurantIDs);
       }
       }
        return $allRestaurantIDs;
   }

private function calculateWinner($allIdsInCommon){
    $numberOfRestaurants = count($allIdsInCommon);
    $winnnerName = null;
    If ($numberOfRestaurants > 0){

    $winnerId = $allIdsInCommon[(rand(1, $numberOfRestaurants))];
    //$dbHandler = new Lib\DbHandler();
        $dbHandler = Lib\DbHandler::getDbHandler();
        $winner = $dbHandler->getRestaurant($winnerId);
    $winnerName = $winner->getName();

    }
    else
    {
        $winnerName = "Migros";
    }
    return $winnerName;
}
    function Create_Table()
    {

    }

     function create(){}}


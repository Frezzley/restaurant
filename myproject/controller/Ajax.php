<?php
/**
 * Created by IntelliJ IDEA.
 * User: adi
 * Date: 10.11.2015
 * Time: 15:32
 */

namespace Controller;
use Lib;
use model;

require_once BASE . 'lib\DbHandler.php';
require_once BASE . 'lib\DbConnection.php';
require_once BASE . 'model\Model.php';
require_once BASE . 'model\Restaurant.php';

class ajax
{


    public function restaurantList()
    {
        $dbHandler = Lib\DbHandler::getDbHandler();
        $restaurants = $dbHandler->getRestaurants();

        /*   $restaurants = array(
               1 => array(
                   'bla' => 'foo'
               ),2 => array(
                   'bla' => 'fooooooo'
               ),3 => array(
                   'bla' => 'fooooo'
               ),4 => array(
                   'bla' => 'fooo'
               )
           );*/

        echo json_encode($restaurants);
        exit;
    }
}
<?php
namespace Controller;
/**
 * Created by IntelliJ IDEA.
 * User: adi
 * Date: 14.10.2015
 * Time: 10:30
 */

require_once BASE . 'views' . DS . 'View.php';

require_once BASE . 'lib\DbConnection.php';
require_once BASE . 'lib\DbHandler.php';
require_once BASE . 'model\Model.php';
require_once BASE . 'model\User.php';
require_once BASE . 'model\Restaurant.php';

abstract class Controller{


    /**
     *
     */
    function Create_Table()
    {
          $newuser = create_user();
        createUser($newuser);
        $newrestaurant = create_restaurant();
        createRestaurant($newrestaurant);
    }

    abstract function create();


  //  abstract function edit();
}
?>


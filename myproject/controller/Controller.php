<?php
namespace Controller;
/**
 * Created by IntelliJ IDEA.
 * User: adi
 * Date: 14.10.2015
 * Time: 10:30
 */
abstract class Controller{


    function Create_Table()
    {
          $newuser = create_user();
        createUser($newuser);
    }

    abstract function create();

}




?>


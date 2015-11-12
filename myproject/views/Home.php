<meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
<?php

require_once BASE . 'views' . DS . 'View.php';
require_once BASE . 'lib\DbHandler.php';
require_once BASE . 'model\Model.php';
require_once BASE . 'model\Restaurant.php';
/**
 * Created by IntelliJ IDEA.
 * User: adi
 * Date: 03.11.2015
 * Time: 09:40
 *//*
class Home
{
public function index(){ */

$forecast = "Migros";

$dbHandler = new Lib\DbHandler();
$list = $dbHandler->getRestaurants();
$winner = $list[(rand(0, ((count($list)) - 1)))];
$luckywinner = $winner->getName();

$comingup = $list[(rand(0, ((count($list)) - 1)))];
$forecast = $comingup->getName();
?>

<div class="container">
    <div class="jumbotron">
        <h1>Today, we are eating <?php echo $luckywinner ?> <!--(Tendency)--></h1>

        <p>Coming up...</p>

        <p><?php echo $forecast ?></p>

        <p><a class="btn btn-primary btn-lg" href="#" role="button">Details</a></p>
    </div>

</div>

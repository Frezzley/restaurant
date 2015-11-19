<?php
namespace Lib;
require_once BASE . 'lib\DbConnection.php';

//use Controller\Restaurant;
use Model\User;
use Model\Restaurant;

/**
 * Created by IntelliJ IDEA.
 * User: adi
 * Date: 14.10.2015
 * Time: 14:33
 */
class DbHandler
{
    /**
     * @var $db mysqli
     */
    private $db;

    public function __construct()
    {
        $this->db = DbConnection::getConnection();
    }

    public function createUser(User $user)
    {
        $newFirst = $user->getFirstName();
        $newLast = $user->getName();
        $sql = "INSERT INTO user (LastName, FirstName) VALUES ('{$newLast}', '{$newFirst}')";

        if ($this->db->query($sql) === FALSE) {
           return false;
        }

        return $this->db->insert_id;
    }

    public function updateUser(User $user)
    {
        $id = $user->getId();
        $name = $user->getName();
        $firstName = $user->getFirstName();
        $Preferences = $user->getPreferences();

        /*$sql = "UPDATE user SET lastname='Doe' WHERE id=2";*/
        $sql = "UPDATE user SET LastName = '{$name}', FirstName = '{$firstName}', Preferences = '{$Preferences}' WHERE Id = {$id};";

        if ($this->db->query($sql) === FALSE) {
            return false;
        }
        return true;
    }

    public function getUser($id)
    {
        $sql = "select * from user where id = {$id}";
        $result = $this->db->query($sql);
        $newuser = null;
        if ($result->num_rows > 0) {
            $newuser = new User();
            while ($row = $result->fetch_assoc()) {
                $newuser->setId($row['Id']);
               $newuser->setFirstName($row['FirstName']);
                $newuser->setName($row['LastName']);
                $newuser->setDailyPreference($row["Daily_Preference"]);
                $newuser->setPreferences($row["Preferences"]);
            }
        }
        return $newuser;
    }
    /**
     * @return null
     */
    public function getUsers()
    {

      //  $sql = "SELECT Id, FirstName, LastName FROM user";
        $sql = "SELECT * FROM user";
        $result = $this->db->query($sql);
        //$list = null;
        $listitem = null;
        $list = array();
        //$listitem = array();

        if ($result->num_rows > 0) {
            // output data of each row
            foreach ($result as $row){
            $user = new User;
               $name = $row["LastName"];
                $FirstName = $row["FirstName"];
                $ID = $row["Id"];
              //  $getDailyPreference = $row["Daily_Preference"];
              //  $Preferences = $row["Preferences"];
                $user->setName($name);
                $user->setFirstName($FirstName);
                $user->setId($ID);
               // $user->setPreferences($Preferences);
               // $user->setDailyPreference($getDailyPreference);
                $list[]= $user;
            }
        }
        return $list;
      /*      while($row = $result->fetch_assoc()) {
             //   echo "Id: " . $row["Id"]. " - Name: " . $row["FirstName"]. " " . $row["LastName"]. "<br>";
               // $listitem [$row['Id']] =  $row["FirstName"]. " " . $row["LastName"];
                //$listitem = [$row['Id']] =  $row["FirstName"]. " " . $row["LastName"];
               // array_push($list, $listitem);
               // $listitem = null;
            }
        } else {
            echo "0 results";
            $listitem = null;
        }
        return $list;*/
    }

public function getRestaurant($id)
{
    $sql = "select * from restaurant where id = {$id}";
    $result = $this->db->query($sql);
    $newrestaurant = null;
    if ($result->num_rows > 0) {
        $newrestaurant = new Restaurant();
        while ($row = $result->fetch_assoc()) {
            $newrestaurant->setId($row['Id']);
            $newrestaurant->setName($row['Name']);
            $newrestaurant->setFood($row['Food']);
            $newrestaurant->setPrice($row['Price']);
        }
    }
    return $newrestaurant;
}
    public function createRestaurant (Restaurant $restaurant)
    {
        $newFood = $restaurant->getFood();
        $newName = $restaurant->getName();
        $newPrice = $restaurant->getPrice();
        $sql = "INSERT INTO restaurant ( Name, Food, Price) VALUES ('{$newName}', '{$newFood}', '{$newPrice}')";

        if ($this->db->query($sql) === FALSE) {
            return false;
        }

        return $this->db->insert_id;
    }

    public function getRestaurants($restaurantName = null)
    {

        $sql = "SELECT * FROM restaurant";
        if ($restaurantName) {
            $sql .= " WHERE name like \"%{$restaurantName}%\"";
        }
        $result = $this->db->query($sql);
        //$list = null;
        $listitem = null;
        $list = array();


        if ($result->num_rows > 0) {
            // output data of each row
            foreach ($result as $row){
                $restaurant = new Restaurant();
                $name = $row["Name"];
                $FirstName = $row["Food"];
                $ID = $row["Id"];

                $restaurant->setName($name);
                $restaurant->setFood($FirstName);
                $restaurant->setId($ID);

                $list[]= $restaurant;
            }
        }
        return $list;
    }

    public function updateRestaurant(Restaurant $restaurant)
    {
        $id = $restaurant->getId();
        $name = $restaurant->getName();
        $food = $restaurant->getFood();

        /*$sql = "UPDATE user SET lastname='Doe' WHERE id=2";*/
        $sql = "UPDATE restaurant SET Name = '{$name}', Food = '{$food}' WHERE Id = {$id};";

        if ($this->db->query($sql) === FALSE) {
            return false;
        }
        return true;
    }

    public function updateUserRestaurants($user){

        $id = $user->getId();
        $preferedRestaurantId = $user->getPreferedRestaurantId();
        $sql = "INSERT INTO user_restaurant ( user, restaurant) VALUES ('{$id}', '{$preferedRestaurantId}')";

        if ($this->db->query($sql) === FALSE) {
            return false;
        }
        return true;
    }








    public function __destruct() {
        $this->db->close();
        $this->db = null;
    }

}
?>
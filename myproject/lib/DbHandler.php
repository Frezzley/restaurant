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


    public $dbConnectionstatus;
    private static $dbConnection;
    private static $dbHelper;

    public static function getDbHandler()
    {

        if (self::$dbHelper == null) {

            static::$dbHelper = new static();
            static::$dbConnection = DbConnection::getConnection();
        }
        return static::$dbHelper;
    }

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    public function createUser(User $user)
    {
        $newFirst = $user->getFirstName();
        $newLast = $user->getName();
        $sql = "INSERT INTO user (LastName, FirstName) VALUES ('{$newLast}', '{$newFirst}')";

        if (static::$dbConnection->query($sql) === FALSE) {
            return false;
        }
        return static::$dbConnection->insert_id;
    }

    public function updateUser(User $user)
    {
        $id = $user->getId();
        $name = $user->getName();
        $firstName = $user->getFirstName();
        $Preferences = $user->getPreferences();
        $present = $user->getIsPresentStatus();

        /*$sql = "UPDATE user SET lastname='Doe' WHERE id=2";*/
        $sql = "UPDATE user SET LastName = '{$name}', FirstName = '{$firstName}', Preferences = '{$Preferences}', IsPresent = '{$present}'  WHERE Id = {$id}; ";
        $sql .= $this->updateUserRestaurants($user);
        if (static::$dbConnection->multi_query($sql) === FALSE) {
            return false;
        }
        return true;
    }

    public function getUser($id)
    {
        $sql = "select * from user where id = {$id}";
        $result = static::$dbConnection->query($sql);
        $newuser = null;
        if ($result->num_rows > 0) {
            $newuser = new User();
            while ($row = $result->fetch_assoc()) {

                $restaurantIDs = $this->getUserRestaurant($row['Id']);
                $newuser->setId($row['Id']);
                $newuser->setFirstName($row['FirstName']);
                $newuser->setName($row['LastName']);
                $newuser->setDailyPreference($row["Daily_Preference"]);
                $newuser->setPreferences($row["Preferences"]);
                $newuser->setPreferedRestaurantIds($restaurantIDs);
                $newuser->setIsPresentStatus($row["IsPresent"]);
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
        $result = static::$dbConnection->query($sql);
        //$list = null;
        $listitem = null;
        $list = array();
        //$listitem = array();

        if ($result->num_rows > 0) {
            // output data of each row
            foreach ($result as $row) {
                $user = new User;
                $name = $row["LastName"];
                $FirstName = $row["FirstName"];
                $ID = $row["Id"];
                $isPresentId = $row["IsPresent"];
                $restaurantIdList = $this->getUserRestaurant($ID);
                $user->setName($name);
                $user->setFirstName($FirstName);
                $user->setId($ID);
                $user->setPreferedRestaurantIds($restaurantIdList);
                $user->setIsPresentStatus($isPresentId);//
                $list[] = $user;
            }
        }
        return $list;
    }

    public function getRestaurant($id)
    {
        $sql = "select * from restaurant where Id = {$id}";
        // $sql = "SELECT * FROM restaurant;";
        //  $sql = "USE restaurant; SELECT * FROM restaurant;";
        $result = static::$dbConnection->query($sql);
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

    public function createRestaurant(Restaurant $restaurant)
    {
        $newFood = $restaurant->getFood();
        $newName = $restaurant->getName();
        $newPrice = $restaurant->getPrice();
        $sql = "INSERT INTO restaurant ( Name, Food, Price) VALUES ('{$newName}', '{$newFood}', '{$newPrice}')";

        if (static::$dbConnection->query($sql) === FALSE) {
            return false;
        }
        return static::$dbConnection->insert_id;
    }

    public function getRestaurants($restaurantName = null)
    {
        $sql = "SELECT * FROM restaurant";
        if ($restaurantName) {
            $sql .= " WHERE name like \"%{$restaurantName}%\"";
        }
        $result = static::$dbConnection->query($sql);
        //$list = null;
        $listitem = null;
        $list = array();

        if ($result->num_rows > 0) {
            // output data of each row
            foreach ($result as $row) {
                $restaurant = new Restaurant();
                $name = $row["Name"];
                $FirstName = $row["Food"];
                $ID = $row["Id"];

                $restaurant->setName($name);
                $restaurant->setFood($FirstName);
                $restaurant->setId($ID);

                $list[] = $restaurant;
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

        if (static::$dbConnection->query($sql) === FALSE) {
            return false;
        }
        return true;
    }

    private function updateUserRestaurants($user)
    {
        $id = $user->getId();
        $preferedRestaurantIds = $user->getPreferedRestaurantIds();
        $sql = "DELETE FROM user_restaurant WHERE user = {$id}; ";
        foreach ($preferedRestaurantIds as $preferedRestaurantId) {
            $sql .= "INSERT INTO user_restaurant (user, restaurant) VALUES ('{$id}', '{$preferedRestaurantId}'); ";
        };
        return $sql;
    }

    public function getUserRestaurant($id)
    {
        $sql = "select re.Id, re.Name from  restaurant re inner JOIN user_restaurant ur on re.Id = ur.restaurant where ur.user = {$id}";
        $result = static::$dbConnection->query($sql);
        $list = array();
        $chosenRestaurants = array();
        if ($result->num_rows > 0) {
            foreach ($result as $row) {
                $chosenRestaurants['Id'] = $row['Id'];
                $chosenRestaurants['Name'] = $row['Name'];
                $list[] = $chosenRestaurants;
            }
        }
        return $list;
    }

    /*
        public function __destruct()
        {
            static::$dbHelper->close();
            static::$dbHelper = null;
        }*/
    //   }
    //   return self::$dbConnection;
    //  }
    public function getIsPresentIds()
    {
        $sql = "SELECT * FROM user where IsPresent = 'true'";
        $result = static::$dbConnection->query($sql);
        $listitem = null;
        $list = array();
        if ($result->num_rows > 0) {
            // output data of each row
            foreach ($result as $row) {
                $user = new User;
                $Id = $user->getId();
//
                $list[] = $Id;
            }
        }
        return $list;


    }

    public function gethistory()
    {

        $sql = "select hist.id, re.Name, re.Id, hist.date from history hist inner join restaurant re on hist.restaurantId=re.Id;";
        $result = static::$dbConnection->query($sql);
        $list = array();
        $history = array();
        if ($result->num_rows > 0) {
            foreach ($result as $row) {
                $history['historyId'] = $row['id'];
                $history['restaurantName'] = $row['Name'];
                $history['restaurant'] = $row['Id'];
                $history['date'] = $row['date'];

                $list[] = $history;
            }
        }
        return $list;
    }

public function writeHistory($id, $date){

    $sql = "INSERT INTO history (restaurantId, date) VALUES ('{$id}', '{$date}'); ";
    if (static::$dbConnection->query($sql) === FALSE) {
        return false;
    }
}
    public function deleteHistory($date=""){
        $sql = "Delete from history where date = '{$date}';";
        static::$dbConnection->query($sql);

    }

    public function updateHistory($restaurantId,$historyId){

        $sql = "UPDATE history SET restaurantId={$restaurantId} WHERE id= {$historyId};";

        static::$dbConnection->query($sql);
    }

}

?>
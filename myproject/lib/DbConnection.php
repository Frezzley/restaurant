<?php
namespace Lib;
/**
 * Created by IntelliJ IDEA.
 * User: adi
 * Date: 14.10.2015
 * Time: 14:32
 */
class DbConnection
{
public $connectionstatus;
    private function __construct() {}
    private function __clone(){}

    private static $connection;

    public static function getConnection() {

        if(self::$connection == null) {
            $servername = "localhost";
            $username = "root";
            $password = "semabit12345";
            $dbname = "restaurant";
            self::$connection =  new \mysqli($servername, $username, $password, $dbname);//new self();
            if (self::$connection->connect_error) {
                die("Connection failed: " . self::$conn->connect_error);
                $connectionstatus = false;
            }
            $connectionstatus = true;
        }
        return self::$connection;
    }

    public function ConnectDatabase()
    {


    }



}

?>
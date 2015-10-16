<?php

/**
 * Created by IntelliJ IDEA.
 * User: adi
 * Date: 14.10.2015
 * Time: 14:32
 */
class DbConnection
{

    private function __construct() {}
    private function __clone(){}

    private static $connection;

    public static function getConnection() {
        if(self::$connection == null) {
            $servername = "localhost";
            $username = "root";
            $password = "semabit12345";
            self::$connection =  new mysqli($servername, $username, $password);//new self();
            if (self::$connection->connect_error) {
                die("Connection failed: " . self::$conn->connect_error);
            }
            echo "Connected successfully";
        }
        return self::$connection;
    }

    public function connectdatabase()
    {


// Create connection
        //$conn = new mysqli($servername, $username, $password);


// Check connection


    }




}

?>
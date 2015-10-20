<?php
namespace Lib;
require_once BASE . 'lib\DbConnection.php';



use Model\User;
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
    public function __construct() {
        $this->db = DbConnection::getConnection();
    }

    public function createUser(User $user) {
            $newFirst = $user->getFirstName();
            $newLast = $user->getName();
            $sql = "INSERT INTO user (LastName, FirstName) VALUES ('{$newLast}', '{$newFirst}')";

            if ($this->db->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $this->db->error;
            }

            $this->db->close();
        }

public function updateuser(User $user){

$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
    $parts = array_filter(explode('/', $user));

/*$sql = "UPDATE user SET lastname='Doe' WHERE id=2";*/
    $sql = "UPDATE user SET $parts";


if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();



}
}
?>
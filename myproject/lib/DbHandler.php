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

        return true;
    }

    public function updateUser(User $user)
    {
        $id = $user->getId();
        $name = $user->getName();
        $firstName = $user->getFirstName();

        /*$sql = "UPDATE user SET lastname='Doe' WHERE id=2";*/
        $sql = "UPDATE user SET LastName = '{$name}', FirstName = '{$firstName}' WHERE Id = {$id};";

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
               $newuser->setFirstName($row['FirstName']);
                $newuser->setName($row['LastName']);
            }
            return $newuser;
        }
        else
        {
            echo error;
        }

    }

    public function __destruct() {
        $this->db->close();
        $this->db = null;
    }
}
?>
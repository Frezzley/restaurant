<?php
/**
 * Created by IntelliJ IDEA.
 * User: adi
 * Date: 14.10.2015
 * Time: 11:06
 */
namespace View;

require_once BASE . 'lib\DbConnection.php';

class Create
{
    function displayuser()
    {

    $conn = getConnection();
        echo "Folgende Benutzer können mit abstimmen, du kannst hier ihre Präferenzen sehen:";


        $sql = "SELECT id, FirstName, LastName FROM user ";
        /*$result = $conn->mysqli_real_query($sql);*/
        $result = mysqli_query($conn,$sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "id: " . $row["id"] . " - Name: " . $row["FirstName"] . " " . $row["LastName"] . "<br>";
            }
        } else {
            echo "0 results";
        }
    }
}
?>
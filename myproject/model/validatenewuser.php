<?php

echo $_GET["Firstname"];
if(!empty($_POST)) {
    $Firstname = $_POST['Firstname'];
    $Lastname = $_POST['Lastname'];



      $user = [
          "LastName" => $Lastname,
          "FirstName" => $Firstname,

      ];



    echo "<ul>";
    foreach ($errors as $error) {
        echo "<li>$error</li>";
    }
    echo "</ul>";

}


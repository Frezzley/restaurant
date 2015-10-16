<?php
namespace Model;
/**
 * Created by IntelliJ IDEA.
 * User: adi
 * Date: 14.10.2015
 * Time: 09:35
 */
class User
{
    private $name;
    private $firstName;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }



    function create_user($information){
        $user_id = array("1", "2");
        array_push($stack,$information );

    }









    function create_array()
    {
/*
        $personid=array($user[i]
        );

        echo $persons[1];*/
    }

    function create_person()
    {

        $user = [
            "id" => "1",
            "LastName" => "max",
            "FirstName" => "max",
            "Preferences" => "chinese",
            "Daily_Preference" => "taco"
        ];

        create_user($user);

    }
}
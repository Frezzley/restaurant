<?php
namespace Model;
/**
 * Created by IntelliJ IDEA.
 * User: adi
 * Date: 14.10.2015
 * Time: 09:35
 */
class User extends Model
{

    private $firstName;
    private $Preferences;
    private $DailyPreference;


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


    public function getPreferences()
    {
        return $this->Preferences;
    }

    /**
     * @param mixed $Preferences
     */
    public function setPreferences($Preferences)
    {
        $this->Preferences = $Preferences;
    }

    /**
     * @return mixed
     */
    public function getDailyPreference()
    {
        return $this->DailyPreference;
    }

    /**
     * @param mixed $DailyPreference
     */
    public function setDailyPreference($DailyPreference)
    {
        $this->DailyPreference = $DailyPreference;
    }
}
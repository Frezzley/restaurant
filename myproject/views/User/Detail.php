<?php
/**
 * Created by IntelliJ IDEA.
 * User: adi
 * Date: 21.10.2015
 * Time: 08:29
 */

namespace View;


class DetailUser
{
    private $vars;
    public function setVars($params)
    {
        $this->vars = $params;
    }

    public function render()
    {
       $user = $this->vars;

     /*   $user = $this->vars;*/
        return "ID: " . $user->getId() . "<br>" ."Vorname: " . $user->getFirstName() . "<br>" ."Nachname: " . $user->getName() . "<br>" ."Preferenzen: " . $user->getPreferences() . "<br>" ."Taegliche Preferenzen: " . $user->getDailyPreference() ;


    }
}



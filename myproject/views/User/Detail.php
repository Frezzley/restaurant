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
        return $user->getFirstName() . $user->getName();

    }
}



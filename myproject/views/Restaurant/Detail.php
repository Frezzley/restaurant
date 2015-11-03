<?php
/**
 * Created by IntelliJ IDEA.
 * User: adi
 * Date: 21.10.2015
 * Time: 08:29
 */

namespace View;


class DetailRestaurant
{
    private $vars;
    public function setVars($params)
    {
        $this->vars = $params;
    }

    public function render()
    {
        $restaurant = $this->vars;




        /*   $user = $this->vars;*/
        return "ID: " . $restaurant->getId()  . "<br>" ."Name: " . $restaurant->getName() . "<br>" . "Food: " . $restaurant->getFood();














    }
}



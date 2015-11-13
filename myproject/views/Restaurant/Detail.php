<?php
/**
 * Created by IntelliJ IDEA.
 * User: adi
 * Date: 21.10.2015
 * Time: 08:29
 */

namespace View;


class DetailRestaurant extends View
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
        return '<div class="col-md-2"></div><div class="col-md-8"> ID: ' . $restaurant->getId() . '<br>' . 'Name: ' . $restaurant->getName() . '<br>' . 'Food: ' . $restaurant->getFood() . '</div>';
    }
}



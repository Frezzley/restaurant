<?php

/**
 * Created by IntelliJ IDEA.
 * User: adi
 * Date: 02.11.2015
 * Time: 10:20
 */

namespace View;
class EditRestaurant extends View
{
    private $vars;

    public function setVars($params)
    {
        $this->vars = $params;
    }

    function render()
    {
        $error = array_key_exists("Error", $this->vars) ? $this->vars["Error"] : null;
        $restaurant = array_key_exists("Restaurant", $this->vars) ? $this->vars["Restaurant"] : null;

        $html = '<html><form method="post" action="/restaurant/edit/' . $restaurant->getId() . ' ">
   ' . $error . '

    <label for="Food">
    food:
    </label>
    <input id="Food" name="Food" value="' . $restaurant->getFood() . '" required>
    </div>

    <div>
    <label for="Name" >
    Name:
    </label>
    <input id="Name" name="Name" value="' . $restaurant->getName() . '" required>
    </div>

    <button type="submit" name="submit-button" value="Submit">
    Senden!
    </button>';
        echo $html;
    }
}

?>
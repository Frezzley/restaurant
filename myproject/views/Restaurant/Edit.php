<?php

/**
 * Created by IntelliJ IDEA.
 * User: adi
 * Date: 02.11.2015
 * Time: 10:20
 */

namespace View;
class EditRestaurant
{
    private $vars;
    public function setVars($params)
    {
        $this->vars = $params;
    }

    function render()
    {
        $error = array_key_exists("Error",$this->vars) ? $this->vars["Error"]: null;
        $restaurant = array_key_exists("User",$this->vars) ? $this->vars["User"]: null;

        $html = '<html><form method="post" action="/restaurant/edit/' . $restaurant->getId() . ' ">
   ' . $error . '

    <label for="Food">
    firstname:
    </label>
    <input id="Food" name="Food" value="' . $restaurant->getFood() .'" required>
    </div>

    <div>
    <label for="Name" >
    lastname:
    </label>
    <input id="Name" name="Name" value="' . $restaurant->getName() .'" required>
    </div>

    <button type="submit" name="submit-button" value="Submit">
    Senden!
    </button>
    </body>
    </html>';
        echo $html;
    }
}
?>
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

        $html = '<html><form class="form-horizontal" method="post" action="/restaurant/edit/' . $restaurant->getId() . ' ">
   ' . $error . '
<div class="form-group">
    <label for="Food" class="col-sm-2 control-label">
    food:
    </label>
    <div class="col-sm-10">
    <input id="Food" class="form-control" name="Food" value="' . $restaurant->getFood() . '" required>
    </div>
    </div>

    <div class="form-group">
    <label for="Name" class="col-sm-2 control-label">
    Name:
    </label>
    <div class="col-sm-10">
    <input id="Name" class="form-control" name="Name" value="' . $restaurant->getName() . '" required>
    </div>
    </div>

<div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
    <button type="submit" name="submit-button" value="Submit">
    Senden!
    </button>
     </div>
    <div>';
        echo $html;
    }
}

?>
<?php
namespace View;

class CreateRestaurant extends View
{
    function render()
    {

        $html = '<html><form class="form-horizontal" method="post" action="/restaurant/create">
    <div class="form-group">
    <label for="Food">
    Food
    </label>
    <div>
    </div>
    <input class="form-control" id="Food" name="Food" required>
    </div>

    <div class="form-group">
    <label for="Name" >
    Name
    </label>
    <div>
    </div>
    <input class="form-control" id="Name" name="Name" required>
    </div>

    <div class="form-group">
    <label for="Price">
    Price
    </label>
    <div>
    </div>
    <input class="form-control" id="Price" name="Price" required>
    </div>



    <div class="form-group">
    <button class="btn btn-default" type="submit" name="submit-button" value="Submit">
    Senden!
    </button>';
        echo $html;
    }

}
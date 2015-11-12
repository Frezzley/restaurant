<?php
namespace View;

class CreateRestaurant extends View
{
    function render()
    {

        $html = '<html><form method="post" action="/restaurant/create">
    <div>
    <label for="Food">
    Food
    </label>
    <div>
    </div>
    <input id="Food" name="Food" required>
    </div>

    <div>
    <label for="Name" >
    Name
    </label>
    <div>
    </div>
    <input id="Name" name="Name" required>
    </div>

    <div>
    <label for="Price">
    Price
    </label>
    <div>
    </div>
    <input id="Price" name="Price" required>
    </div>

    <button type="submit" name="submit-button" value="Submit">
    Senden!
    </button>
</body>
</html>';
        echo $html;
    }
}
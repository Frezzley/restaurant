<?php
/**
 * Created by IntelliJ IDEA.
 * User: adi
 * Date: 03.11.2015
 * Time: 14:21
 */

namespace View;


class Editmore
{

public function setVars($params)
{
$this->vars = $params;
}

public function render()
{
$list = $this->vars;

?> <ul class="list-inline">
    <?php

    foreach ($list as $restaurant) {
    ?> <li><?php
        //  print_r($list);
        $ID = $restaurant->getId();

        $Name = $restaurant->Name();
        echo $Name;
        ?>
<ul>
    <li>
        <form>
            <ul>
                <li><input type="radio" name="restaurant_rating" value="No Go" ></li>
                No Go
                <li> <input type="radio" name="restaurant_rating" value="I can eat it"></li>
                I can eat it
                <li> <input type="radio" name="restaurant_rating" value="It's ok" checked></li>
                It's ok
                <li> <input type="radio" name="restaurant_rating" value="it's pretty good"></li>
                it's pretty good
                <li>  <input type="radio" name="restaurant_rating" value="I love it"></li>
                I love it
                <li> <input type="radio" name="restaurant_rating" value="my favorite"></li>
                my favorite
            </ul>
        </form>
    </li>
    <li>
        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" id="menu1" type="button" data-toggle="dropdown">Dropdown Example
            <span class="caret"></span></button>
            <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">HTML</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">CSS</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">JavaScript</a></li>
                <li role="presentation" class="divider"></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">About Us</a></li>
            </ul>
        </div>

    </li>
        </ul>
        </li>
<?php  }
    ?>  </ul><?php

    }
}
?>


</body>
</html>
<?php
/**
 * Created by IntelliJ IDEA.
 * User: adi
 * Date: 03.11.2015
 * Time: 14:21
 */

namespace View;


class Editmore extends View
{

//public function setVars($params)
//{
//$this->vars = $params;
//}

public function render(/*$user, $restaurants*/)
{

$restaurants = array("auto", "bla2", "42");
   $this->restaurants = $restaurants;
//$list = $this->vars;

?> <ul class="list-inline">
    <?php

    foreach ($restaurants as $restaurant) {
    ?> <li><?php
        //  print_r($list);
      //  $ID = $restaurant->getId();

   //     $Name = $restaurant->getName();
        echo $Name;
        ?>

<ul>
    <li>
        <form class="col-md-12">
            <ul >
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
    <div class="col-md-12">
        <div class="dropdown"> <button class="btn btn-primary dropdown-toggle" id="menu1" type="button" data-toggle="dropdown">Wie oft möchtest du da hin gehen>
            <span class="caret"></span></button>
            <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                <li role="presentation" ><a role="menuitem" tabindex="-1" href="#">Täglich</a></li>
                <li role="presentation" ><a role="menuitem" tabindex="-1" href="#">jeden 2. Tag</a></li>
                <li role="presentation" ><a role="menuitem" tabindex="-1" href="#">jeden 3. Tag</a></li>
                <li role="presentation" class="col-md-2"><a role="menuitem" tabindex="-1" href="#">2x pro Woche</a></li>
                <li role="presentation" class="col-md-2"><a role="menuitem" tabindex="-1" href="#">1x pro Woche</a></li>
                <li role="presentation" class="col-md-2"><a role="menuitem" tabindex="-1" href="#">1x pro 2 Wochen</a></li>
                <li role="presentation" class="col-md-2"><a role="menuitem" tabindex="-1" href="#">1x pro Monat</a></li>
                <li role="presentation" class="col-md-2"><a role="menuitem" tabindex="-1" href="#">1x pro 2 Monate</a></li>
            </ul>
        </div>
</div>
    </li>
</ul>
        </li>
<?php  }
    ?>  </ul>
    </div>
    <?php

    }

}

?>


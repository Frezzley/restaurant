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

    public function setVars($user, $restaurants)
    {
        $this->user = $user;
        $this->restaurants = $restaurants;
    }
public function render(/*$user, $restaurants*/)
{

    $restaurants = $this->restaurants;
    $user = $this->user;


?> <ul class="list-inline">
    <?php

    foreach ($restaurants as $restaurant) {
    ?> <li><?php

        $Name = $restaurant["Name"];
        echo $Name;
        ?>

<ul>
    <li>
        <form class="col-md-12">
            <ul >
                <li>No Go<input type="radio" name="restaurant_rating" value="No Go" <? if ($restaurant['rating'] == '1'){ echo 'checked'; } ?>></li>

                <li>I can eat it<input type="radio" name="restaurant_rating" value="I can eat it" <? if ($restaurant['rating'] == '2'){ echo 'checked'; } ?>></li>

                <li>It's ok<input type="radio" name="restaurant_rating" value="It's ok" <? if ($restaurant['rating'] == '3'){ echo 'checked'; } ?>></li>

                <li>it's pretty good<input type="radio" name="restaurant_rating" value="it's pretty good" <? if ($restaurant['rating'] == '4'){ echo 'checked'; } ?>></li>

                <li>I love it<input type="radio" name="restaurant_rating" value="I love it" <? if ($restaurant['rating'] == '5'){ echo 'checked'; } ?>></li>

                <li>my favorite<input type="radio" name="restaurant_rating" value="my favorite" <? if ($restaurant['rating'] == '6'){ echo 'checked'; } ?>></li>

            </ul>
        </form>
    </li>
    <li>
    <select name="selection" onChange="submit();">
        <option value="">--Select--</option>
        <option value="1">Monthly</option>
        <option value="2">Yearly</option>
        </select>


    <div class="col-md-12">
        <div class="dropdown"> <button class="btn btn-primary dropdown-toggle" id="menu1" type="button" data-toggle="dropdown">Wie oft m�chtest du da hin gehen
            <span class="caret"></span></button>
            <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                <li role="presentation" ><a role="menuitem" tabindex="0" href="#">T�glich</a></li>
                <li role="presentation" ><a role="menuitem" tabindex="-1" href="#">jeden 2. Tag</a></li>
                <li role="presentation" ><a role="menuitem" tabindex="-1" href="#">jeden 3. Tag</a></li>
                <li role="presentation" ><a role="menuitem" tabindex="-1" href="#">2x pro Woche</a></li>
                <li role="presentation" ><a role="menuitem" tabindex="-1" href="#">1x pro Woche</a></li>
                <li role="presentation" ><a role="menuitem" tabindex="-1" href="#">1x pro 2 Wochen</a></li>
                <li role="presentation" ><a role="menuitem" tabindex="-1" href="#">1x pro Monat</a></li>
                <li role="presentation" ><a role="menuitem" tabindex="-1" href="#">1x pro 2 Monate</a></li>
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


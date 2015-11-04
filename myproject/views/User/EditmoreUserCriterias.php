<?php
/**
 * Created by IntelliJ IDEA.
 * User: adi
 * Date: 04.11.2015
 * Time: 09:27
 */

namespace View;


class EditmoreUserCriterias
{

//public function setVars($params)
//{
//$this->vars = $params;
//}

    public function render($user, $criterias)
    {
        $this->$criterias = $criterias;
//$list = $this->vars;

        ?> <ul class="list-inline">
        <?php

        foreach ($criterias as $criteria) {
            ?> <li>

                <ul>
                    <li>Distanz
                        <form>
                            <?php
                           // echo Criteria[criteria];
                            echo criteria ?>
                            <ul>
                                <li><input type="radio" name="restaurant_rating" value="criteria[criteria][rating]" ></li>
                                criteria[][]
                            </ul>
                        </form>
                    </li>
                    <li>
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" id="menu1" type="button" data-toggle="dropdown">Wie oft möchtest du da hin gehen
                                <span class="caret"></span></button>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Not important</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">a bit important</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">neutral</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">important</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">very important</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>

            </li>
        <?php  } ?>
        </ul>
        <?php
    }
}
?>
</body>
</html>
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

    public function setVars($user, $restaurants, $criterias)
    {
        $this->user = $user;
        $this->restaurants = $restaurants;
        $this->criterias = $criterias;
    }

    public function render(/*$user, $restaurants*/)
    {

        $restaurants = $this->restaurants;
        $user = $this->user;
        $criterias = $this->criterias;
//$list = $this->vars;
$userId = $user->getId();
        ?>

        <form class="form-horizontal" method="post" action="/user/editpreferences/ <?php echo $userId ?> ">
            <div>
                <ul class="list-inline">
                    <?php
                    $i = 0;
                    foreach ($restaurants as $restaurant) {
                    ?>
                    <li class="col-md-12"><?php

                        $Name = $restaurant["Name"];
                        ?> <b> <?php echo $Name; ?> </b> <?php
                        ?>

                        <ul class="col-md-12">
                            <li class="col-sm-7 col-xs-12">
                                <form>
                                    <ul class="list-inline">
                                        <!--  <li class="col-md-2">No Go</br><input type="radio" name="restaurant_rating" value="No Go" <? /* if ($restaurant['rating'] == '1'){ echo 'checked'; } */ ?>></li> -->

                                        <li class="col-md-2">I can eat it</br>
                                            <input type="radio" name="restaurant_rating_<?php echo $i ?>"
                                                   value="I can eat it" <? if ($restaurant['rating'] == '2') {
                                                echo 'checked';
                                            } ?>>
                                        </li>

                                        <li class="col-md-2">It's ok </br>
                                            <input type="radio" name="restaurant_rating_<?php echo $i ?>"
                                                   value="It's ok" <? if ($restaurant['rating'] == '3') {
                                                echo 'checked';
                                            } ?>>
                                        </li>

                                        <li class="col-md-3">it's pretty good</br>
                                            <input type="radio" name="restaurant_rating_<?php echo $i ?>"
                                                   value="it's pretty good" <? if ($restaurant['rating'] == '4') {
                                                echo 'checked';
                                            } ?>>
                                        </li>

                                        <li class="col-md-2">I love it</br>
                                            <input type="radio" name="restaurant_rating_<?php echo $i ?>"
                                                   value="I love it" <? if ($restaurant['rating'] == '5') {
                                                echo 'checked';
                                            } ?>>
                                        </li>

                                        <li class="col-md-2">my favorite</br>
                                            <input type="radio" name="restaurant_rating_<?php echo $i ?>"
                                                   value="my favorite" <? if ($restaurant['rating'] == '6') {
                                                echo 'checked';
                                            } ?>>
                                        </li>

                                    </ul>
                                </form>
                            </li>
                            <div class="col-sm-5 col-xs-12">

                                <!--
                                    <div class="dropdown">
                                        <button class="btn dropdown-toggle" id="menu1" type="button"
                                                data-toggle="dropdown">Wie oft würdest du maximal da hin gehen<span
                                                class="caret"></span></button>
                                        <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                            <li role="presentation"><a role="menuitem" name="frequency_<?php echo $i ?>" tabindex="0" value="1">Täglich</a></li>
                                            <li role="presentation"><a role="menuitem" name="frequency_<?php echo $i ?>" tabindex="-1" value="2">jeden 2. Tag</a></li>
                                            <li role="presentation"><a role="menuitem" name="frequency_<?php echo $i ?>" tabindex="-2" value="3">jeden 3. Tag</a></li>
                                            <li role="presentation"><a role="menuitem" name="frequency_<?php echo $i ?>" tabindex="-3" value="5">1x pro Woche</a></li>
                                            <li role="presentation"><a role="menuitem" name="frequency_<?php echo $i ?>" tabindex="-4" value="10">1x pro 2 Wochen</a></li>
                                            <li role="presentation"><a role="menuitem" name="frequency_<?php echo $i ?>" tabindex="-5" value="30">1x pro Monat</a></li>
                                            <li role="presentation"><a role="menuitem" name="frequency_<?php echo $i ?>" tabindex="-6" value="60">1x pro 2 Monate</a></li>
                                            <li role="presentation"><a role="menuitem" name="frequency_<?php echo $i ?>" tabindex="-7" value="91">1x pro Quartal</a></li>
                                            <li role="presentation"><a role="menuitem" name="frequency_<?php echo $i ?>" tabindex="-8" value="182">1x pro Semester</a></li>
                                            <li role="presentation"><a role="menuitem" name="frequency_<?php echo $i ?>" tabindex="-9" value="365">1x pro Jahr</a>
                                            </li>
                                        </ul>
                                    </div> -->


                                <div class="form-group">
                                    <label for="sel1">Wie oft würdest du maximal da hin gehen</label>
                                    <select class="form-control" id="frequency_<?php echo $i ?>">
                                        <option>Täglich</option>
                                        <option>jeden 2. Tag</option>
                                        <option>jeden 3. Tag</option>
                                        <option>1x pro Woche</option>
                                        <option>1x pro 2 Wochen</option>
                                        <option>1x pro Monat</option>
                                        <option>1x pro 2 Monat</option>
                                        <option>1x pro Quartal</option>
                                        <option>1x pro Semeste</option>
                                        <option>1x pro Jahr</option>
                                    </select>
                                </div>
                            </div>
                    </li>
                </ul>
                </li>
                <?php
                $i++;
                }
                ?> </ul>

                <ul class="list-inline">
                    <?php
                    foreach ($criterias as $criteria) {
                        ?>
                        <li class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-12">
                                    <?php
                                    echo $criteria["Name"];
                                    ?>
                                    <div class="input-group">
                                        <input type="radio" name="<?php echo $criteria["Name"]; ?>" value="1">Not
                                        important
                                        <input type="radio" name="<?php echo $criteria["Name"]; ?>" value="2">a bit
                                        important
                                        <input type="radio" name="<?php echo $criteria["Name"]; ?>" value="3"> neutral
                                        <input type="radio" name="<?php echo $criteria["Name"]; ?>" value="4">important
                                        <input type="radio" name="<?php echo $criteria["Name"]; ?>" value="5">very
                                        important
                                    </div>
                                </div>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
                <div class="col-sm-offset-7 col-sm-5">
                    <!--<button type="submit" class="btn btn-default">Update</button>-->
                    <button type="submit" name="submit-button" class="btn btn-default" value="Submit">Update</button>
                </div>
            </div>
        </form>
        <?php
    }
}

?>





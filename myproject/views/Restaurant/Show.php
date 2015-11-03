<?php
/**
 * Created by IntelliJ IDEA.
 * User: adi
 * Date: 28.10.2015
 * Time: 08:14
 */

namespace View;

//require_once BASE . 'views' . DS . 'Restaurant' . DS . 'Detail.php';
require_once BASE . 'views' . DS . 'Restaurant' . DS . 'Edit.php';


class ShowRestaurant
{
    private $vars;

    public function setVars($params)
    {
        $this->vars = $params;
    }

    public function render()
    {
        $list = $this->vars;

        ?> <ul>
        <?php

        foreach ($list as $restaurant) {
            ?> <li><?php
            //  print_r($list);
            $ID = $restaurant->getId();
            $Name = $restaurant->getName();
            $Food = $restaurant->getFood();

            echo $ID . " " . $Name . " " . $Food;?>

            <input type="button" value="Bearbeiten" onclick="window.location.href='/restaurant/edit/<?php echo $ID ?>'" />
            <input type="button" value="Detail Ansicht" onclick="window.location.href='/restaurant/detail/<?php echo $ID ?>'" />

            <?php
            echo "\n";
            echo "<br>";
            ?> </li><?php
        }
        ?>

        <li>  <input type="button" value="Neu" onclick="window.location.href='/restaurant/create'" /></li>

    </ul>
        <?php
    }
}
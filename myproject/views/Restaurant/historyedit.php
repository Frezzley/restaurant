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


class historyedit extends View
{
    private $vars;

    public function setVars($params)
    {
        $this->vars = $params;
    }

    public function render()
    {
        $list = $this->vars['list'];
        $historyId = $this->vars['id'];

        ?>
        <ul class="list-inline">
            <?php
            $htmlhead = '
<body>
<div class="container">
    <div class="row row-offcanvas row-offcanvas-right">
    <div class="col-md-1"></div>
        <div class="col-xs-12 col-sm-12 col-md-10">
            <div class="row">';
            echo $htmlhead;
            echo ' <div class="introduction"> Hier finden Sie alle bei uns Registrierten Restaurants. </div>';

            foreach ($list as $restaurant) {
                ?>
                <li><?php
                //  print_r($list);
                $ID = $restaurant->getId();
                $Name = $restaurant->getName();
                $htmlcontent = '<div>
                    <h2>' . $ID . ' </h2>

                    <p>' . $Name . '</p>

                    <p><a class="btn btn-default" href=" ' . '/restaurant/changeHistoryRestaurant/' . $ID .','. $historyId . '"' . ' role="button">Wir waren hier</a></p>
                </div>';
                ?>
                <li class="col-xs-6 col-md-4 col-lg-2"><?php echo $htmlcontent; ?></li><?php
            }
            ?>

            <!-- <li><input type="button" value="Neu" onclick="window.location.href='/restaurant/create'"/></li>-->

        </ul>
        <?php

    }
}

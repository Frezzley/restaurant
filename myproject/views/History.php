<?php
/**
 * Created by IntelliJ IDEA.
 * User: adi
 * Date: 28.10.2015
 * Time: 08:14
 */

namespace View;

//require_once BASE . 'views' . DS . 'Restaurant' . DS . 'Detail.php';
//require_once BASE . 'views' . DS . 'Restaurant' . DS . 'Edit.php';


class ShowHistory extends View
{
    private $vars;

    public function setVars($params)
    {
        $this->vars = $params;
    }

    public function render()
    {
        $list = $this->vars;

        ?>

            <?php
            $htmltop = '
<body>
<div class="container">
    <div class="row row-offcanvas row-offcanvas-right">';

            $htmltop .= ' <div class="introduction"> Hier finden Sie eine Liste mit den Orten, wo wir gegessen haben. </div><ul>';
            $html = "";
            foreach ($list as $day) {
                ?>
                <?php
                    //  print_r($list);
                    $date = $day['date'];
                    $Name = $day['restaurantName'];
                    $html = '
                    <li>' . $date . ' ' . $Name . '</li>'. $html;

            }

        $html = $html . '</ul>';

    echo $htmltop . $html;
    }
}
?>
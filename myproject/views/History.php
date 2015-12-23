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
        $list = $this->vars['list'];
        $id = $this->vars['id'];

        ?>

            <?php
            $htmltop = '
<body>
<div class="container">
    <div class="row row-offcanvas row-offcanvas-right">';


            $htmltop .= ' <div class="introduction"> Hier finden Sie eine Liste mit den Orten, wo wir gegessen haben. </div><ul class="list-group">';
            $html = "";
            foreach ($list as $day) {
                ?>
                <?php
                    //  print_r($list);
                    $date = $day['date'];
                    $Name = $day['restaurantName'];
                    $htmlstart = '
                    <li class="list-group-item"> <p>' . $date . ' ' . $Name . '<p>';


                     $htmlmiddle ='<p><a class="btn btn-default" href=" ' . '/restaurant/historyedit/' . $day['historyId'] . '"' . ' role="button">Bearbeiten</a></p>';



                $htmlend = '</li>'. $html;

                $html = $htmlstart . $htmlmiddle . $htmlend;

            }

        $html = $html . '</ul>';

    echo $htmltop . $html;
    }
}
?>
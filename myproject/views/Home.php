<?php

namespace View;
require_once('./myproject/Layout.php');


class Home
{

    public function index()
    {
        //<meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
        require_once BASE . 'views' . DS . 'View.php';

    }


    function render($winner)
    {

        $luckywinner = $winner;
        $forecast = "Migros";

        ?>

        <div class="container">
            <div class="jumbotron">
                <h1>Today, we are eating <?php echo $luckywinner ?> <!--(Tendency)--></h1>

                <p>Coming up...</p>

                <p><?php echo $forecast ?></p>

                <p><a class="btn btn-primary btn-lg" href="#" role="button">Details</a></p>
            </div>

        </div>
        <?php
        require_once('./myproject/Layoutfooter.php');

    }
}

?>

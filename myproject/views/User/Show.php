<?php
/**
 * Created by IntelliJ IDEA.
 * User: adi
 * Date: 28.10.2015
 * Time: 08:14
 */

namespace View;

require_once BASE . 'views' . DS . 'User' . DS . 'Detail.php';
require_once BASE . 'views' . DS . 'User' . DS . 'Edit.php';


class ShowUsers
{
    private $vars;

    public function setVars($params)
    {
        $this->vars = $params;
    }

    public function render()
    {
        $list = $this->vars;

        ?> <ul class="list-inline">
        <?php

        foreach ($list as $user) {
  ?> <li><?php
            //  print_r($list);
            $ID = $user->getId();
            $Name = $user->getName();
            $FirstName = $user->getFirstName();
           // $ID = $user['Id'];

            //$ID = $list[0];
            echo $ID . " " . $FirstName . " " . $Name;

            ?>

        <input type="button" value="Bearbeiten" onclick="window.location.href='/user/edit/<?php echo $ID ?>'" />
       <input type="button" value="Detail Ansicht" onclick="window.location.href='/user/detail/<?php echo $ID ?>'" />

            <?php

            echo "\n";
            echo "<br>";
            /*  foreach($list[0] as $row)
              {
                  echo $row . "\n";
              }*/
            //return $user->getFirstName() . $user->getName();
            ?> </li><?php
            }
      ?>



        <li>  <input type="button" value="Neu" onclick="window.location.href='/user/create'" /></li>

    </ul>
        <?php
    }
}
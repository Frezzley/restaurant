<?php
/**
 * Created by IntelliJ IDEA.
 * User: adi
 * Date: 28.10.2015
 * Time: 08:14
 */

namespace View;


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

        print_r($list);
      /*  foreach($list[0] as $row)
        {

            echo $row . "\n";
        }*/
        //return $user->getFirstName() . $user->getName();
    }
}
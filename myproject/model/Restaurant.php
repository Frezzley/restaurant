<?php
/**
 * Created by IntelliJ IDEA.
 * User: adi
 * Date: 02.11.2015
 * Time: 10:13
 */

namespace Model;


class Restaurant extends Model
{


    private $Food;
    private $Price;


    /**
     * @return mixed
     */
    public function getFood()
    {
        return $this->Food;
    }

    /**
     * @param mixed $Food
     */
    public function setFood($Food)
    {
        $this->Food = $Food;
    }


    public function getPrice()
    {
        return $this->Price;
    }

    /**
     * @param mixed $Price
     */
    public function setPrice($Price)
    {
        $this->Price = $Price;
    }

}
<?php
namespace Controller;
/**
 * Created by IntelliJ IDEA.
 * User: adi
 * Date: 14.10.2015
 * Time: 09:35
 */
class User extends Controller {

    public function create() {

        $view = new Create();
        echo $view->render();
    }
}
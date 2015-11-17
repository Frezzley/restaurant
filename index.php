<?php
// Ensure we have session
if(session_id() === ""){
    session_start();
}

// define the directory separator
define('DS', DIRECTORY_SEPARATOR);
// define the application path
define('ROOT', dirname(dirname(__FILE__)));



define('BASE', realpath($_SERVER["DOCUMENT_ROOT"]) . DS . 'myproject' . DS);

// start to dispatch
//��require_once ($base . 'lib' . DS . 'Router.php');

//require_once ('./myproject/Layout.php');
require_once ('./myproject/lib/Router.php');

$router = new Router($_SERVER['REQUEST_URI']);
//$router = new Router($_SERVER['REDIRECT_URL']);


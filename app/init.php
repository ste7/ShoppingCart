<?php
session_start();
require_once 'functions.php';

define("APP_URL", "http://localhost/shoppingcart/");
define("CURRENT_URL", __DIR__);
$GLOBALS['config'] = array(
    'mysql' => array(
        'host' => '127.0.0.1',
        'username' => 'root',
        'password' => '',
        'dbname' => 'shoppingcartdb'
    ),
    'session' => array(
        'session_name' => 'user'
    ),
    'cookie' => array(
        'cookie_name' => 'cart',
        'cookie_time' => (7 * 86400) // (60 * 20) = 20 min.
    )
);

spl_autoload_register("MyAutoLoad");
function MyAutoLoad($class){
    require_once 'classes/' . $class . '.php';
}
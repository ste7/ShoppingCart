<?php
require_once '../../init.php';

$cart = new Cart();
$db = new DB();
$user = new User();
if(Input::exists()){
    if($user->isLogged()){
        $db->delete('orders', array('item_id' => Input::get('id')));
    }else{
        $db->delete('orders_offline', array('item_id' => Input::get('id')));
    }
}
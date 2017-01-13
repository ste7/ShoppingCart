<?php
require_once '../../init.php';

$db = new DB();
if(Input::exists()){
    $user = new User();
    $cart = new Cart();
    $article = $db->get('items', array('id', '=', Input::get('id')));

    if($user->isLogged()){
        $cart->insert('orders', Input::get('count'), $article->first()->price, Input::get('id'), 'user_id', Session::get('session_name'));
    }else{
        if(!Cookie::exists('cookie_name')){
            $hash = mt_rand();
            Cookie::set('cookie_name', $hash);
            $cart->insert('orders_offline', Input::get('count'), $article->first()->price, Input::get('id'), 'hash', $hash);
        }else{
            $hash = Cookie::get('cookie_name');
            $cart->insert('orders_offline', Input::get('count'), $article->first()->price, Input::get('id'), 'hash', $hash);
        }
    }
}
<?php

class Cart{
    private $_db,
            $_orders = null;

    public function __construct(){
        $this->_db = DB::getInstance();
    }


    //checking if the current item exists in table - if is true, return results
    public function check($table){
        if($table == "orders"){
            $result = $this->_db->get('orders', array('item_id' => Input::get('id'), 'user_id' => Session::get('session_name')));
            return $result->results() ? $result->first() : false;
        }else{
            $result = $this->_db->get('orders_offline', array('item_id' => Input::get('id'), 'hash' => Cookie::get('cookie_name')));
            return $result->results() ? $result->first() : false;
        }
    }
    

    public function insert($table, $quantity, $price, $item_id, $column, $id_or_hash){
        $result = $this->check($table);
        if(!$result){
            $this->_db->insert($table, array(
                'quantity' => $quantity,
                'price' => $price,
                'total' => $quantity * $price,
                'item_id' => $item_id,
                $column => $id_or_hash,
            ));
        }else{
            $this->_db->update($table, array(
                'quantity' => $result->quantity + $quantity,
                'total' => $result->total + ($quantity * $price)), array(
                'item_id' => $item_id,
                $column => $id_or_hash
            ));
        }
    }


    //return orders to cart - print current users orders
    public function get(){
        $user = new User();
        if($user->isLogged()){
            $this->_orders = $this->_db->get('orders', array('user_id', '=', Session::get('session_name')));

            return $this->_orders->results();
        }else{
            if(Cookie::exists('cookie_name')){
                $this->_orders = $this->_db->get('orders_offline', array('hash', '=', Cookie::get('cookie_name')));
                
                return $this->_orders->results();
            }
        }
        return false;
    }
    


    public function item($id){
        $results = $this->_db->get('items', array('id', '=', $id));

        return $results->first();
    }
    

    //switches from the orders_offline table to orders table
    public function update(){
        $orders = $this->_db->get('orders_offline', array('hash', '=', Cookie::get('cookie_name')));

        foreach($orders->results() as $order){
            $find = $this->_db->get('orders', array('item_id' => $order->item_id, 'user_id' => Session::get('session_name')));

            if(!$find->results()){
                $this->_db->insert('orders', array(
                    'quantity' => $order->quantity,
                    'price' => $order->price,
                    'total' => $order->total,
                    'item_id' => $order->item_id,
                    'user_id' => Session::get('session_name')
                ));
            }else{
                $this->_db->update('orders', array(
                    'quantity' => $find->first()->quantity + $order->quantity,
                    'total' => $find->first()->total + ($order->total)), array(
                    'item_id' => $order->item_id,
                    'user_id' => Session::get('session_name')
                ));
            }
        }

        $this->_db->delete('orders_offline', array('hash' => Cookie::get('cookie_name')));
    }
}
<?php

class Cookie{

    public static function exists($name){
        return isset($_COOKIE[config('cookie', $name)]) ? true : false;
    }
    
    public static function set($name, $value){
        setcookie(config('cookie', $name), $value, time() + config('cookie', 'cookie_time'), '/');
    }
    
    public static function get($name){
        return $_COOKIE[config('cookie', $name)];
    }

    public static function delete($name){
        self::set($name, '', time() -1);
    }
}
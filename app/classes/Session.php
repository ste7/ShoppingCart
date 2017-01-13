<?php

class Session{
    
    public static function exists($name){
        return isset($_SESSION[config('session', $name)]) ? true : false;
    }
    
    public static function put($name, $value){
        $_SESSION[config('session', $name)] = $value;
    }
    
    public static function get($name){
        return $_SESSION[config('session', $name)];
    }
    
    public static function delete($name){
        unset($_SESSION[config('session', $name)]);
    }
}
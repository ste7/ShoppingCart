<?php

class Input{

    public static function exists($type = 'POST'){
        switch($type){
            case $type == 'POST';
                return (!empty($_POST)) ? true : false;
            break;
            case $type == 'GET';
                return (!empty($_GET)) ? true : false;
            break;
        }
    }
    
    public static function get($value){
        if(isset($_POST[$value])){
            return $_POST[$value];
        }elseif(isset($_GET[$value])){
            return $_GET[$value];
        }else{
            return false;
        }
    }
}
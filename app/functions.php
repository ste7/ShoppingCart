<?php

function config($array, $field){
    return $GLOBALS['config'][$array][$field];
}

function _print($results){
    echo "<pre>", print_r($results), "</pre>";
}

function replace_underscore($value){
    return str_replace("_"," ", $value);
}

function escape($value){
    return htmlspecialchars($value);
}

function url(){
    $current = basename($_SERVER['REQUEST_URI']);
    $title = chop($current, '.php');
    return ucfirst($title);
}

function is_assoc($array = array()){
    $keys = array_keys($array);
    if(array_keys($keys) !== $keys){
        return true;
    }else{
        return false;
    }
}
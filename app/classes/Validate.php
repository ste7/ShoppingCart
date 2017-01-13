<?php

class Validate{

    private $_error = array(),
            $_db;

    public function __construct(){
        $this->_db = DB::getInstance();
    }

    public function requirements($fields = array()){
        $validate = array(
            'name' => array(
                'required' => true,
                'min' => '2',
                'max' => '50'
            ),
            'username' => array(
                'required' => true,
                'min' => '6',
                'max' => '30',
                'unique' => true
            ),
            'password' => array(
                'required' => true,
                'min' => '6',
                'max' => '20'
            ),
            'password_again' => array(
                'required' => true,
                'matches' => true
            )
        );
        
        foreach($fields as $key=>$value){
            if($value == ""){
                $this->addError($key, "{$key} is required");
            } elseif(in_array($key,$validate[$key])){
                foreach($validate[$key] as $rule=>$rule_value){
                    switch($rule){
                        case $rule == "min";
                            if(strlen($value) < $rule_value){
                                $this->addError($key, "{$key} must be a minimum of {$rule_value} characters");
                            }
                        break;
                        case $rule == "max";
                            if(strlen($value) > $rule_value){
                                $this->addError($key, "{$key} must be a maximum of {$rule_value} characters");
                            }
                            break;
                        case $rule == "matches";
                            if($fields['password'] != $fields['password_again']){
                                $this->addError($key, "{$key} must match {$rule_value}");
                            }
                        break;
                        case $rule == "unique";
                            if($this->unique($value)){
                                $this->addError($key, "{$key} already exist");
                            }
                        break;
                    }
                }
            }
        }
    }

    public function unique($value){
        $results = $this->_db->get('users', array('username', '=', $value));
        if($results->results()){
            return true;
        }else{
            return false;
        }
    }

    public function addError($field, $value){
        $this->_error[$field] = $value;
    }

    public function error($field){
        if(array_key_exists($field, $this->_error)){
            return replace_underscore($this->_error[$field]);
        }
    }

    public function errorExists(){
        return $this->_error ? true : false;
    }
}
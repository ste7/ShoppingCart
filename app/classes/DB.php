<?php

class DB{
    public $_db;
    private $_results = null;
    private static $_instance = null;
    
    public function __construct(){
        try{
            $this->_db = new PDO('mysql:host='.config('mysql','host').'; dbname='.config('mysql', 'dbname'), config('mysql', 'username'), config('mysql', 'password'));
        } catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public static function getInstance(){
        if(!(isset(self::$_instance))){
            self::$_instance = new DB();
        }
        return self::$_instance;
    }

    public function bind($prepare, $fields){
        if(!is_assoc($fields)){
            $i = 0;
            foreach($fields as $value){
                $prepare->bindValue($fields[$i], $fields[$i+2]);
            }
        }else{
            foreach($fields as $key=>$value){
                $prepare->bindValue($key, $value);
            }
        }
    }

    public function query($table, $fields = null){
        if($fields){
            if(!is_assoc($fields)){
                $i = 0;
                $key = $fields[0];
                $operator = $fields[1];
                $value = $fields[2];
                $query = "SELECT * FROM {$table} WHERE {$key} {$operator} :$key";
            }else{
                $query = "SELECT * FROM {$table} WHERE ";
                $i = 1;
                foreach($fields as $key=>$value){
                    $query .= " {$key} = :$key ";
                    if($i < count($fields)){
                        $query .= " AND ";
                    }
                    $i++;
                }
            }
        }else{
            $query = "SELECT * FROM {$table}";
        }
        $prepare = $this->_db->prepare($query);

        return $prepare;
    }

    public function get($table, $fields = null){
        $prepared = $this->query($table, $fields);
        if($fields){
            $this->bind($prepared, $fields);
        }
        $prepared->execute();
        $this->_results = $prepared->fetchAll(PDO::FETCH_OBJ);
        
        return $this;
    }
    

    public function insert($table, $fields){
        $i = 1;
        $keys = "(";
        $values = " VALUES(";
        foreach($fields as $key=>$value){
            $keys .= "$key";
            $values .= ":$key";
            if($i < count($fields)){
                $keys .= ", ";
                $values .= ", ";
            }
            $i++;
        }
        $query = "INSERT INTO {$table} " . $keys . ") " . $values . ")";
        $prepare = $this->_db->prepare($query);
        $this->bind($prepare, $fields);


        $prepare->execute();
    }

    public function update($table, $fields = array(), $where = array()){
        $keys = "";
        $values = "";
        $i = 1;

        foreach($fields as $key=>$value){
            $keys .= "{$key} = :$key";
            if($i < count($fields)){
                $keys .= ",";
            }
            $i++;
        }

        $x = 1;
        foreach($where as $key=>$value){
            $values .= "{$key} = '$value'";
            if($x < count($where)){
                $values .= " AND ";
            }
            $x++;
        }
        $query = "UPDATE {$table} SET {$keys} WHERE {$values}";

        $data = $this->_db->prepare($query);
        $this->bind($data, $fields);
        $data->execute();
    }

    public function delete($table, $fields = array()){
        $i = 1;
        $query = "DELETE FROM {$table} WHERE ";
        foreach($fields as $key=>$value){
            $query .= " {$key} = :$key";
            if($i < count($fields)){
                $query .= ",";
            }
            $i++;
        }
        $prepare = $this->_db->prepare($query);
        $this->bind($prepare, $fields);
        $prepare->execute();
    }
    
    public function results(){
        return $this->_results;
    }
    
    public function first(){
        return $this->_results[0];
    }

    public function last(){
        return $this->_results[count($this->results())-1];
    }
}
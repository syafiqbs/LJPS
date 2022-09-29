<?php

class User{
    private $user_id;
    private $user_name;
    private $control;

    function __construct($user_id, $user_name, $control){
        $this->user_id = $user_id;
        $this->user_name = $user_name;
        $this->control = $control;
    }

    // Set
    function setUserId($user_id){
        $this->user_id = $user_id;
    }
    function setUserName($user_name){
        $this->user_name = $user_name;
    }
    function setControl($control){
        $this->control = $control;
    }

    // Get
    function getUserId(){
        return $this->user_id;
    }
    function getUserName(){
        return $this->user_name;
    }
    function getControl(){
        return $this->control;
    }
}

?>
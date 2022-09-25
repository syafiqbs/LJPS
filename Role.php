<?php

class Role{
    private $role_id;
    private $role_name;

    function __construct($role_id, $role_name){
        $this->role_id = $role_id;
        $this->role_name = $role_name;
    }

    // Set
    function setRoleId($role_id){
        $this->role_id = $role_id;
    }
    function setRoleName($role_name){
        $this->role_name = $role_name;
    }

    // Get
    function getRoleId(){
        return $this->role_id;
    }
    function getRoleName(){
        return $this->role_name;
    }
}

?>
<?php

    class Staff{

        private $staff_id;
        private $staff_name;
        private $dept;
        private $email;
        private $role;

        function __construct($staff_id, $staff_name, $dept, $email, $role){
            $this->staff_id = $staff_id;
            $this->staff_name = $staff_name;
            $this->dept = $dept;
            $this->email = $email;
            $this->role = $role;
        }

        function getStaffId(){
            return $this->staff_id;
        }
        function getStaffName(){
            return $this->staff_name;
        }
        function getDept(){
            return $this->dept;
        }
        function getEmail(){
            return $this->email;
        }
        function getRole(){
            return $this->role;
        }

        function setStaffId(){
            $this->staff_id = $staff_id;
        }
        function setStaffName(){
            $this->staff_name = $staff_name;
        }
        function setDept(){
            $this->dept = $dept;
        }
        function setEmail(){
            $this->email = $email;
        }
        function setRole(){
            $this->role = $role;
        }
    }

?>
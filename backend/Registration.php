<?php

    class Registration{
        private $reg_id;
        private $course_id;
        private $staff_id;
        private $reg_status;
        private $completion_status;

        function __construct($reg_id, $course_id, $staff_id, $reg_status, $completion_status){
            $this->reg_id = $reg_id;
            $this->course_id = $course_id;
            $this->staff_id = $staff_id;
            $this->reg_status = $reg_status;
            $this->completion_status = $completion_status;
        }

        function getRegId(){
            return $this->reg_id;
        }
        function getCourseId(){
            return $this->course_id;
        }
        function getStaffId(){
            return $this->staff_id;
        }
        function getRegStatus(){
            return $this->reg_status;
        }
        function getCompletionStatus(){
            return $this->completion_status;
        }

        function setRegId(){
            $this->reg_id = $reg_id;
        }
        function setCourseId(){
            $this->course_id = $course_id;
        }
        function setStaffId(){
            $this->staff_id = $staff_id;
        }
        function setRegStatus(){
            $this->reg_status = $reg_status;
        }
        function setCompletionStatus(){
            $this->completion_status = $completion_status;
        }

    }

?>
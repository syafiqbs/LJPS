<?php

    class Course{
        private $course_id;
        private $course_name;
        private $course_desc;
        private $course_status;
        private $course_type;
        private $course_category;

        function __construct($course_id, $course_name, $course_desc, $course_status, $course_type, $course_category){
            $this->course_id = $course_id;
            $this->course_name = $course_name;
            $this->course_desc = $course_desc;
            $this->course_status = $course_status;
            $this->course_type = $course_type;
            $this->course_category = $course_category;
        }

        function getCourseId(){
            return $this->course_id;
        }
        function getCourseName(){
            return $this->course_name;
        }
        function getCourseDesc(){
            return $this->course_desc;
        }
        function getCourseStatus(){
            return $this->course_status;
        }
        function getCourseType(){
            return $this->course_type;
        }
        function getCourseCategory(){
            return $this->course_category;
        }

        function setCourseId(){
            $this->course_id = $course_id;
        }
        function setCourseName(){
            $this->course_name = $course_name;
        }
        function setCourseDesc(){
            $this->course_desc = $course_desc;
        }
        function setCourseStatus(){
            $this->course_status = $course_status;
        }
        function setCourseType(){
            $this->course_type = $course_type;
        }
        function setCourseCategory(){
            $this->course_category = $course_category;
        }


    }

?>
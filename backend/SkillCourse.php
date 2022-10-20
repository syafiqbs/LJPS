<?php

    class SkillCourse{
        private $course_id;
        private $skill_id;

        function __construct($course_id, $skill_id){
            $this->course_id = $course_id;
            $this->skill_id = $skill_id;
        }

        function getCourseId(){
            return $this->course_id;
        }
        function getSkillid(){
            return $this->skill_id;
        }

        function setCourseId($course_id){
            $this->course_id = $course_id;
        }
        function setSkillId($skill_id){
            $this->skill_id = $skill_id;
        }
    }
?>
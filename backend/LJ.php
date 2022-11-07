<?php

    class LJ{
        private $staff_id;
        private $job_id;
        private $learningjourney_name;
        private $learningjourney_main;
        private $learningjourney_description;
        private $skill_id;
        private $course_id;

        function __construct($staff_id, $job_id, $learningjourney_name, $learningjourney_main, $learningjourney_description, $skill_id, $course_id){
            $this->staff_id = $staff_id;
            $this->job_id = $job_id;
            $this->learningjourney_name = $learningjourney_name;
            $this->learningjourney_main = $learningjourney_main;
            $this->learningjourney_description = $learningjourney_description;
            $this->skill_id = $skill_id;
            $this->course_id = $course_id;
        }

        function getStaffId(){
            return $this->learningjourney_id;
        }
        function getJobId(){
            return $this->job_id;
        }
        function getLearningJourneyName(){
            return $this->learningjourney_name;
        }
        function getLearningJourneyMain(){
            return $this->learningjourney_main;
        }
        function getLearningJourneyDescription(){
            return $this->learningjourney_description;
        }
        function getSkillId(){
            return $this->skill_id;
        }
        function getCourseId(){
            return $this->course_id;
        }


        function setStaffId($staff_id){
            $this->staff_id = $staff_id;
        }
        function setJobId($job_id){
            $this->job_id = $job_id;
        }
        function setLearningJourneyName($learningjourney_name){
            $this->learningjourney_name = $learningjourney_name;
        }
        function setLearningJourneyMain($learningjourney_main){
            $this->learningjourney_main = $learningjourney_main;
        }
        function setLearningJourneyDescription($learningjourney_description){
            $this->learningjourney_description = $learningjourney_description;
        }
        function setSkillId($skill_id){
            $this->skill_id = $skill_id;
        }
        function setCourseId($course_id){
            $this->course_id = $course_id;
        }


    }
?>
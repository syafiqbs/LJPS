<?php

    class LJ{
        private $learniningjourney_id;
        private $learningjourney_name;
        private $learningjourney_description;
        private $staff_id;
        private $course_id
        private $skill_id;

        function __construct($learniningjourney_id, $learningjourney_name, $learningjourney_description, $staff_id, $course_id, $skill_id){
            $this->learningjourney_id = $learniningjourney_id;
            $this->learningjourney_name = $learningjourney_name;
            $this->learningjourney_description = $learningjourney_description;
            $this->staff_id = $staff_id;
            $this->course_id = $course_id;
            $this->skill_id = $skill_id;
        }

        function getLearningJourneyId(){
            return $this->learningjourney_id;
        }
        function getLearningJourneyName(){
            return $this->learningjourney_name;
        }
        function getLearningJourneyDescription(){
            return $this->learningjourney_description;
        }
        function getStaffId(){
            return $this->staff_id;
        }
        function getCourseId(){
            return $this->course_id;
        }
        function getSkillId(){
            return $this->skill_id;
        }

        function setLearningJourneyId(){
            $this->learningjourney_id = $learniningjourney_id;
        }
        function setLearningJourneyName(){
            $this->learningjourney_name = $learningjourney_name;
        }
        function setLearningJourneyDescription(){
            $this->learningjourney_description = $learningjourney_description;
        }
        function setStaffId(){
            $this->staff_id = $staff_id;
        }
        function setCourseId(){
            $this->course_id = $course_id;
        }
        function setSkillId(){
            $this->skill_id = $skill_id;
        }

    }

?>
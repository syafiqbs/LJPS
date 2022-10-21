<?php

    class Skill{
        private $skill_id;
        private $skill_name;

        function __construct($skill_id, $skill_name){
            $this->skill_id = $skill_id;
            $this->skill_name = $skill_name;
        }

        function getSkillId(){
            return $this->skill_id;
        }
        function getSkillName(){
            return $this->skill_name;
        }

        function setSkillId($skill_id){
            $this->skill_id = $skill_id;
        }
        function setSkillName($skill_name){
            $this->skill_name = $skill_name;
        }
    }
?>
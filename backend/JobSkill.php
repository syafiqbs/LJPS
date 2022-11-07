<?php

    class JobSkill{

        private $jobId;
        private $jobName;
        private $skillId;

        function __construct($jobId, $jobName, $skillId){
            $this->jobId = $jobId;
            $this->jobName = $jobName;
            $this->skillId = $skillId;
        }

        function getJobId(){
            return $this->jobId;
        }
        function getJobName(){
            return $this->jobName;
        }
        function getSkillId(){
            return $this->skillId;
        }
        

        function setJobId($jobId){
            $this->jobId = $jobId;
        }
        function setJobName($jobName){
            $this->jobName = $jobName;
        }
        function setSkillId($skillId){
            $this->skillId = $skillId;
        }
    }


?>
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
        

        function setJobId(){
            $this->jobId = $jobId;
        }
        function setJobName(){
            $this->jobName = $jobName;
        }
        function setSkillId(){
            $this->skillId = $skillId;
        }
    }


?>
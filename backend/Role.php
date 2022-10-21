<?php

    class Role{
        private $job_id;
        private $job_name;
        private $job_description;

        function __construct($job_id, $job_name, $job_description){
            $this->job_id = $job_id;
            $this->job_name = $job_name;
            $this->job_description = $job_description;
        }

        function getJobId(){
            return $this->job_id;
        }
        function getJobName(){
            return $this->job_name;
        }
        function getJobDescription(){
            return $this->job_description;
        }

        function setJobId($job_id){
            $this->job_id = $job_id;
        }
        function setJobName($job_name){
            $this->job_name = $job_name;
        }
        function setJobDescription($job_description){
            $this->job_description = $job_description;
        }
    }
?>
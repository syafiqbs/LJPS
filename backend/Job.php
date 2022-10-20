<?php

class Job{
    private $job_id;
    private $job_name;
    private $job_description;

    function __construct($job_id, $job_name, $job_description){
        $this->job_id = $job_id;
        $this->job_name = $job_name;
        $this->job_description = $job_description;
    }

    function getJobId(){
        return $this->jobId;
    }
    function getJobName(){
        return $this->jobName;
    }
    function getJobDescription(){
        return $this->getJobDescription;
    }

    function setJobId(){
        $this->job_id = $job_id;
    }
    function setJobName(){
        $this->job_name = $job_name;
    }
    function setJobDescription(){
        $this->job_description = $job_description;
    }
}
?>
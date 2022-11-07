<?php

require_once "common.php";
require_once "ConnectionManager.php";
require_once "SkillDAO.php";

$result = [];
$errors = [];

        $job_id = $_POST["jobid"];
        $job_name = $_POST["jobname"];
        $job_description = $_POST["jobdescription"];

        if (strlen($job_name) > 20){
          $errors[] = "Max job name length is 20";
        }
        if (strlen($job_description) > 255){
          $errors[] = "Max job desc length is 255";
        }
        if (empty($job_name)){
            $errors[] = "job name cannot be empty";
        }
        if (empty($job_id)){
            $errors[] = "job id cannot be empty";
        }
        if (empty($job_description)){
            $errors[] = "job description cannot be empty";
        }

        if (count($errors) > 0){
          $_SESSION['errors'] = $errors;
          $_SESSION["createjob_jobid"] = $job_id;
          $_SESSION['createjob_jobname'] = $job_name;
          $_SESSION['createjob_jobdescription'] = $job_description;
          header("Location: ../frontend/HR/CreateJob.php");
        }
        

        $new_job = new Job($job_id, $job_name, $job_description);
        $dao = new JobDAO();
        $status = $dao->create($new_job);

        if ($status) {
          $_SESSION['addSuccess'] = "Add operation success";
          header("Location: ../frontend/HR/HRJobs.php");
          exit();
        }
        else {
          $_SESSION['createjob_jobid'] = $job_id;
          $_SESSION['createjob_jobname'] = $job_name;
          $_SESSION['createjob_jobdescription'] = $job_description;
          $errors[] = "Error in adding new skill";
          $_SESSION['errors'] = $errors;
          header("Location: ../frontend/HR/CreateJob.php");
          return;
        }


    ?>


</body>
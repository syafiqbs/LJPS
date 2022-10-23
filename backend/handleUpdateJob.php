<?php

require_once "common.php";
require_once "ConnectionManager.php";
require_once "JobDAO.php";

$result = [];
$errors = [];

        $job_id = $_POST["jobid"];
        $job_name = $_POST["jobname"];
        $job_description = $_POST["jobdescription"];
        $oldjob_name = $_POST['oldjobname'];
        $oldjob_description = $_POST['oldjobdescription'];

        if (strlen($job_name) > 20){
          $errors[] = "Max job name length is 20";
        }
        if (empty($job_name)){
            $errors[] = "job name cannot be empty";
        }
        if (empty($job_description)){
            $errors[] = "job description cannot be empty";
        }
        if (empty($job_id)){
            $errors[] = "job id cannot be empty";
        }

        if (count($errors) > 0){
          $_SESSION['errors'] = $errors;
          $_SESSION["updatejob_jobid"] = $job_id;
          $_SESSION['updatejob_jobname'] = $job_name;
          $_SESSION['updatejob_jobdescription'] = $job_description;
          header("Location: ../frontend/HR/UpdateJob.php");
        }
        
        $old_job = new Job($job_id, $oldjob_name, $oldjob_description);
        $dao = new JobDAO();
        $status = $dao->edit($old_job, $job_name, $job_description);

        if ($status) {
          $_SESSION['addSuccess'] = "Update operation success";
          header("Location: ../frontend/HR/HRJobs.php");
          exit();
        }
        else {
          $_SESSION['updatejob_jobid'] = $job_id;
          $_SESSION['updatejob_jobname'] = $job_name;
          $_SESSION['updatejob_jobdescription'] = $job_description;
          $errors[] = "Error in updating new job";
          $_SESSION['errors'] = $errors;
          header("Location: ../frontend/HR/UpdateJob.php");
          return;
        }


    ?>


</body>
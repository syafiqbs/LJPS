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
          $_SESSION["deletejob_jobid"] = $job_id;
          $_SESSION['deletejob_jobname'] = $job_name;
          $_SESSION['deletejob_jobdescription'] = $job_description;
          header("Location: ../frontend/HR/DeleteJob.php");
        }
        
        // deleting job 
        $new_job = new Job($job_id, $job_name, $job_description);
        $dao = new JobDAO();
        $status = $dao->delete($new_job);

        if (!$status) {
          $_SESSION['deletejob_jobid'] = $job_id;
          $_SESSION['deletejob_jobname'] = $job_name;
          $_SESSION['deletejob_jobdescription'] = $job_description;
          $errors[] = "Error in adding new skill";
          $_SESSION['errors'] = $errors;
          header("Location: ../frontend/HR/DeleteJob.php");
          return;
        }

        // deleting related job skills
        $sql = "SELECT * 
        FROM job_skill
        WHERE job_id = '$job_id'
        ";
        $result = $conn->query($sql);
        $len = $result->num_rows;
        if ($len > 0) {
            while ($row = $result->fetch_assoc()) {
              $job_id = $row['job_id'];
              $job_name = $row['job_name'];
              $skill_id = $row['skill_id'];
              $new_job_skill = new JobSkill($job_id, $job_name, $skill_id);
              $JS_dao = new JobSkillDAO();
              $status = $JS_dao->delete($job_id,$skill_id);
              if (!$status) {
                $_SESSION['deletejob_jobid'] = $job_id;
                $_SESSION['deletejob_jobname'] = $job_name;
                $_SESSION['deletejob_jobdescription'] = $job_description;
                $errors[] = "Error in adding new skill";
                $_SESSION['errors'] = $errors;
                header("Location: ../frontend/HR/DeleteJob.php");
                return;
              }
            }
          }

        $_SESSION['addSuccess'] = "Add operation success";
        header("Location: ../frontend/HR/HRJobs.php");
        exit();
    ?>


</body>
<?php

require_once "common.php";
require_once "ConnectionManager.php";
require_once "JobSkillDAO.php";
require_once "JobDAO.php";

$result = [];
$errors = [];

$job_id = $_POST['jobid'];
$skill_id = $_POST['skillid'];

if (empty($job_id)){
    $errors[] = "Job id cannot be empty";
}
if (empty($skill_id)){
    $errors[] = "Skill id cannot be empty";
}

if (count($errors) > 0){
    $_SESSION['errors'] = $errors;
    $_SESSION["addJobSkillFail_jobid"] = $job_id;
    $_SESSION['addJobSkillFail_skillid'] = $skill_id;
    header("Location: ../frontend/HR/addJobSkill.php");
}

$job_dao = new JobDAO();
$job_name = $job_dao->getJobName($job_id);

$dao = new JobSkillDAO();
$status = $dao->create($job_id, $job_name, $skill_id);

if ($status){
    $_SESSION['addSuccess'] = "Add operation success";
    header("Location: ../frontend/HR/displayJobSkill.php");
    exit();
}
else{
    $_SESSION["addJobSkillFail_jobid"] = $job_id;
    $_SESSION['addJobSkillFail_skillid'] = $skill_id;
    $errors[] = "Error in adding skill to job";
    $_SESSION['errors'] = $errors;
    header("Location: ../frontend/HR/addJobSkill.php");
    return;
}

?>
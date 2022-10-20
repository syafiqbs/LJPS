<?php

require_once "common.php";
require_once "ConnectionManager.php";
require_once "RoleSkillDAO.php";
require_once "JobDAO.php";

$result = [];
$errors = [];

$role_id = $_POST['roleid'];
$skill_id = $_POST['skillid'];

if (empty($role_id)){
    $errors[] = "Role id cannot be empty";
}
if (empty($skill_id)){
    $errors[] = "Skill id cannot be empty";
}

if (count($errors) > 0){
    $_SESSION['errors'] = $errors;
    $_SESSION["addRoleSkillFail_roleid"] = $role_id;
    $_SESSION['addRoleSkillFail_skillid'] = $skill_id;
    header("Location: ../frontend/HR/addRoleSkill.php");
}

$job_dao = new JobDAO();
$role_name = $job_dao->getJobName($role_id);

$dao = new RoleSkillDAO();
$status = $dao->create($role_id, $role_name, $skill_id);

if ($status){
    $_SESSION['addSuccess'] = "Add operation success";
    header("Location: ../frontend/HR/displayRoleSkill.php");
    exit();
}
else{
    $_SESSION["addRoleSkillFail_roleid"] = $role_id;
    $_SESSION['addRoleSkillFail_skillid'] = $skill_id;
    $errors[] = "Error in adding skill to role";
    $_SESSION['errors'] = $errors;
    header("Location: ../frontend/HR/addRoleSkill.php");
    return;
}

?>
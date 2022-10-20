<?php

require_once "common.php";
require_once "ConnectionManager.php";
require_once "RoleSkillDAO.php";

$data = explode(":", $_POST["deleteRoleSkill"]);

$job_id = $data[0];
$skill_id = $data[1];

$dao = new RoleSkillDAO();
$status = $dao->delete($job_id, $skill_id);
if ($status){
    $_SESSION['deleteSuccess'] = "Delete operation success";
    header("Location: ../frontend/HR/displayRoleSkill.php");
    exit();
}

?>
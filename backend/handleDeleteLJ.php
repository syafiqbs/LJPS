<?php

require_once "common.php";
require_once "ConnectionManager.php";
require_once "JobSkillDAO.php";

$course_id = $_POST['course_id'];
$job_id = $_POST['job_id'];
$staff_id = $_SESSION['staff_id'];
$skill_id = $_POST['skill_id'];

$dao = new LJDAO();
$status = $dao->deleteLJ($staff_id, $job_id, $skill_id, $course_id);

header("Location: ../frontend/homepage.php");
return;

?>
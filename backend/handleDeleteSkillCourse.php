<?php

require_once "common.php";
require_once "ConnectionManager.php";
require_once "SkillCourseDAO.php";

var_dump($_POST['deleteSkillCourse']);


$data = explode(":", $_POST["deleteSkillCourse"]);

$course_id = $data[0];
$skill_id = $data[1];

$skillCourse = new SkillCourse($course_id, $skill_id);
$dao = new SkillCourseDAO();
$status = $dao->delete($skillCourse);
if ($status){
    $_SESSION['deleteSuccess'] = "Delete operation success";
    header("Location: ../frontend/HR/displaySkillCourse.php");
    exit();
}

?>
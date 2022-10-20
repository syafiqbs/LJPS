<?php

require_once "common.php";
require_once "ConnectionManager.php";
require_once "SkillCourseDAO.php";

$result = [];
$errors = [];

$course_id = $_POST['courseid'];
$skill_id = $_POST['skillid'];

if (strlen($course_id) > 20){
    $errors[] = "Max course id length is 20";
}
if (strlen($course_id) < 4){
    $errors[] = "Min course id length is 4";
}
if (empty($course_id)){
    $errors[] = "Course id cannot be empty";
}
if (empty($skill_id)){
    $errors[] = "Skill id cannot be empty";
}
if (!is_numeric($skill_id)){
    $errors[] = "Skill id must be in numeric";
}
if (count($errors) > 0){
    $_SESSION['errors'] = $errors;
    $_SESSION["editkillCourseFail_courseid"] = $course_id;
    $_SESSION['editSkillCourseFail_skillid'] = $skill_id;
    header("Location: ../frontend/HR/editSkillCourse.php");
    exit();
}

$skillCourse = new SkillCourse($course_id, $skill_id);
$dao = new SkillCourseDAO();
$status = $dao->edit($skillCourse, $skill_id);

if ($status){
    $_SESSION['editSuccess'] = "Edit operation success";
    header("Location: ../frontend/HR/displaySkillCourse.php");
    exit();
}
else{
    $_SESSION["editSkillCourseFail_courseid"] = $course_id;
    $_SESSION['editSkillCourseFail_skillid'] = $skill_id;
    $errors[] = "Error in editing skill to course";
    $_SESSION['errors'] = $errors;
    header("Location: ../frontend/HR/editSkillCourse.php");
    return;
}

?>
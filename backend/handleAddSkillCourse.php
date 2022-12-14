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

if (count($errors) > 0){
    $_SESSION['errors'] = $errors;
    $_SESSION["addSkillCourseFail_courseid"] = $course_id;
    $_SESSION['addSkillCourseFail_skillid'] = $skill_id;
    header("Location: ../frontend/HR/addSkillCourse.php");
}

$new_skillCourse = new SkillCourse($course_id, $skill_id);
$dao = new SkillCourseDAO();
$status = $dao->create($new_skillCourse);

if ($status){
    $_SESSION['addSuccess'] = "Add operation success";
    header("Location: ../frontend/HR/displaySkillCourse.php");
    exit();
}
else{
    $_SESSION["addSkillCourseFail_courseid"] = $course_id;
    $_SESSION['addSkillCourseFail_skillid'] = $skill_id;
    $errors[] = "Error in adding skill to course";
    $_SESSION['errors'] = $errors;
    header("Location: ../frontend/HR/addSkillCourse.php");
    return;
}

?>
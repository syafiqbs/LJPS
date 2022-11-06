<?php

    require_once "common.php";
    require_once "ConnectionManager.php";
    require_once "SkillCourseDAO.php";
    require_once "LJDAO.php";

    $result = [];
    $errors = [];

    $course_id = $_POST['course_id'];
    $skill_id = $_POST['skill_id'];
    $staff_id = $_SESSION['staff_id'];
    $job_id = $_POST['job_id'];

    $dao = new LJDAO();
    staff_id, job_id,course_id,skill_id
    $status = $dao->switchLJ($staff_id, $job_id);
    var_dump($status);


    // header("Location: ../frontend/homepage.php");
    return;

?>
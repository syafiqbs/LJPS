<?php

    require_once "common.php";
    require_once "ConnectionManager.php";
    require_once "SkillCourseDAO.php";

    $result = [];
    $errors = [];

    $course_id = $_POST['course_id'];
    $skill_id = $_POST['skill_id'];
    $staff_id = $_SESSION['staff_id'];
    $job_id = $_POST['job_id'];

    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'ljps';

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // update selected LJ to resume
    $sql = "UPDATE learningjourney 
    SET learningjourney.learningjourney_main = 'yes'
    WHERE learningjourney.staff_id = '$staff_id'
    AND learningjourney.job_id = '$job_id'
    ";
    $stmt = $conn->prepare($sql);
    $result = $stmt->execute();
    var_dump($result);


    // update the rest to not main
    $sql = "UPDATE learningjourney 
    SET learningjourney.learningjourney_main = 'no'
    WHERE learningjourney.staff_id = '$staff_id'
    AND learningjourney.job_id = '$job_id'
    ";

    $stmt = $conn->prepare($sql);
    $result = $stmt->execute();
    var_dump($result);


    // header("Location: ../frontend/homepage.php");
    return;

?>
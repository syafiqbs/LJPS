<?php

    require_once "common.php";
    require_once "ConnectionManager.php";
    require_once "SkillCourseDAO.php";

    $result = [];
    $errors = [];

    $course_id = $_POST['courseid'];
    $skill_id = $_POST['skillid'];
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
    $sql = "SELECT * 
    FROM learningjourney 
    WHERE 
        staff_id = '$staff_id'
        AND job_id = '$job_id'
    ";

    $result = $conn->query($sql);
    $len = $result->num_rows;
    if ($len > 0) {
        while ($row = $result->fetch_assoc()) {
            // set row main to "yes"
        }
    }

    // update the rest to not main
    $sql = "SELECT * 
    FROM learningjourney 
    WHERE 
        staff_id = '$staff_id'
        AND job_id != '$job_id'
    ";
    $result = $conn->query($sql);
    $len = $result->num_rows;
    if ($len > 0) {
        while ($row = $result->fetch_assoc()) {
            // set row main to "no"
        }
    }

    header("Location: ../frontend/homepage.php");
    return;

?>
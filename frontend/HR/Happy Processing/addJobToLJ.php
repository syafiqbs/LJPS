<?php
    require_once ""
    var_dump($_POST);
    $_SESSION['job_id'] = $_POST['job_id'];
    // add job to user's learning journey list 
    header("Location: Skills.php");

?>
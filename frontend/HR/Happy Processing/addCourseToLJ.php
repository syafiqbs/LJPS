<?php
    session_start();
    var_dump($_POST);
    // add course to user's learning journey list 
    unset($_SESSION['skill_id']);
    header("Location: Skills.php");

?>
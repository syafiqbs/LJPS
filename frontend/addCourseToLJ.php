<?php
    session_start();
    var_dump($_POST);
    // add course to user's learning journey list 
    header("Location: Skills.php");

?>
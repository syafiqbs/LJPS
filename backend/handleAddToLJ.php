<?php 

    require_once "common.php";

    var_dump($_SESSION['ongoingNewLJ']);
    var_dump($_SESSION['ongoingNewLJCourse']);
    var_dump($_POST['inputJobId']);
    var_dump($_POST['inputLJName']);
    var_dump($_POST['inputLJDesc']);
    var_dump($_SESSION['staff_id']);

    

    $errors = [];

    if (empty($_POST['inputLJName'])){
        $errors[] = "Name cannot be empty!";
    }

    if (!empty($errors)){
        $_SESSION['errors'] = $errors;
        header("Location: ../frontend/addToLJ.php");
    }

    $skills = $_SESSION['ongoingNewLJ'];
    $courses = $_SESSION['ongoingNewLJCourse'];
    $job_id = $_POST['inputJobId'];
    if (isset($_POST['inputLJDesc'])){
        $lj_desc = $_POST['inputLJDesc'];
    }
    else{
        $lj_desc = "";
    }
    $lj_name = $_POST['inputLJName'];
    
    $staff_id = $_SESSION['staff_id'];

    $ljDAO = new LJDAO();
    $results = [];
    foreach(range(0, sizeof($skills)-1) as $i){
        $result = $ljDAO->create($staff_id, $job_id, $lj_name, $lj_desc, $skills[$i], $courses[$i]);
        $results[] = $result;
    }
    // add main status to line 41
    // perform search and set main status of old LJ to no

    $registrationDAO = new RegistrationDAO();
    foreach(range(0, sizeof($skills)-1) as $i){
        $result = $registrationDAO->create($courses[$i], $staff_id);
        $results[] = $result;
    }

    if (in_array(false, $results)){
        $errors[] = "Error adding course(s) to learning journey.";
        header("Location: ../frontend/addToLJ.php");
    }
    else{
        header("Location: ../frontend/HR/homepage.php");
        exit();
    }

?>
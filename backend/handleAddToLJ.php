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
        exit();
    }

    $skills = $_SESSION['ongoingNewLJ'];
    $courses = $_SESSION['ongoingNewLJCourses'];
    var_dump($skills);
    var_dump($courses);
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
    // here set old lj to no.
    $result = $ljDAO->setToNo($staff_id);
    $results = [];

    var_dump($staff_id);

    if (sizeof($skills) > 1){
        foreach(range(0, sizeof($skills)-1) as $i){
            $result = $ljDAO->create($staff_id, $job_id, $lj_name, 'yes', $lj_desc, $skills[$i], $courses[$i]);
            $results[] = $result;
        }
    }
    else{
        $result = $ljDAO->create($staff_id, $job_id, $lj_name, 'yes', $lj_desc, $skills[0], $courses[0]);
        $results[] = $result;
    }
    
    // add main status to line 41
    // perform search and set main status of old LJ to no

    $registrationDAO = new RegistrationDAO();
    if (sizeof($courses) > 1){
        foreach(range(0, sizeof($skills)-1) as $i){
            $result = $registrationDAO->create($courses[$i], $staff_id);
            $results[] = $result;
        }
    }
    else{
        $result = $registrationDAO->create($courses[0], $staff_id);
        $results[] = $result;
    }
    
    if (in_array(false, $results)){
        $errors[] = "Error adding course(s) to learning journey.";
        header("Location: ../frontend/addToLJ.php");
    }
    else{
        unset($_SESSION['ongoingNewLJ']);
        unset($_SESSION['ongoingNewLJCourses']);
        unset($_SESSION['inputCourseIdToLJ']);
        unset($_SESSION['job_id']);
        header("Location: ../frontend/homepage.php");
        exit();
    }

?>
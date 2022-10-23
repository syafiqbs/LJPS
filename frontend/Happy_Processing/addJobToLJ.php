<?php
    // session_start();
    // var_dump($_POST);
    // $_SESSION['job_id'] = $_POST['job_id'];
    // // add job to user's learning journey list 
    // header("Location: Skills.php");

?>

<?php
    // session_start();
    // require_once "ConnectionManager.php";
    // var_dump($_POST);

    // // add course to user's learning journey list 
    //     // connect to database
    //     $connMgr = new ConnectionManager();
    //     $conn = $connMgr->connect();
        
    //     // prepare insert
    //     // $sql = "INSERT INTO job_skill (job_id, job_name, skill_id) VALUES ( :job_id, :job_name, :skill_id)";
        
    //     $stmt = $conn->prepare($sql);
    //     $result = $stmt->execute();

    //     // close connections
    //     $stmt = null;
    //     $conn = null;        
        
    //     return $result;

    // unset($_SESSION['skill_id']);
    header('Location: /frontend/Skills.php');
?>
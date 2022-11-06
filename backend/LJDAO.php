<?php

require_once "ConnectionManager.php";
require_once "LJ.php";

class LJDAO{
    function create($staff_id, $job_id, $lj_name, $lj_main,$lj_desc, $skill_id, $course_id){
        $result = false;

        // connect to database
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();
        
        // prepare insert
        $sql = "INSERT INTO learningjourney VALUES (:staff_id, :job_id, :lj_name, :lj_main, :lj_desc, :skill_id, :course_id)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":staff_id", $staff_id, PDO::PARAM_STR);
        $stmt->bindParam(":job_id", $job_id, PDO::PARAM_STR);
        $stmt->bindParam(":lj_name", $lj_name, PDO::PARAM_STR);
        $stmt->bindParam(":lj_main", $lj_main, PDO::PARAM_STR);
        $stmt->bindParam(":lj_desc", $lj_desc, PDO::PARAM_STR);
        $stmt->bindParam(":skill_id", $skill_id, PDO::PARAM_STR);
        $stmt->bindParam(":course_id", $course_id, PDO::PARAM_STR);

        $result = $stmt->execute();

        // close connections
        $stmt = null;
        $conn = null;        
        
        return $result;
    }
}
?>
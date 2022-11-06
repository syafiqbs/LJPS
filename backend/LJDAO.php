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

    function switchLJ($staff_id, $job_id){
        $result1 = false;
        $result2 = false;
        $yes = "yes";
        $no = "no";

        // connect to database
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();
        
        // prepare update
        $sql1 = "UPDATE learningjourney SET learningjourney_main = :no WHERE staff_id = :staff_id";
        $stmt1 = $conn->prepare($sql1);
        $stmt1->bindParam(":no", $no, PDO::PARAM_STR);
        $stmt1->bindParam(":staff_id", $staff_id, PDO::PARAM_STR);
        $result1 = $stmt1->execute();
        if (!$result1){
            $stmt1 = null;
            $conn = null;
            return "false1";
        }

        $sql2 = "UPDATE learningjourney SET learningjourney_main = :yes WHERE staff_id = :staff_id AND job_id = :job_id";
        $stmt2 = $conn->prepare($sql2);
        $stmt2->bindParam(":yes", $yes, PDO::PARAM_STR);
        $stmt2->bindParam(":staff_id", $staff_id, PDO::PARAM_STR);
        $stmt2->bindParam(":job_id", $job_id, PDO::PARAM_STR);
        $result2 = $stmt2->execute();
        if (!$result2){
            $stmt2 = null;
            $conn = null;
            return "false2";
        }

        // close connections
        $stmt1 = null;
        $stmt2 = null;
        $conn = null;

        return true;

    }

    function deleteLJ($staff_id, $job_id, $skill_id, $course_id){
        $result = false;

        // connect to database
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();
        
        // prepare delete
        $sql = "DELETE FROM learningjourney 
        WHERE (staff_id = :staff_id)
        AND (job_id = :job_id)
        AND (skill_id = :skill_id)
        AND (course_id = :course_id)
        ";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":staff_id", $staff_id, PDO::PARAM_STR);
        $stmt->bindParam(":job_id", $job_id, PDO::PARAM_STR);
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
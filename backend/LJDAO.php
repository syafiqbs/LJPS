<?php

require_once "ConnectionManager.php";
require_once "LJ.php";

class LJDAO{
    function create($staff_id, $course_id, $skill_id){
        $result = false;

        // connect to database
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();
        
        // prepare insert
        $sql = "INSERT INTO learningjourney VALUES (:skill_id, :skill_name)";
        $stmt = $conn->prepare($sql);
        $skill_id = $skill->getSkillId();
        $skill_name = $skill->getSkillName();
        $stmt->bindParam(":skill_id", $skill_id, PDO::PARAM_STR);
        $stmt->bindParam(":skill_name", $skill_name, PDO::PARAM_STR);
        

        $result = $stmt->execute();
                
        // close connections
        $stmt = null;
        $conn = null;        
        
        return $result;
    }
    
}

?>
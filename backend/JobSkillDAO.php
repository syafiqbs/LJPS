<?php

require_once "JobSkill.php";
require_once "ConnectionManager.php";

class JobSkillDAO{
    
    function create($job_id, $job_name, $skill_id) {
        $result = false;

        // connect to database
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();
        
        // prepare insert
        $sql = "INSERT INTO job_skill (job_id, job_name, skill_id) VALUES ( :job_id, :job_name, :skill_id)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":job_name", $job_name, PDO::PARAM_STR);
        $stmt->bindParam(":skill_id", $skill_id, PDO::PARAM_STR);
        

        $result = $stmt->execute();
                
        // close connections
        $stmt = null;
        $conn = null;        
        
        return $result;
    }

    public function loadAll(){
        // Establish connection
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();

        // SQL query
        $sql = 'SELECT * FROM job_skill ORDER BY job_id ASC';
        $stmt = $conn->prepare($sql);

        // Execeute query
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        // Display
        $result = [];
        while ($row = $stmt->fetch()){
            $result[] = new JobSkill( $row['job_id'], $row['job_name'], $row['skill_id']);
        }

        // Close connection
        $stmt = null;
        $pdo = null;

        return $result;

    }

    public function delete($job_id, $skill_id){
        $result = false;

        // connect to database
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();
        
        // prepare insert
        $sql = "DELETE from job_skill WHERE (job_id = :job_id) AND (skill_id = :skill_id)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":job_id", $job_id, PDO::PARAM_STR);
        $stmt->bindParam(":skill_id", $skill_id, PDO::PARAM_STR);
        

        $result = $stmt->execute();
                
        // close connections
        $stmt = null;
        $conn = null;        
        
        return $result;
    }



}

?>
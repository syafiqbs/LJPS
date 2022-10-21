<?php

require_once "SkillCourse.php";
require_once "ConnectionManager.php";

class RoleDAO{
    
    function create($role) {
        $result = false;

        // connect to database
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();
        
        // prepare insert
        $sql = "INSERT INTO job (job_id, job_name, job_description) VALUES (:job_id, :job_name, :job_description)";
        $stmt = $conn->prepare($sql);
        $job_id = $role->getJobId();
        $job_name = $role->getJobName();
        $job_description = $role->getJobDescription();
        $stmt->bindParam(":job_id", $job_id, PDO::PARAM_STR);
        $stmt->bindParam(":job_name", $job_name, PDO::PARAM_STR);
        $stmt->bindParam(":job_description", $job_description, PDO::PARAM_STR);
        

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
        $sql = 'SELECT * FROM job ORDER BY job_id ASC';
        $stmt = $conn->prepare($sql);

        // Execeute query
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        // Display
        $result = [];
        while ($row = $stmt->fetch()){
            $result[] = new Role($row['job_id'], $row['job_name'], $row['job_description']);
        }

        // Close connection
        $stmt = null;
        $pdo = null;

        return $result;

    }

    public function checkJobId($jobid){
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();

        // SQL query
        $sql = 'SELECT job_id FROM job WHERE job_id = :jobid';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":jobid", $jobid, PDO::PARAM_STR);

        // Execeute query
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        // Display
        $result = null;
        if($stmt->execute()){

            if($row=$stmt->fetch()){
                $result = $row['job_id'];
            }
        }

        $stmt = null;
        $conn = null;
        
        return $result;
    }
    
    function delete($role) {
        $result = false;

        // connect to database
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();
        
        // prepare insert
        $sql = "DELETE from job WHERE (job_id = :job_id) AND (job_name = :job_name) AND (job_description = :job_description)";
        $stmt = $conn->prepare($sql);
        $job_id = $role->getJobId();
        $job_name = $role->getJobName();
        $job_description = $role->getJobDescription();
        $stmt->bindParam(":job_id", $job_id, PDO::PARAM_STR);
        $stmt->bindParam(":job_name", $job_name, PDO::PARAM_STR);
        $stmt->bindParam(":job_description", $job_description, PDO::PARAM_STR);

        
        $result = $stmt->execute();
                
        // close connections
        $stmt = null;
        $conn = null;        
        
        return $result;
    }

    function edit($skill, $newJob_name, $newJob_description) {
        $result = false;

        // connect to database
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();

        // prepare update
        $sql = "UPDATE job SET job_name = :newJob_name AND job_description = :newJob_description WHERE job_id = :job_id AND job_name = :oldJob_name AND job_description = :oldJob_description";
        $stmt = $conn->prepare($sql);
        $job_id = $role->getJobId();
        $oldJob_name = $role->getJobName();
        $oldJob_description = $role->getJobDescription();
        $stmt->bindParam(":job_id", $job_id, PDO::PARAM_STR);
        $stmt->bindParam(":oldJob_name", $oldJob_name, PDO::PARAM_STR);
        $stmt->bindParam(":newJob_name", $newJob_name, PDO::PARAM_STR);
        $stmt->bindParam(":oldJob_description", $oldJob_description, PDO::PARAM_STR);
        $stmt->bindParam(":newJob_description", $newJob_description, PDO::PARAM_STR);

        $result = $stmt->execute();

        // close connections
        $stmt = null;
        $conn = null;

        return $result;
    }

}
?>
<?php

    require_once "Job.php";
    require_once "ConnectionManager.php";

    class JobDAO{

        function getJobName($job_id){
            $connMgr = new ConnectionManager();
            $conn = $connMgr->connect();
    
            // SQL query
            $sql = 'SELECT job_name FROM job WHERE job_id = :job_id ';
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":job_id", $job_id, PDO::PARAM_STR);
    
            // Execeute query
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
    
            // Display
            $result = null;
            if($stmt->execute()){

                if($row=$stmt->fetch()){
                    $result = $row['job_name'];
                }
            }

        $stmt = null;
        $conn = null;
        
        return $result;
        }
    }

?>
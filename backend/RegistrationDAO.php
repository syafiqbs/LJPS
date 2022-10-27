<?php

    require_once "ConnectionManager.php";
    require_once "Registration.php";

    class RegistrationDAO{

        function getRegistrationByStaffId($staff_id){
            $connMgr = new ConnectionManager();
            $conn = $connMgr->connect();
    
            // SQL query
            $sql = 'SELECT * FROM registration WHERE staff_id = :staff_id ';
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":staff_id", $staff_id, PDO::PARAM_STR);
    
            // Execeute query
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
    
            // Display
            $result = [];
            if($stmt->execute()){
    
                if($row=$stmt->fetch()){
                    $result[] = new Registration($row['reg_id'], $row['course_id'], $row['staff_id'], $row['reg_status'], $row['completion_status']);
                }
            }
    
            $stmt = null;
            $conn = null;
            
            return $result;
        }

    }

?>
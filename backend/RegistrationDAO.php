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

        function create($course_id, $staff_id){
            $result = false;
            $reg_id = null;
            $reg_status = "Waitlist";
            $completion_status = null;

            // connect to database
            $connMgr = new ConnectionManager();
            $conn = $connMgr->connect();
            
            // prepare insert
            $sql = "INSERT INTO registration VALUES (:reg_id, :course_id, :staff_id, :reg_status, :completion_status)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":reg_id", $reg_id, PDO::PARAM_STR);
            $stmt->bindParam(":course_id", $course_id, PDO::PARAM_STR);
            $stmt->bindParam(":staff_id", $staff_id, PDO::PARAM_STR);
            $stmt->bindParam(":reg_status", $reg_status, PDO::PARAM_STR);
            $stmt->bindParam(":completion_status", $completion_status, PDO::PARAM_STR);
            
            $result = $stmt->execute();
                    
            // close connections
            $stmt = null;
            $conn = null;        
            
            return $result;
        }

    }

?>
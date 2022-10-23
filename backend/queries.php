<?php
    require_once "ConnectionManager.php";
    require_once "CourseDAO.php";
    require_once "common.php";
    require_once "SkillCourseDAO.php";

    class Queries{

        function getCourseBySkillId($skill_id){
            // Establish connection
            $connMgr = new ConnectionManager();
            $conn = $connMgr->connect();
    
            // SQL query
            $course_status = "Active";
            $sql = 'SELECT table1.skill_id, table2.course_id, table2.course_name, table2.course_desc, table2.course_status, table2.course_type, table2.course_category FROM 
            (SELECT * FROM course_skill WHERE skill_id = :skill_id) AS table1,
            (SELECT * FROM course WHERE course_status = :course_status) AS table2
            WHERE table1.course_id = table2.course_id';
            $stmt = $conn->prepare($sql);
    
            // Execeute query
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->bindParam(":skill_id", $skill_id, PDO::PARAM_STR);
            $stmt->bindParam(":course_status", $course_status, PDO::PARAM_STR);
    
            // Display
            $result = [];
            if($stmt->execute()){
                while ($row = $stmt->fetch()){
                    $result[] = $row;
                }
            }
            else{
                $result[] = "Error with query";
            }
            
    
            // Close connection
            $stmt = null;
            $pdo = null;
    
            return $result;
    
        }

        function getSkillsByJobId($job_id){
            // Establish connection
            $connMgr = new ConnectionManager();
            $conn = $connMgr->connect();
    
            // SQL query
            $course_status = "Active";
            $sql = 'SELECT table2.job_id, table2.job_name, table2.skill_id FROM
            (SELECT * from job ) AS table1,
            (SELECT * from job_skill WHERE job_id = :job_id) AS table2
            WHERE table1.job_id = table2.job_id;';
            $stmt = $conn->prepare($sql);
    
            // Execeute query
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->bindParam(":job_id", $job_id, PDO::PARAM_STR);
    
            // Display
            $result = [];
            if($stmt->execute()){
                while ($row = $stmt->fetch()){
                    $result[] = $row;
                }
            }
            else{
                $result[] = "Error with query";
            }
            
    
            // Close connection
            $stmt = null;
            $pdo = null;
    
            return $result;
        }
    }

    

?>
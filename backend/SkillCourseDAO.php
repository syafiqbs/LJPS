<?php

require_once "SkillCourse.php";
require_once "ConnectionManager.php";

class SkillCourseDAO{
    
    function create($skillCourse) {
        $result = true;

        // connect to database
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();
        
        // prepare insert
        $sql = "INSERT INTO course_skill (course_id, skill_id) VALUES (:course_id, :skill_id)";
        $stmt = $conn->prepare($sql);
        $course_id = $skillCourse->getCourseId();
        $skill_id = $skillCourse->getSkillId();
        $stmt->bindParam(":course_id", $course_id, PDO::PARAM_STR);
        $stmt->bindParam(":skill_id", $skill_id, PDO::PARAM_STR);
        

        $result = $stmt->execute();
        if (! $result ){ // encountered error
            $result = "Error adding skill to course";
        }
        
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
        $sql = 'SELECT * FROM course_skill ORDER BY course_id ASC';
        $stmt = $conn->prepare($sql);

        // Execeute query
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        // Display
        $result = [];
        while ($row = $stmt->fetch()){
            $result[] = new SkillCourse($row['course_id'], $row['skill_id']);
        }

        // Close connection
        $stmt = null;
        $pdo = null;

        return $result;

    }

    public function checkCourseId($courseid){
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();

        // SQL query
        $sql = 'SELECT course_id FROM course_skill WHERE course_id = :courseid';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":courseid", $courseid, PDO::PARAM_STR);

        // Execeute query
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        // Display
        $result = null;
        if($stmt->execute()){

            if($row=$stmt->fetch()){
                $result = $row['course_id'];
            }
        }

        $stmt = null;
        $conn = null;
        
        return $result;
    }
    
}
?>
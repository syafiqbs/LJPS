<?php

require_once "SkillCourse.php";
require_once "ConnectionManager.php";
require_once "Skill.php";

class SkillDAO{
    
    function create($skill) {
        $result = false;

        // connect to database
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();
        
        // prepare insert
        $sql = "INSERT INTO skill (skill_id, skill_name) VALUES (:skill_id, :skill_name)";
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

    public function loadAll(){
        // Establish connection
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();

        // SQL query
        $sql = 'SELECT * FROM skill ORDER BY skill_id ASC';
        $stmt = $conn->prepare($sql);

        // Execeute query
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        // Display
        $result = [];
        while ($row = $stmt->fetch()){
            $result[] = new Skill($row['skill_id'], $row['skill_name']);
        }

        // Close connection
        $stmt = null;
        $pdo = null;

        return $result;

    }

    public function checkSkillId($skillid){
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();

        // SQL query
        $sql = 'SELECT skill_id FROM skill WHERE skill_id = :skillid';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":skillid", $skillid, PDO::PARAM_STR);

        // Execeute query
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        // Display
        $result = null;
        if($stmt->execute()){

            if($row=$stmt->fetch()){
                $result = $row['skill_id'];
            }
        }

        $stmt = null;
        $conn = null;
        
        return $result;
    }
    
    function delete($skill) {
        $result = false;

        // connect to database
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();
        
        // prepare insert
        $sql = "DELETE from skill WHERE (skill_id = :skill_id) AND (skill_name = :skill_name)";
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

    function edit($skill, $newSkill_name) {
        $result = false;

        // connect to database
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();

        // prepare update
        $sql = "UPDATE skill SET skill_name = :newSkill_name WHERE skill_id = :skill_id";
        $stmt = $conn->prepare($sql);
        $skill_id = $skill->getSkillId();
        $stmt->bindParam(":skill_id", $skill_id, PDO::PARAM_STR);
        $stmt->bindParam(":newSkill_name", $newSkill_name, PDO::PARAM_STR);

        $result = $stmt->execute();

        // close connections
        $stmt = null;
        $conn = null;

        return $result;
    }

    function getNameById($skill_id){
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();

        // SQL query
        $sql = 'SELECT skill_name FROM skill WHERE skill_id = :skillid';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":skillid", $skill_id, PDO::PARAM_STR);

        // Execeute query
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        // Display
        $result = null;
        if($stmt->execute()){

            if($row=$stmt->fetch()){
                $result = $row['skill_name'];
            }
        }

        $stmt = null;
        $conn = null;
        
        return $result;
    }

}


?>
<?php

require_once "Staff.php";
require_once "ConnectionManager.php";

class StaffDAO{

    function getUser($email, $staff_id){
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();

        // SQL query
        $sql = 'SELECT * FROM staff WHERE email = :email AND staff_id = :staff_id';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->bindParam(":staff_id", $staff_id, PDO::PARAM_STR);

        // Execeute query
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        // Display
        $result = null;
        if($stmt->execute()){

            if($row=$stmt->fetch()){
                $result = new Staff($row['staff_id'], $row['staff_name'], $row['dept'], $row['email'], $row['role']);
            }
        }

        $stmt = null;
        $conn = null;
        
        return $result;
    }
}

?>
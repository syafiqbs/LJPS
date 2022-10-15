<?php

    class StaffDAO{
        public function getStaff($email, $staff_name){

            $connMgr = new ConnectionManager();
            $conn = $connMgr->connect();

            $sql = 'SELECT * from staff WHERE email = :email and staff_name = :staff_name';
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            $stmt->bindParam(":staff_name", $staff_name, PDO::PARAM_STR);

            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);

            $result = null;
            if($row = $stmt->fetch()) {
                $result = new Staff($row['staff_id'], $row['staff_name'], $row['dept'], $row['email'], $row['role']);
            }

            return $result;
        }
    }

?>
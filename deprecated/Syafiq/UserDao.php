<?php

class UserDAO{
    
    public function loadAll(){
        // Establish connection
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();

        // SQL query
        $sql = 'SELECT * FROM user';
        $stmt = $conn->prepare($sql);

        // Execeute query
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        // Display
        $result = [];
        while ($row = $stmt->fetch()){
            $result[] = new User($row['user_id'], $row['user_name'], $row['control']);
        }

        // Close connection
        $stmt = null;
        $pdo = null;

        return $result;

    }
    
}
?>
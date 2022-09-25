<?php

class RoleDAO{
    
    public function loadAll(){
        // Establish connection
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();

        // SQL query
        $sql = 'SELECT * FROM role';
        $stmt = $conn->prepare($sql);

        // Execeute query
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        // Display
        $result = [];
        while ($row = $stmt->fetch()){
            $result[] = new Role($row['role_id'], $row['role_name']);
        }

        // Close connection
        $stmt = null;
        $pdo = null;

        return $result;

    }
    
}
?>
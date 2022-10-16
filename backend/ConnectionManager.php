<?php

class ConnectionManager {

    public function connect() {
        $servername = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'ljps';
        
        // Create connection
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);     
        // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // if fail, exception will be thrown
        // Return connection object
        return $conn;
    }

    function handleError($obj, $sql = null, $parameters = null) {
        $details = [
            "errno" => $obj->errorCode(),
            "errstr" => $obj->errorInfo(),

        ];
        if (! is_null($sql) ) {
            $details["sql"] = $sql;
        }
        if (! is_null($parameters) ) {
            $details["parameters"] = $parameters;
        }
        
        Logger::log( "Database Error", $details );
    }    

}
?>
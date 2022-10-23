<?php

    require_once "ConnectionManager.php";
    require_once "Course.php";


    class CourseDAO{
        function loadAll(){
            $connMgr = new ConnectionManager();
            $conn = $connMgr->connect();

            // SQL query
            $sql = 'SELECT * FROM course';
            $stmt = $conn->prepare($sql);

            // Execeute query
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);

            // Display
            $result = [];
            while ($row = $stmt->fetch()){
                $result[] = new Course($row['course_id'], $row['course_name'], $row['course_desc'], $row['course_status'], $row['course_type'], $row['course_category']);
            }

            // Close connection
            $stmt = null;
            $pdo = null;

            return $result;
        }

        function userLJ($course_id){
            $connMgr = new ConnectionManager();
            $conn = $connMgr->connect();

            // SQL query
            $course_status = "Active";
            $sql = 'SELECT * FROM course WHERE course_status LIKE :course_status';
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":course_status", $course_status, PDO::PARAM_STR);

            // Execeute query
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);

            // Display
            $result = [];
            while ($row = $stmt->fetch()){
                $result[] = new Course($row['course_id'], $row['course_name'], $row['course_desc'], $row['course_status'], $row['course_type'], $row['course_category']);
            }

            // Close connection
            $stmt = null;
            $pdo = null;

            return $result;
        }
    }
?>
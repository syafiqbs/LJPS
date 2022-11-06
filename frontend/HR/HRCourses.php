<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap 5 Website Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

  <?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'ljps';

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT course_id, course_name, course_desc, course_status, course_type, course_category FROM course";
    $result = $conn->query($sql);
    ?>

<?php 
  require_once "../../backend/createElements.php";
  $username = $_SESSION['namename'];
  $role = $_SESSION['role'];
  create_header();
  create_navbar_HR($role,$username)
  ?>
      
    <div class="container mt-5">
        <h1>COURSES</h1>    
        <table class="table table-bordered">
        <thead>
          <th>course id</th>
          <th>course name</th>
          <th>course description</th>
          <th>course status</th>
          <th>course type</th>
          <th>course category</th>
        </thead>

        <tbody>
          <?php
            while ($row = $result->fetch_assoc()) {
              echo "<tr>" .
                      "<td>" . $row['course_id'] . "</td>" .
                      "<td>" . $row['course_name'] . "</td>" .
                      "<td>" . $row['course_desc'] . "</td>" .
                      "<td>" . $row['course_status'] . "</td>" .
                      "<td>" . $row['course_type'] . "</td>" .
                      "<td>" . $row['course_category'] . "</td>" .
                      "</tr>";
            }
          ?>
        </tbody>
        
      </table>         
    </div>


    <?php create_footer(); ?>


</body>
</html>
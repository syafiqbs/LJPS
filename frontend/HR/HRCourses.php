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


    <div class="p-5 bg-primary text-white text-center">
        <h1>Learning Journey System</h1>
    </div>
      
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
      <div class="container-fluid">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="../homepage.php">My Learning Journey</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="HR.html">HR</a>
          </li>
        </ul>
        <span class="navbar-text">
          <a class="nav-link" href="../index.html">Logout</a>
        </span>
      </div>
    </nav>
      
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


      
    <div class="mt-5 p-4 bg-dark text-white text-center">
        <p>Footer</p>
    </div>

</body>
</html>
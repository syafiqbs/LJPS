<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap 5 Website Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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

      $sql = "SELECT job_role_id, job_name, skill_id FROM job_skill";
      $result = $conn->query($sql);
    ?>

    <div class="p-5 bg-primary text-white text-center">
        <h1>Learning Journey System</h1>
    </div>
      
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
      <div class="container-fluid">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" href="homepage.html">My Learning Journey</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="HR.html">HR</a>
          </li>
        </ul>
        <span class="navbar-text">
          HR 
        </span>
      </div>
    </nav>

    <div class="container mt-5">
      <H1>ROLES</H1>
      <!-- <input class="form-control" id="RoleInput" type="text" placeholder="Search.."> -->
      <table class="table table-bordered">
        <thead>
          <th>job id</th>
          <th>job name</th>
          <th>skill required<th>
        </thead>

        <tbody>
          <?php
            while ($row = $result->fetch_assoc()) {
              echo "<tr>" .
                      "<td>" . $row['job_role_id'] . "</td>" .
                      "<td>" . $row['job_name'] . "</td>" .
                      "<td>" . $row['skill_id'] . "</td>" .
                      "</tr>";
            }
          ?>
        </tbody>
        
      </table>  
  </div>
    
  <div class="mt-5 p-4 bg-dark text-white text-center">
      <p>Footer</p>
  </div>
  
  <!-- <script>
      $(document).ready(function(){
        $("#RoleInput").on("keyup", function() {
          var value = $(this).val().toLowerCase();
          $("#RoleTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
          });
        });
      });
  </script> -->
</body>
</html>
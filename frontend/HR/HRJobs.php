<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>LJPS</title>
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

      $sql = "SELECT job_id, job_name, job_description FROM job";
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
      <H1>Jobs</H1>
      <!-- <input class="form-control" id="JobInput" type="text" placeholder="Search.."> -->
      <table class="table table-bordered">
        <thead>
          <th>job id</th>
          <th>job name</th>
          <th>job description</th>
        </thead>

        <tbody>
          <?php
            while ($row = $result->fetch_assoc()) {
              echo "<tr>" .
                      "<td>" . $row['job_id'] . "</td>" .
                      "<td>" . $row['job_name'] . "</td>" .
                      "<td>" . $row['job_description'] . "</td>" .
                      "</tr>";
            }
          ?>
        </tbody>
        
      </table>  
      <a class="btn btn-primary" href="CRUDjobs.php" role="button">CRUD jobs</a>
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
  <?php create_footer(); ?>

</body>
</html>
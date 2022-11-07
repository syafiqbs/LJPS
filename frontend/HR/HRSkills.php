<?php session_start(); ?>
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

      $sql = "SELECT skill_id, skill_name FROM skill";
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
        <H1>SKILLS</H1>
        <!-- <input class="form-control" id="myInput" type="text" placeholder="Search.."> -->
        <table class="table table-bordered">
        <thead>
          <th>skill id</th>
          <th>skill name</th>
        </thead>

        <tbody>
          <?php
            while ($row = $result->fetch_assoc()) {
              echo "<tr>" .
                      "<td>" . $row['skill_id'] . "</td>" .
                      "<td>" . $row['skill_name'] . "</td>" .
                      "</tr>";
            }
          ?>
        </tbody>
        
      </table>
      <a class="btn btn-primary" href="CRUDskills.php" role="button">CRUD skills</a>
    </div>

      
<!--     <script>
        $(document).ready(function(){
          $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
          });
        });
    </script> -->
    <?php create_footer(); ?>

</body>
</html>
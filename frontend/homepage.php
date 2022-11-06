<?php 
session_start(); 
require_once "../backend/createElements.php";
?>
<!-- TO BE CONVERTED TO PHP -->
<!-- Displays user name whatever in header -->
<!-- Shows Learning Journey if exists for user -->
<!-- else will be blank -->
<!-- start/resume buttons should post user type to roles page to filter -->
<!-- still need resume button? -->
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
  // perform SQL query here to get user info row
  $servername = 'localhost';
  $username = 'root';
  $password = '';
  $dbname = 'ljps';

  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  if (isset($_SESSION['username'])){
    $username = $_SESSION['username'];
  }
  else{
    $username = $_POST['username'];
  }    

  $sql = "SELECT * FROM staff WHERE email = '$username'";
  $result = $conn->query($sql);
  $len = $result->num_rows;
  if ($len > 0) {
    while ($row = $result->fetch_assoc()) {
      $_SESSION['username'] = $username;
      $_SESSION['namename'] = $row['staff_name'];
      $_SESSION['staff_id'] = $row['staff_id'];

      $namename = $row['staff_name'];
      $role = $row['role'];
      if ($role == '1') {
        $role = 'Admin';
      }
      if ($role == '2') {
        $role = 'User';
      }
      if ($role == '3') {
        $role = 'Manager';
      }
      if ($role == '4') {
        $role = 'Trainer';
      }
      $_SESSION['role'] = $role;
      $staff_id = $row['staff_id'];
    }
  } else {
    // super simple validation, if user doesnt exist will redirect to index
    header('Location: ./index.html');
  }

  ?>

  <?php 
  create_header();
  create_navbar($role,$namename)
  ?>

  <div class="container mt-5">
    <div class="row">
      <div class="col-sm-6">
        <?php
            $sql = "SELECT 
              learningjourney.course_id, 
              learningjourney.learningjourney_name, 
              learningjourney.learningjourney_main, 
              learningjourney.learningjourney_description, 
              registration.reg_status, 
              registration.completion_status, 
              learningjourney.job_id,
              learningjourney.skill_id
            FROM learningjourney 
            INNER JOIN registration
            WHERE learningjourney.staff_id = '$staff_id'  
            AND learningjourney.learningjourney_main = 'yes'
            AND registration.course_id = learningjourney.course_id
            AND registration.staff_id = learningjourney.staff_id
            ";
            $result = $conn->query($sql);
            $len = $result->num_rows;
            if ($len > 0) {
              $counter = 1;
              while ($row = $result->fetch_assoc()) {
              $learningjourney_name = $row['learningjourney_name'];
              if ($counter == 1){
                echo '<h2>My Learning Journey</h2>
                <h5>Current Job Goal: '.$learningjourney_name.'</h5>
                <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Courses</th>
                    <th scope="col">Registration?</th>
                    <th scope="col">Completed?</th>
                    <th scope="col">Remove</th>
                  </tr>
                </thead>';
              }
                echo '<tr>
                <td scope="col">'.$counter.'</td>
                <td scope="col">'.$row['course_id'].'</td>
                <td scope="col">'.$row['reg_status'].'</td>
                <td scope="col">'.$row['completion_status'].'</td>
                <form action="../frontend/homepage.php" method="post">
                <input type="hidden" id="staff_id" name="staff_id" value='. $staff_id .'>
                <input type="hidden" id="job_id" name="job_id" value='. $row["job_id"] .'>
                <input type="hidden" id="learningjourney_name" name="learningjourney_name" value='. $row["learningjourney_name"] .'>
                <input type="hidden" id="learningjourney_main" name="learningjourney_main" value='. $row["learningjourney_main"] .'>
                <input type="hidden" id="learningjourney_description" name="learningjourney_description" value='. $row["learningjourney_description"] .'>
                <input type="hidden" id="skill_id" name="skill_id" value='. $row["skill_id"] .'>
                <input type="hidden" id="course_id" name="course_id" value='. $row["course_id"] .'>
                <td scope="col"><button type="submit" class="btn btn-danger">Delete</button></td>
                </form>
              </tr>';
              // ^ implement delete function for delete learning journey row 
              $counter += 1;
              }
              echo '<tbody>';
            }
            else{ echo '<h2>You do not have a Learning Journey yet</h2>';
            }
        ?>
        </tbody>
        </table>

        <hr class="d-sm-none">
      </div>
      <div class="col-sm-6">
        <h2>Start New Learning Journey</h2>
        <h5>Click to Start a New Learning Journey</h5>
        <a href="Roles.php" class="btn btn-primary" role="button" method="post">START</a>
        <br></br>
        <br></br>
        <br></br>
        <h2>Resume Other Learning Journey</h2>
        <h5>Click to Resume another Learning Journey</h5>
        <a href="ResumeRoles.php" class="btn btn-primary" role="button">RESUME</a>
      </div>
    </div>
  </div>

  <?php create_footer(); ?>
</body>

</html>
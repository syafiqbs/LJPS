<?php session_start(); ?>
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

  $username = $_POST['username'];

  $sql = "SELECT * FROM staff WHERE email = '$username'";
  $result = $conn->query($sql);
  $len = $result->num_rows;
  if ($len > 0) {
    while ($row = $result->fetch_assoc()) {
      $_SESSION['username'] = $username;
      $_SESSION['namename'] = $row['staff_name'];
      $namename = $row['staff_name'];
      $role = $row['role'];
      if ($role = '1'){
        $role = 'HR';
      }
      if ($role = '2'){
        $role = 'HR';
      }
      if ($role = '3'){
        $role = 'HR';
      }
      if ($role = '4'){
        $role = 'HR';
      }
      $_SESSION['role'] = $role;
    }
  }
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
          <?php echo "<a class='nav-link' href='$role.html'>$role</a> " ?>
        </li>
      </ul>
      <span class="navbar-text">
          <?php echo "<a class='nav-link'>$namename</a> " ?>
      </span>
      <span class="navbar-text">
        <a class="nav-link" href="index.html">Logout</a>
      </span>
    </div>
  </nav>

  <div class="container mt-5">
    <h1>Change Table to soft-coded</h1>
    <h1>Might need additional table to map between staff and LJs</h1>
    <div class="row">
      <div class="col-sm-6">
        <h2>My Learning Journey</h2>
        <h5>Current Goal: Coding Manager</h5>
        <div class="row">
          <div class="col-4">
            <h5>Progress: 36%</h5>
          </div>
          <div class="col-6">
            <a href="Skills.php" class="btn btn-primary" role="button">Continue</a>
          </div>
        </div>
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Courses</th>
              <th scope="col">Skills</th>
              <th scope="col">Completed?</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>IS111 - Intro to Programming</td>
              <td>Python</td>
              <td>Yes</td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>IS216 - Web App</td>
              <td>HTML, Javascript, CSS</td>
              <td>Yes</td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td>IS1702 - Computational Thinking</td>
              <td>Computational Thinking</td>
              <td>No</td>
            </tr>
            <tr>
              <th scope="row">4</th>
              <td>IS217 - Analytics Foundation</td>
              <td>Tableu, Python - Pandas, Python - Seaborn, Python - Numpy</td>
              <td>No</td>
            </tr>
            <tr>
              <th scope="row">5</th>
              <td>COR1305 - Spreadsheet Modelling and Analytics</td>
              <td>Excel</td>
              <td>No</td>
            </tr>
            <tr>
              <th scope="row">6</th>
              <td>COR3301 - Ethics and Social Responsibility</td>
              <td>Ethics</td>
              <td>No</td>
            </tr>
          </tbody>
        </table>

        <hr class="d-sm-none">
      </div>
      <div class="col-sm-6">
        <h2>Start New Learning Journey</h2>
        <h5>Click to Start a New Learning Journey</h5>
        <form action="homepage.html" method="post">
          <a href="Roles.php" class="btn btn-primary" role="button" method="post">START</a>
        </form>
        <br></br>
        <br></br>
        <br></br>
        <h2>Resume Other Learning Journey</h2>
        <h5>Click to Resume another Learning Journey</h5>
        <a href="Roles.php" class="btn btn-primary" role="button">RESUME</a>
      </div>
    </div>
  </div>

  <div class="mt-5 p-4 bg-dark text-white text-center">
    <p>Footer</p>
  </div>

</body>

</html>
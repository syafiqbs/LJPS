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
      require_once "../backend/common.php";
      $tmp_jobid = '';
      $tmp_jobname = '';
      $tmp_jobdescription = '';
      if (isset($_SESSION['errors'])){
        $tmp_jobid = $_SESSION['deletejob_jobid'];
        $tmp_jobname = $_SESSION['deletejob_jobname'];
        $tmp_jobdescription = $_SESSION['deletejob_jobdescription'];
        unset($_SESSION['deletejob_jobid']);
        unset($_SESSION['deletejob_jobname']);
        unset($_SESSION['deletejob_jobdescription']);
      }
?>


<div class="p-5 bg-primary text-white text-center">
        <h1>Learning Journey System</h1>
</div>
      
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
      <div class="container-fluid">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="homepage.html">My Learning Journey</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="HR.html">HR</a>
          </li>
        </ul>
        <span class="navbar-text">
          HR 
        </span>
      </div>
    </nav>

    <div class="container mt-5">    
        <div class="row">
            <div class="col-1"></div>
            <div class="col-6 offset-md-3">
                <h1>Delete Existing Job</h1><br>
                <?php printErrors(); /*defined in common.php*/ ?>
                <form action="handleDeleteRole.php" method="post">
                    <label for="jobid">Job ID:</label><br>
                    <input type="number" id="jobid" name="jobid" value='<?= $tmp_jobid?>'>
                    <br><br>
                    <label for="jobname">Job Name:</label><br>
                    <input type="text" id="jobname" name="jobname" value='<?= $tmp_jobname?>'>
                    <br><br>
                    <label for="jobdescription">Job Description:</label><br>
                    <input type="text" id="jobdescription" name="jobdescription" value='<?= $tmp_jobdescription?>'>
                    <br><br>
                    <button class="btn btn-primary" type="submit">Submit</button>
                </form>
            </div>
            <div class="col-1"></div>
        </div>

    </div>



</body>
</html>
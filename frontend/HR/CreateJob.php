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
      require_once "../../backend/common.php";
      $tmp_jobid = '';
      $tmp_jobname = '';
      $tmp_jobdescription = '';
      if (isset($_SESSION['errors'])){
        $tmp_jobid = $_SESSION['createjob_jobid'];
        $tmp_jobname = $_SESSION['createjob_jobname'];
        $tmp_jobdescription = $_SESSION['createjob_jobdescription'];
        unset($_SESSION['createjob_jobid']);
        unset($_SESSION['createjob_jobname']);
        unset($_SESSION['createjob_jobdescription']);
      }
?>


<?php 
  require_once "../../backend/createElements.php";
  $username = $_SESSION['namename'];
  $role = $_SESSION['role'];
  create_header();
  create_navbar_HR($role,$username)
  ?>

    <div class="container mt-5">    
        <div class="row">
            <div class="col-1"></div>
            <div class="col-6 offset-md-3">
                <h1>Create New Job</h1><br>
                <?php printErrors(); /*defined in common.php*/ ?>
                <form action="../../backend/handleCreateJob.php" method="post">
                    <label for="jobid">New Job ID:</label><br>
                    <input type="number" id="jobid" name="jobid" value='<?= $tmp_jobid?>'>
                    <br><br>
                    <label for="jobname">New Job Name:</label><br>
                    <input type="text" id="jobname" name="jobname" value='<?= $tmp_jobname?>'>
                    <br><br>
                    <label for="jobdescription">New Job Description:</label><br>
                    <input type="text" id="jobdescription" name="jobdescription" value='<?= $tmp_jobdescription?>'>
                    <br><br>
                    <button class="btn btn-primary" type="submit">Submit</button>
                </form>
            </div>
            <div class="col-1"></div>
        </div>

    </div>

    <?php create_footer(); ?>
</body>
</html>
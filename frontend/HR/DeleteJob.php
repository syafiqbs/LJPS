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
      require_once "../../backend/common.php";
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
                <h1>Delete Existing Job</h1><br>
                <?php printErrors(); /*defined in common.php*/ ?>
                <form action="../../backend/handleDeleteJob.php" method="post">
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


    <?php create_footer(); ?>

</body>
</html>
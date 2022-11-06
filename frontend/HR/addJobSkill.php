<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap 5 Website Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
  <?php 
    require_once "../../backend/common.php";
    $tmp_jobid = '';
    $tmp_skillid = '';
    if (isset($_SESSION['errors'])){
      $tmp_jobid = $_SESSION['addJobSkillFail_jobid'];
      $tmp_skillid = $_SESSION['addJobSkillFail_skillid'];
      unset($_SESSION['addJobSkillFail_jobid']);
      unset($_SESSION['addJobSkillFail_skillid']);
    }
  ?>
</head>

<body>

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
                <h1>Add skill to job</h1><br>
                <?php printErrors(); /*defined in common.php*/ ?>
                <form action="../../backend/handleAddJobSkill.php" method="post">
                    <label for="jobid">Job id:</label><br>
                    <input type="numeric" id="jobid" name="jobid" value='<?= $tmp_jobid?>'>
                    <br><br>
                    <label for="skillid">Add skill:</label><br>
                    <input type="number" id="skillid" name="skillid" value='<?= $tmp_skillid?>'>
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
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
      $tmp_skillid = '';
      $tmp_skillname = '';
      if (isset($_SESSION['errors'])){
        $tmp_skillid = $_SESSION['deleteskill_skillid'];
        $tmp_skillname = $_SESSION['deleteskill_skillname'];
        unset($_SESSION['deleteskill_skillid']);
        unset($_SESSION['deleteskill_skillname']);
      }
?>

<?php 
  require_once "../../backend/createElements.php";
  $username = $_SESSION['namename'];
  $role = $_SESSION['role'];
  create_header();
  create_navbar($role,$username)
  ?>


    <div class="container mt-5">    
        <div class="row">
            <div class="col-1"></div>
            <div class="col-6 offset-md-3">
                <h1>Delete Existing Skill</h1><br>
                <?php printErrors(); /*defined in common.php*/ ?>
                <form action="handleDeleteSkill.php" method="post">
                    <label for="skillid">Skill ID:</label><br>
                    <input type="number" id="skillid" name="skillid" value='<?= $tmp_skillid?>'>
                    <br><br>
                    <label for="skillname">Skill Name:</label><br>
                    <input type="text" id="skillname" name="skillname" value='<?= $tmp_skillname?>'>
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
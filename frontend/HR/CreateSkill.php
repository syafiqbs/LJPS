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
        $tmp_skillid = $_SESSION['createskill_skillid'];
        $tmp_skillname = $_SESSION['createskill_skillname'];
        unset($_SESSION['createskill_skillid']);
        unset($_SESSION['createskill_skillname']);
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
                <h1>Create New Skill</h1><br>
                <?php printErrors(); /*defined in common.php*/ ?>
                <form action="handleCreateSkill.php" method="post">
                    <label for="skillid">New Skill ID:</label><br>
                    <input type="number" id="skillid" name="skillid" value='<?= $tmp_skillid?>'>
                    <br><br>
                    <label for="skillname">New Skill Name:</label><br>
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
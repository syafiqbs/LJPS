<!DOCTYPE html>
<html lang="en">
<head>
  <title>LJPS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
  <?php 
    require_once "../../backend/common.php";
    $tmp_courseid = '';
    $tmp_skillid = '';
    if (isset($_SESSION['errors'])){
      $tmp_courseid = $_SESSION['addSkillCourseFail_courseid'];
      $tmp_skillid = $_SESSION['addSkillCourseFail_skillid'];
      unset($_SESSION['addSkillCourseFail_courseid']);
      unset($_SESSION['addSkillCourseFail_skillid']);
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
                <h1>Add skill to course</h1><br>
                <?php printErrors(); /*defined in common.php*/ ?>
                <form action="../../backend/handleAddSkillCourse.php" method="post">
                    <label for="courseid">Add to course id:</label><br>
                    <input type="text" id="courseid" name="courseid" value='<?= $tmp_courseid?>'>
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
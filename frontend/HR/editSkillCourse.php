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
    $course_id = '';
    $skill_id = '';
    if (isset($_SESSION['errors'])){
      $course_id = $_SESSION['editSkillCourseFail_courseid'];
      $skill_id = $_SESSION['editSkillCourseFail_skillid'];
      unset($_SESSION['editSkillCourseFail_courseid']);
      unset($_SESSION['editSkillCourseFail_skillid']);
    }
  ?>
</head>

<body>

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
                <h1>Edit skill to course</h1><br>
                <?php 
                    printErrors();
                    if (isset($_POST['editSkillCourse'])){
                        $data = explode(":", $_POST["editSkillCourse"]);
                        $course_id = $data[0];
                        $skill_id = $data[1];
                    }
                ?>
                <form action="../../backend/handleEditSkillCourse.php" method="post">
                    <label for="courseid">Course id:</label><br>
                    <input type="text" id="courseid" name="courseid" value='<?= $course_id?>' readonly="readonly">
                    <br><br>
                    <label for="skillid">Edit skill id:</label><br>
                    <input type="number" id="skillid" name="skillid" value='<?= $skill_id?>'>
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
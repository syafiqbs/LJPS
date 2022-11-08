<?php
  require_once "../../backend/SkillCourseDAO.php";
  require_once "../../backend/common.php";
?>

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
      $skillCourseDAO = new SkillCourseDAO();
      $skillsCourses = $skillCourseDAO->loadAll();
    ?>

<?php 
  require_once "../../backend/createElements.php";
  $username = $_SESSION['namename'];
  $role = $_SESSION['role'];
  create_header();
  create_navbar_HR($role,$username)
  ?>

    <div class="container mt-5">
      <H1>Course and the skills required</H1>
      <?php 
        addSuccess(); 
        deleteSuccess();
      ?>
      <!-- <input class="form-control" id="RoleInput" type="text" placeholder="Search.."> -->
      <table class="table table-bordered">
        <thead>
          <th>Index</th>
          <th>Course ID</th>
          <th>Skill required</th>
          <th>Action</th>
        </thead>

        <tbody>
          <?php
            $index = 1;
            foreach($skillsCourses as $skillCourse){
              $course_id = $skillCourse->getCourseId();
              $skill_id = $skillCourse->getSkillId();
              $id = strval($course_id) . ":" . strval($skill_id);
              echo "<tr>
                <td>$index</td>
                <td>$course_id</td>
                <td>$skill_id</td>
                <td>
                  <form action='../../backend/handleDeleteSkillCourse.php' method='POST' class='d-inline'>
                                                        <button type='submit' name='deleteSkillCourse' value=${id} class='btn btn-danger btn-sm'>Delete</button>
                                                    </form>
                </td>
              </tr>";
              $index = $index + 1;
            }
          ?>
        </tbody>
      </table>
      <a class="btn btn-primary" href="addSkillCourse.php" role="button">Add</a>  
  </div>
    
  
  <!-- <script>
      $(document).ready(function(){
        $("#RoleInput").on("keyup", function() {
          var value = $(this).val().toLowerCase();
          $("#RoleTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
          });
        });
      });
  </script> -->
  <?php create_footer(); ?>

</body>
</html>
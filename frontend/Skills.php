<?php
  require_once "../backend/Skill.php";
  require_once "../backend/common.php";
  require_once "../backend/createElements.php";
?>

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
      $skillDAO = new SkillDAO();
      $skills = $skillDAO->loadAll();
    ?>

<?php 
  $username = $_SESSION['namename'];
  $role = $_SESSION['role'];
  create_header();
  create_navbar($role,$username);

  $job_id = $_POST["job_id"];
  $queriesDAO = new Queries();
  $results_array = $queriesDAO->getSkillsByJobId($job_id);

  if (isset($_POST['inputCourseIdToLJ'])){
    var_dump($_POST['inputCourseIdToLJ']);
    if (empty($_SESSION['ongoingNewLJ'])){
      $temp = [];
      $temp[] = $_POST['skill_id'];
      $_SESSION['ongoingNewLJ'] = $temp;
    }
    if (empty($_SESSION['ongoingNewLJCourses'])){
      $temp = [];
      $temp[] = $_POST['inputCourseIdToLJ'];
      $_SESSION['ongoingNewLJCourses'] = $temp;
    }
    else{
      if (!in_array($_POST['skill_id'], $_SESSION['ongoingNewLJ'])){
        $fetchPastInputs = $_SESSION['ongoingNewLJ'];
        $fetchPastInputs[] = $_POST['skill_id'];
        $_SESSION['ongoingNewLJ'] = $fetchPastInputs;

        $temp = $_SESSION['ongoingNewLJCourses'];
        $temp[] = $_POST['inputCourseIdToLJ'];
        $_SESSION['ongoingNewLJCourses'] = $temp;

        $fetchPastInputs2 = $_SESSION['ongoingNewLJCourse'];
        $fetchPastInputs2[] = $_POST['course_id'];
        $_SESSION['ongoingNewLJCourse'] = $fetchPastInputs2;
      }
    }
  }

  ?>

    <div class="container mt-5">
      <H1>Skills</H1>
      <?php 
        if (!empty($_SESSION['ongoingNewLJ'])){
          echo "Current learning journey: \n <ul>";
          foreach(range(0,sizeof($_SESSION['ongoingNewLJ'])-1) as $i){
            $skill = $_SESSION['ongoingNewLJ'][$i];
            $course = $_SESSION['ongoingNewLJCourse'][$i];
            $index = array_search($skill, $_SESSION['ongoingNewLJ']);
            var_dump($_SESSION['ongoingNewLJCourses'][$index]);
            // echo "<li> $skill matched with course: " + $_SESSION['ongoingNewLJCourses'][$index] + "</li>";
            echo "<li> $skill skill id from taking course $course</li>";
          }
          echo "</ul>";
        }
      ?>
      <!-- <input class="form-control" id="RoleInput" type="text" placeholder="Search.."> -->
      <table class="table table-bordered">
        <thead>
          <th>Job ID</th>
          <th>Job Name</th>
          <th>Skill Required</th>
        </thead>

        <tbody>
          <?php
          $num_lines = 0;
            foreach($results_array as $res){
              $job_id = $res['job_id'];
              $job_name = $res['job_name'];
              $skill_id = $res['skill_id'];              
              if (!empty($_SESSION['ongoingNewLJ']) && in_array($skill_id, $_SESSION['ongoingNewLJ'])){{
                continue;
              }
              }
              echo "<tr>
                <td>$job_id</td>
                <td>$job_name</td>
                <td>$skill_id</td>
                <td>
                    <form action='./LJCourse.php' method='POST' class='d-inline'>
                      <input type='hidden' id='job_id' name='job_id' value=${job_id}>
                        <button type='submit' name='chooseSkill' value=${skill_id} class='btn btn-primary btn-sm'>Choose</button>
                    </form>
                </td>
              </tr>";
              $num_lines += 1;
            }
            if ($num_lines == 0){
              echo "all skills have been selected, finalize learning journey here >> ";
              echo "
                <form action='./addToLJ.php' method='POST' class='d-inline'>
                <input type='hidden' id='job_id' name='job_id' value=${job_id}>
                <button type='submit' class='btn btn-primary btn-sm'>Finalize</button>
            </form>";
            };
          ?>
        </tbody>
      </table>
      <?php 
      if (!empty($_SESSION['ongoingNewLJCourse'])){
        $skills = implode(",", $_SESSION['ongoingNewLJ']);
        $courses = implode(",", $_SESSION['ongoingNewLJCourse']);
        echo "<form action = './addToLJ.php' method = 'POST'>
        <input type = 'hidden' id = 'skills' name = 'skills' value=${skills}>
        <input type = 'hidden' id = 'courses' name = 'courses' value=${courses}>
        <input type = 'hidden' id = 'job' name ='job' value =${job_id}>
        <button type='submit' id = 'finaliseLJ' name='finaliseLJ' class='btn btn-primary btn-sm' value='true'>Finalise Learning Journey</button> 
      </form>";
      }
      ?>
      
      
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
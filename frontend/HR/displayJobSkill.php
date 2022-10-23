<?php
  require_once "../../backend/JobSkillDAO.php";
  require_once "../../backend/common.php";
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
      $jobSkillDAO = new JobSkillDAO();
      $jobsCourses = $jobSkillDAO->loadAll();
    ?>

    <div class="p-5 bg-primary text-white text-center">
        <h1>Learning Journey System</h1>
    </div>
      
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
      <div class="container-fluid">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="../homepage.php">My Learning Journey</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="HR.html">HR</a>
          </li>
        </ul>
        <span class="navbar-text">
          <a class="nav-link" href="../index.html">Logout</a>
        </span>
      </div>
    </nav>

    <div class="container mt-5">
      <H1>Job and the skills required</H1>
      <?php 
        addSuccess(); 
        deleteSuccess();
      ?>
      <!-- <input class="form-control" id="RoleInput" type="text" placeholder="Search.."> -->
      <table class="table table-bordered">
        <thead>
          <th>Job ID</th>
          <th>Job Name</th>
          <th>Skill required</th>
          <th>Action</th>
        </thead>

        <tbody>
          <?php
            $index = 1;
            foreach($jobsCourses as $jobCourse){
              $job_id = $jobCourse->getJobId();
              $job_name = $jobCourse->getJobName();
              $skill_id = $jobCourse->getSkillId();
              $id = strval($job_id) . ":" . strval($skill_id);
              echo "<tr>
                <td>$job_id</td>
                <td>$job_name</td>
                <td>$skill_id</td>
                <td>
                  <form action='../../backend/handleDeleteJobSkill.php' method='POST' class='d-inline'>
                  <button type='submit' name='deleteJobSkill' value=${id} class='btn btn-danger btn-sm'>Delete</button>
                  </form>
                </td>
              </tr>";
              
            }
          ?>
        </tbody>
      </table>
      <a class="btn btn-primary" href="addJobSkill.php" role="button">Add</a>  
  </div>
    
  <div class="mt-5 p-4 bg-dark text-white text-center">
      <p>Footer</p>
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
</body>
</html>
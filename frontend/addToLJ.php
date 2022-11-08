<!-- <form action="../backend/handleAddToLJ.php" method="POST">
  <div class="mb-3">
    <label for="inputLjName" class="form-label">Input Learning Journey Name</label>
    <input type="text" class="form-control" id="inputLjName">
  </div>
  <div class="mb-3">
    <label for="inputLjDesc" class="form-label">Description</label>
    <input type="text" class="form-control" id="inputLjDesc">
  </div>
  <div class="mb-3">
    <textarea id="w3review" name="w3review" rows="4" cols="50" disabled=true>
    
    </textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form> -->

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
    require_once "../backend/common.php";
    require_once "../backend/LJDAO.php";
    require_once "../backend/createElements.php";

    $username = $_SESSION['namename'];
    $role = $_SESSION['role'];
    create_header();
    create_navbar($role,$username);
    

    if (isset($_POST['finaliseLJ']) || $_SESSION['finaliseLJCheck']){
      $_SESSION['finaliseLJCheck'] = true;
      $skills = $_SESSION['ongoingNewLJ'];
      $courses = $_SESSION['ongoingNewLJCourses'];
      $job_id = $_SESSION['job_id'];
    }
    
  ?>
</head>

<body>
    <div class="container mt-5">    
        <div class="row">
            <div class="col-1"></div>
            <div class="col-6 offset-md-3">
                <h1>Your Learning Journey</h1><br>
                <?php printErrors(); ?>
                <form action="../backend/handleAddToLJ.php" method="POST">
                  <div class="mb-3">
                    <label for="inputLJName" class="form-label">Input Name</label>
                    <input type="text" class="form-control" id="inputLJName" name="inputLJName">
                  </div>
                  <div class="mb-3">
                  <label for="inputLJDesc" class="form-label">Description</label>
                    <input type="text" class="form-control" id="inputLJDesc" name="inputLJDesc">
                  </div>
                  <div class="mb-3">
                  <div class="mb-3">
                    <label for="details" class="form-label">Details</label><br>
                    <textarea id="details" name="details" rows="4" cols="50" disabled=true>
                        <?php
                        echo "\nYou are applying for the role: $job_id \n";
                        foreach(range(0, sizeof($skills)-1) as $i){
                          $skill = $skills[$i];
                          $course = $courses[$i];
                          echo "You will learn $skill from taking $course \n";
                        }
                        ?>
                    </textarea>
                    <input type='hidden' name='inputJobId' id='inputJobId' value='<?= $job_id?>'>
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
            <div class="col-1"></div>
        </div>

    </div>


    <?php create_footer(); ?>
</body>
</html>
<?php session_start(); ?>
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
  require_once "../../backend/createElements.php";
  $username = $_SESSION['namename'];
  $role = $_SESSION['role'];
  create_header();
  create_navbar($role,$username)
  ?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Create Skill</h5>
                  <p class="card-text">Create a new skill</p>
                  <a href="CreateSkill.php" class="btn btn-primary">Go</a>
                </div>  
              </div>
            </div>
            <div class="col-md-4">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Update Skill</h5>
                  <p class="card-text">Update an existing skill</p>
                  <a href="UpdateSkill.php" class="btn btn-primary">Go</a>
                </div>
              </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Delete Skill</h5>
                    <p class="card-text">Delete an existing skill</p>
                    <a href="DeleteSkill.php" class="btn btn-primary">Go</a>
                  </div>
                </div>
            </div>
          </div>               
    </div>


    <?php create_footer(); ?>


</body>
</html>
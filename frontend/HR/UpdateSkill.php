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
      $tmp_oldskillname = '';
      $tmp_newskillname = '';
      if (isset($_SESSION['errors'])){
        $tmp_skillid = $_SESSION['updateskill_skillid'];
        $tmp_oldskillname = $_SESSION['updateskill_oldskillname'];
        $tmp_newskillname = $_SESSION['updateskill_newskillname'];
        unset($_SESSION['updateskill_skillid']);
        unset($_SESSION['updateskill_oldskillname']);
        unset($_SESSION['updateskill_newskillname']);
      }

      /* var_dump($tmp_skillid,$tmp_oldskillname,$tmp_newskillname); */
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
        <div class="row">
            <div class="col-1"></div>
            <div class="col-6 offset-md-3">
                <h1>Update Existing Skill's Name</h1><br>
                <?php printErrors(); /*defined in common.php*/ ?>
                <form action="../../backend/handleUpdateSkill.php" method="post">
                    <label for="skillid">Existing Skill ID:</label><br>
                    <input type="number" id="skillid" name="skillid" value='<?= $tmp_skillid?>'>
                    <br><br>
                    <!-- <label for="oldskillname">Old Skill Name:</label><br>
                    <input type="text" id="oldskillname" name="oldskillname" value=''>
                    <br><br> -->
                    <label for="newskillname">New Skill Name:</label><br>
                    <input type="text" id="newskillname" name="newskillname" value='<?= $tmp_newskillname?>'>
                    <br><br>
                    <button class="btn btn-primary" type="submit">Submit</button>
                </form>
            </div>
            <div class="col-1"></div>
        </div>

    </div>


</body>
</html>
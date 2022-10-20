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
    $tmp_roleid = '';
    $tmp_skillid = '';
    if (isset($_SESSION['errors'])){
      $tmp_roleid = $_SESSION['addRoleSkillFail_roleid'];
      $tmp_skillid = $_SESSION['addRoleSkillFail_skillid'];
      unset($_SESSION['addRoleSkillFail_roleid']);
      unset($_SESSION['addRoleSkillFail_skillid']);
    }
  ?>
</head>

<body>

<div class="p-5 bg-primary text-white text-center">
        <h1>Learning Journey System</h1>
</div>
      
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
      <div class="container-fluid">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="homepage.html">My Learning Journey</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="HR.html">HR</a>
          </li>
        </ul>
        <span class="navbar-text">
          HR 
        </span>
      </div>
    </nav>

    <div class="container mt-5">    
        <div class="row">
            <div class="col-1"></div>
            <div class="col-6 offset-md-3">
                <h1>Add skill to role</h1><br>
                <?php printErrors(); /*defined in common.php*/ ?>
                <form action="../../backend/handleAddRoleSkill.php" method="post">
                    <label for="roleid">Role id:</label><br>
                    <input type="numeric" id="roleid" name="roleid" value='<?= $tmp_roleid?>'>
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



</body>
</html>
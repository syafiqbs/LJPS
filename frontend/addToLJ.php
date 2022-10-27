<?php

    require_once "../backend/common.php";
    require_once "../backend/LJDAO.php";

    $skill_id = $_POST["skill_id"];
    $staff_id = $_POST["staff_id"];
    $courses_id = $_POST["chosenCourse"];
    $job_id = $_POST["job_id"];

    var_dump($skill_id);
    var_dump($staff_id);
    var_dump($courses_id);
    var_dump($job_id);

    

?>

<form action="../backend/handleAddToLJ.php" method="POST">
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
    <?php
        echo "You are taking courses:";
        foreach($courses_id as $course){
            echo"$course ";
        };
        echo "\n which earn the skill: $skill_id";
        echo "\n for the role: $job_id";
    ?>
    </textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
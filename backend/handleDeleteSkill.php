<?php

require_once "common.php";
require_once "ConnectionManager.php";
require_once "SkillDAO.php";

$result = [];
$errors = [];

        $skill_id = $_POST["skillid"];
        $skill_name = $_POST["skillname"];

        if (strlen($skill_name) > 20){
          $errors[] = "Max skill name length is 20";
        }
        if (empty($skill_name)){
            $errors[] = "Skill name cannot be empty";
        }
        if (empty($skill_id)){
            $errors[] = "Skill id cannot be empty";
        }

        if (count($errors) > 0){
          $_SESSION['errors'] = $errors;
          $_SESSION["deleteskill_skillid"] = $skill_id;
          $_SESSION['deleteskill_skillname'] = $skill_name;
          header("Location: ../frontend/HR/DeleteSkill.php");
        }
        
        // delete skill 
        $new_skill = new Skill($skill_id, $skill_name);
        $dao = new SkillDAO();
        $status = $dao->delete($new_skill);

        if ($status) {
          $_SESSION['addSuccess'] = "Add operation success";
          header("Location: ../frontend/HR/HRSkills.php");
          exit();
        }
        else {
          $_SESSION['deleteskill_skillid'] = $skill_id;
          $_SESSION['deleteskill_skillname'] = $skill_name;
          $errors[] = "Error in adding new skill";
          $_SESSION['errors'] = $errors;
          header("Location: ../frontend/HR/DeleteSkill.php");
          return;
        }


    ?>


</body>
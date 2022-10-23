<?php

require_once "common.php";
require_once "ConnectionManager.php";
require_once "SkillDAO.php";

$result = [];
$errors = [];

        $skill_id = $_POST["skillid"];
        $oldskill_name = $_POST["oldskillname"];
        $newskill_name = $_POST["newskillname"];

        if (strlen($oldskill_name) > 20){
          $errors[] = "Max skill name length is 20";
        }
        if (strlen($newskill_name) > 20){
            $errors[] = "Max skill name length is 20";
          }
        if (empty($oldskill_name)){
            $errors[] = "Skill name cannot be empty";
        }
        if (empty($newskill_name)){
            $errors[] = "Skill name cannot be empty";
        }
        if (empty($skill_id)){
            $errors[] = "Skill id cannot be empty";
        }

        if (count($errors) > 0){
          $_SESSION['errors'] = $errors;
          $_SESSION["updateskill_skillid"] = $skill_id;
          $_SESSION['updateskill_oldskillname'] = $oldskill_name;
          $_SESSION['updateskill_newskillname'] = $newskill_name;
          header("Location: ../frontend/HR/UpdateSkill.php");
        }

        var_dump($skillid,$oldskill_name,$newskill_name);
        
        $old_skill = new Skill($skill_id, $oldskill_name);
        $dao = new SkillDAO();
        $status = $dao->edit($old_skill, $newskill_name);

        if ($status) {
          $_SESSION['addSuccess'] = "Update operation success";
          header("Location: ../frontend/HR/HRSkills.php");
          exit();
        }
        else {
          $_SESSION['updateskill_skillid'] = $skill_id;
          $_SESSION['updateskill_oldskillname'] = $oldskill_name;
          $_SESSION['updateskill_newskillname'] = $newskill_name;
          $errors[] = "Error in updating new skill";
          $_SESSION['errors'] = $errors;
          header("Location: ../frontend/HR/UpdateSkill.php");
          return;
        }


    ?>


</body>

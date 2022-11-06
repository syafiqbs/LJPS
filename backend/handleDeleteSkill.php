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

        if (!$status) {
          $_SESSION['deleteskill_skillid'] = $skill_id;
          $_SESSION['deleteskill_skillname'] = $skill_name;
          $errors[] = "Error in adding new skill";
          $_SESSION['errors'] = $errors;
          header("Location: ../frontend/HR/DeleteSkill.php");
          return;
        }

        // deleting relevent jobskills
        $sql = "SELECT * 
        FROM job_skill
        WHERE skill_id = '$skill_id'
        ";
        $result = $conn->query($sql);
        $len = $result->num_rows;
        if ($len > 0) {
            while ($row = $result->fetch_assoc()) {
              $job_id = $row['job_id'];
              $job_name = $row['job_name'];
              $skill_id = $row['skill_id'];
              $new_job_skill = new JobSkill($job_id, $job_name, $skill_id);
              $JS_dao = new JobSkillDAO();
              $status = $JS_dao->delete($job_id,$skill_id);
              if (!$status) {
                $_SESSION['deleteskill_skillid'] = $skill_id;
                $_SESSION['deleteskill_skillname'] = $skill_name;
                $errors[] = "Error in adding new skill";
                $_SESSION['errors'] = $errors;
                header("Location: ../frontend/HR/DeleteSkill.php");
                return;
              }
            }
          }


        // deleting relevent courseskills
        $sql = "SELECT * 
        FROM course_skill
        WHERE skill_id = '$skill_id'
        ";
        $result = $conn->query($sql);
        $len = $result->num_rows;
        if ($len > 0) {
            while ($row = $result->fetch_assoc()) {
              $course_id = $row['course_id'];
              $skill_id = $row['skill_id'];
              $new_skill_course = new SkillCourse($course_id, $skill_id);
              $SC_dao = new SkillCourseDAO();
              $status = $SC_dao->delete($new_skill_course);
              if (!$status) {
                $_SESSION['deleteskill_skillid'] = $skill_id;
                $_SESSION['deleteskill_skillname'] = $skill_name;
                $errors[] = "Error in adding new skill";
                $_SESSION['errors'] = $errors;
                header("Location: ../frontend/HR/DeleteSkill.php");
                return;
              }
            }
          }
          
        $_SESSION['addSuccess'] = "Add operation success";
        header("Location: ../frontend/HR/HRSkills.php");
        exit();
    ?>


</body>
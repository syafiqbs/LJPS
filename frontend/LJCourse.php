<?php 
require_once "../backend/createElements.php";
require_once "../backend/CourseDAO.php";
require_once "../backend/SkillCourseDAO.php";
require_once "../backend/common.php";
require_once "../backend/queries.php";
require_once "../backend/StaffDAO.php";
require_once "../backend/RegistrationDAO.php";
require_once "../backend/Registration.php";
require_once "../backend/SkillDAO.php";
?>
<!-- Accepts user type, role, courses input from homepage, filters by default the courses that user can train in -->
<!-- add search filtering, copy from depreciated html base -->
<!-- selecting course should add course to learning journey, have success pop-up-->
<!DOCTYPE html>
<html lang="en">

<head>
    <title>LJPS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <?php
        $username = $_SESSION['username'];
        $namename = $_SESSION['namename'];
        $role = $_SESSION['role'];
        create_header();
        create_navbar($role,$namename);

        $skill_id = $_POST["chooseSkill"];
        $staff_id = $_SESSION["staff_id"];
        $job_id = $_POST["job_id"];

        $queriesDAO = new Queries();
        $results_array = $queriesDAO->getCourseBySkillId($skill_id);

        $registrationDAO = new RegistrationDAO();
        $check_registrations = $registrationDAO->getRegistrationByStaffId($staff_id);
        $registered_courses = [];
        foreach($check_registrations as $registration){
            $reg_status = $registration->getRegStatus();
            if ($reg_status == "Registered"){
                $tempCourseId = $registration->getCourseId();
                $registered_courses[] = $tempCourseId;
            }
        }
        

        



?>

    <div class="container mt-5">
        <h1>COURSES</h1>
        <p>*Only active courses AND courses not registered (from registration table)*</p>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <th>skill name</th>
                <th>course id</th>
                <th>course name</th>
                <th>course description</th>
                <th>course category</th>
                <th>Add to LJ</th>

            </thead>

            <tbody>
                <?php
                foreach($results_array as $arr){
                    $skill_id = $arr['skill_id'];
                    $skillDAO = new SkillDAO();
                    $skill_name = $skillDAO->getNameById($skill_id);
                    $course_id = $arr['course_id'];
                    if (in_array($course_id, $registered_courses)){
                        continue;
                    }
                    $course_name = $arr['course_name'];
                    $course_desc = $arr['course_desc'];
                    $course_status = $arr['course_status'];
                    $course_type = $arr['course_type'];
                    $course_category = $arr['course_category'];
                    echo "<tr>
                        <td>$skill_name</td>
                        <td>$course_id</td>
                        <td>$course_name</td>
                        <td>$course_desc</td>
                        <td>$course_category</td>
                        <td>
                            <form action='./Skills.php' method='POST' class='d-inline'>
                                <input type = 'hidden' id='skill_id' name='skill_id' value=${skill_id}>
                                <input type = 'hidden' id='course_id' name='course_id' value=${course_id}>
                                <input type = 'hidden' id='staff_id' name='staff_id' value=${staff_id}>
                                <button type='submit' name='inputCourseIdToLJ' value=${course_id} class='btn btn-primary btn-sm'>Add</button>
                            
                        </td>
                    </tr>";
                    echo "<input type='hidden' id='job_id' name='job_id' value=${job_id}>";
                }
                
            ?>
            </tbody>
        </table></form>
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

    <?php create_footer(); ?>

</body>
</html>
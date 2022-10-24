<?php 
require_once "../backend/createElements.php";
require_once "../backend/CourseDAO.php";
require_once "../backend/SkillCourseDAO.php";
require_once "../backend/common.php";
require_once "../backend/queries.php";
require_once "../backend/StaffDAO.php";
?>
<!-- Accepts user type, role, courses input from homepage, filters by default the courses that user can train in -->
<!-- add search filtering, copy from depreciated html base -->
<!-- selecting course should add course to learning journey, have success pop-up-->
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap 5 Website Example</title>
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

        $queriesDAO = new Queries();
        $results_array = $queriesDAO->getCourseBySkillId($skill_id);
        
        $staff_id = $_SESSION["staff_id"];
        $job_id = $_POST["job_id"];
        var_dump($job_id);



?>

    <div class="container mt-5">
        <h1>COURSES</h1>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <th>skill id</th>
                <th>course id</th>
                <th>course name</th>
                <th>course description</th>
                <th>course status</th>
                <th>course type</th>
                <th>course category</th>
                <th>Add to LJ</th>

            </thead>

            <tbody>
                <?php
                foreach($results_array as $arr){
                $skill_id = $arr['skill_id'];
                $course_id = $arr['course_id'];
                $course_name = $arr['course_name'];
                $course_desc = $arr['course_desc'];
                $course_status = $arr['course_status'];
                $course_type = $arr['course_type'];
                $course_category = $arr['course_category'];
                echo "<tr>
                    <td>$skill_id</td>
                    <td>$course_id</td>
                    <td>$course_name</td>
                    <td>$course_desc</td>
                    <td>$course_status</td>
                    <td>$course_type</td>
                    <td>$course_category</td>
                    <td>
                        <form action='./addToLJ.php' method='POST' class='d-inline'>
                            <input type = 'hidden' id='skill_id' name='skill_id' value=${skill_id}>
                            <input type = 'hidden' id='course_id' name='course_id' value=${course_id}>
                            <input type = 'hidden' id='staff_id' name='staff_id' value=${staff_id}>
                            <input type='checkbox' name='chosenCourse[]' value=${course_id}>
                        
                    </td>
                </tr>";
                echo "<input type='hidden' id='job_id' name='job_id' value=${job_id}>";
                }
            ?>
            </tbody>
        </table>
        <button type='submit' class='btn btn-primary btn-sm'>Add to LJ</button></form>
    </div>

    <?php create_footer(); ?>

</body>
</html>
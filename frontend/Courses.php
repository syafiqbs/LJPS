<?php 
session_start(); 
require_once "../backend/createElements.php";
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
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'ljps';

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // get session variables 
    $username = $_SESSION['username'];
    $namename = $_SESSION['namename'];
    $role = $_SESSION['role'];
    $skill_id = $_POST['course_skill'];
    $sql = "SELECT course_id FROM course_skill WHERE skill_id = $skill_id";
    $result = $conn->query($sql);
    $ids = array();
    while ($row = $result->fetch_assoc()) {
        array_push($ids,$row['course_id']);
    }
    $sql = "SELECT course_id, course_name, course_desc, course_status, course_type, course_category FROM course WHERE course_id IN ('". implode(',', $ids) ."')";
    $result = $conn->query($sql);
    ?>


<?php 
    create_header();
    create_navbar($role,$namename)
?>

    <div class="container mt-5">
        <h1>COURSES</h1>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
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
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>" .
                        "<td>" . $row['course_id'] . "</td>" .
                        "<td>" . $row['course_name'] . "</td>" .
                        "<td>" . $row['course_desc'] . "</td>" .
                        "<td>" . $row['course_status'] . "</td>" .
                        "<td>" . $row['course_type'] . "</td>" .
                        "<td>" . $row['course_category'] . "</td>" .
                        "<td>"  .
                        "<form action='addCourseToLJ.php' method='post'>" .
                        "<input type='hidden' id='course_id' name='course_id' value=" . $row['course_id'] . ">" .
                        "<button type='submit'>Add</button>" .
                        "</form>" .
                        "</td>" . 
                        "</tr>";
                }
                ?>
            </tbody>

        </table>
    </div>


    <?php create_footer(); ?>

</body>
</html>
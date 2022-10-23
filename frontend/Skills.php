<?php 
session_start(); 
require_once "../backend/createElements.php";
?>
<!-- Accepts user type and role input from homepage, filters by default the skills that user can train in -->
<!-- add search filtering, copy from depreciated html base -->
<!-- selecting skill should add skills to learning journey? + post to courses page -->
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

    $job_id = $_SESSION['job_id'];
    $username = $_SESSION['username'];
    $namename = $_SESSION['namename'];
    $role = $_SESSION['role'];
    $sql = "SELECT job_name, skill_id FROM job_skill WHERE job_id = $job_id";
    $result = $conn->query($sql);
    ?>


<?php 
    create_header();
    create_navbar($role,$namename)
?>

    <div class="container mt-5">
        <h1>Skills</h1>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <th>job_role_id</th>
                <th>skill_id</th>
                <th>Search for courses that give this skill</th>
            </thead>

            <tbody>
                <?php
                $len = $result->num_rows;
                if ($len > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>" .
                            "<td>" . $row['job_name'] . "</td>" .
                            "<td>" . $row['skill_id'] . "</td>" .
                            "<td>" .
                            "<form action='Courses.php' method='post'>" .
                            "<input type='hidden' id='course_skill' name='course_skill' value=" . $row['skill_id'] . ">" .
                            "<button type='submit'>Search</button>" .
                            "</form>" .
                            "</td>" .
                            "</tr>";
                    };
                };
                ?>
            </tbody>

        </table>
    </div>

    <?php create_footer(); ?>
</body>

</html>
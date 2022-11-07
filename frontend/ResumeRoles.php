<?php
session_start();
require_once "../backend/createElements.php";
?>
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

    $username = $_SESSION['username'];
    $namename = $_SESSION['namename'];
    $role = $_SESSION['role'];
    $staff_id = $_SESSION['staff_id'];

    $sql = "SELECT *
    FROM learningjourney 
    WHERE staff_id = '$staff_id'  
    AND learningjourney_main = 'no'
    GROUP BY learningjourney_name
    ";

    $result = $conn->query($sql);
    ?>


    <?php
    create_header();
    create_navbar($role, $namename)
    ?>

    <div class="container mt-5">
        <h1>Roles</h1>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <th>Job ID</th>
                <th>LJ Name</th>
                <th>LJ Description</th>
                <th>Continue Learning Journey</th>
            </thead>

            <tbody>
                <?php
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>" .
                    "<td>" . $row['job_id'] . "</td>" .
                    "<td>" . $row['learningjourney_name'] . "</td>" .
                        "<td>" . $row['learningjourney_description'] . "</td>" .
                        // POST or SESSION to skills page
                        "<td>" .
                        "<form action='../backend/handleUpdateLJ.php' method='post'>" .
                        "<input type='hidden' id='job_id' name='job_id' value=". $row['job_id'] .">".
                        "<input type='hidden' id='skill_id' name='skill_id' value=". $row['skill_id'] .">".
                        "<input type='hidden' id='course_id' name='course_id' value=". $row['course_id'] .">".
                        "<input type='hidden' id='learningjourney_name' name='learningjourney_name' value=". $row['learningjourney_name'] .">".
                        "<button type='submit'>Continue</button>" .
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
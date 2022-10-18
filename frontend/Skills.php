<?php session_start(); ?>
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
    var_dump($_POST);
    $LJ_role = $_POST['learning_journey_role'];
    $username = $_SESSION['username'];
    $namename = $_SESSION['namename'];
    $role = $_SESSION['role'];

    $sql = "SELECT job_role_id, skill_id FROM job_skill WHERE job_role_id = $LJ_role";
    $result = $conn->query($sql);
    ?>


    <div class="p-5 bg-primary text-white text-center">
        <h1>Learning Journey System</h1>
    </div>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="homepage.html">My Learning Journey</a>
                </li>
                <li class="nav-item">
                    <?php echo "<a class='nav-link' href='$role.html'>$role</a> " ?>
                </li>
            </ul>
            <span class="navbar-text">
                <?php echo "<a class='nav-link'>$namename</a> " ?>
            </span>
            <span class="navbar-text">
                <a class="nav-link" href="index.html">Logout</a>
            </span>
        </div>
    </nav>

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
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>" .
                        "<td>" . $row['job_role_id'] . "</td>" .
                        "<td>" . $row['skill_id'] . "</td>" .
                        "<td>" .
                        "<form action='Courses.php' method='post'>" .
                        "<input type='hidden' id='course_skill' name='course_skill' value=" . $row['skill_id'] . ">" .
                        "<button type='submit'>Start</button>" .
                        "</form>" .
                        "</td>" .
                        "</tr>";
                };
                ?>
            </tbody>

        </table>
    </div>

    <div class="mt-5 p-4 bg-dark text-white text-center">
        <p>Footer</p>
    </div>

</body>

</html>
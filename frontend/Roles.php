<?php session_start(); ?>
<!-- Accepts user type input from homepage, filters by default the roles that user can train in -->
<!-- add search filtering, copy from depreciated html base -->
<!-- Start should add role to learning journey? + post to skills page -->
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

    $sql = "SELECT job_role_id, job_name, skill_id FROM job_skill GROUP BY job_name";
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
                <?php echo "<a class='nav-link'>$namename</a>" ?>
            </span>
            <span class="navbar-text">
                <a class="nav-link" href="index.html">Logout</a>
            </span>
        </div>
    </nav>

    <div class="container mt-5">
        <h1>Roles</h1>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <th>Job Role Id</th>
                <th>Job Name</th>
                <th>Start Role</th>
            </thead>

            <tbody>
                <?php
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>" .
                        "<td>" . $row['job_role_id'] . "</td>" .
                        "<td>" . $row['job_name'] . "</td>" .
                        // POST or SESSION to skills page
                        "<td>" .
                        "<form action='Skills.php' method='post'>" .
                        "<input type='hidden' id='learning_journey_role' name='learning_journey_role' value=" . $row['job_role_id'] . ">" .
                        "<button type='submit'>Start</button>" .
                        "</form>" .
                        "</td>" .
                        "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <div class="mt-5 p-4 bg-dark text-white text-center">
        <p>Footer</p>
    </div>
</body>
</html>
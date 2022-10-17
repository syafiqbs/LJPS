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

    $sql = "SELECT skill_id, skill_name FROM skill";
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
                    <a class="nav-link" href="HR.html">HR</a>
                </li>
            </ul>
            <span class="navbar-text">
                HR
            </span>
        </div>
    </nav>

    <div class="container mt-5">
        <h1>Skills</h1>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <th>Skill Id</th>
                <th>Skill Name</th>
                <th>Add to Learning Journey</th>
            </thead>

            <tbody>
                <?php
            while ($row = $result->fetch_assoc()) {
              echo "<tr>" .
                      "<td>" . $row['skill_id'] . "</td>" .
                      "<td>" . $row['skill_name'] . "</td>" .
                      "<td>" . "<a href='Courses.php' class='btn btn-dark' role='button'>Start</a>" . "</td>" .
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
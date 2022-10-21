<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap 5 Website Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

<div class="p-5 bg-primary text-white text-center">
        <h1>Learning Journey System</h1>
</div>
      
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
      <div class="container-fluid">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="homepage.html">My Learning Journey</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="HR.html">HR</a>
          </li>
        </ul>
        <span class="navbar-text">
          HR 
        </span>
      </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Create Role</h5>
                  <p class="card-text">Create a new role</p>
                  <a href="CreateRole.php" class="btn btn-primary">Go</a>
                </div>  
              </div>
            </div>
            <div class="col-md-4">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Update Role</h5>
                  <p class="card-text">Update an existing role</p>
                  <a href="UpdateRole.php" class="btn btn-primary">Go</a>
                </div>
              </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Delete Role</h5>
                    <p class="card-text">Delete an existing role</p>
                    <a href="DeleteRole.php" class="btn btn-primary">Go</a>
                  </div>
                </div>
            </div>
          </div>               
    </div>




</body>
</html>
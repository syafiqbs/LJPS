<?php
    require_once "autoload.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roles</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
  <?php 
    $roleDAO = new RoleDAO();
    $roles = $roleDAO->loadAll();

    echo "<table class = 'table table-striped'>";
      echo "<thead>
        <tr>
          <th scope='col'>ID</th>
          <th scope='col'>Name</th>
      </tr>
      </thead><tbody>";
      foreach($roles as $role){
        $role_id = $role->getRoleId();
        $role_name = $role->getRoleName();

        echo "<tr>
          <td>$role_id</td>
          <td>$role_name</td>
        </tr>";
      }
    echo "</tbody></table>";
  ?>
</body>
</html>
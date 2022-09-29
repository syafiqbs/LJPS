<?php
    require_once "autoload.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
  <?php 
    $userDAO = new UserDAO();
    $users = $userDAO->loadAll();
    var_dump($users);
    echo "<table class = 'table table-striped'>";
      echo "<thead>
        <tr>
          <th scope='col'>ID</th>
          <th scope='col'>Name</th>
          <th scope='col>Control Level</th>
      </tr>
      </thead><tbody>";
      foreach($users as $user){
        $user_id = $user->getUserId();
        $user_name = $user->getUserName();
        $control = $user->getControl();

        echo "<tr>
          <td>$user_id</td>
          <td>$user_name</td>
          <td>$control</td>
        </tr>";
      }
    echo "</tbody></table>";
  ?>
</body>
</html>
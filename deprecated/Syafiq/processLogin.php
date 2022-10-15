<?php

    require_once './common.php';

    $email = $_POST['inputEmail'];
    $staff_name = $_POST['inputPassword'];

    $staffDAO = new StaffDAO();

    $staff = $staffDAO->getStaff($email, $staff_name);
    
    if ($staff == null){
        $result['status'] = "User does not exist";
    }

    else{
        $role = $staff->getRole();
        $result['status'] = $role;
    }

var_dump($result);

?>
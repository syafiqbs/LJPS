<?php
    function create_header(){
        echo '<div class="p-5 bg-primary text-white text-center">' .
            '<h1>Learning Journey System</h1>' .
            '</div>';
    };

    function create_navbar($role,$username){
        echo '<nav class="navbar navbar-expand-sm bg-dark navbar-dark">' .
            '<div class="container-fluid">' . 
                '<ul class="navbar-nav">' . 
                '<li class="nav-item">' . 
                    '<a class="nav-link active" href="homepage.php">My Learning Journey</a>' . 
                '</li>';
                if ($role == 'Admin' || $role == 'Manager'){
                    echo '<li class="nav-item">' .
                    "<a class='nav-link' href='HR/HR.html'>HR</a> " .
                    '</li>';
                }
                echo '</ul>' .
                '<span class="navbar-text">' .
                '<?php echo "<a class="nav-link">'. $username .'</a>' .
                '</span>' .
                '<span class="navbar-text">' .
                '<a class="nav-link" href="index.html">Logout</a>' .
                '</span>' .
            '</div>' .
            '</nav>';
    };

    function create_footer(){
        echo '<div class="mt-5 p-4 bg-dark text-white text-center">' .
            '<p>Footer</p>' .
        '</div>';
    };
?>
<?php

spl_autoload_register(
    function ($class){
    require_once "$class" . "php";
});

session_start();

# Utility function to print error messages in $_SESSION['errors']
# $_SESSION['errors'] is cleared at the end of the method
function printErrors() {
    if(isset($_SESSION['errors'])){
        print "<ul style='color:red;'>";
        
        foreach ($_SESSION['errors'] as $value) {
            print "<li>" . $value . "</li>";
        }
        
        print "</ul>";   
        unset($_SESSION['errors']);
    }    
}

?>
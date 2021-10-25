<?php 
    include "PHP/connection.inc.php";
    session_start();
    $_SESSION['date'] = date("Y/m/d");
    $path = $_SERVER['PHP_SELF'];
    function bn ($a) {
        return basename($a);
    }

    if(bn($path) == 'login.php'){
        if(bn($path) != 'index.php'){
            if (isset($_SESSION['admin'])) {
                header('location: index.php');
            }
        }
    }
?>
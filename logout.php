<?php
include 'PHP/function.inc.php';
session_unset();
session_destroy();
header('location: ./index.php');
?>
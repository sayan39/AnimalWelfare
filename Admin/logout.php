<?php
session_start(); 
unset($_SESSION['adminid']);
session_destroy(); // destroy session
?>


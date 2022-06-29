<?php 
    //Include constants.php for SITEURL
    include('config/constants.php');
    //0. unset log-in session
    unset($_SESSION['logged-in-admin-id']);
    //1. Destory the Session
    session_destroy(); //Unsets $_SESSION['user']

    //2. REdirect to Login Page
    header('location:'.SITEURL.'admin/login.php');

?>
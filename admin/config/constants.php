<?php 
session_start();

define('SITEURL','http://localhost/chama/');
define('LOCALHOST', 'localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','chama');

$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD);
$db_select = mysqli_select_db($conn, DB_NAME);
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
?>

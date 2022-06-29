<?php 

//incl. constants
include('partials/menu.php');

//get ID of entry to be deleted
$regid =$_GET['regid'];

?>

<?php

//sql query
$sql ="DELETE FROM tblreg WHERE regid=$regid";

//execute
$res = mysqli_query($conn, $sql);
//check
if($res==TRUE)
{
//print success
//echo "Amount Successfully Cashed out";
//diaplay messo
$_SESSION['delete'] ="<div class='success'>Amount Cashed Out Successfully.</div>";
//redirect
header('location:'.SITEURL.'admin/manage-reg.php');

}
?>
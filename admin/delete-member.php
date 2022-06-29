<?php 

//incl. constants
include('config/constants.php');

//get ID of Admin to be deleted
$id =$_GET['MemberNo'];
//sql query
$sql ="DELETE FROM tblmember WHERE MemberNo=$id";

//execute
$res = mysqli_query($conn, $sql);
//check
if($res==TRUE)
{
//print success
//echo "Admin Deleted";
//diaplay messo
$_SESSION['delete'] ="<div class='success'>Member Deleted Successfully.</div>";
//redirect
header('location:'.SITEURL.'admin/manage-members.php');

}
else
{

    $_SESSION['delete'] ="<div class='error'>Unable to delete. Try again Later.</div>";
    header('location:'.SITEURL.'admin/manage-memebers.php');
 //echo "Failed";
    //fail
}
//redirect to manage admin w message



?>
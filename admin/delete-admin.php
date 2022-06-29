<?php 

//incl. constants
include('config/constants.php');

//get ID of Admin to be deleted
$MemberNo =$_GET['MemberNo'];
//sql query
$sql ="UPDATE tblmember set role='MEMBER' where MemberNo='$MemberNo'";

//execute
$res = mysqli_query($conn, $sql);
//check
if($res==TRUE)
{
//print success
//echo "Admin Deleted";
//diaplay messo
$_SESSION['delete'] ="<div class='success'>Admin Deleted Successfully.</div>";
//redirect
header('location:'.SITEURL.'admin/manage-admin.php');

}
else
{

    $_SESSION['delete'] ="<div class='error'>Unable to delete. Try again Later.</div>";
    header('location:'.SITEURL.'admin/manage-admin.php');
 //echo "Failed";
    //fail
}
//redirect to manage admin w message



?>
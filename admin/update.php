<?php
include('../admin/config/constants.php');
$MemberNo=$_GET['MemberNo'];

#UPDATE  tblmember  set tblmember.status='pending' where tblmember.status='active' and MemberNo!=(select MemberNo from tblreg where Amount <=999 );
//$sqlx= "SET @array =";
$queries = ["UPDATE  tblmember  set tblmember.status='active' where tblmember.status='pending' where $MemberNo=(select MemberNo from tblreg where Amount >1000 )",
"UPDATE  tblmember  set tblmember.status='pending' where tblmember.status='active' and where $MemberNo!=(select MemberNo from tblreg where Amount >1000 )"];
foreach ($queries as $query){

    $res0 = mysqli_query($conn, $query);
}
if ($res0==TRUE)
{
    //session variable for successful add
    $_SESSION['update'] = "<div class='success'>Member Updated Successfully</div>";
    //redirect page
    header("location:".SITEURL.'admin/manage-members.php');

}
else
{
    //session variable for successful add
    $_SESSION['update'] = "<div class='error'>No Change in State</div>";
    //redirect page
    header("location:".SITEURL.'admin/manage-members.php');
}
               
                #$res1 = mysqli_query($conn, $sql1);
                        ?>
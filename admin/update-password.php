<?php include('partials/menu.php'); ?>

<?php
        //Get the ID of the Selected Admin
            $MemberNo=$_GET['MemberNo'];

        //create sql
        $sql= "SELECT * from tblmember WHERE MemberNo = $MemberNo";

        //exe

        $res = mysqli_query($conn, $sql);

        //check

        if($res==true)
        {

            //check data availability

        $count = mysqli_num_rows($res);
        // check if there is data or not

        if($count==1)
        {
            //get details
            //echo "good 2 go";
            $row=mysqli_fetch_assoc($res);

           // $fullname = $row['FullName'];
            $username = $row['UserName'];


        }
        else 
        {

            //redirect to manage admin page
            header('location:'.SITEURL.'admin/manage-admin.php');

        }
    }
        ?>

<div class="main-content"><div class="wrapper">
<h1 class="topic">CHANGE PASSWORD</h1>
<br><br>
<form action=""method="POST">
<div class="floatingtable">
    <tr><td>Current Password:</td>
        <td><input type="password" name="current_password" placeholder=" Current Password" class="📦">
        <br>
    </td>
    <tr><td>New Password:</td>

    <td>
        <input type="password" name="new_password" placeholder=" New Password" class="📦">
    </td></tr>
    <br>
    <td>Confirm Password:</td>
    <td>
        <input type="password" name="confirm_password" placeholder=" Confirm Password" class="📦">

    </td>
    <br>
    <input type="hidden" name="MemberNo" value="<?php echo $MemberNo?>;">
    <tr><td><input type="submit" name="submit" value="Change Password" class="btn-secondary ✅"></td></tr>
    <tr></tr>
</tr>
</div>



</form>


</div></div>

<?php
if(isset($_POST['submit']))
{

 //echo "clicked";
 //get all th value from the form 
 $MemberNo=$_POST['MemberNo'];
 $current_password=md5($_POST['current_password']);
 $new_password=md5($_POST['new_password']);
 $confirm_password=md5($_POST['confirm_password']);

 

 

 //check if user and pw exists
 $sql="SELECT * FROM tblmember WHERE MemberNo='$MemberNo' AND password='$current_password'";

 //exe
 $res=mysqli_query($conn, $sql);

 if($res==TRUE)
 {
     //check data availability
     $count=mysqli_num_rows($res);

    if ($count==1)
    {
        //user exists and password can be changed
            //echo "User Found";
    if($new_password==$confirm_password)
            {
            $sql2= "UPDATE tblmember SET
            password='$new_password' where MemberNo='$MemberNo'";

            $res2= mysqli_query($conn, $sql2);

            //check
            if($res2==true)
            {
                //display
                $_SESSION['success']= "<div class='success'>Password Updated</div>";
                header('location:'.SITEURL.'admin/manage-admin.php');
            }

            }
            else
            {
                    //error
                $_SESSION['changefail']= "<div class='error'>Password did not Update</div>";
                header('location:'.SITEURL.'admin/manage-admin.php');
            }

            }
            else
            {
                    //error
                $_SESSION['pw-no-match']= "<div class='error'>Passwords did not Match</div>";
                header('location:'.SITEURL.'admin/manage-admin.php');
            }

    }
    else
    {
        //user does not exist;
        $_SESSION['user-not-found'] = "<div class='error'>User Not Found</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
        //
    }
 }

 //check new pw and confirm

 //change pw if all is T
//sql query

 //$sql= "UPDATE tbl_admin set
 //fullname='$fullname',
 //username='$username'where id='$id'";
 //$res=mysqli_query($conn, $sql);
//exe
 //check



?>

<?php include('partials/footer.php'); ?>
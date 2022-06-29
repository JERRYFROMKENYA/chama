<?php include('partials/menu.php')?>
<br>
            <?php
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];//displaying session message
                    unset ($_SESSION['add']);//removing session message
                }
            ?>
            <br>
            <br>
            <br>

<div class="main-content">
    <div class="wrapper">
        <h1 class="Topic"><b>ADD ADMIN</b></h1><br><br>
        <form action="#" method="POST">

        <table class= "tbl-30 tbl-full">
            <tr><td>Full Name:</td>
        <td><input type="text" name="FirstName" placeholder="Enter First Name"></td> 
        <td><input type="text" name="LastName" placeholder="Enter Last Name"></td>                                                                    </tr>
        <tr><td>Username:</td>
        <td><input type="text" name="username" placeholder="Enter Username"></td></tr>
        <tr><td>password:</td>
        <td><input type="password" name="password" placeholder="Enter Password"></td></tr>
        <tr><td colspan= '2'><input type="submit" name='submit' value="Add Admin" class= 'btn-secondary'></td></tr>
        </table>
        </form>
    </div>
</div>



<?php include('partials/footer.php')?>

<?php
//process the value from form and save it in the db
//check whether the button is clicked or not

if(isset($_POST['submit']))
{
    //button clicked
   // echo "Button clicked.";

   //obtain data
   
 $FirstName = mysqli_escape_string($conn,$_POST['FirstName']);
 $LastName = mysqli_escape_string($conn,$_POST['LastName']);
    $username = mysqli_escape_string($conn,$_POST['username']);
    $password =md5( $_POST['password']); //password encryption

    //sql query

$sql = "INSERT INTO tbladmin set 
FirstName ='$FirstName',
LastName ='$LastName'
,username = '$username',
password = '$password'";


$res = mysqli_query($conn, $sql) ;

if ($res==TRUE)
{
    //session variable for successful add
    $_SESSION['add'] = "<div class='success'>ADMIN ADDED SUCCESSFULLY</div>";
    //redirect page
    header("location:".SITEURL.'admin/manage-admin.php');


}
 else
 {
    //session variable for unsuccessful add
    $_SESSION['add'] = "<div class='error'>FAILED TO ADD ADMIN</div>";
    //redirect page
    header("location:".SITEURL.'admin/add-admin.php');

 }


}
 
?>
<?php include('../admin/config/constants.php'); ?>

<html>
<head>
    <title>
        CHAMA MANAGEMENT SYSTEM
    </title>
    <link rel="stylesheet" href="../css/admin.css">

</head>
<Body>
<div class="login">
            <h1 class="text-center Topic">Login</h1>
            <br><br>

            <?php 
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }

                if(isset($_SESSION['no-login-message']))
                {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }
            ?>
            <br><br>
            <!-- Login Form Starts HEre -->
            <form action="" method="POST" class="text-center">
            Username: <br>
            <input class="📦" type="text" name="username" placeholder="Enter Username"><br><br>

            Password: <br>
            <input class="📦" type="password" name="password" placeholder="Enter Password"><br><br>
            <br><br>
            <!--Invitation code:<br>
            <input type="password" name="invite" placeholder="Enter Invitation code"><br><br>
            
            --><input type="submit" name="submit" value="Login" class="btn-primary 📦">
            </form>
             No account?  <a class href="<?php echo SITEURL;?>admin/signup.php?">Sign Up here</a>
            <!-- Login Form Ends HEre -->

            <p class="text-center">Created By - <a href="www.twitter.com/jerryfromkenya">JERRYFROMKENYA</a> for <a href="#">CHAMA</a></p>
        </div>

    </body>
</html>

<?php 

    //CHeck whether the Submit Button is Clicked or NOt
    if(isset($_POST['submit']))
    {
        //Process for Login
        //1. Get the Data from Login form
        // $username = $_POST['username'];
        // $password = md5($_POST['password']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $invite = mysqli_real_escape_string($conn, $_POST['invite']);
        $raw_password = md5($_POST['password']);
        $password = mysqli_real_escape_string($conn, $raw_password);

        //if ($invite == 'IWASINVITEDBYJERRYFROMKENYA'){
            //$_SESSION['referral']= "TRUE";
       // }
        //2. SQL to check whether the user with username and password exists or not
        $sql = "SELECT * FROM tblmember WHERE UserName='$username' AND password='$password'";
       

        //3. Execute the Query
        $res = mysqli_query($conn, $sql);
        

        //4. COunt rows to check whether the user exists or not
        $count = mysqli_num_rows($res);
        $row = mysqli_fetch_assoc($res);
         
       
        if($count==1)
        {
            //User AVailable and Login Success
         $_SESSION['logged-in-admin-id'] = $row['MemberNo'];
         $_SESSION['logged-in-MemberNo'] = $row['MemberNo'];
        $_SESSION['logged-in-firstname']= $row['FirstName'];
        $_SESSION['logged-in-lastname']= $row['LastName'];
        $_SESSION['logged-in-username']= $row['UserName'];
        $_SESSION['logged-in-role']=$row['role'];
        $_SESSION['MemberImage']=$row['MemberImage'];
        if($_SESSION['logged-in-role']=='CHAIR'||$_SESSION['logged-in-role']=='SECRETARY' ||$_SESSION['logged-in-role']== 'ADMIN'){
            $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
            $_SESSION['user'] = $username; //TO check whether the user is logged in or not and logout will unset it

            //REdirect to HOme Page/Dashboard
            header('location:'.SITEURL.'admin/index.php?MemberNo='.$_SESSION['logged-in-admin-id']);
        }
        else
        {
            //User not Available and Login FAil
            $_SESSION['login'] = "<div class='error text-center'>"."Your role is: ".$_SESSION['logged-in-role']." "."Insufficient Privileges.</div>";
            //REdirect to HOme Page/Dashboard
            header('location:'.SITEURL.'admin/login.php');
        }
        }
        
        else
        {
            //User not Available and Login FAil
            $_SESSION['login'] = "<div class='error text-center'>Username or Password  is Invalid.</div>";
            //REdirect to HOme Page/Dashboard
            header('location:'.SITEURL.'admin/login.php');
        }


    }

?>
<?php include('partials/menu.php');
if(!isset($_SESSION['logged-in-MemberNo']))
{
        $_SESSION['profile']= "<div class='error'>Unable to view profile, Please attempt logging in again!</div>";
    header("location:".SITEURL.'admin/index.php');
}
else
{
$MemberNo =$_SESSION['logged-in-MemberNo']; //basically obtaining the variable for currently logged in s secure manner.
$sql00="SELECT * FROM tblmember where MemberNo ='$MemberNo' ";//sql code to obtain info for the currently logged in Member.
$res00=mysqli_query($conn,$sql00);//obtaining data
   $count00=mysqli_num_rows($res00);//validating data integrity via a control structure
    if($count00==1)
    {
        $row00=mysqli_fetch_assoc($res00);//fetching associated fields
        $FirstName=$row00['FirstName'];
        $MiddleName=$row00['MiddleName'];
        $LastName=$row00['LastName'];
        $role=$row00['role'];
        $email=$row00['email'];
        $PhoneNo=$row00['PhoneNo'];
        $Address = $row00['Address'];
        $CurrMemberImage = $row00['MemberImage'];
        //$CurrIDImageF = $row['IDImageF'];
        //$CurrIDImageB = $row['IDImageB'];
        $DateOfBirth = $row00['DateOfBirth'];
        $status = $row00['status'];
        $UserName = $row00['UserName'];
        $bio = $row00['bio'];

    }
    else
    {
    $_SESSION['profile']= "Unable to view profile, Please attempt logging in again!";
    header("location:".SITEURL.'admin/index.php');
    }

}



?>
<body>
    <h1 class="topic">The Profile of <?php echo $_SESSION['logged-in-firstname'] ?></h1>
    <br>
    <br><br>
    <div class="flex profile">
        <form action="#" class="flex" method="POST" enctype="multipart/form-data">
            <div class="grid topic">
                <i><img src="<?php echo SITEURL; ?>images/members/<?php echo $CurrMemberImage; ?>" class="profileavatar" >
                <legend><b>CURRENT PROFILE PICTURE</b> </legend> 
                <i>
                    <br><br>
                    <!--<input type="file" name="newMemberImage" id="">
                    <legend><b>NEW PROFILE PICTURE</b> </legend>-->
                </i>
                </i>
                <i>
                    <h2><legend><b>Legal Name:</b></legend></h2>
                    <i><h1><?php echo $FirstName; echo " ";echo $MiddleName; echo " ";echo $LastName; ?></h1></i>
                    <div class="flex topic">
                <div>
                <div class="clearfix"> <br> </div>
                    <h2>Bio:</h2>
                    <?php echo $bio?>
                </div>
                <div class="clearfix"> <br> </div>
                <div>
                    <h2>Age:</h2>
                    <h3><?php $today = date("Y-m-d");
                                $diff = date_diff(date_create($DateOfBirth), date_create($today));   
                                echo $diff->format('%y'); ?></h3>
                </div>
                <div class="clearfix"><br></div>
                <div>
                    <h2>Account Status:</h2>
                    <h3><?php echo $status ;?></h3>
                </div>
                
            </div>
                </i>
                <i>
                    <h2><legend><b>Username:</b></legend></h2>
                    <i><h1><?php echo $UserName; ?></h1></i>
                    <br><br><br>
                    <div>
                <h2>Role:</h2>
                    <?php echo $role?>
                </div>
                    <!--<i><input type="text" name="UserName" class="📦" id="" placeholder="New Username"></i>-->
                </i>
                
            </div>
            



        </form>
    </div>
</body>
<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1 class="Topic">UPDATE MEMBER</h1>

        <?php
        //Get the ID of the Selected album
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

                       // $AlbumNo=$row['AlbumNo'];
                            $FirstName=$row['FirstName'];
                            $MiddleName=$row['MiddleName'];
                            $LastName=$row['LastName'];
                            $ID=$row['ID'];
                            $email=$row['email'];
                            $PhoneNo=$row['PhoneNo'];
                            $Address = $row['Address'];
                            $CurrMemberImage = $row['MemberImage'];
                            $CurrIDImageF = $row['IDImageF'];
                            $CurrIDImageB = $row['IDImageB'];
                            $DateOfBirth = $row['DateOfBirth'];
                            $status = $row['status'];
                            $role = $row['role'];
                
        }
        else 
        {

            //redirect to manage album page
            header('location:'.SITEURL.'admin/manage-members.php');

        }
    }
    if ($role == "CHAIR")
    {
        $roleinput = "CHAIR";
    }
    else
    {
        $roleinput  =   "";
    }
        ?>




<form action="#" method="POST" enctype="multipart/form-data" class= "floatingtable tbl-full">

        <table class= "floatingtable">
        <input type="hidden" name="MemberNo" value="<?php echo $MemberNo?>">
        <tr><td>Current Image</td><td> <img src="<?php echo SITEURL; ?>images/members/<?php echo $CurrMemberImage; ?>" class="memimg" ></td></tr>
            <tr><td>Legal name:</td>
        <td><input class="📦" type="text" name="newFirstName" placeholder="<?php echo $FirstName?>"></td>
        <td><input class="📦" type="text" name="newMiddleName" placeholder="<?php echo $MiddleName?>"></td>
        <td><input class="📦" type="text" name="newLastName" placeholder="<?php echo $LastName?>"></td>
    </tr>
        <tr><td>ID:</td>
        <td><input class="📦" type="text" name="newID" placeholder="<?php echo $ID?>" ></td></tr>
        <tr><td>E-mail Address:</td>
        <td><input type="email" class="📦" name="newemail" placeholder="<?php echo $email?> "></td></tr>
        <tr><td>Phone Number:</td>
        <td><input type="text" class="📦" name="newPhoneNo" placeholder="<?php echo $PhoneNo?> "></td></tr>
        <tr><td>County:</td>
        <td><input type="text" class="📦" name="newAddress" placeholder="<?php echo $Address?> "></td></tr>
        <tr><td>Date of Birth:</td>
        <td><input type="Date" class="📦" name="newDateOfBirth" placeholder="<?php echo $DateOfBirth?> "></td></tr>
        <tr>
            <td>New Member Image: </td>
            <td>
                <input class="📦" type="file" name="MemberImage">
            </td>
        </tr>
        <tr>
            <td>New Front ID Image: </td>
            <td>
                <input class="📦" type="file" name="IDImageF">
            </td>
        </tr>
        <tr>
            <td>New Back ID Image: </td>
            <td>
                <input class="📦" type="file" name="IDImageB">
            </td></tr>
            <tr>
            <td>Membership Status: </td>
            <td>
                        <input class="📦" <?php if($status=="pending"){echo "checked";} ?> type="radio" name="status" value="pending"> Pending 

                        <input class="📦" <?php if($status=="active"){echo "checked";} ?> type="radio" name="status" value="active"> Active
                        
                        <input class="📦" <?php if($status=="suspended"){echo "checked";} ?> type="radio" name="status" value="suspended"> Suspended
                    </td>
                </tr>
                <tr>
            <td>Role: </td>
            <td>
                        <input <?php if($role=="MEMBER"){echo "checked";} ?> type="radio" name="role" value="MEMBER"> MEMBER 
                        <input <?php if($role=="SECRETARY"){echo "checked";} ?> type="radio" name="role" value="SECRETARY"> SECRETARY 
                        <input <?php if($role=="ADMIN"){echo "checked";} ?> type="radio" name="role" value="ADMIN"> ADMIN
                        <input <?php if($role=="CHAIR"){echo "checked";} ?> type="radio" name="role" value="CHAIR"> 
                    </td>
                </tr>
<tr>
<input type="hidden" name="CurrMemberImage" value="<?php echo $CurrMemberImage; ?>">
<input type="hidden" name="CurrIDImageF" value="<?php echo $CurrIDImageF; ?>">
<input type="hidden" name="CurrIDImageB" value="<?php echo $CurrIDImageB; ?>">
                <td colspan= '2'><input type="submit" name='submit' value="Update Member" class= ' 📦 btn-secondary'></td></tr>
</table>
        </form>
    </div>
</div>
<?php
if(isset($_POST['submit']))
{

 //echo "clicked";
 //get all th value from the form 
 
 $newFirstName = mysqli_real_escape_string($conn,$_POST['newFirstName']);
 $newMiddleName = mysqli_real_escape_string($conn,$_POST['newMiddleName']);
 $newLastName = mysqli_real_escape_string($conn,$_POST['newLastName']);
 $newID = mysqli_real_escape_string($conn,$_POST['newID']);
 $newemail = mysqli_real_escape_string($conn,$_POST['newemail']);
 $newPhoneNo = mysqli_real_escape_string($conn,$_POST['newPhoneNo']);
 $newAddress = mysqli_real_escape_string($conn,$_POST['newAddress']);
 $status = mysqli_real_escape_string($conn,$_POST['status']);
 $role = mysqli_real_escape_string($conn,$_POST['role']);
$newDateOfBirth = $_POST['newDateOfBirth'];
$CurrMemberImage = $_POST['CurrMemberImage'];
$CurrIDImageB = $_POST['CurrIDImageB'];
$CurrIDImageF = $_POST['CurrIDImageF'];
if ($newFirstName !=""){
        $FirstName=$newFirstName;
                    };
                    if ($newMiddleName !=""){
                        $MiddleName=$newMiddleName;
                                    };
                                    if ($newLastName !=""){
                                        $LastName=$newLastName;
                                                    };
if ($newID !=""){
    $ID=$newID;
    };
if ($newemail !=""){
        $email=$newemail;
        };
if ($newPhoneNo !=""){
            $PhoneNo=$newPhoneNo;
            };
if ($newAddress !=""){
                $Address=$newAddress;
                };
if ($newDateOfBirth !=""){
                    $DateOfBirth=$newDateOfBirth;
    };
if($roleinput != "")
{
    $role =$roleinput;
}

if(isset($_FILES['MemberImage']['name']))
                {
                    //Upload the Image
                    //To upload image we need image name, source path and destination path
                    $MemberImage = $_FILES['MemberImage']['name'];
                    
                    // Upload the Image only if image is selected
                    if($MemberImage != "")
                    {

                        //Auto Rename our Image
                        //Get the Extension of our image (jpg, png, gif, etc) e.g. "specialfood1.jpg"
                        $ext0 = end(explode('.', $MemberImage));

                        //Rename the Image
                        $MemberImage = "member".rand(000, 999).'.'.$ext0; // e.g. Food_Category_834.jpg
                        

                        $source_path0 = $_FILES['MemberImage']['tmp_name'];

                        $destination_path0 = "../images/members/".$MemberImage;

                        //Finally Upload the Image
                        $upload0 = move_uploaded_file($source_path0, $destination_path0);

                        //Check whether the image is uploaded or not
                        //And if the image is not uploaded then we will stop the process and redirect with error message
                        if($upload0==false)
                        {
                            //SEt message
                            $_SESSION['upload'] = "<div class='error'>Failed to Upload Member Image. </div>";
                            //Redirect to Add CAtegory Page
                            header('location:'.SITEURL.'admin/manage-members.php');
                            //STop the Process
                            die();
                        }

                        //B. Remove the Current Image if available
                        if($CurrMemberImage!="")
                        {
                            $remove_path0 = "../images/members/".$CurrMemberImage;

                            $remove0 = unlink($remove_path0);

                            //CHeck whether the image is removed or not
                            //If failed to remove then display message and stop the processs
                            if($remove0==false)
                            {
                                //Failed to remove image
                                $_SESSION['failed-remove'] = "<div class='error'>Failed to remove Current Member Image.</div>";
                                header('location:'.SITEURL.'admin/manage-members.php');
                                die();//Stop the Process
                            }
                        }
                        

                    }
                    else
                    {
                        $MemberImage = $CurrMemberImage;
                    }
                }
                else
                {
                    $MemberImage = $CurrMemberImage;
                }
if(isset($_FILES['IDImageF']['name']))
                {
                    //Upload the Image
                    //To upload image we need image name, source path and destination path
                    $IDImageF = $_FILES['IDImageF']['name'];
                    
                    // Upload the Image only if image is selected
                    if($IDImageF != "")
                    {

                        //Auto Rename our Image
                        //Get the Extension of our image (jpg, png, gif, etc) e.g. "specialfood1.jpg"
                        $ext = end(explode('.', $IDImageF));

                        //Rename the Image
                        $IDImageF = "IDImageF".rand(000, 999).'.'.$ext; // e.g. Food_Category_834.jpg
                        

                        $source_path = $_FILES['IDImageF']['tmp_name'];

                        $destination_path = "../images/IDImageF/".$IDImageF;

                        //Finally Upload the Image
                        $upload = move_uploaded_file($source_path, $destination_path);

                        //Check whether the image is uploaded or not
                        //And if the image is not uploaded then we will stop the process and redirect with error message
                        if($upload==false)
                        {
                            //SEt message
                            $_SESSION['upload'] = "<div class='error'>Failed to Upload Front ID Image. </div>";
                            //Redirect to Add CAtegory Page
                            header('location:'.SITEURL.'admin/manage-members.php');
                            //STop the Process
                            die();
                        }

                        //B. Remove the Current Image if available
                        if($CurrIDImageF!="")
                        {
                            $remove_path = "../images/IDImageF/".$CurrIDImageF;

                            $remove = unlink($remove_path);

                            //CHeck whether the image is removed or not
                            //If failed to remove then display message and stop the processs
                            if($remove==false)
                            {
                                //Failed to remove image
                                $_SESSION['failed-remove'] = "<div class='error'>Failed to remove Current Front ID Image.</div>";
                                header('location:'.SITEURL.'admin/manage-members.php');
                                die();//Stop the Process
                            }
                        }
                        

                    }
                    else
                    {
                        $IDImageF = $CurrIDImageF;
                    }
                }
                else
                {
                    $IDImageF = $CurrIDImageF;
                }
if(isset($_FILES['IDImageB']['name']))
                {
                    //Upload the Image
                    //To upload image we need image name, source path and destination path
                    $IDImageB = $_FILES['IDImageB']['name'];
                    
                    // Upload the Image only if image is selected
            if($IDImageB != "")
                    {

                        //Auto Rename our Image
                        //Get the Extension of our image (jpg, png, gif, etc) e.g. "specialfood1.jpg"
                        $ext2 = end(explode('.', $IDImageB));

                        //Rename the Image
                        $IDImageB = "IDImageB".rand(000, 999).'.'.$ext2; // e.g. Food_Category_834.jpg
                        

                        $source_path2 = $_FILES['IDImageB']['tmp_name'];

                        $destination_path2 = "../images/IDImageB/".$IDImageB;

                        //Finally Upload the Image
                        $upload2 = move_uploaded_file($source_path2, $destination_path2);

                        //Check whether the image is uploaded or not
                        //And if the image is not uploaded then we will stop the process and redirect with error message
                        if($upload2==false)
                        {
                            //SEt message
                            $_SESSION['upload'] = "<div class='error'>Failed to Upload Back ID Image. </div>";
                            //Redirect to Add CAtegory Page
                            header('location:'.SITEURL.'admin/manage-members.php');
                            //STop the Process
                            die();
                        }

                        //B. Remove the Current Image if available
                        if($CurrIDImageB!="")
                        {
                            $remove_path2 = "../images/IDImageB/".$CurrIDImageB;

                            $remove2 = unlink($remove_path2);

                            //CHeck whether the image is removed or not
                            //If failed to remove then display message and stop the processs
                            if($remove2==false)
                            {
                                //Failed to remove image
                                $_SESSION['failed-remove'] = "<div class='error'>Failed to remove Current Back ID Image.</div>";
                                header('location:'.SITEURL.'admin/manage-members.php');
                                die();//Stop the Process
                            }
                        }
                        

                    }
                    else
                    {
                        $IDImageB = $CurrIDImageB;
                    }
                }
                else
                {
                    $IDImageB = $CurrIDImageB;
                }
                




 
 
 $sql2= "UPDATE tblmember set
 FirstName ='$FirstName'
,LastName ='$LastName'
,MiddleName ='$MiddleName'
,ID = '$ID'
,email = '$email',
PhoneNo = '$PhoneNo',
Address='$Address',
status ='$status',
DateOfBirth = '$DateOfBirth',
MemberImage = '$MemberImage',
IDImageF ='$IDImageF',
IDImageB ='$IDImageB',
role='$role'
  where MemberNo='$MemberNo'";

 //exe

 $res0=mysqli_query($conn, $sql2);

 //check
if($res0==TRUE)
{
   // echo "sql works";
    //query executed and data injected
$_SESSION['update'] ="<div class = 'success'>Member Data Updated</div>";
header('location:'.SITEURL.'admin/manage-members.php');
//redirect


//header("location:".SITEURL.'admin/manage-members.php?');
}
else{

    //echo "failed";
    //fail
    $_SESSION['update'] ="<div class = 'error'>Member Data not Updated</div>";

//redirect

header('location:'.SITEURL.'admin/manage-members.php');
}
}

include('partials/footer.php');?>
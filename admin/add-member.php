<?php include('partials/menu.php')?>
<br>
            <?php
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];//displaying session message
                    unset ($_SESSION['add']);//removing session message
                }
                if(isset($_SESSION['upload']))
                {
                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']);
                }
            ?>
            <br>
            <br>
            <br>

<div class="main-content">
    <div class="wrapper">
        <h1 class="topic">ADD MEMBER</h1>
        <form action="#" method="POST" enctype="multipart/form-data" class= "floatingtable tbl-full">

        <table class= "floatingtable">
            <tr><td>Legal name:</td>
        <td><input class="📦" type="text" name="FirstName" placeholder="First Name"></td>
        <td><input class="📦" type="text" name="MiddleName" placeholder="Middle Name"></td>
        <td><input class="📦" type="text" name="LastName" placeholder="Last Name"></td>
    </tr>
        
        <tr>
                    <td>Select Your Image: </td>
                    <td>
                        <input class="📦" type="file" name="MemberImage">
                    </td>
                </tr>
                <tr><td>ID/Passport No:</td>
        <td><input type="text" name="ID" placeholder="Enter ID" class="📦"></td></tr>
        <tr><td>E-mail Address:</td>
        <td><input class="📦" type="email" name="email" placeholder="Enter Your Email Address"></td></tr>
        <tr><td>UserName:</td>
        <td><input class="📦" type="text" name="UserName" placeholder="Enter Your preferred Username"></td></tr>
        <tr><td>Phone Number</td>
        <td><input class="📦" type="text" name="PhoneNo" placeholder="Enter Phone Number"></td></tr>
        <tr><td>County</td>
        <td><input class="📦" type="text" name="County" placeholder="Enter your current county of residence"></td></tr>
        <tr><td>Role</td>
        <td><select name="role" id="role" class="📦">
            <option value="ADMIN">ADMIN</option>
            <option value="MEMBER">MEMBER</option>
        </select></td></tr>
        <tr><td>Date of Birth</td>
        <td><input class="📦" type="Date" name="DateOfBirth" placeholder="Enter you Date of Birth"></td></tr>
        <tr>
                    <td>Select Your ID Image (front): </td>
                    <td>
                        <input class="📦" type="file" name="IDImageF">
                    </td>
                </tr>

                <tr>
                    <td>Select Your ID Image (back): </td>
                    <td>
                        <input class="📦" type="file" name="IDImageB">
                    </td>
                </tr>
                <tr><td>Password:</td>
        <td><input class="📦" type="password" name="password" placeholder="Enter a Secure Password"></td></tr>
        <tr><td colspan= '2'><input type="submit" name='submit' value="Add Member" class= "📦 btn-secondary"></td></tr>
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
   $role = mysqli_real_escape_string($conn,$_POST['role']);
 $UserName = mysqli_real_escape_string($conn,$_POST['UserName']);
 $FirstName = mysqli_real_escape_string($conn,$_POST['FirstName']);
 $MiddleName = mysqli_real_escape_string($conn,$_POST['MiddleName']);
 $LastName = mysqli_real_escape_string($conn,$_POST['LastName']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $ID = mysqli_real_escape_string($conn,$_POST['ID']);
    $PhoneNo = mysqli_real_escape_string($conn,$_POST['PhoneNo']);
    $County = mysqli_real_escape_string($conn,$_POST['County']);
    $DateOfBirth = mysqli_real_escape_string($conn,$_POST['DateOfBirth']);
    $DateJoined =date("Y-m-d h:i:sa");
    $password = md5($_POST['password']);
    $status = "pending";
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
                        $ext = end(explode('.', $MemberImage));

                        //Rename the Image
                        $MemberImage = "member".rand(000, 999).'.'.$ext; // e.g. Food_Category_834.jpg
                        

                        $source_path = $_FILES['MemberImage']['tmp_name'];

                        $destination_path = "../images/members/".$MemberImage;

                        //Finally Upload the Image
                        $upload = move_uploaded_file($source_path, $destination_path);

                        //Check whether the image is uploaded or not
                        //And if the image is not uploaded then we will stop the process and redirect with error message
                        if($upload==false)
                        {
                            //SEt message
                            $_SESSION['upload'] = "<div class='error'>Failed to Upload Member Image. </div>";
                            //Redirect to Add CAtegory Page
                            header('location:'.SITEURL.'admin/add-member.php');
                            //STop the Process
                            die();
                        }

                    }
                }
                else
                {
                    //Don't Upload Image and set the image_name value as blank
                    $MemberImage="";
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
                        $ext1 = end(explode('.', $IDImageF));

                        //Rename the Image
                        $IDImageF = "IDImageF".rand(000, 999).'.'.$ext1; // e.g. Food_Category_834.jpg
                        

                        $source_path1 = $_FILES['IDImageF']['tmp_name'];

                        $destination_path1 = "../images/IDImageF/".$IDImageF;

                        //Finally Upload the Image
                        $upload1 = move_uploaded_file($source_path1, $destination_path1);

                        //Check whether the image is uploaded or not
                        //And if the image is not uploaded then we will stop the process and redirect with error message
                        if($upload1==false)
                        {
                            //SEt message
                            $_SESSION['upload'] = "<div class='error'>Failed to Upload ID Front Image. </div>";
                            //Redirect to Add CAtegory Page
                            header('location:'.SITEURL.'admin/add-member.php');
                            //STop the Process
                            die();
                        }

                    }
                }
                else
                {
                    //Don't Upload Image and set the image_name value as blank
                    $IDImageF="";
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
                            $_SESSION['upload'] = "<div class='error'>Failed to Upload ID Back Image. </div>";
                            //Redirect to Add CAtegory Page
                            header('location:'.SITEURL.'admin/add-member.php');
                            //STop the Process
                            die();
                        }

                    }
                }
                else
                {
                    //Don't Upload Image and set the image_name value as blank
                    $IDImageB="";
                }
    //sql query
    

$sql = "INSERT INTO tblmember set 
FirstName ='$FirstName'
,LastName ='$LastName'
,MiddleName ='$MiddleName'
,ID ='$ID'
,email = '$email'
,PhoneNo = '$PhoneNo',
Address = '$County',
MemberImage= '$MemberImage',
IDImageF = '$IDImageF',
IDImageB='$IDImageB',
DateOfBirth='$DateOfBirth',
DateJoined='$DateJoined',
password='$password',
role ='$role',
UserName='$UserName',
status='$status'";

$res = mysqli_query($conn, $sql) ;
if ($res==TRUE)
{
    //session variable for successful add
    $_SESSION['add'] = "<div class='success'>Member Added Successfully</div>";
    //redirect page
    header("location:".SITEURL.'admin/add-member.php');
}
 else
 {
    //session variable for unsuccessful add
    $_SESSION['add'] = "<div class='error'>Failed to add member</div>";
    //redirect page
    header("location:".SITEURL.'admin/add-member.php');
 }


}
 
?>
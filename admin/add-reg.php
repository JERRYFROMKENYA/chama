<?php include('partials/menu.php');?>
<div class="main-content">
<?php if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];//displaying session message
                    unset ($_SESSION['add']);//removing session message
                }
                ?>
    <div class="Topic">
        <h1>UPDATE REGISTRATION FEES</h1>
    </div>
    <div class="wrapper">
        <!--Get qualifying member-->
        <?php
        $sqlget="SELECT MemberNo, concat(FirstName,' ',MiddleName,' ',LastName) as MemberName from tblmember where status='pending'";
        $resget=mysqli_query($conn,$sqlget);
        if($resget==TRUE)
        {
            $countget= mysqli_num_rows($resget);
            if ($countget>0)
            {$MemberNoList='';
                while($rowget=mysqli_fetch_assoc($resget))
                {
                    
                    $MemberNoList .="<option value='{$rowget['MemberNo']}'> {$rowget['MemberName']}</option>";
                    
 }
            }
        }
          
        ?>

        <div class="login">
            <form action="#" method="POST" class="Text Center">
                <h3>Member</h3>
                <h4><select name="MemberNo" id="MemberNo" class="📦 " style="padding-right: 75px;">
                   <?php echo $MemberNoList?>
                </select></h4>
                <h3>Amount</h3>
                   <h4><input type="Number" name="Amount" class="📦"></h4>
                    <h3>Date Paid</h3>
                    <h4><input type="date" name="realdate" class="📦"></h4>
                    <input type="submit" name="submit" value="CASH IN" class="📦 btn-secondary">
            </form>
        </div>     
    </div>
</div>

<?php
if(isset($_POST['submit']))
{

 $MemberNo = mysqli_real_escape_string($conn,$_POST['MemberNo']);
 $Amount = mysqli_real_escape_string($conn,$_POST['Amount']);
 $realdate = mysqli_real_escape_string($conn,$_POST['realdate']);
if ($realdate !='')
{
    $DatePaid=$realdate;
}
else
{
    $DatePaid="CURRENT_TIMESTAMP()";
}




$sql="INSERT INTO tblreg 
SET
MemberNo=$MemberNo,
Amount=$Amount,
DatePaid=$DatePaid";

$res=mysqli_query($conn,$sql);
if ($res==TRUE)
{
        //session variable for successful add
        $_SESSION['add'] = "<div class='success'>Amount Posted Successfully</div>";
        //redirect page
        header("location:".SITEURL.'admin/manage-reg.php');
    
}
else
{
        //session variable for successful add
        $_SESSION['add'] = "<div class='error'>Failed</div>";
        //redirect page
        header("location:".SITEURL.'admin/add-reg.php');
    
}
}

?>


<div>
    <?php
    include('partials/footer.php');
    ?>
</div>
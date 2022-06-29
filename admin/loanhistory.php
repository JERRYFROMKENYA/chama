<?php 
include('./partials/menu.php');
$sqlmember="SELECT l.MemberNo, concat(m.FirstName,' ',m.MiddleName,' ',m.LastName) as MemberName from tblmember m , tblloan l where l.MemberNo=m.MemberNo";
$resmember=mysqli_query($conn,$sqlmember);
if ($resmember==TRUE)
{
    $countmember = mysqli_num_rows($resmember);
    if($countmember>0)
    {
        $Memberlist='';
        while($Memberget=mysqli_fetch_assoc($resmember))
        {
            $Memberlist .="<option value='{$Memberget['MemberNo']}'> {$Memberget['MemberName']}</option>";
        }
    }
    
}
?>
<div class="login">
    <?php //echo $id?>
            <form action="#" method="POST" class="Text Center">
                <h1 class="topic">SELECT MEMBER</h1>
                <select name="MemberNo" id="" class="📦">
                        <?php echo $Memberlist?>
                        <option value="*">ALL</option>
                </select>
              
                    <input type="submit" name="submit" value="SELECT" class="📦 btn-secondary">
            </form>
        </div>    
<?php
unset($_SESSION['result']);
$_SESSION['result']='';
if(isset($_POST['submit']))
{
    $MemberNo = mysqli_real_escape_string($conn,$_POST['MemberNo']);
    $_SESSION['result']=$MemberNo;
    header("location:".SITEURL.'admin/loanhistoryresult.php');
}
 ?>
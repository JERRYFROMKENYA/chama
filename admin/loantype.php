<?php
include('./partials/menu.php');
$sql="SELECT * from tblloantype";
$res=mysqli_query($conn,$sql);
$count= mysqli_num_rows($res);
?>


<div class="wrapper">
    <div class="text-center">
        <h1 class="topic">LOAN TYPES</h1>
    </div>
    <div class="clearfix"><br><br></div>
    <div class="flex">
    <a href="<?php echo SITEURL;?>admin/newloantype.php"class='btn-secondary wide '>New Loan Type</a>
    </div>
    <div class="clearfix"><br><br><br></div>
    <table class="tbl-full">
        <tr>
        <th> ID</th>
        <th>Loan Type</th>
        <th>Description</th>
        <th>Period in Months</th>
        <th>Interest</th>
        <th>Actions</th>
        </tr>
        
   
<?php

if ($count>0)
{
    while($row=mysqli_fetch_assoc($res))
    {
        $typeid=$row['typeid'];
        $LoanType=$row['LoanType'];
        $Description=$row['Description'];
        $period=$row['period'];
        $Interest=$row['Interest'];
    }
}
$period=1;
?>

<tr>
    <td><?php echo $typeid ?></td>
    <td><?php echo $LoanType ?></td>
    <td><?php echo $Description ?></td>
    <td><?php echo $period ;if($period >1){echo " months";}else{echo " month";} ?></td>
    <td><?php echo $Interest*100; echo " %" ?></td>
    <td>
    <a href="<?php echo SITEURL;?>admin/update-loantype.php?typeid=<?php echo $typeid; ?>"class='btn-primary'>EDIT</a>
        <a href="<?php echo SITEURL;?>admin/delete-loantype.php?typeid=<?php echo $typeid; ?>"class='btn-danger'>DELETE</a></td>
</tr>

 </table>
</div>
<?php
include('./partials/footer.php')
?>
<?php include('partials/menu.php');
?>
<div class="main-content">
    
    <div class="wrapper"><h1 class="Topic">Manage Members' Registration Fee</h1><br>
    <div class="Topic"><h3>Please Note: Members who are registered and have their account status as
        "pending" will have their accounts automatically activated once a full payment of the registartion fee has been made.
        In the same way all "active" members who have their registration fee compromised will be reverted to pending.
    </h3></div>
    <?php
    
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];//displaying session message
                    unset ($_SESSION['add']);//removing session message
                }
                if(isset($_SESSION['delete']))
                {
                    echo $_SESSION['delete'];//displaying session message
                    unset ($_SESSION['delete']);//removing session message
                }
                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update'];//displaying session message
                    unset ($_SESSION['update']);//removing session message
                }
                if(isset($_SESSION['user-not-found']))
                {
                    echo $_SESSION['user-not-found'];//displaying session message
                    unset ($_SESSION['user-not-found']);//removing session message
                }
                if(isset($_SESSION['pw-no-match']))
                {
                    echo $_SESSION['pw-no-match'];//displaying session message
                    unset ($_SESSION['pw-no-match']);//removing session message
                }
                if(isset($_SESSION['changefail']))
                {
                    echo $_SESSION['changefail'];//displaying session message
                    unset ($_SESSION['changefail']);//removing session message
                }
                if(isset($_SESSION['success']))
                {
                    echo $_SESSION['success'];//displaying session message
                    unset ($_SESSION['success']);//removing session message
                }
            ?>
            
            <div class="grid">
                <a href="add-reg.php"class= 'btn-primary '>PAY MEMBER REGISTRATION</a> <!--<a href="manage-reg.php"class= 'btn-primary'>MANAGE REGISTRATION FEE</a>-->
            </div>
            <table class= "tbl-full" display="inline">
                <tr>
                   <th>Reg ID</th>
                    <th>Name</th>
                    <th>MemberNo</th>
                    <th>Amount</th>
                    <th>Date Paid</th>
                    <th>Actions </th>
                </tr>
                <?php 
                // Query to get all Album
                $sql = "SELECT `r`.`regid` AS `regid`, `m`.`MemberNo` AS `MemberNo`,
                 concat(`m`.`FirstName`,' ',`m`.`MiddleName`,' ',`m`.`LastName`) AS 
                 `LegalName`, `r`.`Amount` AS `Amount`, `r`.`DatePaid` 
                AS `DatePaid` FROM (`tblmember` `m` join `tblreg` `r`) WHERE 
                `m`.`MemberNo` = `r`.`MemberNo`  ";
                //Exe
                $res = mysqli_query($conn, $sql);

                //check
                if($res==TRUE)
                {
                    //Count rows to check whether we have data or not
                    $count = mysqli_num_rows($res);//function to get all the rows

                    $sn=1; //variable
                    //check the no of rows
                    if($count>0){
                        //we have data
                        while($rows=mysqli_fetch_assoc($res))
                        {
                            //uses while loop to get all the data from the database and while loop will run as long as there is data

                            //get individual data
                            $MemberNo=$rows['MemberNo'];
                            $Name=$rows['LegalName'];
                            $regid=$rows['regid'];
                           // $email=$rows['email'];
                           // $PhoneNo=$rows['PhoneNo'];
                            //$Address=$rows['Address'];
                            $Amount = $rows['Amount'];
                            //$IDImageF = $rows['IDImageF'];
                            //$IDImageB=$rows['IDImageB'];
                            $DatePaid=$rows['DatePaid'];
                           // $DateOfBirth=$rows['DateOfBirth'];
                            //Display the values
                            ?>
                            <tr>
                               <!-- <td><?php echo $sn++; ?></td> -->
                    <td class="MemberNo"><?php  echo $regid;  ?></td>
                    
                    <td class="MemberName"><?php echo $Name; ?>
                   <!-- <td>

                                            <?php  
                                                //Chcek whether image name is available or not
                                                if($MemberImage!="")
                                                {
                                                    //Display the Image
                                                    ?>
                                                    
                                                    <img src="<?php echo SITEURL; ?>images/members/<?php echo $MemberImage; ?>" class="memimg" >
                                                    
                                                    <?php
                                                }
                                                else
                                                {
                                                    //DIsplay the MEssage
                                                    echo "<div class='error'>Image not Added.</div>";
                                                }
                                            ?>

                                        </td>-->
                    <td><?php echo $MemberNo; ?></td>
                    <td><?php echo $Amount; ?></td>
                    
                    <td><?php echo $DatePaid; ?></td>
                    <td>
                        <!--<a href="<?php echo SITEURL;?>admin/update.php?MemberNo=<?php echo $MemberNo; ?>"class='btn-secondary'>STATUS UPDATE</a>-->
                        <a onclick='javascript:confirmationDelete($(this));return false;' href="<?php echo SITEURL;?>admin/cashoutverify.php?regid=<?php echo $regid; ?>"class='btn-danger'>Cash Out</a>
                    </td></tr>
                </tr>
                            <?php
                            
                            
                            
                            
    

                        }
                    }
                    else
                    {
                        //we don't

                    }
                }
                
                ?>
                
            </table>
            <script>
                function confirmationDelete(anchor)
{
   var conf = confirm('Are you sure want to delete this record?');
   if(conf)
      window.location=anchor.attr("href");
}
            </script>
            <div class="clearfix"></div>
        </div>
    </div>
    <?php include('partials/footer.php'); ?>
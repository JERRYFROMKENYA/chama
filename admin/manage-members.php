<?php include('partials/menu.php')?>

<div class="main-content">
    
    <div class="wrapper"><h1 class="Topic">Manage Members</h1><br>
    <h4 class="Topic">You are Signed in as <?php echo $_SESSION['logged-in-firstname']; echo " ";echo $_SESSION['logged-in-lastname'];?> </h4>
    <?php
       if(isset($_SESSION['update']))
       {
           echo $_SESSION['update'];//displaying session message
           unset ($_SESSION['update']);//removing session message
       }
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
                if($_SESSION['logged-in-role']=="CHAIR")
                {
                    $lockedbutton1= '<a href="add-member.php"class= "btn-primary ">ADD MEMBER</a>';
                }
                else
                {
                    $lockedbutton1= '';
                }
            ?>
            
            <div class="grid">
                 <?php echo $lockedbutton1 ?><a href="manage-reg.php"class= 'btn-primary'>MANAGE REGISTRATION FEE</a>
            </div>
            <table class= "tbl-full" display="inline">
                <tr>
                   <th>Membership Number</th>
                    <th>Name</th>
                    <th>Member Picture</th>
                    <th>Membership Status</th>
                    <th>Date Joined</th>
                    <th>Actions </th>
                </tr>
                <?php 
                // Query to get all Album
                $sql = "SELECT * from tblmember";
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
                            $FirstName=$rows['FirstName'];
                            $MiddleName=$rows['MiddleName'];
                            $LastName=$rows['LastName'];
                            //$ID=$rows['ID'];
                            $MemberImage=$rows['MemberImage'];
                           // $email=$rows['email'];
                           // $PhoneNo=$rows['PhoneNo'];
                            //$Address=$rows['Address'];
                            $status = $rows['status'];
                            //$IDImageF = $rows['IDImageF'];
                            //$IDImageB=$rows['IDImageB'];
                            $DateJoined=$rows['DateJoined'];
                           // $DateOfBirth=$rows['DateOfBirth'];
                            //Display the values
                            ?>
                            <tr>
                               <!-- <td><?php echo $sn++; ?></td> -->
                    <td class="MemberNo"><?php  echo $MemberNo;  ?></td>
                    
                    <td class="MemberName"><?php echo $FirstName; ?> <?php echo $MiddleName; ?> <?php echo $LastName; ?></td>
                    <td>

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

                                        </td>
                    <td><?php echo $status; ?></td>
                    <td><?php echo $DateJoined; ?></td>
                    <td>
                    <a href="<?php echo SITEURL;?>admin/reviewIDCard.php?MemberNo=<?php echo $MemberNo; ?>"class='btn-secondary'>View More info</a>
                        <a href="<?php echo SITEURL;?>admin/update-member.php?MemberNo=<?php echo $MemberNo; ?>"class='btn-secondary'>UPDATE</a>
                        <!--<a href="<?php echo SITEURL;?>admin/update.php?MemberNo=<?php echo $MemberNo; ?>"class='btn-secondary'>STATUS UPDATE</a>-->
                        <a href="<?php echo SITEURL;?>admin/delete-member.php?MemberNo=<?php echo $MemberNo; ?>"class='btn-danger'>DELETE</a>
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
            <div class="clearfix"></div>
        </div>
    </div>
    <?php include('partials/footer.php'); ?>
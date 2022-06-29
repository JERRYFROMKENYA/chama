<?php include('partials/menu.php'); ?>

    <div class="main-content">
    <div class= "wrapper">
        <h4 class="Topic">You are Signed in as <?php echo $_SESSION['logged-in-firstname']; echo " ";echo $_SESSION['logged-in-lastname'];?> </h4>
            <h1 class="topic">Manage Admins</h1>
            <br>
            <?php
            if($_SESSION['logged-in-role']!="CHAIR")
            {
                $_SESSION['role'] = "<div class='error'>YOU DO NOT HAVE SUFFICIENT PRIVILEGES</div>";
                //redirect page
                header("location:".SITEURL.'admin/');
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
            ?>
            <br>
            <br>
            <br>
            <a href="add-admin.php"class= 'btn-primary'>ADD ADMIN</a>
            <br>
            <br>
            <br>
            

            <table class= "tbl-full" display="inline">
                <tr>
                    <th>Serial Number</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Actions</th>
                </tr>
                <?php 
                // Query to get all admin
                $sql = "SELECT * from tblmember where role='ADMIN' or role='SECRETARY' or role='CHAIR'";
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
                            $LastName=$rows['LastName'];
                            $username=$rows['UserName'];
                            //Display the values
                            ?>
                            <tr>
                                <td><?php echo $sn++; ?></td>
                    <td><?php  echo $FirstName; echo " "; echo $LastName;  ?></td>
                    <td><?php echo $username; ?></td>
                    <td>
                    <a href="<?php echo SITEURL;?>admin/update-password.php?MemberNo=<?php echo $MemberNo; ?>"class='btn-primary'>UPDATE PASSWORD</a>
                        <a href="<?php echo SITEURL;?>admin/delete-admin.php?MemberNo=<?php echo $MemberNo; ?>"class='btn-danger'>DELETE</a>
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
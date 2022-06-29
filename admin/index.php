<?php include('partials/menu.php'); 
  //$id =$_SESSION['logged-in-admin-id'] ;
 //if ( $id != ''){
 //$greetingname="SELECT FirstName from tbladmin where id=$id";
//$greetingexec= mysqli_query($conn,$greetingname);
//$greetingrow=mysqli_fetch_assoc($greetingexec);
//$greetingrow['FirstName']=$_SESSION['logged-in-firstname'];
if($_SESSION['logged-in-firstname']!=''){
    $FirstName=$_SESSION['logged-in-firstname'];
}

else{
    $FirstName = '';
}
?>

    <body>    
    </div>
    <div class="main-content">
        <div class = "Topic greeting">
        <h1 id="greeting"></h1>
        <p class="Topic"><?php
        if ($FirstName != ""){echo $FirstName ;}
        ?></p>
        <h1 class="topic">Here's your summary</h1>
        </div>
        <script src="../js/greeting.js"></script>
    <div class= "wrapper">
            
            <br><br>
            <?php 
                if(isset($_SESSION['profile']))
                {
                    echo $_SESSION['profile'];
                    unset($_SESSION['profile']);
                }
                    if(isset($_SESSION['login']))
                    {
                        echo $_SESSION['login'];
                        unset($_SESSION['login']);
                    }
                    if(isset($_SESSION['role']))
                    {
                        echo $_SESSION['role'];
                        unset($_SESSION['role']);
                    }
                    if(isset($_SESSION['no-login-message']))
                    {
                        echo $_SESSION['no-login-message'];
                        unset($_SESSION['no-login-message']);
                    }
                ?>
                <br><br>
                <div class="flex">
                 <div class="col-4 text-center">

                    <?php 
                        //Sql Query 
                        $sqlcountmember = "SELECT * FROM tblmember";
                        //Execute Query
                        $rescountmember = mysqli_query($conn, $sqlcountmember);
                        //Count Rows
                        $countcountmember = mysqli_num_rows($rescountmember);
                    ?>

                    <h1><?php echo $countcountmember; ?></h1>
                    <br />
                    Registered Member(s)
                </div>   
                </div>
                 

               <!--  <div class="col-4 text-center">

                    <?php 
                        //Sql Query 
                        $sql = "SELECT * FROM tblartist";
                        //Execute Query
                        $res = mysqli_query($conn, $sql);
                        //Count Rows
                        $count = mysqli_num_rows($res);
                    ?>

                    <h1><?php echo $count; ?></h1>
                    <br />
                    Artist(s)
                </div>

                <div class="col-4 text-center">

                    <?php 
                        //Sql Query 
                        $sql2 = "SELECT * FROM tblalbum";
                        //Execute Query
                        $res2 = mysqli_query($conn, $sql2);
                        //Count Rows
                        $count2 = mysqli_num_rows($res2);
                    ?>

                    <h1><?php echo $count2; ?></h1>
                    <br />
                    Album(s)
                </div>

                <div class="col-4 text-center">
                    
                    <?php 
                        //Sql Query 
                        $sql3 = "SELECT * FROM tblorder";
                        //Execute Query
                        $res3 = mysqli_query($conn, $sql3);
                        //Count Rows
                        $count3 = mysqli_num_rows($res3);
                    ?>

                    <h1><?php echo $count3; ?></h1>
                    <br />
                    Total Orders
                </div>
         
                <div class="col-4 text-center">
                    
                    <?php 
                        //Sql Query 
                        $sql3 = "SELECT * FROM tblsong";
                        //Execute Query
                        $res3 = mysqli_query($conn, $sql3);
                        //Count Rows
                        $count3 = mysqli_num_rows($res3);
                    ?>

                    <h1><?php echo $count3; ?></h1>
                    <br />
                   Songs
                </div>
                <div class="col-4 text-center">
                    
                    <?php 
                        //Sql Query 
                        $sql3 = "SELECT * FROM tblcustomer";
                        //Execute Query
                        $res3 = mysqli_query($conn, $sql3);
                        //Count Rows
                        $count3 = mysqli_num_rows($res3);
                    ?>

                    <h1><?php echo $count3; ?></h1>
                    <br />
                    Dedicated Customer(s)
                </div>

                <div class="col-4 text-center">
                    
                    <?php 
                        //Creat SQL Query to Get Total Revenue Generated
                        //Aggregate Function in SQL
                        $sql4 = "SELECT SUM(total) AS Total FROM vieworders WHERE status='complete'";

                        //Execute the Query
                        $res4 = mysqli_query($conn, $sql4);

                        //Get the VAlue
                        $row4 = mysqli_fetch_assoc($res4);
                        
                        //GEt the Total REvenue
                        $total_revenue = $row4['Total'];

                    ?>

                    <h1>$<?php echo $total_revenue; ?></h1>
                    <br />
                    Revenue Generated
                </div>
                <div class="col-4 text-center">
                    
                    <?php 
                        //Sql Query 
                        $sql3 =  "SELECT SUM(total) AS Total FROM vieworders WHERE status='Received'";
                        //Execute Query
                        $res3 = mysqli_query($conn, $sql3);
                        //Count Rows
                        $row3 = mysqli_fetch_assoc($res3);
                        $total_revenue3 = $row3['Total'];
                    ?>

                    <h1>$<?php echo $total_revenue3; ?></h1>
                    <br />
                    Projected Revenue
                </div>

                <div class="clearfix"></div>

            </div>
        </div>-->
        </body>
    
    <?php include('partials/footer.php'); ?>

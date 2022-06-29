<?php include('partials/menu.php'); ?>
<div class="main-content">
    <h1 class="topic"><b>Contributions Overview</b> </h1>
<div class="clearfix"><br><br><br></div>
    <div class="buttons grid">
                
                <a href="<?php echo SITEURL;?>admin/purpose.php?"class='btn-secondary wide'> PURPOSES</a>
                <a href="<?php echo SITEURL;?>admin/contributions.php?"class='btn-secondary wide'>VIEW CONTRIBUTIONS MADE</a>
                <a href="<?php echo SITEURL;?>admin/contribution-history.php?"class='btn-secondary wide'>HISTORY</a>
                </div>
<div class="clearfix"></div>
    <div class= "wrapper grid">
            
            <div class="col-4 text-center">

                    <?php 
                        //Sql Query 
                        $sql = "SELECT * FROM tblcontribpurpose";
                        //Execute Query
                        $res = mysqli_query($conn, $sql);
                        //Count Rows
                        $count = mysqli_num_rows($res);
                    ?>

                    <h1><?php echo $count; ?></h1>
                    <br />
                    <b>Purposes </b>
                </div>


                <div class="col-4 text-center">
                    
                    <?php 
                        
                        $sql0 = "SELECT * FROM tblcontribpurpose WHERE status='active'";

                        //Execute the Query
                        $res0 = mysqli_query($conn, $sql0);

                        //Get the VAlue
                        $count0 = mysqli_num_rows($res0);
                        
                    

                    ?>

                    <h1><?php echo $count0; ?></h1>
                    <br/>
                    <b>Active Contributions</b> 
                </div>


                <div class="col-4 text-center">
                    
                    <?php 
                        //Creat SQL Query to Get Total Revenue Generated
                        //Aggregate Function in SQL
                        $sql1 = "SELECT sum(Amount) as Total FROM tblcontribution";

                        //Execute the Query
                        $res1 = mysqli_query($conn, $sql1);

                        //Get the VAlue
                        $total1 = mysqli_fetch_assoc($res1);
                        
                    

                    ?>

                    <h1><?php echo $_SESSION['currency'];echo " "; echo $total1['Total']; ?></h1>
                    <br />
                    <b>Aggregate Total Raised </b>
                    
                </div>


               <!-- <div class="col-4 text-center">

                    <?php 
                        //Sql Query 
                        $sqlT = "SELECT * FROM tblloantype";
                        //Execute Query
                        $resT = mysqli_query($conn, $sqlT);
                        //Count Rows
                        $countT = mysqli_num_rows($resT);
                    ?>

                    <h1><?php echo $countT; ?></h1>
                    <br />
                    <b>Loan types on offer</b>
                </div>

                <div class="col-4 text-center">

                    <?php 
                        //Sql Query 
                        $sqlr = "SELECT * FROM tblrepay";
                        //Execute Query
                        $resr = mysqli_query($conn, $sqlr);
                        //Count Rows
                        $countr = mysqli_num_rows($resr);
                    ?>

                    <h1><?php echo $countr; ?></h1>
                    <br />
                    <b>Total Repayments</b>
                    
                </div>-->

    </div>
    </div>
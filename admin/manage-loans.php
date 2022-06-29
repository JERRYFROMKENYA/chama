<?php include('partials/menu.php'); ?>
<div class="main-content">
    <h1 class="topic"><b>Loans Overview</b> </h1>
<div class="clearfix"><br><br><br></div>
    <div class=" grid">
                
                <a href="<?php echo SITEURL;?>admin/newloan.php"class='btn-secondary wide '>New Loan</a>
                <a href="<?php echo SITEURL;?>admin/loantype.php"class='btn-secondary wide'>Loan Types</a>
                <a href="<?php echo SITEURL;?>admin/loanhistory.php"class='btn-secondary wide '>Loan History</a>
                </div>
<div class="clearfix"></div>
    <div class= "wrapper grid">
            
            <div class="col-4 text-center">

                    <?php 
                        //Sql Query 
                        $sql = "SELECT * FROM tblloan";
                        //Execute Query
                        $res = mysqli_query($conn, $sql);
                        //Count Rows
                        $count = mysqli_num_rows($res);
                    ?>

                    <h1><?php echo $count; ?></h1>
                    <br />
                    <b>Loans</b>
                </div>


                <div class="col-4 text-center">
                    
                    <?php 
                        //Creat SQL Query to Get Total Revenue Generated
                        //Aggregate Function in SQL
                        $sql0 = "SELECT * FROM tblloan WHERE status='pending'";

                        //Execute the Query
                        $res0 = mysqli_query($conn, $sql0);

                        //Get the VAlue
                        $count0 = mysqli_num_rows($res0);
                        
                    

                    ?>

                    <h1><?php echo $count0; ?></h1>
                    <br/>
                    <b>Loans Pending</b> 
                </div>


                <div class="col-4 text-center">
                    
                    <?php 
                        //Creat SQL Query to Get Total Revenue Generated
                        //Aggregate Function in SQL
                        $sql1 = "SELECT * FROM tblloan WHERE status='overdue'";

                        //Execute the Query
                        $res1 = mysqli_query($conn, $sql1);

                        //Get the VAlue
                        $count1 = mysqli_num_rows($res1);
                        
                    

                    ?>

                    <h1><?php echo $count1; ?></h1>
                    <br />
                    <b>Loans overdue</b>
                    
                </div>


                <div class="col-4 text-center">

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
                    
                </div>
        

    </div>
    </div>
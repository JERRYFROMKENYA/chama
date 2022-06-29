<?php
include('partials/menu.php');
//Get MemberNo passed
$MemberNo=$_GET['MemberNo'];
//Sql to select ID Card for Member passed
$sql0="SELECT * from tblmember where MemberNo='$MemberNo'";
//command exec
$res=mysqli_query($conn,$sql0);
//check if true 
if ($res==TRUE){
//if true then obtain count
                    $count = mysqli_num_rows($res);//function to get the row count
                if($count=1){
    //exec this command while we have data
                     while($rows=mysqli_fetch_assoc($res)){//a while loop to fetch individual data

        $IDImageF = $rows['IDImageF'];
        $FirstName = $rows['FirstName'];
        $MiddleName = $rows['MiddleName'];
        $LastName = $rows['LastName'];
        $IDImageB=$rows['IDImageB'];
        $ID=$rows['ID'];
        $DateOfBirth=$rows['DateOfBirth'];
        $email=$rows['email'];
        $PhoneNo=$rows['PhoneNo'];
        $Address=$rows['Address']
        //Displaying the values
        //Using Grid to display data
        ?>
        
<div class="clearfix"><br><br><br><br><br><br><br><br></div>
<h1 class="Topic">IDENTIFICATION CARD FOR: <?php echo $FirstName?> <?php echo $MiddleName?> <?php echo $LastName?></h1>
<div class="main-content">
<div class="wrapper">
<div class="Topic"><h1>ID No: <?php echo $ID?></h1></div>
<div class="grid">

<?php  
                                                //Chcek whether image name is available or not
                                                if($IDImageF!="")
                                                {
                                                    //Display the Image
                                                    ?>
                                                    
                                                    <img src="<?php echo SITEURL; ?>images/IDImageF/<?php echo $IDImageF; ?>" class="idimg" >
                                                    
                                                    <?php
                                                }
                                                else
                                                {
                                                    //DIsplay the MEssage
                                                    echo "<div class='error'>ID Front not Added.</div>";
                                                }
                                            ?>
<?php  
                                                //Chcek whether image name is available or not
                                                if($IDImageB!="")
                                                {
                                                    //Display the Image
                                                    ?>
                                                    
                                                    <img src="<?php echo SITEURL; ?>images/IDImageB/<?php echo $IDImageB; ?>" class="idimg" >
                                                    
                                                    <?php
                                                }
                                                else
                                                {
                                                    //DIsplay the MEssage
                                                    echo "<div class='error'>ID Back not Added.</div>";
                                                }
                                            ?>


</div>
<div class="clearfix"><br><br></div>


<div class="clearfix"><br><br><br></div>
<div class="contactinfo Topic" style="display: left;">
    <h1 class="Topic">Contact Info
    </h1>
    <ul>
    <li> Email Address:
    <?php echo $email?><br></li>
    <li>Phone Number:
    <?php echo $PhoneNo?><br></li>
    <li>Address:
    <?php echo $Address?><br></li>
    
    </ul>
  

</div>
















<?php



    }

}

};


include('partials/footer.php')

?>
</div></div>



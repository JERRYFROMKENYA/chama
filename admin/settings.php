<?php include('partials/menu.php');?>
<div class="main-content">
<?php if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];//displaying session message
                    unset ($_SESSION['add']);//removing session message
                }
                ?>
    <div class="Topic">
        <h1>UPDATE SETTINGS FEES</h1>
    </div>
    <div class="wrapper">
        <!--Get  settings-->
        <?php
        $sqlget="SELECT * from tblconfig ";
        $resget=mysqli_query($conn,$sqlget);
        if($resget==TRUE)
        {
            $countget= mysqli_num_rows($resget);
            if ($countget>0)
            {$settinglist='';
                while($rowget=mysqli_fetch_assoc($resget))
                {
                    
                    $settinglist .="<option value='{$rowget['id']}'> {$rowget['Setting']}</option>";
                   // $Description .=$rowget['Description'];
                }
            }
        }
 
         
        ?>

        <div class="login">
            <form action="#" method="POST" class="Text Center">
                <h3>Setting</h3>
                <h4><select name="id" id="id" class="📦 " style="padding-right: 75px;">
                   <?php echo $settinglist?>
                </select></h4>
                    <input type="submit" name="submit" value="SELECT" class="📦 btn-secondary">
            </form>
        </div>     
    </div>
</div>

<?php
if(isset($_POST['submit']))
{
    $id=$_POST['id'];
    $_SESSION['setting-being-edited']= $id;
    header("location:".SITEURL."admin/selsetting.php?".$_SESSION['setting-being-edited']);
}

 ?>
    <?php
    include('partials/footer.php');
    ?>
</div>
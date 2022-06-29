<?php
include('partials/menu.php');
if (isset($_SESSION['setting-being-edited'])){
  $id = $_SESSION['setting-being-edited'];
 
}
else
{
            //session variable for successful add
            $_SESSION['add'] = "<div class='error'>Select a setting</div>";
            //redirect page
            header("location:".SITEURL.'admin/settings.php');
}

$sql00= "SELECT * from tblconfig where id=$id";
$res00= mysqli_query($conn,$sql00);
$count00 =mysqli_num_rows($res00);
 if ($count00==1)
 {
     $settingdata= mysqli_fetch_assoc($res00);
        $Description= $settingdata['Description'];
        $Setting= $settingdata['Setting'];
        $oldvalue= $settingdata['value'];
 }

 if($id==3)
 {
     $valueitem='<input type="radio" value="on" name="newvalue" id="">ON
                <input type="radio" value="off" name="newvalue" id="">OFF';
 }
 else{
     $valueitem='<input type="text" name="newvalue" class="📦" placeholder="">';
 }
 ?>


<div class="login">
    <?php //echo $id?>
            <form action="#" method="POST" class="Text Center">
                
                <h1><?php echo $Setting ?></h1>
                <h3>Description</h3>
                <p><?php echo $Description?></p>
                <h3>Value:</h3>
                <h4>old value:<?php echo $oldvalue ?></h4>
                <?php echo $valueitem;?>
                    <input type="submit" name="submit" value="UPDATE" class="📦 btn-secondary">
            </form>
        </div>    

<?php
if(isset($_POST['submit']))
{
    $newvalue = mysqli_real_escape_string($conn,$_POST['newvalue']);
        if($newvalue=='')
        {
            $value = $oldvalue;
        }
        else{
                $value=$newvalue;
        }

$sql01="UPDATE tblconfig set value='$value' where id='$id'";
$res01=mysqli_query($conn,$sql01);
        if ($res01==TRUE)
        {
             //session variable for successful add
             $_SESSION['add'] = "<div class='success'>Setting Updated</div>";
             //redirect page
             header("location:".SITEURL.'admin/settings.php');
        }
        else
        {
             //session variable for successful add
             $_SESSION['add'] = "<div class='error'>Setting Failed</div>";
             //redirect page
             header("location:".SITEURL.'admin/settings.php');
        }
        unset($_SESSION['setting-being-edited']);  
}

?>
<?php

    include('partials/footer.php');
    ?>
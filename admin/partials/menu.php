<?php include('../admin/config/constants.php');
  include('login-check.php');
  include('autoupdate.php');
  $id =$_SESSION['logged-in-admin-id'] ;
  $lockedmenuitem="";
  if($_SESSION['logged-in-role']=="CHAIR")
  {
      $lockedmenuitem='<li ><a href="manage-admin.php">ADMIN</a></li>';
  }
  //echo $_SESSION['logged-in-MemberNo'];
  ?>


<html>
    <head>
        <title></title>
        
    <link rel="stylesheet" href="../css/admin.css">
</head>
    <div class="📜">
        <div class= "wrapper drop" id="drop">
            <ul> <li><a href="profile.php"><div class="Topic profile"><img src="../images/members/<?php echo $_SESSION['MemberImage'];?>"
             class="avatar" alt=""><h5><?php echo $_SESSION['logged-in-username']?></h5>
              <h6><?php echo $_SESSION['logged-in-role'] ?></h6></a>
             </div></li></ul>
       
            <ul>
                <li ><a href="index.php">HOME</a></li>
               
                <li ><a href="manage-members.php">MEMBERS</a></li>
                <?php echo $lockedmenuitem ?>
                <li ><a href="manage-loans.php">LOANS</a></li>
                <li ><a href="manage-contributions.php">CONTRIBUTIONS</a></li>
                <li ><a href="manage-communications.php">COMMUNICATIONS</a></li>
                <li><a href="settings.php">SETTINGS</a></li>
                <!--<li><a href="manage-songs.php">SONGS</a></li>
                <li><a href="manage-artists.php">ARTISTS</a></li>
                <li> <a href="view-orders.php">ORDERS</a></li>
                --><!--<li>user id: <?php echo $_SESSION['logged-in-admin-id'] ?></li>-->
                <li ><a href="logout.php">LOGOUT</a></li>
                <li><a href="settings.php"><?php echo $_SESSION['auto-update'];?></a></li>


            </ul>
        </div>
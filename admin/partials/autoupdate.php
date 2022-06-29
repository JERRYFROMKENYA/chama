<?php
$sqlautoupdate = "SELECT value from tblconfig where Setting='auto-update'";
$resautoupdate = mysqli_query($conn,$sqlautoupdate);
$switchautoupdate = mysqli_fetch_assoc($resautoupdate);
if($switchautoupdate['value']=='on')
{
    //obtaining setting for currency
$rescurrency=mysqli_query($conn,"SELECT value from tblconfig where Setting ='currency'");
$currencysetting=mysqli_fetch_assoc($rescurrency);
$_SESSION['currency']=$currencysetting['value'] ;
//include('../config/constants.php');
$res1='1';
//$sql0= "Call  membershipactivation()";
//$res0 = mysqli_query($conn, $sql0);
///Membership activation start
//1. Get qualifying Members
$resregamountsettings=mysqli_query($conn,"SELECT value from tblconfig where Setting = 'registrationfee'");
$allsettings=mysqli_fetch_assoc($resregamountsettings);
$registrationamount = $allsettings['value'];
//echo $allsettings['value'];
//echo $registrationamount;

$sqlactive="SELECT `tblreg`.`MemberNo` AS `MemberNo`, `tblmember`.`status` AS `status`, 
sum(`tblreg`.`Amount`) AS `Total` 
 FROM (`tblreg` join `tblmember`) where (`tblreg`.`Amount`) >=$registrationamount 
GROUP BY `tblreg`.`MemberNo`;";
$resactive=mysqli_query($conn,$sqlactive);
if ($resactive==TRUE)
{
    $countactive=mysqli_num_rows($resactive);
    if($countactive>0)
    {
        $MemberNo='';
        while($allactive=mysqli_fetch_assoc($resactive))
        {
            $sqlactivation="UPDATE tblmember set status='active' where MemberNo='{$allactive['MemberNo']}' AND status='pending'";
            $resactivation=mysqli_query($conn,$sqlactivation);
        }
        

    }
    else
    {
        $resactivation='1';
    }
}



//Membership activation end
//Membershipdeactivation start
//1. Get qualifying Members

$sqlinactive="SELECT MemberNo from tblmember where MemberNo NOT IN(select `tblreg`.`MemberNo` AS `MemberNo` 
FROM (`tblreg` join `tblmember`) where (`tblreg`.`Amount`) >= $registrationamount 
GROUP BY `tblreg`.`MemberNo`);";
$resinactive=mysqli_query($conn,$sqlinactive);
if ($resinactive==TRUE)
{
    $countinactive=mysqli_num_rows($resinactive);
   //echo $countinactive;
    if($countinactive>0)
    {
        
        while($allinactive=mysqli_fetch_assoc($resinactive))
        {
            $sqldeactivation="UPDATE tblmember set status='pending' where MemberNo='{$allinactive['MemberNo']}' AND status='active'";
            $resdeactivation=mysqli_query($conn,$sqldeactivation);
        }
        

    }
    else
    {
        $resdeactivation='1';
    }


}



///Membership activation end*/
//Overdue Loan Script uses a sub-routine in the DB itself
//loan status update

include('autoupdate-assets/loanstatus.php');

//loan status update end
/*
$sqloverdue= "SELECT * from tblloan where datedue < current_date() and status !='overdue'";//set status='overdue' where (datedue) < current_date()";
$resoverdue= mysqli_query($conn, $sqloverdue);
if ($resoverdue ==TRUE)
{
 $countoverdue=mysqli_num_rows($resoverdue);
    if($countoverdue>0)
    {
        while($alloverdue=mysqli_fetch_assoc($resoverdue))
    {
        $sqloverdueupdate="UPDATE tblloan set status='overdue' where loanid='{$alloverdue['loanid']}'";
        $resoverdueupdate= mysqli_query($conn,$sqloverdueupdate);
    }
    }
    else
    {
        $resoverdueupdate='1';
    }
    
}*/
 //echo $countoverdue;
//$sql1=" call overdueloan()";
//$res1 = mysqli_query($conn,$sql1);
//overdue loan script end
//suspension update
$sqlsuspension= "SELECT MemberNo from tblloan where status ='overdue'";//set status='overdue' where (datedue) < current_date()";
$ressuspension= mysqli_query($conn, $sqlsuspension);
if ($ressuspension ==TRUE)
{
 $countsuspension=mysqli_num_rows($ressuspension);
    if($countsuspension>0)
    {
        while($allsuspension=mysqli_fetch_assoc($ressuspension))
    {
        $sqlsuspensionupdate="UPDATE tblmember set status='suspended' where MemberNo='{$allsuspension['MemberNo']}'";
        $ressuspensionupdate= mysqli_query($conn,$sqlsuspensionupdate);
    }
    }
    else
    {
        $ressuspensionupdate='1';
    }
    
}

//suspension update end
//undo suspension update
$sqlxsuspension= "SELECT MemberNo from tblloan where status ='cleared'";//set status='overdue' where (datedue) < current_date()";
$resxsuspension= mysqli_query($conn, $sqlxsuspension);
if ($resxsuspension ==TRUE)
{
 $countxsuspension=mysqli_num_rows($resxsuspension);
    if($countxsuspension>0)
    {
        while($allxsuspension=mysqli_fetch_assoc($resxsuspension))
    {
        $sqlxsuspensionupdate="UPDATE tblmember set status='active' where MemberNo='{$allxsuspension['MemberNo']}'";
        $resxsuspensionupdate= mysqli_query($conn,$sqlxsuspensionupdate);
    }
    }
    else
    {
        $resxsuspensionupdate='1';
    }
    
}

//suspension update end


//Auto Update Checker
if ( $resactivation && $resdeactivation ==TRUE)
{
    if( $countactive || $countinactive || $countoverdue >0)
    {
        $_SESSION['auto-update'] = "<div class='success'>⏳Auto Update in progress...</div>";
    }
    else
    {
        $_SESSION['auto-update'] = "<div class='success'>😊Auto Update Idle...</div>";
    }
    
}
else
{
    $_SESSION['auto-update'] = "<div class='error'>⚠️Contact System Administrator Auto Update is not functioning...</div>";
}

}
else
{
    $_SESSION['auto-update'] = "<div class='error'>⚠️Auto Update is off.</div>";
}

?>

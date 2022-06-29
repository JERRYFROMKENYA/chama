<?php 
//obtain setting for grace period
$sqlgp = "SELECT value from tblconfig where Setting='graceperiod'";
$resgp = mysqli_query($conn,$sqlgp);
$rowgp = mysqli_fetch_assoc($resgp);
$_SESSION['graceperiod'] = $rowgp['value'];

//
$presql= "SELECT MemberNo from tblmember";
$preres= mysqli_query($conn,$presql);
$MemberNo= mysqli_fetch_assoc($preres)['MemberNo'];


if ($MemberNo != '')
{
    $sql= "SELECT l.loanid, m.MemberNo, concat(m.FirstName,' ',m.MiddleName,' ',m.LastName) as MemberName, t.LoanType, l.Principal,
    ((l.Principal*(1+(t.interest)*t.period))-r.Amount) as AmountDue, l.DateDue from tblloan l, tblmember m, tblloantype t, tblrepay r where m.MemberNo=$MemberNo 
    and l.typeid=t.typeid and r.loanid=l.loanid;";
    $res=mysqli_query($conn,$sql);
    
}
$row=mysqli_fetch_assoc($res);
if($row['loanid']=='' && $MemberNo !='')
{
    $sql= "SELECT l.loanid, m.MemberNo, concat(m.FirstName,' ',m.MiddleName,' ',m.LastName) as MemberName, t.LoanType, l.Principal, l.status,
    ((l.Principal*(1+(t.interest)*t.period))) as AmountDue, l.DateDue from tblloan l, tblmember m, tblloantype t where m.MemberNo=$MemberNo
    and l.typeid=t.typeid and m.MemberNo=l.MemberNo ";
     $res=mysqli_query($conn,$sql);
    
}
$row= mysqli_fetch_assoc($res);
        $loanid= $row['loanid'];
        $MemberNo= $row['MemberNo'];
        $MemberName = $row['MemberName'];
        $LoanType = $row['LoanType'];
        $Principal = $row['Principal'];
        $AmountDue= $row['AmountDue'];
        $int_status= $row['status'];
        $DateDue =$row['DateDue'];
        if($DateDue != '')
        {
        $datetime1 = strtotime(date('Y-m-d', strtotime($DateDue)));
        $datetime2 = strtotime(date('Y-m-d', strtotime(date('Y-m-dh:i:s'))));
        $timediff =($datetime2 - $datetime1)/86400 ;//result is in days  
        }
     
        if($loanid=='')
        {
        $loanid= '';
        $MemberNo= "";
        $MemberName = "";
        $LoanType = "";
        $Principal = "";
        $AmountDue= "";
        $int_status= "";
        $DateDue ="";
        $datetime1 = "";
        $datetime2 = "";
        $timediff ="";
        }else{
            if($AmountDue == 0){$status="cleared";}
                if($AmountDue >0 && $AmountDue<$Principal)
                {$status= "being-serviced";}
                if($AmountDue > 0 && $DateDue < date('Y-m-dh:i:s'))
                {$status= "overdue" ;}
                if($DateDue < date('Y-m-dh:i:s') && $timediff > $_SESSION['graceperiod'])
                {$status= "defaulted" ;}
                //echo $AmountDue

$sql1="UPDATE tblloan set status='$status' where loanid='$loanid'";
$res1= mysqli_query($conn,$sql1);
        }

        
?>


<?php 
include('./partials/menu.php');
 if(isset($_SESSION['result']))
{  $MemberNo=$_SESSION['result'];
    echo $MemberNo;
/*unset($_SESSION['result'])*/;}

if ($MemberNo != '*' )
{
    $sql= "SELECT l.loanid, m.MemberNo, concat(m.FirstName,' ',m.MiddleName,' ',m.LastName) as
     MemberName, t.LoanType, l.Principal,
    ((l.Principal*(1+(t.interest)*t.period))-r.Amount) 
    as AmountDue, l.DateDue from tblloan l, tblmember m, tblloantype t, tblrepay r
     where m.MemberNo='$MemberNo'
    and l.typeid=t.typeid and r.loanid=l.loanid;";
    $res=mysqli_query($conn,$sql);
    echo "True";
    
}
else
{
    $sql= "SELECT l.loanid, m.MemberNo, concat(m.FirstName,' ',m.MiddleName,' ',m.LastName) as MemberName, t.LoanType, l.Principal,
    ((l.Principal*(1+(t.interest)*t.period))-r.Amount) as AmountDue, l.DateDue from tblloan l, tblmember m, tblloantype t, tblrepay r where m.MemberNo=l.MemberNo 
    and l.typeid=t.typeid and r.loanid=l.loanid;";
     $res=mysqli_query($conn,$sql);
     
}
$row=mysqli_fetch_assoc($res);
if($row['loanid']=='' && $MemberNo !='*')
{
    $sql= "SELECT l.loanid, m.MemberNo, concat(m.FirstName,' ',m.MiddleName,' ',m.LastName) as MemberName, t.LoanType, l.Principal,
    ((l.Principal*(1+(t.interest)*t.period))) as AmountDue, l.DateDue from tblloan l, tblmember m, tblloantype t where m.MemberNo=$MemberNo
    and l.typeid=t.typeid and m.MemberNo=l.MemberNo ";
     $res=mysqli_query($conn,$sql);
}
elseif($row['loanid']=='' && $MemberNo =='*')
{
    $sql= "SELECT l.loanid, m.MemberNo, concat(m.FirstName,' ',m.MiddleName,' ',m.LastName) as MemberName, t.LoanType, l.Principal,
    ((l.Principal*(1+(t.interest)*t.period))) as AmountDue, l.DateDue from tblloan l, tblmember m, tblloantype t where m.MemberNo=l.MemberNo 
    and l.typeid=t.typeid ";
    $res=mysqli_query($conn,$sql);
    
}
$row= mysqli_fetch_assoc($res);
        $loanid= $row['loanid'];
        $MemberNo= $row['MemberNo'];
        $MemberName = $row['MemberName'];
        $LoanType = $row['LoanType'];
        $Principal = $row['Principal'];
        $AmountDue= $row['AmountDue'];
        $DateDue =$row['DateDue'];
        if ($DateDue != "")
        {
        $datetime1 = strtotime(date('Y-m-d', strtotime($DateDue)));
        $datetime2 = strtotime(date('Y-m-d', strtotime(date('Y-m-dh:i:s'))));
        $timediff =($datetime2 - $datetime1)/86400 ;   
        }
       //result is in days


?>
<div class="wrapper"><div class="topic greeting">
    <h1>Loan History</h1>
</div>
<div class="clearfix"><br></div>
<div class="#">
 <table class= "tbl-full " >
 <tr>
                   <th>Loan ID</th>
                    <th>Name</th>
                    <th>Loan Type</th>
                    <th>Principal</th>
                    <th>Loan Status</th>
                    <th>Date Due</th>
                    <th>Actions</th>
                </tr>   
<tr>
    <td><?php echo $loanid ?></td>
    <td><?php echo $MemberName?></td>
    <td><?php echo $LoanType ?></td>
    <td><?php echo $_SESSION['currency'];echo " " ;echo $Principal ?></td>
    <td><?php if($AmountDue == 0){echo "<div class=' success'>CLEARED</div>";}
                if($AmountDue >0 && $AmountDue<$Principal)
                {echo "<div class=' success'>BEING SERVICED</div>";}
                if($AmountDue > 0 && $DateDue < date('Y-m-dh:i:s') && $timediff < $_SESSION['graceperiod']){echo "<div class=' bold error '>OVERDUE</div>" ;}
                if( $timediff > $_SESSION['graceperiod']){echo "<div class=' bold error '>DEFAULTED</div>" ;}
                //echo $AmountDue
                ?>
                </td>
    <td><?php echo $DateDue ?></td>
    <td><button class="📦 btn-secondary" onclick= "amountdue()">Amount Due</button></td>
    <script>
        function amountdue(){
            var x = <?php echo $AmountDue ?>; 
             alert('The Amount Due for <?php echo $MemberName ?> is : <?php echo $_SESSION['currency'] ?>'+' '+x);
        }
        
    </script>
    
</tr>
</table>   
</div>

 </div>

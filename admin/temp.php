<?php
include('config/constants.php');


$sql="select MemberNo NOT IN( select sum(Amount) >=1000) from tblreg";
// Check if there are results
if ($result = mysqli_query($conn, $sql)) {
    // If so, then create a results array and a temporary one
    // to hold the data
    $resultArray = array();
    $tempArray = array();
};

echo count($resultArray);
?>
<?php

session_start();

$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'fundraiser');

$id=filter_input(INPUT_POST,'id_event_donate');
echo $id;
$s = " select * from events where id='$id'";

$result = mysqli_query($con, $s);
$received=-1;
$total=-1;
while($rows=$result->fetch_assoc())
{
    $total=$rows['totalamount'];
    $received=$rows['receivedamount'];
}

$amountDonated = filter_input(INPUT_POST,'amount_donated');
$amount=$amountDonated+$received;
if($total!=-1 && $received!=-1){
if($amount<$total){
    $su = " update events SET receivedamount='$amount' Where id='$id'";
    $result = mysqli_query($con, $su);
    echo '<script>alert("Sucessfully Donated! Thanks")</script>';
    header('location:index.php');
} else {
    $sdel = " delete from events Where id='$id'";
    $result = mysqli_query($con, $sdel);
    echo '<script>alert("succesfully Donated! Total amount reached! Thanks")</script>';
    header('location:index.php');
}
} else {
    echo "Invalid Id";
}
?>
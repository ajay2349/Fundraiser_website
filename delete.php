<?php

session_start();

$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'fundraiser');

$id=filter_input(INPUT_POST,'id_event');
echo $id;
$s = " delete from events where id='$id'";

if(mysqli_query($con, $s)){
echo '<script>alert("Deleted Sucessfully")</script>';
header('location:deleteevent.php');
}
else {
    echo '<script>alert("could not delete")</script>';  
}
?>
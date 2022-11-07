<?php

session_start();

$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'fundraiser');

$title = $_POST['title'];
$desc = $_POST['description'];
$tamount = $_POST['tamount'];
$type = $_POST['type'];

$s = " insert into events (title,description,totalamount,receivedamount,type) values('$title','$desc','$tamount','$ramount','$type')";

if(mysqli_query($con, $s)){
    echo '<script>alert("created Sucessfully")</script>';
    header('location:index.php');
}
else {
    echo '<script>alert("could not create")</script>';  
}
?>
<?php

session_start();

$con = mysqli_connect('localhost','root','');

mysqli_select_db($con, 'fundraiser');

$fullname = $_POST['fullname'];
$email = $_POST['username'];
$password = $_POST['password'];

$s = " select * from users where email = '$email' && password = '$password'";

$result = mysqli_query($con, $s);
$num = mysqli_num_rows($result);

if($num == 1) {
    $_SESSION['username']=$email;
    if($email=='admin@gmail.com'){
        echo '<script>alert("login Sucessfully")</script>';
        header('location:adminpage.html');
    } else {
        echo '<script>alert("login Sucessfully")</script>';
        header('location:index.php');
    } 
} else {
    echo '<script>alert("login failed")</script>';
   header('location:login.html');
}
?>
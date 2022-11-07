<?php

session_start();

$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'fundraiser');

$fullname = $_POST['fullname'];
$email = $_POST['email'];
$password = $_POST['password'];

$s = " select * from users where email = '$email'";

$result = mysqli_query($con, $s);
$num = mysqli_num_rows($result);

if($num == 1) {
    echo '<script>alert("user already present")</script>';
} else {
    $reg = "insert into users(fullname, email, password) values('$fullname','$email','$password')";
    mysqli_query($con,$reg);
    echo '<script>alert("registration Sucessfull")</script>';
    header('location:login.php')
}
?>
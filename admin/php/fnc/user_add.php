<?php
session_start();
include "../mysql.php";
include "../crypt.php";

$userid       = 1;
$pass         = 1;
$username     = $_POST['username'];
$userphone    = $_POST['phone'];
$useremail    = $_POST['email'];



mysqli_query($con,$sql);

mysqli_close($con);
?>

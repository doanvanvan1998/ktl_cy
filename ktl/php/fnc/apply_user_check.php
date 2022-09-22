<?php
session_start();
include "../mysql.php";
include "../crypt.php";

$username   = $_POST['username'];
$useremail  = $_POST['useremail'];
$userpass   = $_POST['userpass'];

$useremail = Encrypt($useremail,$secret_key,$secret_iv);
$userpass = Encrypt($userpass,$secret_key,$secret_iv);

$query="select COUNT(*) from recruit_able_user where username='$username' and email='$useremail' and pass='$userpass'";
$result = mysqli_query($con,$query);
$row = mysqli_fetch_array($result);

if($row[0] != 0) { echo "success"; }
else { echo "fail"; }

?>

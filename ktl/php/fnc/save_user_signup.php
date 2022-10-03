<?php
session_start();
include "../mysql.php";
include "../crypt.php";
$username = $_POST["username"];
$userphone = $_POST["userphone"];
$useremail = $_POST["useremail"];
$userpass = $_POST["userpass"];
$acept_rule =$_POST["acept_rule"];

mysqli_query($con, "set names utf8");
mysqli_query($con, "insert into recruit_able_user(username,phone,email,pass,acept_rule,status_pass)
  VALUES('$username','$userphone',MD5('$useremail'),MD5('$userpass'),$acept_rule ,0)");

mysqli_close($con);

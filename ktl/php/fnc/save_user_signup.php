<?php

include "../mysql.php";
include "../crypt.php";

if (isset($_POST['username'])) {
    $username = $_POST["username"];
    $userphone1 = $_POST["userphone"];
    $useremail1 = $_POST["useremail"];
    $userpass1 = $_POST["userpass"];
    $acept_rule = $_POST["acept_rule"];
    $rand_code = $_POST["rand_code"];


    $useremail = Encrypt($useremail1, $secret_key, $secret_iv);
    $userphone = Encrypt($userphone1, $secret_key, $secret_iv);
    $userpass = Encrypt($userpass1, $secret_key, $secret_iv);
    $query = "insert into recruit_able_user(username,phone,email,pass,acept_rule,status_pass,rand_code)
  VALUES('$username','$userphone','$useremail','$userpass',$acept_rule ,0,$rand_code)";
    echo $query;
    mysqli_query($con, "set names utf8");
    mysqli_query($con, "insert into recruit_able_user(username,phone,email,pass,acept_rule,status_pass,rand_code)
  VALUES('$username','$userphone','$useremail','$userpass',$acept_rule ,0,$rand_code)");

    mysqli_close($con);
}

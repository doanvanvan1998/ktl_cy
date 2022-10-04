<?php

include "../mysql.php";
include "../crypt.php";

$username = $_POST["username"];
$userphone1 = $_POST["userphone"];
$useremail1 = $_POST["useremail"];
$userpass1 = $_POST["userpass"];
$acept_rule = $_POST["acept_rule"];
$rand_code = $_POST["rand_code"];
$round_one = 0 ;
$round_two = 0 ;
$round_three = 0;

$useremail = Encrypt($useremail1, $secret_key, $secret_iv);
$userphone = Encrypt($userphone1, $secret_key, $secret_iv);
$userpass = Encrypt($userpass1, $secret_key, $secret_iv);

$query = "select COUNT(*) from recruit_able_user where email='$useremail'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);
if ($row[0] != 0) {
    echo "error";
}

$query = "select COUNT(*) from recruit_able_user where phone='$userphone'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);

if ($row[0] != 0) {
    echo "error";

}


mysqli_query($con, "set names utf8");
mysqli_query($con, "insert into 
    recruit_able_user(username,
                      phone,
                      email,
                      pass,
                      acept_rule,
                      status_pass,
                      rand_code,
                      round_one,
                      round_two,
                      round_three,
                      note,active)
  VALUES('$username',
         '$userphone',
         '$useremail',
         '$userpass',
         $acept_rule,
         0,
         $rand_code,0,0,0,0,0)");
mysqli_close($con);

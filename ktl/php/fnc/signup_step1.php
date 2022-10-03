<?php
session_start();
include "../mysql.php";
include "../crypt.php";


$name = $_POST["name"];
$phone=$_POST["phone"];
$email=$_POST["email"];
$address=$_POST["address"];
$disabilities=$_POST["disabilities"];
$level_disabilities=$_POST["level_disabilities"];
$content_disabilities=$_POST["content_disabilities"];
$duty=$_POST["duty"];
$single_user=$_POST["single_user"];
$meritorious_person=$_POST["meritorious_person"];
$low_benefit=$_POST["low_benefit"];
$korea_migrate=$_POST["korea_migrate"];
$son_of_korea_migrate=$_POST["son_of_korea_migrate"];

$query ="insert into apply_step_1(name,phone,email,able_address,is_disabilities,is_military_service,applicator,veterans,low_income,immigrant,children_of_migrant_families)
  VALUES('$name','$phone','$email','$address',$disabilities,$level_disabilities,$content_disabilities,$duty,$single_user,$meritorious_person,$low_benefit,$korea_migrate,$son_of_korea_migrate)";
echo $query;

mysqli_query($con,"set names utf8");
mysqli_query($con,"insert into apply_step_1(name,phone,email,able_address,is_disabilities,level_disabilities,content_disabilities,is_military_service,applicator,veterans,low_income,immigrant,children_of_migrant_families)
  VALUES('$name','$phone','$email','$address',$disabilities,$level_disabilities,$content_disabilities,$duty,$single_user,$meritorious_person,$low_benefit,$korea_migrate,$son_of_korea_migrate)");

mysqli_close($con);
?>
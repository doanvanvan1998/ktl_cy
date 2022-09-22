<?php
  session_start();
  include "../mysql.php";
  include "../crypt.php";

  $objection_title       = $_POST['objection_title'];
  $objection_type        = $_POST['objection_type'];
  $objection_username    = $_POST['objection_username'];
  $objection_phone       = $_POST['objection_phone'];
  $objection_email       = $_POST['objection_email'];
  $objection_subject     = $_POST['objection_subject'];
  $objection_contents     = $_POST['objection_contents'];
  $objection_pass        = $_POST['objection_pass'];

  $objection_phone = Encrypt($objection_phone,$secret_key,$secret_iv);
  $objection_email = Encrypt($objection_email,$secret_key,$secret_iv);

  mysqli_query($con,"insert into objection_info(title,objection_type,username,phone,email,subject,contents,objection_pass,date)
  VALUES('$objection_title','$objection_type','$objection_username','$objection_phone','$objection_email','$objection_subject','$objection_contents',MD5('$objection_pass'),NOW())");

  mysqli_close($con);
?>

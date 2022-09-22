<?php
  session_start();
  include "../mysql.php";
  include "../crypt.php";
  $username = $_POST["username"];
  $contents = $_POST["contents"];
  $viewtype = $_POST["viewtype"];
  $subject = $_POST["subject"];
  $viewtype_pass = $_POST["viewtype_pass"];
  $inquiry_type = $_POST["inquiry_type"];

  mysqli_query($con,"insert into employment_list(inquiry_type,type,subject,contents,write_user,hits,pass,date)
  VALUES('$inquiry_type','$viewtype','$subject','$contents','$username',0,MD5('$viewtype_pass'),NOW())");

  mysqli_close($con);
?>

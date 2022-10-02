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
 mysqli_query($con,"set names utf8");
  mysqli_query($con,"insert into manager_faq(classify,title,createby,is_public,code_allow,content_reply,context_question,create_date)
  VALUES('$inquiry_type','$subject','$username',$viewtype,MD5('$viewtype_pass'),'','$contents',NOW())");

  mysqli_close($con);
?>

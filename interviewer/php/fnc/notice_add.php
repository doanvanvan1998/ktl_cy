<?php
  session_start();
  include "../mysql.php";
  $Id   = $_POST['Id'];
  $subject   = $_POST['subject'];
  $contents   = $_POST['contents'];

  mysqli_query($con,"insert into recruit_able_notice (subject,contents,date)VALUES('$subject','$contents',NOW())");

  mysqli_close($con);
?>

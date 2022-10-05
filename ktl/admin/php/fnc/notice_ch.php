<?php
  session_start();
  include "../mysql.php";
  $Id   = $_POST['Id'];
  $subject   = $_POST['subject'];
  $contents   = $_POST['contents'];

  mysqli_query($con,"update recruit_able_notice set subject = '$subject', date=NOW(),contents ='$contents' where id='$Id'");

  mysqli_close($con);
?>

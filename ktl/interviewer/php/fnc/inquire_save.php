<?php
  session_start();
  include "../mysql.php";
  $Id   = $_POST['Id'];
  $contents   = $_POST['contents'];

  mysqli_query($con,"update objection_info set answer_contents='$contents',answer_date=NOW(),state='답변완료' where id='$Id'");

  mysqli_close($con);
?>

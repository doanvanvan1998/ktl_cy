<?php
  session_start();
  include "../mysql.php";
  include "../crypt.php";

  $userid = $_POST["user_id"];

  mysqli_query($con,"update recruit_able_user set apply_step = '5' where id='$userid'");

  echo 'success';

  mysqli_close($con);
?>

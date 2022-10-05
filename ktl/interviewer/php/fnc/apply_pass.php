<?php
  session_start();
  include "../mysql.php";
  $Id   = $_POST['Id'];
  $step   = $_POST['step'];

  mysqli_query($con,"update recruit_able_user set result_check_num = '$step' where id='$Id'");

  mysqli_close($con);
?>

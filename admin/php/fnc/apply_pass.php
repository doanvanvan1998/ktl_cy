<?php
  session_start();
  include "../mysql.php";
  $Id   = $_POST['Id'];

  mysqli_query($con,"update recruit_able_user set status_pass = '1' where id='$Id'");

  mysqli_close($con);
?>

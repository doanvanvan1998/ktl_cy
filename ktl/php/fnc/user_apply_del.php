<?php
  session_start();
  include "../mysql.php";
  $Id   = $_POST['Id'];

  mysqli_query($con,"delete from recruit_able_user where id='$Id'");

  mysqli_close($con);
?>

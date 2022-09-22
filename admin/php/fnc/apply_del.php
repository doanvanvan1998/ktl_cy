<?php
  session_start();
  include "../mysql.php";
  $Id   = $_POST['Id'];

  mysqli_query($con,"delete from apply_step_1 where userid='$Id'");
  mysqli_query($con,"delete from apply_step_3 where userid='$Id'");
  mysqli_query($con,"delete from apply_step_2 where userid='$Id'");
  mysqli_query($con,"delete from apply_step_4 where userid='$Id'");
  mysqli_query($con,"delete from recruit_able_user where id='$Id'");

  mysqli_close($con);
?>

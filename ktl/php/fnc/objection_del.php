<?php
  session_start();
  include "../mysql.php";
  $Id   = $_POST['Id'];

  mysqli_query($con,"delete from objection_info where id='$Id'");
  echo "success";

  mysqli_close($con);
?>

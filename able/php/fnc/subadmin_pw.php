<?php
  session_start();
  include "../mysql.php";
  include "../crypt.php";

  $Id   = $_POST['Id'];

  $pass = Encrypt("1",$secret_key,$secret_iv);

  mysqli_query($con,"update recruit_able_subadmin set pass = '$pass' where id='$Id'");

  mysqli_close($con);
?>

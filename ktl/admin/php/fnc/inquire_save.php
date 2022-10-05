<?php
  session_start();
  include "../mysql.php";
  $id   = $_POST['id'];
  $verifi   = $_POST['verifi'];
  $sql = "UPDATE objection_info SET Verifi='$verifi' where id = $id";
  mysqli_query($con,$sql);

  mysqli_close($con);
?>

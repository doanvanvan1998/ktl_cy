<?php
  session_start();
  include "../mysql.php";

  $Id       = $_POST['Id'];

  $query="select subject,contents,date from recruit_able_notice where id='$Id'";
  $result = mysqli_query($con,$query);
  $row = mysqli_fetch_array($result);

  echo $row[0]."::::".$row[1]."::::".$row[2];

  mysqli_close($con);
?>

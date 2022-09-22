<?php
  session_start();
  include "../mysql.php";
  $Id   = $_POST['Id'];
  $pass_check   = $_POST['pass_check'];

  $query="select COUNT(*) from employment_list where id='$Id' and pass=MD5('$pass_check')";
  $result = mysqli_query($con,$query);
  $row = mysqli_fetch_array($result);

  if($row[0] != 0)
  {
    mysqli_query($con,"delete from employment_list where id='$Id'");
    echo "success";
  }
  else {
    echo "fail";
  }

  mysqli_close($con);
?>

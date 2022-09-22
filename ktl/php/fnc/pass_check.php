<?php
  session_start();
  include "../mysql.php";

  $Id = $_POST["Id"];
  $state = $_POST["state"];
  $pass_check = $_POST["pass_check"];

  if($state == 1)
  {
    $query="select COUNT(*) from employment_list where id='$Id' and pass=MD5('$pass_check')";
    $result = mysqli_query($con,$query);
    $row = mysqli_fetch_array($result);

    if($row[0] != 0) echo 'success';
    else echo "fail";
  }
  else
  {
    $query="select COUNT(*) from employment_list where id='$Id' and pass=MD5('$pass_check')";
    $result = mysqli_query($con,$query);
    $row = mysqli_fetch_array($result);

    if($row[0] != 0)
    {
      mysqli_query($con,"delete from employment_list where id='$Id'");
      echo 'success';
    }
    else echo "fail";

  }


  mysqli_close($con);
?>

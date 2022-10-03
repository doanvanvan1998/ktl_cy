<?php
  session_start();
  include "../mysql.php";
  $Id   = $_POST['Id'];
  $category  = $_POST['category'];
  $status   = $_POST['status'];
  if ($category == 1 ){
    $sql = "update recruit_able_user set round_one = " .$status ." where id= " .$Id;
  }else if ($category == 2){
    $sql = "update recruit_able_user set round_two = " .$status ." where id= " .$Id;
  }else if ($category == 3){
    $sql = "update recruit_able_user set round_three = " .$status ." where id= " .$Id;
  }else{
    $sql = "update recruit_able_user set status_pass = " .$status ." where id= " .$Id;
  }

  mysqli_query($con,$sql);
  mysqli_close($con);
?>

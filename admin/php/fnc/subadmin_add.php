<?php
  session_start();
  include "../mysql.php";
  include "../crypt.php";

  $userid       = $_POST['userid'];
  $pass         = $_POST['pass'];
  $username     = $_POST['username'];
  $description  = $_POST['description'];
  $userphone    = $_POST['userphone'];
  $useremail    = $_POST['useremail'];
  $role    = $_POST['role'];

  $useremail = Encrypt($useremail,$secret_key,$secret_iv);
  $userphone = Encrypt($userphone,$secret_key,$secret_iv);
  $pass = Encrypt($pass,$secret_key,$secret_iv);

  $sql = "insert into recruit_able_subadmin (userid,pass,username,description,userphone,useremail,date,role) VALUES('$userid','$pass','$username','$description','$userphone','$useremail',NOW(),'$role')";
  echo $sql;
  mysqli_query($con,$sql);
  mysqli_close($con);
?>

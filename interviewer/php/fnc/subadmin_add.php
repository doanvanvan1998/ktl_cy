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

  $useremail = Encrypt($useremail,$secret_key,$secret_iv);
  $userphone = Encrypt($userphone,$secret_key,$secret_iv);
  $pass = Encrypt($pass,$secret_key,$secret_iv);


  mysqli_query($con,"insert into recruit_able_subadmin (userid,pass,username,description,userphone,useremail,date)
  VALUES('$userid','$pass','$username','$description','$userphone','$useremail',NOW())");

  mysqli_close($con);
?>

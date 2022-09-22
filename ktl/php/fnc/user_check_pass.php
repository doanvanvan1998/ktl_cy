<?php
session_start();
include "../mysql.php";
include "../crypt.php";

$username   = $_POST['username'];
$userphone  = $_POST['userphone'];

$userphone = Encrypt($userphone,$secret_key,$secret_iv);

$query="select apply_num,apply_step,id,apply_num,pass,email from recruit_able_user where phone='$userphone'";
$result = mysqli_query($con,$query);
$row = mysqli_fetch_array($result);

if($row[0] == "")
{
  echo "fail";
  exit;
}
else
{
  $pass = Decrypt($row['pass'],$secret_key,$secret_iv);
  $email = Decrypt($row['email'],$secret_key,$secret_iv);

  echo $pass."::::".$email;
}
  mysqli_close($con);
?>

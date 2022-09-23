<?php
  session_start();
  include "../mysql.php";
  include "../crypt.php";

  $userid = $_POST["userid"];
  $pass   = $_POST["pass"];

  $pass = Encrypt($pass,$secret_key,$secret_iv);

  $query="select COUNT(*) from recruit_able_subadmin where userid='$userid' and pass='$pass'";
  $result = mysqli_query($con,$query);
  $row = mysqli_fetch_array($result);


  if($row[0] == 0)
  {
    echo "fail";
  }
  else
  {
    $_SESSION["m_sub_user_id"] = $userid;
    echo 'success';
  }


  mysqli_close($con);
?>

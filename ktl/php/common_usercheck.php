<?php
  include "php/mysql.php";
  include "php/crypt.php";

  $user_code = "";

  if(isset($_SESSION['apply_user_code']))
  {
    $user_code = $_SESSION['apply_user_code'];
  }
  else
  {
    echo "<script>alert('잘못된 경로로 접근중입니다.');location.href='index.html';</script>";
  }


  $query="select username,phone,email,apply_step,id,update_date from recruit_able_user where apply_num = '$user_code'";
  $Uresult = mysqli_query($con,$query);
  $Urow = mysqli_fetch_array($Uresult);

  $Urow[1] = Decrypt($Urow[1],$secret_key,$secret_iv);
  $Urow[2] = Decrypt($Urow[2],$secret_key,$secret_iv);

  $username           = $Urow[0];
  $userphone          = $Urow[1];
  $useremail          = $Urow[2];
  $user_update_date   = $Urow[5];
  $usernum            = $Urow[4];
  if($user_update_date == "") { $user_update_date = "현재 업데이트 내용이 없습니다."; }

  echo "<input type='hidden' id='username' value='$username'/>";
  echo "<input type='hidden' id='useremail' value='$useremail'/>";
  echo "<input type='hidden' id='userphone' value='$userphone'/>";
  echo "<input type='hidden' id='user_update_date' value='$user_update_date'/>";
  echo "<input type='hidden' id='user_id' value='$Urow[4]'/>";
?>

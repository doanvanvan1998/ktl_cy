<?php
  include "php/mysql.php";
  include "php/crypt.php";

  $user_code = "";
  $Id = $_GET["Id"];

  $query="select username,phone,email,apply_step,id,update_date,apply_num,result_check_num from recruit_able_user where id = '$Id'";
  $Uresult = mysqli_query($con,$query);
  $Urow = mysqli_fetch_array($Uresult);

  $user_code = $Urow[6];

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

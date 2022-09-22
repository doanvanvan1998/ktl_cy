<?php
  session_start();
  include "../mysql.php";
  include "../crypt.php";

  $step       = $_POST['step'];
  if($step == 1)
  {
    //입사지원 시작하기
    $imp_uid    = $_POST['imp_uid'];
    $username   = $_POST['username'];
    $userphone  = $_POST['userphone'];
    $useremail  = $_POST['useremail'];
    $userpass   = $_POST['userpass'];

    $userphone  = Encrypt($userphone,$secret_key,$secret_iv);
    $useremail  = Encrypt($useremail,$secret_key,$secret_iv);
    $userpass   = Encrypt($userpass,$secret_key,$secret_iv);

    $rand_code = 0;

    while(1)
    {
      //랜덤코드 중복없는걸로 출력
      $rand_code = mt_rand(100, 10000);
      $query="select COUNT(*) from recruit_able_user where apply_num='$rand_code'";
      $result = mysqli_query($con,$query);
      $row = mysqli_fetch_array($result);

      if($row[0] == 0)
      {
        break;
      }
    }

    $query="select COUNT(*) from recruit_able_user where email='$useremail'";
    $result = mysqli_query($con,$query);
    $row = mysqli_fetch_array($result);

    if($row[0] != 0) { echo "fail_email"; return; }

    $query="select COUNT(*) from recruit_able_user where phone='$userphone'";
    $result = mysqli_query($con,$query);
    $row = mysqli_fetch_array($result);

    if($row[0] != 0) { echo "fail_phone"; return; }

    mysqli_query($con,"insert into recruit_able_user(imp_uid,username,phone,email,pass,identi_check,apply_num)VALUES('$imp_uid','$username','$userphone','$useremail','$userpass',1,'$rand_code')");

    $_SESSION['apply_user_code'] = $rand_code;
    echo "success";
  }



  mysqli_close($con);
?>

<?php
session_start();
include "../mysql.php";
include "../crypt.php";

$username       = $_POST['username'];
$userpass        = $_POST['userpass'];
$useremail        = $_POST['useremail'];

$userpass = Encrypt($userpass,$secret_key,$secret_iv);
$useremail = Encrypt($useremail,$secret_key,$secret_iv);

$query="select apply_num,apply_step,id,apply_num,email from recruit_able_user where username='$username' and email='$useremail' and pass='$userpass'";
$result = mysqli_query($con,$query);
$row = mysqli_fetch_array($result);

$useremail = Decrypt($row[0],$secret_key,$secret_iv);

if($row[0] == "")
{
  echo $query;
  exit;
}
$strStep = "";

if($row[1] == 1) { $strStep = "기본정보 작성중";}
else if($row[1] == 2) { $strStep = "학력/경력/대외활동 작성중";}
else if($row[1] == 3) { $strStep = "자격/수상/포트폴리오 작성중";}
else if($row[1] == 4) { $strStep = "자기소개서 작성중";}
else if($row[1] == 5) { $strStep = "최종제출완료";}

$_SESSION['apply_user_code'] = $row[3];

  echo "<tr>
    <td>$row[0]</td>
    <td>2022년 한국산업기술시험원 기간제 장애·문화예술인 채용 (오케스트라단원 부문)</td>
    <td>2022.09.01 ~ 09.15</td>
    <td>$strStep</td>
    <td class='note'>
      <div class='flex'>";
      if($strStep != "최종제출완료")
      {
        echo "<div class='btn btn_correction flex' onclick='onApplyCh($row[1])'><span>수정하기</span></div>
        <div class='btn btn_withdraw flex' onclick='onApplyDel($row[2])'><span>지원철회</span></div>";
      }
      else
      {
        echo "<span>수정 및 삭제불가</span>";
      }
      echo "</div>
    </td>
  </tr>";

  echo "::::";

  echo "<span>수험번호 : $row[0]</span>
  <h6>2022년 한국산업기술시험원 기간제 장애·문화예술인 채용 (오케스트라단원 부문)</h6>
  <div class='flex'>
    <span>$strStep</span>
    <span>공고기간: 2022.09.01 ~ 09.15</span>
  </div>
  <div class='flex btns'>";
  if($strStep != "최종제출완료")
  {
    echo "<div class='btn btn_correction flex' onclick='onApplyCh($row[1])'><span>수정하기</span></div>
    <div class='btn btn_withdraw flex' onclick='onApplyDel($row[2])'><span>지원철회</span></div>";
  }
  else
  {
    echo "<span>수정 및 삭제불가</span>";
  }

  echo "</div>";

  mysqli_close($con);
?>

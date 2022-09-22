<?php
session_start();
include "../mysql.php";
include "../crypt.php";

$username   = $_POST['username'];
$userphone  = $_POST['userphone'];

$userphone = Encrypt($userphone,$secret_key,$secret_iv);

$query="select apply_num,username,email,result_check,result_check_num,id from recruit_able_user where phone='$userphone'";
$result = mysqli_query($con,$query);
$row = mysqli_fetch_array($result);

$useremail = Decrypt($row[2],$secret_key,$secret_iv);

if($row[0] == "")
{
  echo "fail";
  exit;
}

  echo "<tr>
    <td>$row[0]</td>
    <td>2022년 한국산업기술시험원 기간제 장애·문화예술인 채용 (오케스트라단원 부문)</td>
    <td>$row[1]</td>
    <td>$useremail</td>
    <td class='note'>
      <div class='flex'>";
      if($row['result_check'] != 5)
      {
        echo "<span>미제출</span>";
      }
      else if($row['result_check'] == 0)
      {
        echo "<div class='btn btn_fail flex'><span>불합격</span></div>";
      }
      else
      {
        echo "<div class='btn btn_pass flex'><span>합격</span></div>";
      }
      echo "</div>
    </td>
  </tr>";

  echo "::::";

  echo "<span>수험번호 : $row[0]</span>
  <h6>2022년 한국산업기술시험원 기간제 장애·문화예술인 채용 (오케스트라단원 부문)</h6>
  <div class='flex'>
    <span>이름 : $row[1]</span>
    <span>이메일 : $useremail</span>
  </div>
  <div class='flex btns'>";
    if($row['result_check'] == 1)
    {
      echo "<span>진행중</span>";
    }
    else if($row['result_check'] == 0)
    {
      echo "<div class='btn btn_fail flex'><span>불합격</span></div>";
    }
    else
    {
      echo "<div class='btn btn_pass flex'><span>합격</span></div>";
    }
  echo "</div>";

  mysqli_close($con);
?>

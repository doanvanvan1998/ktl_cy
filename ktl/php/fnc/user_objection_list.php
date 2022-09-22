<?php
  session_start();
  include "../mysql.php";
  include "../crypt.php";

  $username       = $_POST['username'];
  $userphone        = $_POST['userphone'];
  $useremail        = $_POST['useremail'];

  $userphone = Encrypt($userphone,$secret_key,$secret_iv);
  $useremail = Encrypt($useremail,$secret_key,$secret_iv);

  $query="select email from recruit_able_user where username='$username' and email='$useremail' and phone='$userphone'";
  $result = mysqli_query($con,$query);
  $row = mysqli_fetch_array($result);

  $useremail = Decrypt($row[0],$secret_key,$secret_iv);

  echo $useremail."::::";

  $nIndex = 1;
  $query="select title,objection_type,username,phone,email,subject,contents,date,state,id from objection_info where username='$username' and phone='$userphone'";
  $result = mysqli_query($con,$query);
  while($row = mysqli_fetch_array($result))
  {
    echo "<tr id='tr_$row[9]' style='cursor:pointer;'>
      <td>$nIndex</td>
      <td>$row[1]</td>
      <td onclick='onObjectionInputView($row[9])' class='notitle flex'>$row[5]<img src='images/icons/ic_lock.png' alt='잠금'></td>
      <td>$row[7]</td>
      <td>$row[8]</td>
      <td><button class='btn btn-danger' onclick='onObjectionDel($row[9])' style='cursor:pointer;padding:10px;width:80px;border-radius:8px;color:#fff;background:red;'>삭제</button></td>
    </tr>";
    $nIndex++;
  }

  mysqli_close($con);
?>

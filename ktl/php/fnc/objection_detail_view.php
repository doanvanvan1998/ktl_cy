<?php
  session_start();
  include "../mysql.php";
  include "../crypt.php";

  $Id       = $_POST['Id'];

  $nIndex = 1;
  $query="select objection_type,subject,contents,date,state,answer_contents,answer_date,id from objection_info where id='$Id'";
  $result = mysqli_query($con,$query);
  $row = mysqli_fetch_array($result);

  if($row[5] == "") { $row[5] = "답변 대기중."; }
  if($row[6] == "") { $row[6] = "대기중"; }
  echo $row[0]."::::".$row[1]."::::".$row[2]."::::".$row[3]."::::".$row[5]."::::".$row[6];

  mysqli_close($con);
?>

<?php
  session_start();
  include "../mysql.php";
  include "../crypt.php";

  $Id                   = $_POST['Id'];
  $userid               = $_POST['userid'];
  $sel_interview_user   = $_POST['sel_interview_user'];
  $user_score           = $_POST['user_score'];
  $feedback             = $_POST['feedback'];
  $step                 = $_POST['step'];

  $query="select COUNT(*) from recruit_able_score where step='$step' and userid='$Id' and subadmin='$sel_interview_user'";
  $result = mysqli_query($con,$query);
  $row = mysqli_fetch_array($result);

  if($row[0] == 0)
    mysqli_query($con,"insert into recruit_able_score (score,feedback,subadmin,step,userid)VALUES('$user_score','$feedback','$sel_interview_user','$step','$Id')");
  else
    mysqli_query($con,"update recruit_able_score set score='$user_score',feedback='$feedback',subadmin='$sel_interview_user',step='$step' where userid='$Id'");


  mysqli_close($con);
?>

<?php
  include "../mysql.php";

  $Id = $_POST["Id"];
  $query="select inquiry_type,subject,date,write_user,hits,state,type,answer,contents,answer_date from employment_list where id='$Id'";
  $result = mysqli_query($con,$query);
  $row = mysqli_fetch_array($result);

  $row['contents'] = nl2br($row['contents']);
  $row['answer'] = nl2br($row['answer']);
  if($row['answer_date'] == "") { $row['answer_date'] = "준비중"; }
  if($row['answer'] == "") { $row['answer'] = "답변 준비중..."; }

  echo "<div class='flex'>
    <div class='form_hd'><h6>이름</h6></div>
    <div class='form_con'><span class='default_name'>".$row['write_user']."</span></div>
  </div>
  <div class='flex'>
    <div class='form_hd'><h6>분류</h6></div>
    <div class='form_con'>
      <span>".$row['inquiry_type']."</span>
    </div>
  </div>
  <div class='flex'>
    <div class='form_hd'><h6>제목</h6></div>
    <div class='form_con'>
      <span>".$row['subject']."</span>
    </div>
  </div>
  <div class='flex baseline'>
    <div class='form_hd'><h6>내용</h6></div>
    <div class='form_con'>
      <span>
        ".$row['contents']."
      </span>
    </div>
  </div>
  <div class='flex'>
    <div class='form_hd'><h6>공개여부</h6></div>
    <div class='form_con'>
      <span>".$row['type']."</span>
    </div>
  </div>";

  echo "::::작성일 : $row[2]::::";

  echo "<div class='btn_listview flex btn' onclick='onMainView()'><span>목록</span></div>";
  echo "<div class='btn btn_writecorrection flex' onclick='onInquiryDel($Id)'><span>삭제</span></div>";

  echo "::::답변일 : ".$row['answer_date']."::::".$row['answer'];

  mysqli_close($con);
?>

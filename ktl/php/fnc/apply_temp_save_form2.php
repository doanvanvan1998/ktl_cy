<?php
  $userid = $_POST["upload_userid2"];
  
  $uploads_pdf_dir = '../../user/'.$userid."_1.pdf";
  $uploads_pdf_dir2 = '../../user/'.$userid."_2.pdf";
  $uploads_pdf_dir3 = '../../user/'.$userid."_3.pdf";
  $uploads_pdf_dir4 = '../../user/'.$userid."_4.pdf";
  $uploads_pdf_dir5 = '../../user/'.$userid."_5.pdf";
  $uploads_pdf_dir6 = '../../user/'.$userid."_6.pdf";
  $uploads_pdf_dir7 = '../../user/'.$userid."_7.pdf";
  $uploads_pdf_dir8 = '../../user/'.$userid."_8.pdf";

  ini_set('memory_limit','-1'); //파일 용량이 커서 메모리가 많이 필요할때

  $fileName = $_FILES['finish_1_filename']['name'];
  $fileName2 = $_FILES['finish_2_filename']['name'];
  $fileName3 = $_FILES['finish_3_filename']['name'];
  $fileName4 = $_FILES['finish_4_filename']['name'];
  $fileName5 = $_FILES['finish_5_filename']['name'];
  $fileName6 = $_FILES['finish_6_filename']['name'];
  $fileName7 = $_FILES['finish_7_filename']['name'];
  $fileName8 = $_FILES['finish_8_filename']['name'];

  if(move_uploaded_file($_FILES['finish_1_filename']['tmp_name'],$uploads_pdf_dir)){}
  if(move_uploaded_file($_FILES['finish_2_filename']['tmp_name'],$uploads_pdf_dir2)){}
  if(move_uploaded_file($_FILES['finish_3_filename']['tmp_name'],$uploads_pdf_dir3)){}
  if(move_uploaded_file($_FILES['finish_4_filename']['tmp_name'],$uploads_pdf_dir4)){}
  if(move_uploaded_file($_FILES['finish_5_filename']['tmp_name'],$uploads_pdf_dir5)){}
  if(move_uploaded_file($_FILES['finish_6_filename']['tmp_name'],$uploads_pdf_dir6)){}
  if(move_uploaded_file($_FILES['finish_6_filename']['tmp_name'],$uploads_pdf_dir7)){}

  echo "success";

  mysqli_close($con);
?>

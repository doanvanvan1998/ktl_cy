<?php
session_start();
include "../mysql.php";
include "../crypt.php";

$step       = $_POST['upload_sel_tab'];
if($step == 3)
{
  $userid = $_POST["upload_userid"];
  $licenses_txt_1 = $_POST["licenses_txt_1"];
  $licenses_txt_2 = $_POST["licenses_txt_2"];
  $licenses_txt_3 = $_POST["licenses_txt_3"];
  $licenses_txt_4 = $_POST["licenses_txt_4"];
  $licenses_txt_5 = $_POST["licenses_txt_5"];
  $licenses_txt_6 = $_POST["licenses_txt_6"];
  $licenses_txt_7 = $_POST["licenses_txt_7"];
  $licenses_txt_8 = $_POST["licenses_txt_8"];
  $licenses_txt_9 = $_POST["licenses_txt_9"];
  $licenses_txt_10 = $_POST["licenses_txt_10"];
  $licenses_txt_11 = $_POST["licenses_txt_11"];
  $licenses_txt_12 = $_POST["licenses_txt_12"];
  $licenses_txt_13 = $_POST["licenses_txt_13"];
  $licenses_txt_14 = $_POST["licenses_txt_14"];
  $licenses_txt_15 = $_POST["licenses_txt_15"];
  $licenses_txt_16 = $_POST["licenses_txt_16"];
  $licenses_txt_17 = $_POST["licenses_txt_17"];
  $licenses_txt_18 = $_POST["licenses_txt_18"];

  $awards_txt_1_1 = $_POST["awards_txt_1_1"];
  $awards_txt_1_2 = $_POST["awards_txt_1_2"];
  $awards_txt_1_3 = $_POST["awards_txt_1_3"];
  $awards_txt_1_4 = $_POST["awards_txt_1_4"];
  $awards_txt_2_1 = $_POST["awards_txt_2_1"];
  $awards_txt_2_2 = $_POST["awards_txt_2_2"];
  $awards_txt_2_3 = $_POST["awards_txt_2_3"];
  $awards_txt_2_4 = $_POST["awards_txt_2_4"];
  $awards_txt_3_1 = $_POST["awards_txt_3_1"];
  $awards_txt_3_2 = $_POST["awards_txt_3_2"];
  $awards_txt_3_3 = $_POST["awards_txt_3_3"];
  $awards_txt_3_4 = $_POST["awards_txt_3_4"];
  $awards_txt_4_1 = $_POST["awards_txt_4_1"];
  $awards_txt_4_2 = $_POST["awards_txt_4_2"];
  $awards_txt_4_3 = $_POST["awards_txt_4_3"];
  $awards_txt_4_4 = $_POST["awards_txt_4_4"];
  $awards_txt_5_1 = $_POST["awards_txt_5_1"];
  $awards_txt_5_2 = $_POST["awards_txt_5_2"];
  $awards_txt_5_3 = $_POST["awards_txt_5_3"];
  $awards_txt_5_4 = $_POST["awards_txt_5_4"];
  $awards_txt_6_1 = $_POST["awards_txt_6_1"];
  $awards_txt_6_2 = $_POST["awards_txt_6_2"];
  $awards_txt_6_3 = $_POST["awards_txt_6_3"];
  $awards_txt_6_4 = $_POST["awards_txt_6_4"];
  $awards_txt_7_1 = $_POST["awards_txt_7_1"];
  $awards_txt_7_2 = $_POST["awards_txt_7_2"];
  $awards_txt_7_3 = $_POST["awards_txt_7_3"];
  $awards_txt_7_4 = $_POST["awards_txt_7_4"];

  $awards_sel_1 = $_POST["awards_sel_1"];
  $awards_sel_2 = $_POST["awards_sel_2"];
  $awards_sel_3 = $_POST["awards_sel_3"];
  $awards_sel_4 = $_POST["awards_sel_4"];
  $awards_sel_5 = $_POST["awards_sel_5"];
  $awards_sel_6 = $_POST["awards_sel_6"];
  $awards_sel_7 = $_POST["awards_sel_7"];


  $userlink = $_POST["userlink"];

  $uploads_pdf_dir = '../../portfolio/'.$userid.".pdf";

  ini_set('memory_limit','-1'); //파일 용량이 커서 메모리가 많이 필요할때

  $fileName = $_FILES['portfolio_filename']['name'];
  $error = $_FILES['portfolio_filename']['error'];

  if( $error != UPLOAD_ERR_OK ) {
    switch( $error ) {
      case UPLOAD_ERR_INI_SIZE:
      case UPLOAD_ERR_FORM_SIZE:
      echo "파일이 너무 큽니다. ($error)";
      break;
    case UPLOAD_ERR_NO_FILE:
    	echo "파일이 첨부되지 않았습니다. ($error)";
    	break;
    default:
    	echo "파일이 제대로 업로드되지 않았습니다. ($error)";
    }
    exit;
  }
  if(move_uploaded_file($_FILES['portfolio_filename']['tmp_name'],$uploads_pdf_dir)){
  }

  $query="select COUNT(*) from apply_step_3 where userid='$userid'";
  $result = mysqli_query($con,$query);
  $row = mysqli_fetch_array($result);

  if($row[0] == 0)
  {
    //등록
    mysqli_query($con,"insert into apply_step_3
    (userid,awards_sel_1,awards_sel_2,awards_sel_3,awards_sel_4,awards_sel_5,awards_sel_6,awards_sel_7,licenses_txt_1,licenses_txt_2,licenses_txt_3,licenses_txt_4,licenses_txt_5,licenses_txt_6,licenses_txt_7,licenses_txt_8,
    licenses_txt_9,licenses_txt_10,licenses_txt_11,licenses_txt_12,licenses_txt_13,licenses_txt_14,licenses_txt_15,licenses_txt_16,licenses_txt_17,
    licenses_txt_18,awards_txt_1_1,awards_txt_1_2,awards_txt_1_3,awards_txt_1_4,awards_txt_2_1,awards_txt_2_2,awards_txt_2_3,awards_txt_2_4,
    awards_txt_3_1,awards_txt_3_2,awards_txt_3_3,awards_txt_3_4,awards_txt_4_1,awards_txt_4_2,awards_txt_4_3,awards_txt_4_4,
    awards_txt_5_1,awards_txt_5_2,awards_txt_5_3,awards_txt_5_4,awards_txt_6_1,awards_txt_6_2,awards_txt_6_3,awards_txt_6_4,
    awards_txt_7_1,awards_txt_7_2,awards_txt_7_3,awards_txt_7_4,userlink)
    VALUES('$userid','$awards_sel_1','$awards_sel_2','$awards_sel_3','$awards_sel_4','$awards_sel_5','$awards_sel_6','$awards_sel_7','$licenses_txt_1','$licenses_txt_2','$licenses_txt_3','$licenses_txt_4','$licenses_txt_5','$licenses_txt_6','$licenses_txt_7','$licenses_txt_8',
    '$licenses_txt_9','$licenses_txt_10','$licenses_txt_11','$licenses_txt_12','$licenses_txt_13','$licenses_txt_14','$licenses_txt_15','$licenses_txt_16','$licenses_txt_17',
    '$licenses_txt_18','$awards_txt_1_1','$awards_txt_1_2','$awards_txt_1_3','$awards_txt_1_4','$awards_txt_2_1','$awards_txt_2_2','$awards_txt_2_3','$awards_txt_2_4',
    '$awards_txt_3_1','$awards_txt_3_2','$awards_txt_3_3','$awards_txt_3_4','$awards_txt_4_1','$awards_txt_4_2','$awards_txt_4_3','$awards_txt_4_4',
    '$awards_txt_5_1','$awards_txt_5_2','$awards_txt_5_3','$awards_txt_5_4','$awards_txt_6_1','$awards_txt_6_2','$awards_txt_6_3','$awards_txt_6_4',
    '$awards_txt_7_1','$awards_txt_7_2','$awards_txt_7_3','$awards_txt_7_4','$userlink')");

    mysqli_query($con,"update recruit_able_user set update_date = NOW() where id='$user_id'");

    echo "success";
  }
  else
  {
    mysqli_query($con,"update apply_step_3 set awards_sel_1='$awards_sel_1',awards_sel_2='$awards_sel_2',awards_sel_3='$awards_sel_3',awards_sel_4='$awards_sel_4',awards_sel_5='$awards_sel_5',awards_sel_6='$awards_sel_6',awards_sel_7='$awards_sel_7',licenses_txt_1='$licenses_txt_1',licenses_txt_2='$licenses_txt_2',licenses_txt_3='$licenses_txt_3',licenses_txt_4='$licenses_txt_4',licenses_txt_5='$licenses_txt_5',licenses_txt_6='$licenses_txt_6',licenses_txt_7='$licenses_txt_7',
    licenses_txt_8='$licenses_txt_8',licenses_txt_9='$licenses_txt_9',licenses_txt_10='$licenses_txt_10',licenses_txt_11='$licenses_txt_11',licenses_txt_12='$licenses_txt_12',licenses_txt_13='$licenses_txt_13',licenses_txt_14='$licenses_txt_14',licenses_txt_15='$licenses_txt_15',licenses_txt_16='$licenses_txt_16',licenses_txt_17='$licenses_txt_17',
    licenses_txt_18='$licenses_txt_18',awards_txt_1_1='$awards_txt_1_1',awards_txt_1_2='$awards_txt_1_2',awards_txt_1_3='$awards_txt_1_3',awards_txt_1_4='$awards_txt_1_4',awards_txt_2_1='$awards_txt_2_1',awards_txt_2_2='$awards_txt_2_2',awards_txt_2_3='$awards_txt_2_3',awards_txt_2_4='$awards_txt_2_4',
    awards_txt_3_1='$awards_txt_3_1',awards_txt_3_2='$awards_txt_3_2',awards_txt_3_3='$awards_txt_3_3',awards_txt_3_4='$awards_txt_3_4',awards_txt_4_1='$awards_txt_4_1',awards_txt_4_2='$awards_txt_4_2',awards_txt_4_3='$awards_txt_4_3',awards_txt_4_4='$awards_txt_4_4',
    awards_txt_5_1='$awards_txt_5_1',awards_txt_5_2='$awards_txt_5_2',awards_txt_5_3='$awards_txt_5_3',awards_txt_5_4='$awards_txt_5_4',awards_txt_6_1='$awards_txt_6_1',awards_txt_6_2='$awards_txt_6_2',awards_txt_6_3='$awards_txt_6_3',awards_txt_6_4='$awards_txt_6_4',
    awards_txt_7_1='$awards_txt_7_1',awards_txt_7_2='$awards_txt_7_2',awards_txt_7_3='$awards_txt_7_3',awards_txt_7_4='$awards_txt_7_4',userlink='$userlink' where userid='$userid'");

    mysqli_query($con,"update recruit_able_user set update_date = NOW() where id='$user_id'");
    //수정
    echo "success";
  }

  mysqli_query($con,"update recruit_able_user set apply_step = '$step' where id='$user_id'");


}

mysqli_close($con);
?>

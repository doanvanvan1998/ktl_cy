<?php
  session_start();
  include "../mysql.php";
  include "../crypt.php";

  $step       = $_POST['step'];
  if($step == 4)
  {
    $user_id            = $_POST['user_id'];
    //입사지원 시작하기
    $intro_sel_1        = $_POST['intro_sel_1'];
    $intro_txt_1_1      = $_POST['intro_txt_1_1'];
    $intro_txt_1_2      = $_POST['intro_txt_1_2'];
    $intro_sel_2        = $_POST['intro_sel_2'];
    $intro_txt_2_1      = $_POST['intro_txt_2_1'];
    $intro_txt_2_2      = $_POST['intro_txt_2_2'];
    $intro_sel_3        = $_POST['intro_sel_3'];
    $intro_txt_3_1      = $_POST['intro_txt_3_1'];
    $intro_txt_3_2      = $_POST['intro_txt_3_2'];
    $intro_sel_4        = $_POST['intro_sel_4'];
    $intro_txt_4_1      = $_POST['intro_txt_4_1'];
    $intro_txt_4_2      = $_POST['intro_txt_4_2'];
    $intro_sel_5        = $_POST['intro_sel_5'];
    $intro_txt_5_1      = $_POST['intro_txt_5_1'];
    $intro_txt_5_2      = $_POST['intro_txt_5_2'];

    $query="select COUNT(*) from apply_step_4 where userid='$user_id'";
    $result = mysqli_query($con,$query);
    $row = mysqli_fetch_array($result);

    /*if($intro_sel_1 == $intro_sel_2 || $intro_sel_1 == $intro_sel_3 || $intro_sel_1 == $intro_sel_4 || $intro_sel_1 == $intro_sel_5) { echo "fail"; return; }
    else if($intro_sel_2 == $intro_sel_3 || $intro_sel_2 == $intro_sel_4 || $intro_sel_2 == $intro_sel_5) { echo "fail"; return; }
    else if($intro_sel_3 == $intro_sel_4 || $intro_sel_3 == $intro_sel_5) { echo "fail"; return; }
    else if($intro_sel_4 == $intro_sel_5) { echo "fail"; return; }
*/
    if($row[0] == 0)
    {
      //등록
      mysqli_query($con,"insert into apply_step_4
      (userid,intro_sel_1,intro_txt_1_1,intro_txt_1_2,intro_sel_2,intro_txt_2_1,intro_txt_2_2,intro_sel_3,intro_txt_3_1,intro_txt_3_2,intro_sel_4,intro_txt_4_1,intro_txt_4_2,intro_sel_5,intro_txt_5_1,intro_txt_5_2)
      VALUES('$user_id','$intro_sel_1','$intro_txt_1_1','$intro_txt_1_2','$intro_sel_2','$intro_txt_2_1','$intro_txt_2_2',
      '$intro_sel_3','$intro_txt_3_1','$intro_txt_3_2','$intro_sel_4','$intro_txt_4_1','$intro_txt_4_2','$intro_sel_5','$intro_txt_5_1','$intro_txt_5_2')");

      mysqli_query($con,"update recruit_able_user set update_date = NOW() where id='$user_id'");

      echo "success";
    }
    else
    {

      mysqli_query($con,"update recruit_able_user set update_date = NOW() where id='$user_id'");
      //수정
      mysqli_query($con,"update apply_step_4 set intro_sel_1='$intro_sel_1',intro_txt_1_1='$intro_txt_1_1',intro_txt_1_2='$intro_txt_1_2',
      intro_sel_2='$intro_sel_2',intro_txt_2_1='$intro_txt_2_1',intro_txt_2_2='$intro_sel_1',
      intro_sel_3='$intro_sel_3',intro_txt_3_1='$intro_txt_3_1',intro_txt_3_2='$intro_txt_3_2',
      intro_sel_4='$intro_sel_4',intro_txt_4_1='$intro_txt_4_1',intro_txt_4_2='$intro_txt_4_2',
      intro_sel_5='$intro_sel_5',intro_txt_5_1='$intro_txt_5_1',intro_txt_5_2='$intro_txt_5_2' where userid='$user_id'");

      echo "success";
    }

  }
  else if($step == 1)
  {
    $user_id            = $_POST['user_id'];
    //입사지원 시작하기
    $user_address         = $_POST['user_address'];
    $user_detailAddress   = $_POST['user_detailAddress'];
    $sel_tab_num    = $_POST['sel_tab_num'];
    $step0_view_sel = $_POST['step0_view_sel'];
    $step0_view_sel2 = $_POST['step0_view_sel2'];
    $sel2_tab_num   = $_POST['sel2_tab_num'];
    $sel3_tab_num   = $_POST['sel3_tab_num'];
    $sel4_tab_num   = $_POST['sel4_tab_num'];
    $sel5_tab_num   = $_POST['sel5_tab_num'];
    $sel6_tab_num   = $_POST['sel6_tab_num'];
    $sel7_tab_num   = $_POST['sel7_tab_num'];
    $data1          = $_POST['data1'];
    $data2          = $_POST['data2'];
    $data3          = $_POST['data3'];
    $data4          = $_POST['data4'];
    $data5          = $_POST['data5'];
    $data6          = $_POST['data6'];
    $data7          = $_POST['data7'];
    $data8          = $_POST['data8'];
    $check_phone    = $_POST['check_phone'];
    $data12         = $_POST['data12'];
    $data13         = $_POST['data13'];

    $check_phone = Encrypt($check_phone,$secret_key,$secret_iv);

    $query="select COUNT(*) from apply_step_1 where userid='$user_id'";
    $result = mysqli_query($con,$query);
    $row = mysqli_fetch_array($result);

    if($row[0] == 0)
    {
      //등록
      mysqli_query($con,"insert into apply_step_1
      (userid,user_address,user_detailAddress,sel_tab_num,step0_view_sel,step0_view_sel2,sel2_tab_num,sel3_tab_num,sel4_tab_num,data1,data2,data3,data4,data5,data6,data7,data8,check_phone,data12,data13,sel5_tab_num,sel6_tab_num,sel7_tab_num)
      VALUES('$user_id','$user_address','$user_detailAddress','$sel_tab_num','$step0_view_sel','$step0_view_sel2','$sel2_tab_num','$sel3_tab_num','$sel4_tab_num','$data1','$data2','$data3','$data4','$data5','$data6','$data7','$data8','$check_phone','$data12','$data13','$sel5_tab_num','$sel6_tab_num','$sel7_tab_num')");

      mysqli_query($con,"update recruit_able_user set update_date = NOW() where id='$user_id'");

      echo "success";
    }
    else
    {

      mysqli_query($con,"update recruit_able_user set update_date = NOW() where id='$user_id'");
      //수정
      mysqli_query($con,"update apply_step_1 set sel5_tab_num='$sel5_tab_num',sel6_tab_num='$sel6_tab_num',sel7_tab_num='$sel7_tab_num',user_address='$user_address',user_detailAddress='$user_detailAddress',sel_tab_num='$sel_tab_num',step0_view_sel='$step0_view_sel',step0_view_sel2='$step0_view_sel2',sel2_tab_num='$sel2_tab_num',sel3_tab_num='$sel3_tab_num',sel4_tab_num='$sel4_tab_num',data1='$data1',data2='$data2',data3='$data3',data4='$data4',data5='$data5',data6='$data6',data7='$data7',data8='$data8',check_phone='$check_phone',data12='$data12',data13='$data13' where userid='$user_id'");

      echo "success";
    }

  }
  if($step == 2)
  {
    //학력/경력/대외활동
    $user_id            = $_POST['user_id'];

    $sch_data1              = $_POST['sch_data1'];
    $sch_data2              = $_POST['sch_data2'];
    $sch_data3              = $_POST['sch_data3'];
    $highschool_state       = $_POST['highschool_state'];
    $qualification_exam     = $_POST['qualification_exam'];

    $sch_1_data1     = $_POST['sch_1_data1'];
    $sch_1_data2     = $_POST['sch_1_data2'];
    $sch_1_data3     = $_POST['sch_1_data3'];
    $sch_1_data4     = $_POST['sch_1_data4'];
    $sch_1_data5     = $_POST['sch_1_data5'];
    $sch_1_data6     = $_POST['sch_1_data6'];
    $sch_1_data7     = $_POST['sch_1_data7'];
    $sch_1_data8     = $_POST['sch_1_data8'];
    $sch_1_data9     = $_POST['sch_1_data9'];
    $sch_1_data10     = $_POST['sch_1_data10'];

    $sch_2_data1     = $_POST['sch_2_data1'];
    $sch_2_data2     = $_POST['sch_2_data2'];
    $sch_2_data3     = $_POST['sch_2_data3'];
    $sch_2_data4     = $_POST['sch_2_data4'];
    $sch_2_data5     = $_POST['sch_2_data5'];
    $sch_2_data6     = $_POST['sch_2_data6'];
    $sch_2_data7     = $_POST['sch_2_data7'];
    $sch_2_data8     = $_POST['sch_2_data8'];
    $sch_2_data9     = $_POST['sch_2_data9'];
    $sch_2_data10     = $_POST['sch_2_data10'];

    $sch_3_data1     = $_POST['sch_3_data1'];
    $sch_3_data2     = $_POST['sch_3_data2'];
    $sch_3_data3     = $_POST['sch_3_data3'];
    $sch_3_data4     = $_POST['sch_3_data4'];
    $sch_3_data5     = $_POST['sch_3_data5'];
    $sch_3_data6     = $_POST['sch_3_data6'];
    $sch_3_data7     = $_POST['sch_3_data7'];
    $sch_3_data8     = $_POST['sch_3_data8'];
    $sch_3_data9     = $_POST['sch_3_data9'];
    $sch_3_data10     = $_POST['sch_3_data10'];

    $grad_1_data1     = $_POST['grad_1_data1'];
    $grad_1_data2     = $_POST['grad_1_data2'];
    $grad_1_data3     = $_POST['grad_1_data3'];
    $grad_1_data4     = $_POST['grad_1_data4'];
    $grad_1_data5     = $_POST['grad_1_data5'];
    $grad_1_data6     = $_POST['grad_1_data6'];
    $grad_1_data7     = $_POST['grad_1_data7'];
    $grad_1_data8     = $_POST['grad_1_data8'];
    $grad_1_data9     = $_POST['grad_1_data9'];
    $grad_1_data10     = $_POST['grad_1_data10'];

    $grad_2_data1     = $_POST['grad_2_data1'];
    $grad_2_data2     = $_POST['grad_2_data2'];
    $grad_2_data3     = $_POST['grad_2_data3'];
    $grad_2_data4     = $_POST['grad_2_data4'];
    $grad_2_data5     = $_POST['grad_2_data5'];
    $grad_2_data6     = $_POST['grad_2_data6'];
    $grad_2_data7     = $_POST['grad_2_data7'];
    $grad_2_data8     = $_POST['grad_2_data8'];
    $grad_2_data9     = $_POST['grad_2_data9'];
    $grad_2_data10     = $_POST['grad_2_data10'];

    $grad_3_data1     = $_POST['grad_3_data1'];
    $grad_3_data2     = $_POST['grad_3_data2'];
    $grad_3_data3     = $_POST['grad_3_data3'];
    $grad_3_data4     = $_POST['grad_3_data4'];
    $grad_3_data5     = $_POST['grad_3_data5'];
    $grad_3_data6     = $_POST['grad_3_data6'];
    $grad_3_data7     = $_POST['grad_3_data7'];
    $grad_3_data8     = $_POST['grad_3_data8'];
    $grad_3_data9     = $_POST['grad_3_data9'];
    $grad_3_data10     = $_POST['grad_3_data10'];


    $career_sel     = $_POST['career_sel'];
    $career_input     = $_POST['career_input'];
    $career_sel2     = $_POST['career_sel2'];
    $career_input2     = $_POST['career_input2'];

    $major_history_1     = $_POST['major_history_1'];
    $major_history_2     = $_POST['major_history_2'];
    $major_history_3     = $_POST['major_history_3'];
    $major_history_4     = $_POST['major_history_4'];
    $major_history_5     = $_POST['major_history_5'];

    $active_data1     = $_POST['active_data1'];
    $active_data1_1   = $_POST['active_data1_1'];
    $active_data2     = $_POST['active_data2'];
    $active_data3     = $_POST['active_data3'];
    $active_data4     = $_POST['active_data4'];
    $active_data4_1   = $_POST['active_data4_1'];
    $active_data5     = $_POST['active_data5'];
    $active_data6     = $_POST['active_data6'];
    $active_data7     = $_POST['active_data7'];
    $active_data7_1   = $_POST['active_data7_1'];
    $active_data8     = $_POST['active_data8'];
    $active_data9     = $_POST['active_data9'];
    $active_data10     = $_POST['active_data10'];
    $active_data10_1   = $_POST['active_data10_1'];
    $active_data11     = $_POST['active_data11'];

    $active_data12     = $_POST['active_data12'];
    $active_data13     = $_POST['active_data13'];
    $active_data13_1   = $_POST['active_data13_1'];
    $active_data14     = $_POST['active_data14'];
    $active_data15     = $_POST['active_data15'];
    $active_data16     = $_POST['active_data16'];
    $active_data17     = $_POST['active_data17'];
    $active_data18     = $_POST['active_data18'];
    $active_data19     = $_POST['active_data19'];
    $active_data20     = $_POST['active_data20'];
    $active_data21     = $_POST['active_data21'];
    $active_data22     = $_POST['active_data22'];
    $active_data23     = $_POST['active_data23'];

    $active_data24     = $_POST['active_data24'];
    $active_data25     = $_POST['active_data25'];
    $active_data26     = $_POST['active_data26'];
    $active_data27     = $_POST['active_data27'];
    $active_data28     = $_POST['active_data28'];
    $active_data29     = $_POST['active_data29'];
    $active_data30     = $_POST['active_data30'];

    $edu_data1     = $_POST['edu_data1'];
    $edu_data2     = $_POST['edu_data2'];
    $edu_data3     = $_POST['edu_data3'];
    $edu_data4     = $_POST['edu_data4'];
    $edu_data5     = $_POST['edu_data5'];
    $edu_data6     = $_POST['edu_data6'];
    $edu_data7     = $_POST['edu_data7'];
    $edu_data8     = $_POST['edu_data8'];
    $edu_data9     = $_POST['edu_data9'];
    $edu_data10     = $_POST['edu_data10'];
    $edu_data11     = $_POST['edu_data11'];

    $edu_data12     = $_POST['edu_data12'];
    $edu_data13     = $_POST['edu_data13'];
    $edu_data14     = $_POST['edu_data14'];
    $edu_data15     = $_POST['edu_data15'];
    $edu_data16     = $_POST['edu_data16'];
    $edu_data17     = $_POST['edu_data17'];
    $edu_data18     = $_POST['edu_data18'];
    $edu_data19     = $_POST['edu_data19'];
    $edu_data20     = $_POST['edu_data20'];
    $edu_data21     = $_POST['edu_data21'];
    $edu_data22     = $_POST['edu_data22'];
    $edu_data23     = $_POST['edu_data23'];

    $edu_data24     = $_POST['edu_data24'];
    $edu_data25     = $_POST['edu_data25'];
    $edu_data39     = $_POST['edu_data26'];
    $edu_data27     = $_POST['edu_data27'];
    $edu_data39     = $_POST['edu_data28'];
    $edu_data39     = $_POST['edu_data29'];
    $edu_data39     = $_POST['edu_data30'];
    $edu_data39     = $_POST['edu_data31'];
    $edu_data39     = $_POST['edu_data32'];
    $edu_data39     = $_POST['edu_data33'];
    $edu_data39     = $_POST['edu_data34'];
    $edu_data39     = $_POST['edu_data35'];
    $edu_data39     = $_POST['edu_data36'];
    $edu_data39     = $_POST['edu_data37'];
    $edu_data38     = $_POST['edu_data38'];
    $edu_data39     = $_POST['edu_data39'];
    $edu_data40     = $_POST['edu_data40'];

    $query="select COUNT(*) from apply_step_2 where userid='$user_id'";
    $result = mysqli_query($con,$query);
    $row = mysqli_fetch_array($result);

    if($row[0] == 0)
    {
      //등록
      mysqli_query($con,"insert into apply_step_2
      (userid,sch_data1,sch_data2,sch_data3,highschool_state,qualification_exam,
      sch_1_data1,sch_1_data2,sch_1_data3,sch_1_data4,sch_1_data5,sch_1_data6,sch_1_data7,sch_1_data8,sch_1_data9,sch_1_data10,
      sch_2_data1,sch_2_data2,sch_2_data3,sch_2_data4,sch_2_data5,sch_2_data6,sch_2_data7,sch_2_data8,sch_2_data9,sch_2_data10,
      sch_3_data1,sch_3_data2,sch_3_data3,sch_3_data4,sch_3_data5,sch_3_data6,sch_3_data7,sch_3_data8,sch_3_data9,sch_3_data10,
      grad_1_data1,grad_1_data2,grad_1_data3,grad_1_data4,grad_1_data5,grad_1_data6,grad_1_data7,grad_1_data8,grad_1_data9,grad_1_data10,
      grad_2_data1,grad_2_data2,grad_2_data3,grad_2_data4,grad_2_data5,grad_2_data6,grad_2_data7,grad_2_data8,grad_2_data9,grad_2_data10,
      grad_3_data1,grad_3_data2,grad_3_data3,grad_3_data4,grad_3_data5,grad_3_data6,grad_3_data7,grad_3_data8,grad_3_data9,grad_3_data10,
      career_sel,career_input,career_sel2,career_input2,major_history_1,major_history_2,major_history_3,major_history_4,major_history_5,
      active_data1,active_data1_1,active_data2,active_data3,active_data4,active_data4_1,active_data5,active_data6,active_data7,active_data7_1,active_data8,active_data9,active_data10,active_data10_1,
      active_data11,active_data12,active_data13,active_data13_1,active_data14,active_data15,active_data16,active_data17,active_data18,active_data19,active_data20,
      active_data21,active_data22,active_data23,active_data24,active_data25,active_data26,active_data27,active_data28,active_data29,active_data30,
      edu_data1,edu_data2,edu_data3,edu_data4,edu_data5,edu_data6,edu_data7,edu_data8,edu_data9,edu_data10,
      edu_data11,edu_data12,edu_data13,edu_data14,edu_data15,edu_data16,edu_data17,edu_data18,edu_data19,edu_data20,
      edu_data21,edu_data22,edu_data23,edu_data24,edu_data25,edu_data26,edu_data27,edu_data28,edu_data29,edu_data30,
      edu_data31,edu_data32,edu_data33,edu_data34,edu_data35,edu_data36,edu_data37,edu_data38,edu_data39,edu_data40)
      VALUES('$user_id','$sch_data1','$sch_data2','$sch_data3','$highschool_state','$qualification_exam',
      '$sch_1_data1','$sch_1_data2','$sch_1_data3','$sch_1_data4','$sch_1_data5','$sch_1_data6','$sch_1_data7','$sch_1_data8','$sch_1_data9','$sch_1_data10',
      '$sch_2_data1','$sch_2_data2','$sch_2_data3','$sch_2_data4','$sch_2_data5','$sch_2_data6','$sch_2_data7','$sch_2_data8','$sch_2_data9','$sch_2_data10',
      '$sch_3_data1','$sch_3_data2','$sch_3_data3','$sch_3_data4','$sch_3_data5','$sch_3_data6','$sch_3_data7','$sch_3_data8','$sch_3_data9','$sch_3_data10',
      '$grad_1_data1','$grad_1_data2','$grad_1_data3','$grad_1_data4','$grad_1_data5','$grad_1_data6','$grad_1_data7','$grad_1_data8','$grad_1_data9','$grad_1_data10',
      '$grad_2_data1','$grad_2_data2','$grad_2_data3','$grad_2_data4','$grad_2_data5','$grad_2_data6','$grad_2_data7','$grad_2_data8','$grad_2_data9','$grad_2_data10',
      '$grad_3_data1','$grad_3_data2','$grad_3_data3','$grad_3_data4','$grad_3_data5','$grad_3_data6','$grad_3_data7','$grad_3_data8','$grad_3_data9','$grad_3_data10',
      '$career_sel','$career_input','$career_sel2','$career_input2','$major_history_1','$major_history_2','$major_history_3','$major_history_4','$major_history_5',
      '$active_data1','$active_data1_1','$active_data2','$active_data3','$active_data4','$active_data4_1','$active_data5','$active_data6','$active_data7','$active_data7_1','$active_data8','$active_data9','$active_data10','$active_data10_1',
      '$active_data11','$active_data12','$active_data13','$active_data13_1','$active_data14','$active_data15','$active_data16','$active_data17','$active_data18','$active_data19','$active_data20',
      '$active_data21','$active_data22','$active_data23','$active_data24','$active_data25','$active_data26','$active_data27','$active_data28','$active_data29','$active_data30',
      '$edu_data1','$edu_data2','$edu_data3','$edu_data4','$edu_data5','$edu_data6','$edu_data7','$edu_data8','$edu_data9','$edu_data10',
      '$edu_data11','$edu_data12','$edu_data13','$edu_data14','$edu_data15','$edu_data16','$edu_data17','$edu_data18','$edu_data19','$edu_data20',
      '$edu_data21','$edu_data22','$edu_data23','$edu_data24','$edu_data25','$edu_data26','$edu_data27','$edu_data28','$edu_data29','$edu_data30',
      '$edu_data31','$edu_data32','$edu_data33','$edu_data34','$edu_data35','$edu_data36','$edu_data37','$edu_data38','$edu_data39','$edu_data40')");

      mysqli_query($con,"update recruit_able_user set update_date = NOW() where id='$user_id'");

      echo "success";
    }
    else
    {
      mysqli_query($con,"update apply_step_2 
      set sch_data1='$sch_data1',sch_data2='$sch_data2',sch_data3='$sch_data3',highschool_state='$highschool_state',qualification_exam='$qualification_exam',
      sch_1_data1='$sch_1_data1',sch_1_data2='$sch_1_data2',sch_1_data3='$sch_1_data3',sch_1_data4='$sch_1_data4',sch_1_data5='$sch_1_data5',
      sch_1_data6='$sch_1_data6',sch_1_data7='$sch_1_data7',sch_1_data8='$sch_1_data8',sch_1_data9='$sch_1_data9',sch_1_data10='$sch_1_data10',
      sch_2_data1='$sch_2_data1',sch_2_data2='$sch_2_data2',sch_2_data3='$sch_2_data3',sch_2_data4='$sch_2_data4',sch_2_data5='$sch_2_data5',
      sch_2_data6='$sch_2_data6',sch_2_data7='$sch_2_data7',sch_2_data8='$sch_2_data8',sch_2_data9='$sch_2_data9',sch_2_data10='$sch_2_data10',
      sch_3_data1='$sch_3_data1',sch_3_data2='$sch_3_data2',sch_3_data3='$sch_3_data3',sch_3_data4='$sch_3_data4',sch_3_data5='$sch_3_data5',
      sch_3_data6='$sch_3_data6',sch_3_data7='$sch_3_data7',sch_3_data8='$sch_3_data8',sch_3_data9='$sch_3_data9',sch_3_data10='$sch_3_data10',
      grad_1_data1='$grad_1_data1',grad_1_data2='$grad_1_data2',grad_1_data3='$grad_1_data3',grad_1_data4='$grad_1_data4',grad_1_data5='$grad_1_data5',
      grad_1_data6='$grad_1_data6',grad_1_data7='$grad_1_data7',grad_1_data8='$grad_1_data8',grad_1_data9='$grad_1_data9',grad_1_data10='$grad_1_data10',
      grad_2_data1='$grad_2_data1',grad_2_data2='$grad_2_data2',grad_2_data3='$grad_2_data3',grad_2_data4='$grad_2_data4',grad_2_data5='$grad_2_data5',
      grad_2_data6='$grad_2_data6',grad_2_data7='$grad_2_data7',grad_2_data8='$grad_2_data8',grad_2_data9='$grad_2_data9',grad_2_data10='$grad_2_data10',
      grad_3_data1='$grad_3_data1',grad_3_data2='$grad_3_data2',grad_3_data3='$grad_3_data3',grad_3_data4='$grad_3_data4',grad_3_data5='$grad_3_data5',
      grad_3_data6='$grad_3_data6',grad_3_data7='$grad_3_data7',grad_3_data8='$grad_3_data8',grad_3_data9='$grad_3_data9',grad_3_data10='$grad_3_data10',
      career_sel='$career_sel',career_input='$career_input',career_sel2='$career_sel2',career_input2='$career_input2',
      major_history_1='$major_history_1',major_history_2='$major_history_2',major_history_3='$major_history_3',major_history_4='$major_history_4',major_history_5='$major_history_5',
      active_data1='$active_data1',active_data1_1='$active_data1_1',active_data2='$active_data2',active_data3='$active_data3',active_data4='$active_data4',active_data4_1='$active_data4_1',
      active_data5='$active_data5',active_data6='$active_data6',active_data7='$active_data7',active_data7_1='$active_data7_1',active_data8='$active_data8',active_data9='$active_data9',active_data10='$active_data10',
      active_data10_1='$active_data10_1',active_data11='$active_data11',active_data12='$active_data12',active_data13='$active_data13',active_data13_1='$active_data13_1',active_data14='$active_data14',active_data15='$active_data15',
      active_data16='$active_data16',active_data17='$active_data17',active_data18='$active_data18',active_data19='$active_data19',active_data20='$active_data20',
      active_data21='$active_data21',active_data22='$active_data22',active_data23='$active_data23',active_data24='$active_data24',active_data25='$active_data25',
      active_data26='$active_data26',active_data27='$active_data27',active_data28='$active_data28',active_data29='$active_data29',active_data30='$active_data30',
      edu_data1='$edu_data1',edu_data2='$edu_data2',edu_data3='$edu_data3',edu_data4='$edu_data4',edu_data5='$edu_data5',
      edu_data6='$edu_data6',edu_data7='$edu_data7',edu_data8='$edu_data8',edu_data9='$edu_data9',edu_data10='$edu_data10',
      edu_data11='$edu_data11',edu_data12='$edu_data12',edu_data13='$edu_data13',edu_data14='$edu_data14',edu_data15='$edu_data15',
      edu_data16='$edu_data16',edu_data17='$edu_data17',edu_data18='$edu_data18',edu_data19='$edu_data19',edu_data20='$edu_data20',
      edu_data21='$edu_data21',edu_data22='$edu_data22',edu_data23='$edu_data23',edu_data24='$edu_data24',edu_data25='$edu_data25',
      edu_data26='$edu_data26',edu_data27='$edu_data27',edu_data28='$edu_data28',edu_data29='$edu_data29',edu_data30='$edu_data30',
      edu_data31='$edu_data31',edu_data32='$edu_data32',edu_data33='$edu_data33',edu_data34='$edu_data34',edu_data35='$edu_data35',
      edu_data36='$edu_data36',edu_data37='$edu_data37',edu_data38='$edu_data38',edu_data39='$edu_data39',edu_data40='$edu_data40'
      where userid='$user_id'");

      mysqli_query($con,"update recruit_able_user set update_date = NOW() where id='$user_id'");
      //수정

      echo "success";
    }
  }

  mysqli_query($con,"update recruit_able_user set apply_step = '$step' where id='$user_id'");



  mysqli_close($con);
?>

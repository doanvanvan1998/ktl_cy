<!DOCTYPE html>
<?php include 'php/common_header.php' ?>
<link rel="stylesheet" href="css/submissioncomplete.css">
<body>
  <div class="wrap">
    <?php include 'php/common_header_menu.php' ?>
    <?php include 'php/common_usercheck.php' ?>
    <?php
      include "php/mysql.php";

      $query="select user_address,user_detailAddress,sel_tab_num,step0_view_sel,step0_view_sel2,sel2_tab_num,sel3_tab_num,sel4_tab_num,data1,data2,data3,data4,data5,data6,data7,data8,check_phone,data12,data13 from apply_step_1 where userid = '$usernum'";
      $Aresult = mysqli_query($con,$query);
      $Arow = mysqli_fetch_array($Aresult);
      $userAddress = $Arow[0]." ".$Arow[1];
      $strApply = "";
      $strApply2 = "";
      $strApply3 = "";
      $strApply4 = "";

      if($Arow['sel_tab_num'] == 2) { $strApply = "대상 ( ".$Arow['step0_view_sel']." / ".$Arow['step0_view_sel2']." )"; }
      else if($Arow['sel_tab_num'] == 1) { $strApply = "비대상"; }

      if($Arow['sel4_tab_num'] == 2) { $strApply2 = "대상 ( 보훈번호 : ".$Arow['data1']." / 관계 : ".$Arow['data2']." / 비율 : ".$Arow['data3']." )"; }
      else if($Arow['sel4_tab_num'] == 1) { $strApply2 = "비대상"; }

      if($Arow['sel2_tab_num'] == 1) { $strApply3 = "비대상"; }
      else if($Arow['sel2_tab_num'] == 2) { $strApply3 = "군필 - ".$Arow['data5']." [ ".$Arow['data6']." ~ ".$Arow['data7']."]"; }
      else if($Arow['sel2_tab_num'] == 3) { $strApply3 = "미필"; }
      else if($Arow['sel2_tab_num'] == 4) { $strApply3 = "면제"; }
      else if($Arow['sel2_tab_num'] == 5) { $strApply3 = "복무중 [ ".$Arow['data6']." ~ ".$Arow['data7']."]"; }

      if($Arow['sel3_tab_num'] == 1) { $strApply4 = "본인"; }
      else if($Arow['sel3_tab_num'] == 2) { $strApply4 = "보호자 ( 이름 : ".$Arow['data8']." / 사유 : ".$Arow['data13']." )"; }
      else if($Arow['sel3_tab_num'] == 3) { $strApply4 = "대리인 ( 이름 : ".$Arow['data8']." / 소속명 : ".$Arow['data12']." ) / 사유 : ".$Arow['data13']." )"; }

      $query="select sch_data1,sch_data2,sch_data3,highschool_state,qualification_exam,sch_1_data1,sch_1_data2,sch_1_data3,sch_1_data4,sch_1_data5,sch_1_data6,sch_1_data7,sch_2_data1,sch_2_data2,sch_2_data3,sch_2_data4,sch_2_data5,sch_2_data6,sch_2_data7,sch_3_data1,sch_3_data2,sch_3_data3,sch_3_data4,sch_3_data5,sch_3_data6,sch_3_data7,grad_1_data1,grad_1_data2,grad_1_data3,grad_1_data4,grad_1_data5,grad_1_data6,grad_1_data7,grad_2_data1,grad_2_data2,grad_2_data3,grad_2_data4,grad_2_data5,grad_2_data6,grad_2_data7,grad_3_data1,grad_3_data2,grad_3_data3,grad_3_data4,grad_3_data5,grad_3_data6,grad_3_data7,career_sel,career_input,major_history_1,major_history_2,major_history_3,major_history_4,major_history_5,active_data1,active_data2,active_data3,active_data4,active_data5,active_data6,active_data7,active_data8,active_data9,active_data10,active_data11,active_data12,active_data13,active_data14,active_data15,active_data16,active_data17,active_data18,active_data19,active_data20,active_data21,active_data22,active_data23,active_data24,active_data25,active_data26,active_data27,active_data28,active_data29,active_data30,edu_data1,
edu_data2,edu_data3,edu_data4,edu_data5,edu_data6,edu_data7,edu_data8,edu_data9,edu_data10,edu_data11,edu_data12,edu_data13,edu_data14,edu_data15,edu_data16,
edu_data17,edu_data18,edu_data19,edu_data20,edu_data21,edu_data22,edu_data23,edu_data24,edu_data25,edu_data26,edu_data27,edu_data28,edu_data29,edu_data30,edu_data31,edu_data32,edu_data33,
edu_data34,edu_data35,edu_data36,edu_data37,edu_data38,edu_data39,edu_data40 from apply_step_2 where userid = '$usernum'";
      $Aresult2 = mysqli_query($con,$query);
      $Arow2 = mysqli_fetch_array($Aresult2);

      $strApply5 = "정보없음";
      $strApply6 = "정보없음";
      $strApply7 = "정보없음";
      $strApply8 = "";
      $strApply9 = "";

      if($Arow2['highschool_state'] == 1) { $strApply5 = "대입검정고시"; }
      else if($Arow2['qualification_exam'] == 1) { $strApply5 = "고등학교미만 졸업"; }
      else
      {
        if($Arow2['sch_data2'] == "") { $Arow2['sch_data2'] = "정보없음"; }
        $strApply5 = $Arow2['sch_data1']." / 졸업연도 : ".$Arow2['sch_data2']." - ".$Arow2['sch_data3'];
      }

      if($Arow2['sch_1_data1'] != "")
      {
        $strApply6 = $Arow2['sch_1_data1']." / 학교명 : ".$Arow2['sch_1_data2']."( ".$Arow2['sch_1_data3']." ~ ".$Arow2['sch_1_data3'].") - ".$Arow2['sch_1_data5']."<br>";
        $strApply6 .= "전공 : ".$Arow2['sch_1_data6']." / 학점 : ".$Arow2['sch_1_data7']."/".$Arow2['sch_1_data8'];
      }
      if($Arow2['sch_2_data1'] != "")
      {
        $strApply6 .= "<br>";
        $strApply6 .= $Arow2['sch_2_data1']." / 학교명 : ".$Arow2['sch_2_data2']."( ".$Arow2['sch_2_data3']." ~ ".$Arow2['sch_2_data3'].") - ".$Arow2['sch_2_data5']."<br>";
        $strApply6 .= "전공 : ".$Arow2['sch_2_data6']." / 학점 : ".$Arow2['sch_2_data7']."/".$Arow2['sch_2_data8'];
      }
      if($Arow2['sch_3_data1'] != "")
      {
        $strApply6 .= "<br>";
        $strApply6 .= $Arow2['sch_3_data1']." / 학교명 : ".$Arow2['sch_3_data2']."( ".$Arow2['sch_3_data3']." ~ ".$Arow2['sch_3_data3'].") - ".$Arow2['sch_3_data5']."<br>";
        $strApply6 .= "전공 : ".$Arow2['sch_3_data6']." / 학점 : ".$Arow2['sch_3_data7']."/".$Arow2['sch_3_data8'];
      }
      if($Arow2['sch_4_data1'] != "")
      {
        $strApply6 .= "<br>";
        $strApply6 .= $Arow2['sch_4_data1']." / 학교명 : ".$Arow2['sch_4_data2']."( ".$Arow2['sch_4_data3']." ~ ".$Arow2['sch_4_data3'].") - ".$Arow2['sch_4_data5']."<br>";
        $strApply6 .= "전공 : ".$Arow2['sch_4_data6']." / 학점 : ".$Arow2['sch_4_data7']."/".$Arow2['sch_4_data8'];
      }
      if($Arow2['sch_5_data1'] != "")
      {
        $strApply6 .= "<br>";
        $strApply6 .= $Arow2['sch_5_data1']." / 학교명 : ".$Arow2['sch_5_data2']."( ".$Arow2['sch_5_data3']." ~ ".$Arow2['sch_5_data3'].") - ".$Arow2['sch_5_data5']."<br>";
        $strApply6 .= "전공 : ".$Arow2['sch_5_data6']." / 학점 : ".$Arow2['sch_5_data7']."/".$Arow2['sch_5_data8'];
      }

      if($Arow2['grad_1_data1'] != "")
      {
        //대학원
        $strApply7 = "학교명 : ".$Arow2['grad_1_data1']."( ".$Arow2['grad_1_data2']." ~ ".$Arow2['grad_1_data3'].") - ".$Arow2['grad_1_data4']."<br>";
        $strApply7 .= "전공 : ".$Arow2['grad_1_data5']." / 학점 : ".$Arow2['grad_1_data6']."/".$Arow2['grad_1_data7'];
      }
      else if($Arow2['grad_2_data1'] != "")
      {
        //대학원
        $strApply7 .= "<br>";
        $strApply7 .= "학교명 : ".$Arow2['grad_2_data1']."( ".$Arow2['grad_2_data2']." ~ ".$Arow2['grad_2_data3'].") - ".$Arow2['grad_2_data4']."<br>";
        $strApply7 .= "전공 : ".$Arow2['grad_2_data5']." / 학점 : ".$Arow2['grad_2_data6']."/".$Arow2['grad_2_data7'];
      }
      else if($Arow2['grad_3_data1'] != "")
      {
        //대학원
        $strApply7 .= "<br>";
        $strApply7 .= "학교명 : ".$Arow2['grad_3_data1']."( ".$Arow2['grad_3_data2']." ~ ".$Arow2['grad_3_data3'].") - ".$Arow2['grad_3_data4']."<br>";
        $strApply7 .= "전공 : ".$Arow2['grad_3_data5']." / 학점 : ".$Arow2['grad_3_data6']."/".$Arow2['grad_3_data7'];
      }

      $query="select licenses_txt_1,licenses_txt_2,licenses_txt_3,licenses_txt_4,licenses_txt_5,licenses_txt_6,licenses_txt_7,licenses_txt_8,
      licenses_txt_9,licenses_txt_10,licenses_txt_11,licenses_txt_12,licenses_txt_13,licenses_txt_14,licenses_txt_15,licenses_txt_16,licenses_txt_17,
      licenses_txt_18,awards_txt_1_1,awards_txt_1_2,awards_txt_1_3,awards_txt_1_4,awards_txt_2_1,awards_txt_2_2,awards_txt_2_3,awards_txt_2_4,
      awards_txt_3_1,awards_txt_3_2,awards_txt_3_3,awards_txt_3_4,awards_txt_4_1,awards_txt_4_2,awards_txt_4_3,awards_txt_4_4,
      awards_txt_5_1,awards_txt_5_2,awards_txt_5_3,awards_txt_5_4,awards_txt_6_1,awards_txt_6_2,awards_txt_6_3,awards_txt_6_4,
      awards_txt_7_1,awards_txt_7_2,awards_txt_7_3,awards_txt_7_4,userlink from apply_step_3 where userid = '$usernum'";
      $Aresult3 = mysqli_query($con,$query);
      $Arow3 = mysqli_fetch_array($Aresult3);

      $query="select intro_sel_1,intro_txt_1_1,intro_txt_1_2,intro_sel_2,intro_txt_2_1,intro_txt_2_2,intro_sel_3,intro_txt_3_1,intro_txt_3_2,intro_sel_4,intro_txt_4_1,intro_txt_4_2,intro_sel_5,intro_txt_5_1,intro_txt_5_2 from apply_step_4 where userid = '$usernum'";
      $Aresult4 = mysqli_query($con,$query);
      $Arow4 = mysqli_fetch_array($Aresult4);

      mysqli_close($con);
    ?>
    <div class="contents_wrap">
      <div class="container">
        <div class="flex-direction">
          <img src="images/icons/ic_complete.png" alt="제출완료">
          <h2>지원서를 성공적으로 제출했습니다.</h2>
          <p>
            인생의 또 다른 중요한 시작을, 함께 해주셔서 감사합니다.<br>
            이번 지원을 시작으로, 계속 좋은 인연 이어가기를 진심으로 바라고 응원합니다.<br>
            <br>
            한국산업기술시험원 드림
          </p>
          <div class="btns flex">
            <div class="btn flex btn_applicationcheck"><span>지원서 확인</span></div>
            <div class="btn flex btn_movemain"><span>메인으로</span></div>
          </div>
        </div>
      </div>
    </div>
    <?php include 'php/common_footer.php' ?>
  </div>
  <div class="popup_complete_wrap popup_wrap">
    <div class="popup_complete popup">
      <div class="popup_title flex">
        <div class="flex slogo"><img src="images/icons/ic_slogo.png" alt="KTL"></div>
        <img src="images/btns/btn_cancel.png" alt="취소" class="btn_cancel">
      </div>
      <div class="complete_title">
        <h6>
          [<?=$username?>] 님의 지원이<br>
          정상적으로 완료되었습니다.
        </h6>
      </div>
      <div class="complete_info flex-direction">
        <div class="flex-direction info">
          <strong>지원공고</strong>
          <div class="flex-direction">
            <p>
              2022년 문화/예술 장애인 채용공고 지원서
            </p>
          </div>
        </div>
        <div class="flex-direction info">
          <strong>기본정보</strong>
          <div class="flex-direction">
            <span>이름 : <?=$username?></span>
            <span>연락처 : <?=$userphone?></span>
            <span>이메일 : <?=$useremail?></span>
            <span>주소 : <?=$userAddress?></span>
            <span>장애여부 : <?=$strApply?></span>
            <span>보훈사항 : <?=$strApply2?></span>
            <span>병력사항 : <?=$strApply3?></span>
            <span>대리인정보 : <?=$strApply4?></span>
          </div>
        </div>
        
      </div>
    </div>
  </div>
<?php include 'php/common_script.php' ?>
<script type="text/javascript">
  let btnCheck = $('.btn_applicationcheck');
  let btnMain = $('.btn_movemain');
  btnCheck.click(function(){
    $('.popup_complete_wrap').fadeIn(300);
  });
  btnMain.click(function(){
    location.href = 'index.html';
  });
  let btnCancel = $('.btn_cancel');
  btnCancel.click(function(){
    $('.popup_wrap').hide();
  });
</script>
</body>
</html>

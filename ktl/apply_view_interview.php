<?php
  session_start();
?>
<!DOCTYPE html>
<?php include 'php/common_header.php' ?>
<link rel="stylesheet" href="css/applicationcorrectiondetail.css">
<script src="js/jquery.form.js"></script>
<body>
  <div class="wrap">

    <?php include 'php/common_header_menu2.php' ?>
    <?php include 'php/common_usercheck2.php' ?>
    <?php
      $user_rand_code = $user_code;

      include "php/mysql.php";

      $query="select user_address,user_detailAddress,sel_tab_num,step0_view_sel,step0_view_sel2,sel2_tab_num,sel3_tab_num,sel4_tab_num,data1,data2,data3,data4,data5,data6,data7,data8,check_phone,data12,data13 from apply_step_1 where userid='$Urow[4]'";
      $ApplyResult1 = mysqli_query($con,$query);
      $ApplyRow1 = mysqli_fetch_array($ApplyResult1);

      $user_address = $ApplyRow1[0];
      $user_detailAddress = $ApplyRow1[1];
      $sel_tab_num = $ApplyRow1[2];
      $step0_view_sel = $ApplyRow1[3];
      $step0_view_sel2 = $ApplyRow1[4];
      $sel2_tab_num = $ApplyRow1[5];
      $sel3_tab_num = $ApplyRow1[6];
      $sel4_tab_num = $ApplyRow1[7];
      $sel4_tab_num = $ApplyRow1[7];
      $data1 = $ApplyRow1['data1'];
      $data2 = $ApplyRow1['data2'];
      $data3 = $ApplyRow1['data3'];
      $data4 = $ApplyRow1['data4'];
      $data5 = $ApplyRow1['data5'];
      $data6 = $ApplyRow1['data6'];
      $data7 = $ApplyRow1['data7'];
      $data8 = $ApplyRow1['data8'];
      $check_phone = $ApplyRow1['check_phone'];
      $data12 = $ApplyRow1['data12'];
      $data13 = $ApplyRow1['data13'];

      $check_phone = Decrypt($check_phone,$secret_key,$secret_iv);

      $strStep = "";

      if($Urow[3] == 1) { $strStep = "기본정보 작성중";}
      else if($Urow[3] == 2) { $strStep = "학력/경력/교육활동 작성중";}
      else if($Urow[3] == 3) { $strStep = "자격/수상/포트폴리오 작성중";}
      else if($Urow[3] == 4) { $strStep = "자기소개서 작성중";}
      else if($Urow[3] == 5) { $strStep = "최종제출완료";}

      echo "<input type='hidden' id='sel_tab_num' value='$sel_tab_num' />";  //장애여부
      echo "<input type='hidden' id='sel2_tab_num' value='$sel2_tab_num' />";  //병역구분
      echo "<input type='hidden' id='sel3_tab_num' value='$sel3_tab_num' />";  //작성자
      echo "<input type='hidden' id='sel4_tab_num' value='$sel4_tab_num' />";  //보훈

      echo "<input type='hidden' id='db_step0_view_sel' value='$step0_view_sel' />";
      echo "<input type='hidden' id='db_step0_view_sel2' value='$step0_view_sel2' />";
      echo "<input type='hidden' id='db_data3' value='$data3' />";
      echo "<input type='hidden' id='db_data4' value='$data4' />";
      echo "<input type='hidden' id='db_data5' value='$data5' />";
      echo "<input type='hidden' id='db_data6' value='$data6' />";
      echo "<input type='hidden' id='db_data7' value='$data7' />";

    ?>
    <div class="contents_wrap">
      <div class="container">
        <?php
          //$step = $_GET["step"];
          $str_step = $Urow[7];
          $step = $str_step;
          if($str_step == 1) { $str_step = "서류평가"; }
          else if($str_step == 2) { $str_step = "면접평가"; }
          else if($str_step == 3) { $str_step = "최종합격"; }
        ?>
        <h2>면접관 평가 ( <?=$str_step?> )</h2><br>
        <div class="step flex-direction" style='margin:0 auto;border:1px solid #e0e0e0;margin-bottom:30px;'>
          <?php
          $userid = "";

          if(isset($_GET["userid"]))
          {
            $userid = $_GET["userid"];
          }
          if($userid == "") { return; }

          $nSubAdminCheck = 0;
          $TotalScore = 0;
          $query="select id,username from recruit_able_subadmin where userid='$userid'";
          $SubAdminResult = mysqli_query($con,$query);
          $SubAdminRow = mysqli_fetch_array($SubAdminResult);

          $query="select feedback,score from recruit_able_score where step='$step' and userid='$Urow[4]' and subadmin='$SubAdminRow[0]'";
          $SubAdminResult2 = mysqli_query($con,$query);
          $SubAdminRow2 = mysqli_fetch_array($SubAdminResult2);

          echo "<div style='padding:15px;font-size:16px;'>[ ".$SubAdminRow[1]."면접관님 ]<br><br>
            <input type='hidden' id='sel_interview_user' value='$SubAdminRow[0]' />
            <input type='number' id='user_score' placeholder='점수를 입력하시기 바랍니다.' value='$SubAdminRow2[1]' style='font-size:16px;width:98%;border:1px solid grey;margin-bottom:10px;padding:1%;'/><br>
            <textarea name='feedback' id='feedback' placeholder='피드백을 입력하시기 바랍니다.' style='padding:1%;width:98%;font-size:16px;border:1px solid grey;margin-bottom:20px;height:200px;'>$SubAdminRow2[0]</textarea>
            <button style='background:linear-gradient(to right , #3b73e4 0% , #0559b5 100%);width:200px;padding:15px;color:#fff;font-size:16px;' onclick='onResultSave($Id,$step)'>평가등록</button></div>";

          ?>

        </div>
        <script>
          function onResultSave(Id,step)
          {
            if($("#user_score").val() == "") { alert("점수를 입력하시기 바랍니다."); $("#user_score").focus(); return; }
            else if($("#feedback").val() == "") { alert("피드백을 입력하시기 바랍니다."); $("#feedback").focus(); return; }

            $.post("../../php/fnc/result_add.php",
            {
              Id : Id,
              step : step,
              sel_interview_user : $("#sel_interview_user").val(),
              user_score : $("#user_score").val(),
              feedback : $("#feedback").val()
            },
             function(data,status){
             if(status != "fail"){
              alert("평가등록이 완료되었습니다.");
             }
             else
             {
              alert("네트워크 오류");
             }
            });
          }
        </script>
        <div style='clear:both'></div>
        <div class="step flex-direction">
          <h2>지원서 작성</h2>
          <ul class="step_list flex">
            <li class="flex on step1_active">
              <span>1. <span class="mobiletabview">기본정보</span></span>
            </li>
            <li class="flex step2_active">
              <span>2. <span class="mobiletabview">학력/경력</span><span class="mobilenone">/교육활동</span></span>
            </li>
            <li class="flex step3_active">
              <span>3. <span class="mobiletabview">자격증/수상</span><span class="mobilenone">/포트폴리오</span></span>
            </li>
            <li class="flex step4_active">
              <span>4. <span class="mobiletabview">자기소개서</span></span>
            </li>
            <li class="flex step5_active">
              <span>5. <span class="mobiletabview">최종제출</span></span>
            </li>
          </ul>
          <div class="steps_wrap">
            <div class="step_con step1">
              <div class="basic_infomation_wrap">
                <h2>기본정보</h2>
              </div>
              <div class="basic_infomation">
                <div class="flex bordernone mobile">
                  <div class="form_title flex-direction"><h6>이름</h6></div>
                  <div class="form_con flex-direction"><span><?=$username?></span></div>
                </div>
                <div class="flex bordernone mobile">
                  <div class="form_title"><h6>연락처</h6></div>
                  <div class="form_con"><span><?=$userphone?></span></div>
                </div>
                <div class="flex">
                  <div class="form_title"><h6>이메일</h6></div>
                  <div class="form_con"><span><?=$useremail?></span></div>
                </div>
                <div class="flex baseline">
                  <div class="form_title flex-direction">
                    <h6>주소</h6>
                  </div>
                  <div class="form_con">
                    <div class="flex-direction address_form" style='font-size:15px;'>
                      <?=$user_address?> <?=$user_detailAddress?>
                    </div>
                  </div>
                </div>
                <div class="flex">
                  <div class="form_title flex-direction">
                    <h6>장애여부</h6>
                  </div>
                  <div class="form_con">
                    <div class="flex chse">
                      <div class="choice flex">
                        <?php
                          if($sel_tab_num == 1)
                          {
                            echo "<div class='step0_tab step0_1_tab flex on' onclick='onStepTab_1(1,1)'><span>비대상</span></div>";
                          }
                          else
                          {
                            echo "<div class='step0_tab step0_2_tab flex on'><span>대상</span></div>";
                          }
                        ?>

                      </div>
                      <?php
                        if($sel_tab_num == 1)
                        {
                          echo "<div class='step0_view selectbox flex' style='display:none;'>";
                        }
                        else
                        {
                          echo "<div class='step0_view selectbox flex'>";
                        }
                      ?>
                        <select disabled style='color:#000' disabled style='color:#000' id='step0_view_sel'>
                          <option value=0>장애정도</option>
                          <option>중증 (기존1~3급)</option>
                          <option>경증 (기존4~6급)</option>
                        </select>
                        <select disabled style='color:#000' disabled style='color:#000' id='step0_view_sel2'>
                          <option value=0>내용</option>
                          <option>간장애</option>
                          <option>뇌전증장애(간질장애)</option>
                          <option value='뇌병변장애'>뇌병변장애</option>
                          <option>시각장애</option>
                          <option>신장장애</option>
                          <option>심장장애</option>
                          <option>안면변형장애</option>
                          <option>장루/요루장애</option>
                          <option>정신장애</option>
                          <option>청각장애</option>
                          <option>호흡기장애</option>
                          <option>지체장애</option>
                          <option>언어장애</option>
                          <option>지적장애(정신박약/정신지체)</option>
                          <option>자폐성장애(발달장애)</option>
                          <option>기타장애</option>
                        </select>
                      </div>
                      <script>
                        $("#step0_view_sel").val($("#db_step0_view_sel").val()).prop("selected", true);
                        $("#step0_view_sel2").val($("#db_step0_view_sel2").val()).prop("selected", true);
                      </script>
                    </div>
                  </div>
                </div>
                <script>
                  function onStepTab_1(Id,Num)
                  {
                    $("#sel_tab_num").val(Id);
                    if(Id == 1)
                    {
                      $(".step0_view").hide();
                      $("#step0_view_sel").val(0);
                      $("#step0_view_sel2").val(0);

                    }
                    else
                    {
                      $(".step0_view").show();
                    }
                    $(".step0_tab").removeClass("on");
                    $(".step0_"+Id+"_tab").addClass("on");
                  }
                </script>
                <div class="flex baseline">
                  <div class="form_title flex-direction">
                    <h6>보훈여부</h6>
                  </div>
                  <div class="form_con">
                    <div class="flex chse chsemili">
                      <div class="choice flex">
                        <?php
                          if($sel4_tab_num == 1)
                          {
                            echo "<div class='step_tab3 step3_1_tab flex on'><span>비대상</span></div>";
                          }
                          else
                          {
                            echo "<div class='step_tab3 step3_1_tab flex on'><span>대상</span></div>";
                          }
                        ?>
                      </div>
                      <?php
                        if($sel4_tab_num == 1)
                        {
                          echo "<div class='selectbox flex' id='military_view' style='display:none;'>";
                        }
                        else
                        {
                          echo "<div class='selectbox flex' id='military_view'>";
                        }
                      ?>
                      <div id='data1' style='font-size:15px;'>
                        보훈번호 : <?=$data1?> | 관계 : <?=$data2?> | 보훈비율 : <?=$data3?>
                      </div>
                      </div>
                      <script>
                        $("#data3").val($("#db_data3").val()).prop("selected", true);
                      </script>
                    </div>
                  </div>
                </div>
                <div class="flex bordernone mobile">
                  <div class="form_title flex-direction">
                    <h6>병역구분</h6>
                  </div>
                  <div class="form_con">
                    <div class="choice chmy flex">
                      <?php
                        if($sel2_tab_num == 1)
                        {
                          echo "<div class='step_tab step_1_tab flex on'><span>비대상</span></div>";
                        }
                        else if($sel2_tab_num == 2)
                        {
                          echo "<div class='step_tab step_2_tab flex on'><span>군필</span></div>";
                        }
                        else if($sel2_tab_num == 3)
                        {
                          echo "<div class='step_tab step_3_tab flex on'><span>미필</span></div>";
                        }
                        else if($sel2_tab_num == 4)
                        {
                          echo "<div class='step_tab step_4_tab flex on'><span>면제</span></div>";
                        }
                        else if($sel2_tab_num == 5)
                        {
                          echo "<div class='step_tab step_5_tab flex on'><span>복무중</span></div>";
                        }
                      ?>
                    </div>
                  </div>
                </div>
                <!-- <div class="flex sum bordernone mobile step1_tab1" style='display:none;'>
                  <div class="form_title flex-direction">
                    <h6>계급</h6>
                  </div>
                  <div class="form_con">
                    <select disabled style='color:#000' disabled style='color:#000' class="log" id='data4'>
                      <option value=0>계급을 선택하세요.</option>
                      <option>이등병</option>
                      <option>일병</option>
                      <option>상병</option>
                      <option>병장</option>
                      <option>하사</option>
                      <option>중사</option>
                      <option>상사</option>
                      <option>소위</option>
                      <option>중위</option>
                      <option>대위</option>
                    </select>
                  </div>
                </div> -->
                <div class="flex sum bordernone mobile step1_tab1" style='display:none;'>
                  <div class="form_title flex-direction">
                    <h6>면제사유</h6>
                  </div>
                  <div class="form_con">
                    <input type='text' disabled placeholder="면제사유" id='data4' required />
                    <!-- <select disabled style='color:#000' disabled style='color:#000' class="log" id='data4'>
                      <option value=0>계급을 선택하세요.</option>
                      <option>이등병</option>
                      <option>일병</option>
                      <option>상병</option>
                      <option>병장</option>
                      <option>하사</option>
                      <option>중사</option>
                      <option>상사</option>
                      <option>소위</option>
                      <option>중위</option>
                      <option>대위</option>
                    </select> -->
                  </div>
                </div>
                <!-- 제대버튼 눌렀을 떄 -->
                <div class="flex sum bordernone mobile step1_tab2" style='display:none;'>
                  <div class="form_title flex-direction">
                    <h6>제대구분</h6>
                  </div>
                  <div class="form_con">
                    <select disabled style='color:#000' disabled style='color:#000' class="log" id='data5'>
                      <option value="">제대구분을 선택하세요.</option>
                      <option>만기 제대</option>
                      <option>명예 제대</option>
                      <option>불명예 제대</option>
                      <option>의가사 제대</option>
                      <option>의병 제대</option>
                    </select>
                  </div>
                </div>
                <div class="flex sum step1_tab3" style='display:none;'>
                  <div class="form_title flex-direction">
                    <h6>복무기간</h6>
                  </div>
                  <div class="form_con">
                    <div class="inputdatebox flex">
                      <input type="date" id='data6'>
                      <span>-</span>
                      <input type="date" id='data7'>
                    </div>
                  </div>
                </div>
                <script>
                  if($("#sel2_tab_num").val() == 2)
                  {
                    $(".step1_tab2").show();
                    $(".step1_tab3").show();

                    $("#step0_view_sel").val($("#db_step0_view_sel").val()).prop("selected", true);
                    $("#step0_view_sel").val($("#db_step0_view_sel").val()).prop("selected", true);

                  }
                  else if($("#sel2_tab_num").val() == 5)
                  {
                    //$(".step1_tab1").show();
                    $(".step1_tab3").show();

                    //$("#data4").val($("#db_data4").val()).prop("selected", true);
                    $("#data6").val($("#db_data6").val());
                    $("#data7").val($("#db_data7").val());

                  }
                  else if($("#sel2_tab_num").val() == 4)
                  {
                    //$(".step1_tab1").show();
                    $(".step1_tab1").show();

                    $("#data4").val($("#db_data4").val());

                  }
                </script>
                <div class="flex bordernone sum topval mobile">
                  <div class="form_title flex-direction">
                    <h6>작성자</h6>
                  </div>
                  <div class="form_con">
                    <div class="choice chmy flex" disabled>
                      <?php
                        if($sel3_tab_num == 1)
                        {
                          echo "<div class='step_tab2 step2_1_tab flex on'><span>본인</span></div>";
                        }
                        else if($sel3_tab_num == 2)
                        {
                          echo "<div class='step_tab2 step2_2_tab flex on'><span>보호자</span></div>";
                        }
                        else if($sel3_tab_num == 3)
                        {
                          echo "<div class='step_tab2 step2_3_tab flex on'><span>대리인</span></div>";
                        }
                      ?>
                    </div>
                  </div>
                </div>
                <div style='height:10px;'></div>
                <?php
                  if($sel3_tab_num == 1)
                  {
                    echo "<div id='agent_view' style='display:none;'>";
                  }
                  else if($sel3_tab_num == 2)
                  {
                    echo "<div id='agent_view'>";
                  }
                  else if($sel3_tab_num == 3)
                  {
                    echo "<div id='agent_view'>";
                  }
                ?>
                  <div class="flex bordernone sum mobile">
                    <div class="form_title flex-direction">
                      <h6>이름</h6>
                    </div>
                    <div class="form_con">
                      <?php
                        $phoneArr = explode("-",$check_phone);
                      ?>
                      <div class="inputbox">
                        <input type="text" disabled id='data8' value='<?=$data8?>' placeholder="이름을 입력해주세요." required>
                      </div>
                    </div>
                  </div>
                  <div class="flex bordernone sum mobile">
                    <div class="form_title flex-direction">
                      <h6>연락처</h6>
                    </div>
                    <div class="form_con">
                      <div class="phonebox flex">
                        <input type="text" disabled id='data9' maxlength="3" value='<?=$phoneArr[0]?>' required>
                        <span class="linebar"></span>
                        <input type="text" disabled id='data10' maxlength="4" value='<?=$phoneArr[1]?>' required>
                        <span class="linebar"></span>
                        <input type="text" disabled id='data11' maxlength="4" value='<?=$phoneArr[2]?>' required>
                      </div>
                    </div>
                  </div>
                  <div class="flex bordernone sum mobile">
                    <div class="form_title flex-direction">
                      <h6>소속명</h6>
                    </div>
                    <div class="form_con">
                      <div class="inputbox">
                        <input type="text" disabled id='data12' value='<?=$data12?>' placeholder="소속명을 입력해주세요." required>
                      </div>
                    </div>
                  </div>
                  <div class="flex sum botval">
                    <div class="form_title flex-direction">
                      <h6>사유</h6>
                    </div>
                    <div class="form_con">
                      <div class="inputbox">
                        <input type="text" disabled id='data13' value='<?=$data13?>' placeholder="사유를 입력해주세요." required>
                      </div>
                    </div>
                  </div>
                  <!-- <div class="flex mobile">
                    <div class="form_title flex-direction">
                      <h6>대리인작성 동의</h6>
                    </div>
                    <div class="form_con">
                      <div class="flex checkbtn">
                        <div class="btn_contentcheck flex"><span>내용확인</span></div>
                        <span><span>*</span> 필수항목에 동의해주세요.</span>
                      </div>
                    </div>
                  </div> -->
                </div>
              </div>
              <div class="btns_wrap flex">
                <div class="flex btn_prevstep btn" style="display:none"><span>이전단계</span></div>
                <div class="flex btn_nextstep btn" onclick="nextBtn(1);"><span>다음단계</span></div>
              </div>
            </div>
            <script>
              var nCheckView0 = 0;  //대입검정고시
              var nCheckView1 = "";  //전국규모 (콩쿨)대회 및 연주회 참여
              var nCheckView2 = "";  //시·도규모 (콩쿨) 대회 및 연주회 참여
              var nCheckView3 = "";  //공공·민간기관 주최 (콩쿨) 대회 및 연주회 참여
              var nCheckView4 = "";  //기관 및 기업소속 연주단 소속 경력
              var nCheckView5 = "";  //프리랜서 연주자 활동

              var nCheckView = 0;   //고등학교미만 졸업
            </script>
            <?php
              $query="select sch_data1,sch_data2,sch_data3,highschool_state,qualification_exam,sch_1_data1,sch_1_data2,sch_1_data3,sch_1_data4,sch_1_data5,sch_1_data6,sch_1_data7,sch_1_data8,sch_2_data1,sch_2_data2,sch_2_data3,sch_2_data4,sch_2_data5,sch_2_data6,sch_2_data7,sch_2_data8,sch_3_data1,sch_3_data2,sch_3_data3,sch_3_data4,sch_3_data5,sch_3_data6,sch_3_data7,sch_3_data8,grad_1_data1,grad_1_data2,grad_1_data3,grad_1_data4,grad_1_data5,grad_1_data6,grad_1_data7,grad_2_data1,grad_2_data2,grad_2_data3,grad_2_data4,grad_2_data5,grad_2_data6,grad_2_data7,grad_3_data1,grad_3_data2,grad_3_data3,grad_3_data4,grad_3_data5,grad_3_data6,grad_3_data7,career_sel,career_input,major_history_1,major_history_2,major_history_3,major_history_4,major_history_5,active_data1,active_data2,active_data3,active_data4,active_data5,active_data6,active_data7,active_data8,active_data9,active_data10,active_data11,active_data12,active_data13,active_data14,active_data15,active_data16,active_data17,active_data18,active_data19,active_data20,active_data21,active_data22,active_data23,active_data24,active_data25,active_data26,active_data27,active_data28,active_data29,active_data30,edu_data1,
        edu_data2,edu_data3,edu_data4,edu_data5,edu_data6,edu_data7,edu_data8,edu_data9,edu_data10,edu_data11,edu_data12,edu_data13,edu_data14,edu_data15,edu_data16,
        edu_data17,edu_data18,edu_data19,edu_data20,edu_data21,edu_data22,edu_data23,edu_data24,edu_data25,edu_data26,edu_data27,edu_data28,edu_data29,edu_data30,edu_data31,edu_data32,edu_data33,
        edu_data34,edu_data35,edu_data36,edu_data37,edu_data38,edu_data39,edu_data40 from apply_step_2 where userid = '$usernum'";
              $Aresult2 = mysqli_query($con,$query);
              $Arow2 = mysqli_fetch_array($Aresult2);

              $highschool_state = $Arow2['highschool_state'];

              $sch_data1 = $Arow2['sch_data1'];
              $sch_data2 = $Arow2['sch_data2'];
              $sch_data3 = $Arow2['sch_data3'];

              $sch_1_data1 = $Arow2['sch_1_data1'];
              $sch_1_data2 = $Arow2['sch_1_data2'];
              $sch_1_data3 = $Arow2['sch_1_data3'];
              $sch_1_data4 = $Arow2['sch_1_data4'];
              $sch_1_data5 = $Arow2['sch_1_data5'];
              $sch_1_data6 = $Arow2['sch_1_data6'];
              $sch_1_data7 = $Arow2['sch_1_data7'];
              $sch_1_data8 = $Arow2['sch_1_data8'];

              $sch_2_data1 = $Arow2['sch_2_data1'];
              $sch_2_data2 = $Arow2['sch_2_data2'];
              $sch_2_data3 = $Arow2['sch_2_data3'];
              $sch_2_data4 = $Arow2['sch_2_data4'];
              $sch_2_data5 = $Arow2['sch_2_data5'];
              $sch_2_data6 = $Arow2['sch_2_data6'];
              $sch_2_data7 = $Arow2['sch_2_data7'];
              $sch_2_data8 = $Arow2['sch_2_data8'];

              $sch_3_data1 = $Arow2['sch_3_data1'];
              $sch_3_data2 = $Arow2['sch_3_data2'];
              $sch_3_data3 = $Arow2['sch_3_data3'];
              $sch_3_data4 = $Arow2['sch_3_data4'];
              $sch_3_data5 = $Arow2['sch_3_data5'];
              $sch_3_data6 = $Arow2['sch_3_data6'];
              $sch_3_data7 = $Arow2['sch_3_data7'];
              $sch_3_data8 = $Arow2['sch_3_data8'];


              $grad_1_data1 = $Arow2['grad_1_data1'];
              $grad_1_data2 = $Arow2['grad_1_data2'];
              $grad_1_data3 = $Arow2['grad_1_data3'];
              $grad_1_data4 = $Arow2['grad_1_data4'];
              $grad_1_data5 = $Arow2['grad_1_data5'];
              $grad_1_data6 = $Arow2['grad_1_data6'];
              $grad_1_data7 = $Arow2['grad_1_data7'];

              $grad_2_data1 = $Arow2['grad_2_data1'];
              $grad_2_data2 = $Arow2['grad_2_data2'];
              $grad_2_data3 = $Arow2['grad_2_data3'];
              $grad_2_data4 = $Arow2['grad_2_data4'];
              $grad_2_data5 = $Arow2['grad_2_data5'];
              $grad_2_data6 = $Arow2['grad_2_data6'];
              $grad_2_data7 = $Arow2['grad_2_data7'];

              $grad_3_data1 = $Arow2['grad_3_data1'];
              $grad_3_data2 = $Arow2['grad_3_data2'];
              $grad_3_data3 = $Arow2['grad_3_data3'];
              $grad_3_data4 = $Arow2['grad_3_data4'];
              $grad_3_data5 = $Arow2['grad_3_data5'];
              $grad_3_data6 = $Arow2['grad_3_data6'];
              $grad_3_data7 = $Arow2['grad_3_data7'];

              $career_sel = $Arow2['career_sel'];
              $career_input = $Arow2['career_input'];

              $chkbox1 = $Arow2['major_history_1'];
              $chkbox2 = $Arow2['major_history_2'];
              $chkbox3 = $Arow2['major_history_3'];
              $chkbox4 = $Arow2['major_history_4'];
              $chkbox5 = $Arow2['major_history_5'];

              $active_data1 = $Arow2['active_data1'];
              $active_data2 = $Arow2['active_data2'];
              $active_data3 = $Arow2['active_data3'];
              $active_data4 = $Arow2['active_data4'];
              $active_data5 = $Arow2['active_data5'];
              $active_data6 = $Arow2['active_data6'];
              $active_data7 = $Arow2['active_data7'];
              $active_data8 = $Arow2['active_data8'];
              $active_data9 = $Arow2['active_data9'];
              $active_data10 = $Arow2['active_data10'];
              $active_data11 = $Arow2['active_data11'];
              $active_data12 = $Arow2['active_data12'];
              $active_data13 = $Arow2['active_data13'];
              $active_data14 = $Arow2['active_data14'];
              $active_data15 = $Arow2['active_data15'];
              $active_data16 = $Arow2['active_data16'];
              $active_data17 = $Arow2['active_data17'];
              $active_data18 = $Arow2['active_data18'];
              $active_data19 = $Arow2['active_data19'];
              $active_data20 = $Arow2['active_data20'];
              $active_data21 = $Arow2['active_data21'];
              $active_data22 = $Arow2['active_data22'];
              $active_data23 = $Arow2['active_data23'];
              $active_data24 = $Arow2['active_data24'];
              $active_data25 = $Arow2['active_data25'];
              $active_data26 = $Arow2['active_data26'];
              $active_data27 = $Arow2['active_data27'];
              $active_data28 = $Arow2['active_data28'];
              $active_data29 = $Arow2['active_data29'];
              $active_data30 = $Arow2['active_data30'];

              $edu_data1 = $Arow2['edu_data1'];
              $edu_data2 = $Arow2['edu_data2'];
              $edu_data3 = $Arow2['edu_data3'];
              $edu_data4 = $Arow2['edu_data4'];
              $edu_data5 = $Arow2['edu_data5'];
              $edu_data6 = $Arow2['edu_data6'];
              $edu_data7 = $Arow2['edu_data7'];
              $edu_data8 = $Arow2['edu_data8'];
              $edu_data9 = $Arow2['edu_data9'];
              $edu_data10 = $Arow2['edu_data10'];
              $edu_data11 = $Arow2['edu_data11'];
              $edu_data12 = $Arow2['edu_data12'];
              $edu_data13 = $Arow2['edu_data13'];
              $edu_data14 = $Arow2['edu_data14'];
              $edu_data15 = $Arow2['edu_data15'];
              $edu_data16 = $Arow2['edu_data16'];
              $edu_data17 = $Arow2['edu_data17'];
              $edu_data18 = $Arow2['edu_data18'];
              $edu_data19 = $Arow2['edu_data19'];
              $edu_data20 = $Arow2['edu_data20'];
              $edu_data21 = $Arow2['edu_data21'];
              $edu_data22 = $Arow2['edu_data22'];
              $edu_data23 = $Arow2['edu_data23'];
              $edu_data24 = $Arow2['edu_data24'];
              $edu_data25 = $Arow2['edu_data25'];
              $edu_data26 = $Arow2['edu_data26'];
              $edu_data27 = $Arow2['edu_data27'];
              $edu_data28 = $Arow2['edu_data28'];
              $edu_data29 = $Arow2['edu_data29'];
              $edu_data30 = $Arow2['edu_data30'];
              $edu_data31 = $Arow2['edu_data31'];
              $edu_data32 = $Arow2['edu_data32'];
              $edu_data33 = $Arow2['edu_data33'];
              $edu_data34 = $Arow2['edu_data34'];
              $edu_data35 = $Arow2['edu_data35'];
              $edu_data36 = $Arow2['edu_data36'];
              $edu_data37 = $Arow2['edu_data37'];
              $edu_data38 = $Arow2['edu_data38'];
              $edu_data39 = $Arow2['edu_data39'];
              $edu_data40 = $Arow2['edu_data40'];

              echo "<input type='hidden' id='db_highschool_state' value='$highschool_state' />";
              echo "<input type='hidden' id='db_sch_data3' value='$sch_data3' />";
              echo "<input type='hidden' id='db_sch_1_data5' value='$sch_1_data5' />";
              echo "<input type='hidden' id='db_sch_1_data8' value='$sch_1_data8' />";
              echo "<input type='hidden' id='db_sch_2_data5' value='$sch_2_data5' />";
              echo "<input type='hidden' id='db_sch_2_data8' value='$sch_2_data8' />";
              echo "<input type='hidden' id='db_sch_3_data5' value='$sch_3_data5' />";
              echo "<input type='hidden' id='db_sch_3_data8' value='$sch_3_data8' />";

              echo "<input type='hidden' id='db_sch_2_data2' value='$sch_2_data2' />";
              echo "<input type='hidden' id='db_sch_3_data2' value='$sch_3_data2' />";

              echo "<input type='hidden' id='db_grad_2_data1' value='$grad_2_data1' />";
              echo "<input type='hidden' id='db_grad_3_data1' value='$grad_3_data1' />";
              echo "<input type='hidden' id='db_grad_1_data4' value='$grad_1_data4' />";
              echo "<input type='hidden' id='db_grad_1_data7' value='$grad_1_data7' />";
              echo "<input type='hidden' id='db_grad_2_data4' value='$grad_2_data4' />";
              echo "<input type='hidden' id='db_grad_2_data7' value='$grad_2_data7' />";
              echo "<input type='hidden' id='db_grad_3_data4' value='$grad_3_data4' />";
              echo "<input type='hidden' id='db_grad_3_data7' value='$grad_3_data7' />";


              echo "<input type='hidden' id='db_active_data4' value='$active_data4' />";
              echo "<input type='hidden' id='db_active_data7' value='$active_data7' />";
              echo "<input type='hidden' id='db_active_data10' value='$active_data10' />";
              echo "<input type='hidden' id='db_active_data13' value='$active_data13' />";
              echo "<input type='hidden' id='db_active_data16' value='$active_data16' />";
              echo "<input type='hidden' id='db_active_data19' value='$active_data19' />";
              echo "<input type='hidden' id='db_active_data22' value='$active_data22' />";
              echo "<input type='hidden' id='db_active_data25' value='$active_data25' />";
              echo "<input type='hidden' id='db_active_data28' value='$active_data28' />";

              echo "<input type='hidden' id='db_edu_data6' value='$edu_data6' />";
              echo "<input type='hidden' id='db_edu_data11' value='$edu_data11' />";
              echo "<input type='hidden' id='db_edu_data16' value='$edu_data16' />";
              echo "<input type='hidden' id='db_edu_data21' value='$edu_data21' />";
              echo "<input type='hidden' id='db_edu_data26' value='$edu_data26' />";
              echo "<input type='hidden' id='db_edu_data31' value='$edu_data31' />";
              echo "<input type='hidden' id='db_edu_data36' value='$edu_data36' />";

              echo "<input type='hidden' id='db_career_sel' value='$career_sel' />";

            ?>
            <div class="step_con step2">
              <div class="basic_infomation_wrap">
                <h2>학력/경력/교육활동</h2>
              </div>
              <div class="basic_infomation">
                <div class="flex baseline">
                  <div class="form_title flex-direction">
                    <h6>고등학교 학력</h6>
                  </div>
                  <div class="form_con allform flex-direction">
                    <div class="flex scformbox">
                      <!-- 고등학교 학력 -->
                      <?php
                        if($Arow2['highschool_state'] == 1)
                        {
                          echo "<div class='schoolbox'>
                            <div class='flex'>
                              <input type='text' disabled placeholder='학교명' id='sch_data1' disabled required>
                            </div>
                          </div>
                          <div class='graduate'>
                            <div class='flex'>
                              <div class='flex mobiles'>
                                <input type='text' disabled id='sch_data2' placeholder='졸업연도' disabled required>
                                <select disabled style='color:#000' disabled style='color:#000' id='sch_data3' disabled>
                                  <option value=''>졸업상태</option>
                                  <option>졸업</option>
                                  <option>졸업예정</option>
                                  <option>재학중</option>
                                  <option>중퇴</option>
                                  <option>휴학</option>
                                </select>
                              </div>
                            </div>
                          </div>";
                        }
                        else
                        {
                          echo "<div class='schoolbox'>
                            <div class='flex'>
                              <input type='text' disabled placeholder='학교명' id='sch_data1' value='$sch_data1'required>
                            </div>
                          </div>
                          <div class='graduate'>
                            <div class='flex'>
                              <div class='flex mobiles'>
                                <input type='text' disabled id='sch_data2' value='$sch_data2' placeholder='졸업연도' required>
                                <select disabled style='color:#000' disabled style='color:#000' id='sch_data3'>
                                  <<option value=''>졸업상태</option>
                                  <option>졸업</option>
                                  <option>졸업예정</option>
                                  <option>재학중</option>
                                  <option>중퇴</option>
                                  <option>휴학</option>
                                </select>
                              </div>
                            </div>
                          </div>";
                        }
                      ?>

                        <!-- <div class="btn_plus flex">
                          <img src="images/btns/btn_plus.png" alt="내용추가">
                        </div> -->
                      <!-- 고등학교 학력 마무리 -->
                      <div class="flex checkboxwrap">
                        <div class="checkbox flex">
                          <div class="flex">
                            <input type='checkbox' disabled id="chk1" class="normal">
                            <label for="chk1"></label>
                          </div>
                          <span>대입검정고시</span>
                        </div>
                        <div class="checkbox flex">
                          <div class="flex">
                            <?php
                              if($Arow2['highschool_state'] == 1)
                              {
                                echo "<input type='checkbox' disabled id='chk2' checked class='normal'>";
                              }
                              else
                              {
                                echo "<input type='checkbox' disabled id='chk2' class='normal'>";
                              }
                            ?>

                            <label for="chk2"></label>
                          </div>
                          <span>고등학교미만 졸업</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="flex baseline school_info_div">
                  <div class="form_title flex-direction">
                    <h6>대학교 학력</h6>
                  </div>
                  <div class="form_con allform flex-direction">

                    <?php
                      include "php/view/school_info_1_view.php";
                    ?>

                  </div>
                </div>
                <div class="flex baseline school_info_div">
                  <div class="form_title flex-direction">
                    <h6>대학원 학력</h6>
                  </div>
                  <div class="form_con allform flex-direction">
                    <?php
                      include "php/view/school_info_2_view.php";
                    ?>
                  </div>
                </div>
                <div class="flex baseline bordernone">
                  <div class="form_title flex-direction">
                    <h6>경력</h6>
                  </div>
                  <div class="form_con">
                    <select disabled style='color:#000' disabled style='color:#000' class="career" id='career_sel' onchange="onCareerSel()">
                      <option value="">주 전공명을 선택해주세요.</option>
                      <option>피아노</option>
                      <option>바이올린</option>
                      <option>첼로</option>
                      <option>하프</option>
                      <option>풀루트</option>
                      <option>오보에</option>
                      <option>클라리넷</option>
                      <option>바순</option>
                      <option>트럼펫</option>
                      <option>호른</option>
                      <option>비올라</option>
                      <option>베이스</option>
                      <option>팀파니</option>
                      <option>기타(직접작성)</option>
                    </select><br>
                    <div class="flex career_etc_info" style='display:none;margin-top:10px;'>
                      <input type="text" disabled id='career_input' placeholder="주종목을 입력하시기 바랍니다." required>
                    </div>
                  </div>
                </div>
                <script>
                  function onCareerSel()
                  {
                    if($("#career_sel").val() == "기타(직접작성)")
                    {
                      $(".career_etc_info").show();
                    }
                    else {
                      $(".career_etc_info").hide();
                    }
                  }
                </script>
                <div class="flex baseline bordernone">
                  <div class="form_title flex-direction">
                    <h6>주요이력</h6>
                  </div>
                  <div class="form_con">
                    <div class="flex-direction choicebox">
                      <div class="choiceform flex-direction">
                        <div class="flex">
                          <label class="checkbox flex">
                            <div class="flex">
                              <?php
                                if($chkbox1 == "전국규모 (콩쿨)대회 및 연주회 참여") echo "<input type='checkbox' disabled checked id='chkbox1' class='normal'>";
                                else echo "<input type='checkbox' disabled id='chkbox1' class='normal'>";
                              ?>
                              <label for="chkbox1"></label>
                            </div>
                            <span>전국규모 (콩쿨)대회 및 연주회 참여</span>
                          </label>
                          <label class="checkbox flex">
                            <div class="flex">
                              <?php
                                if($chkbox2 == "시·도규모 (콩쿨) 대회 및 연주회 참여") echo "<input type='checkbox' disabled checked id='chkbox2' class='normal'>";
                                else echo "<input type='checkbox' disabled id='chkbox2' class='normal'>";
                              ?>
                              <label for="chkbox2"></label>
                            </div>
                            <span>시·도규모 (콩쿨) 대회 및 연주회 참여</span>
                          </label>
                          <label class="checkbox flex">
                            <div class="flex">
                              <?php
                                if($chkbox3 == "공공·민간기관 주최 (콩쿨) 대회 및 연주회 참여") echo "<input type='checkbox' disabled checked id='chkbox3' class='normal'>";
                                else echo "<input type='checkbox' disabled id='chkbox3' class='normal'>";
                              ?>
                              <label for="chkbox3"></label>
                            </div>
                            <span>공공·민간기관 주최 (콩쿨) 대회 및 연주회 참여</span>
                          </label>
                        </div>
                        <div class="flex">
                          <label class="checkbox flex">
                            <div class="flex">
                              <?php
                                if($chkbox4 == "기관 및 기업소속 연주단 소속 경력") echo "<input type='checkbox' disabled checked id='chkbox4' class='normal'>";
                                else echo "<input type='checkbox' disabled id='chkbox4' class='normal'>";
                              ?>
                              <label for="chkbox4"></label>
                            </div>
                            <span>기관 및 기업소속 연주단 소속 경력</span>
                          </label>
                          <label class="checkbox flex">
                            <div class="flex">
                              <?php
                                if($chkbox5 == "프리랜서 연주자 활동") echo "<input type='checkbox' disabled checked id='chkbox5' class='normal'>";
                                else echo "<input type='checkbox' disabled id='chkbox5' class='normal'>";
                              ?>
                              <label for="chkbox5"></label>
                            </div>
                            <span>프리랜서 연주자 활동</span>
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="flex baseline">
                  <div class="form_title flex-direction">
                    <h6>활동이력</h6>
                  </div>
                  <div class="form_con">
                    <div class="flex-direction activity">
                      <?php
                        include "php/view/activity_info_1_view.php";
                      ?>
                    </div>
                  </div>
                </div>
                <div class="flex baseline bordernone">
                  <div class="form_title flex-direction">
                    <h6>교육</h6>
                  </div>
                  <div class="form_con">
                    <?php
                      include "php/view/education_info_1_view.php";
                    ?>
                  </div>
                </div>
              </div>
              <div class="btns_wrap flex">
                <div class="flex btn_prevstep btn" onclick="prevBtn(1)"><span>이전단계</span></div>
                <div class="flex btn_nextstep btn" onclick="nextBtn(2)"><span>다음단계</span></div>
              </div>
            </div>
            <script>
              $("#sch_data3").val($("#db_sch_data3").val()).prop("selected", true);
              $("#sch_1_data5").val($("#db_sch_1_data5").val()).prop("selected", true);
              $("#sch_1_data8").val($("#db_sch_1_data8").val()).prop("selected", true);
              $("#sch_2_data5").val($("#db_sch_2_data5").val()).prop("selected", true);
              $("#sch_2_data8").val($("#db_sch_2_data8").val()).prop("selected", true);
              $("#sch_3_data5").val($("#db_sch_3_data5").val()).prop("selected", true);
              $("#sch_3_data8").val($("#db_sch_3_data8").val()).prop("selected", true);

              $("#grad_1_data4").val($("#db_grad_1_data4").val()).prop("selected", true);
              $("#grad_1_data7").val($("#db_grad_1_data7").val()).prop("selected", true);
              $("#grad_2_data4").val($("#db_grad_2_data4").val()).prop("selected", true);
              $("#grad_2_data7").val($("#db_grad_2_data7").val()).prop("selected", true);
              $("#grad_3_data4").val($("#db_grad_3_data4").val()).prop("selected", true);
              $("#grad_3_data7").val($("#db_grad_3_data7").val()).prop("selected", true);
              $("#career_sel").val($("#db_career_sel").val()).prop("selected", true);


              if($("#db_edu_data6").val() != "") { $(".education_2").show(); }
              if($("#db_edu_data11").val() != "") { $(".education_3").show(); }
              if($("#db_edu_data16").val() != "") { $(".education_4").show(); }
              if($("#db_edu_data21").val() != "") { $(".education_5").show(); }
              if($("#db_edu_data26").val() != "") { $(".education_6").show(); }
              if($("#db_edu_data31").val() != "") { $(".education_7").show(); }
              if($("#db_edu_data36").val() != "") { $(".education_8").show(); }

              if($("#db_active_data4").val() != "") { $(".activity_2").show(); }
              if($("#db_active_data7").val() != "") { $(".activity_3").show(); }
              if($("#db_active_data10").val() != "") { $(".activity_4").show(); }
              if($("#db_active_data13").val() != "") { $(".activity_5").show(); }
              if($("#db_active_data16").val() != "") { $(".activity_6").show(); }
              if($("#db_active_data19").val() != "") { $(".activity_7").show(); }
              if($("#db_active_data22").val() != "") { $(".activity_8").show(); }
              if($("#db_active_data25").val() != "") { $(".activity_9").show(); }
              if($("#db_active_data28").val() != "") { $(".activity_10").show(); }

              if($("#db_sch_2_data2").val() != "") { onSchoolPlus(2,1); }
              if($("#db_sch_3_data2").val() != "") { onSchoolPlus(3,2); }

              if($("#db_grad_2_data1").val() != "") { onSchool2Plus(2,1); }
              if($("#db_grad_3_data1").val() != "") { onSchool2Plus(3,2); }

            </script>
            <script>
              if($("#db_highschool_state").val() == 1)
              {
                $(".school_info_div").hide();
                $(".school_info_div").hide();
              }
            </script>
            <?php
              $query="select licenses_txt_1,licenses_txt_2,licenses_txt_3,licenses_txt_4,licenses_txt_5,licenses_txt_6,licenses_txt_7,licenses_txt_8,
              licenses_txt_9,licenses_txt_10,licenses_txt_11,licenses_txt_12,licenses_txt_13,licenses_txt_14,licenses_txt_15,licenses_txt_16,licenses_txt_17,
              licenses_txt_18,awards_txt_1_1,awards_txt_1_2,awards_txt_1_3,awards_txt_1_4,awards_txt_2_1,awards_txt_2_2,awards_txt_2_3,awards_txt_2_4,
              awards_txt_3_1,awards_txt_3_2,awards_txt_3_3,awards_txt_3_4,awards_txt_4_1,awards_txt_4_2,awards_txt_4_3,awards_txt_4_4,
              awards_txt_5_1,awards_txt_5_2,awards_txt_5_3,awards_txt_5_4,awards_txt_6_1,awards_txt_6_2,awards_txt_6_3,awards_txt_6_4,
              awards_txt_7_1,awards_txt_7_2,awards_txt_7_3,awards_txt_7_4,userlink,awards_sel_1,awards_sel_2,awards_sel_3,awards_sel_4,awards_sel_5,awards_sel_6,awards_sel_7 from apply_step_3 where userid = '$usernum'";
              $Aresult3 = mysqli_query($con,$query);
              $Arow3 = mysqli_fetch_array($Aresult3);

              $licenses_txt_1 = $Arow3['licenses_txt_1'];
              $licenses_txt_2 = $Arow3['licenses_txt_2'];
              $licenses_txt_3 = $Arow3['licenses_txt_3'];
              $licenses_txt_4 = $Arow3['licenses_txt_4'];
              $licenses_txt_5 = $Arow3['licenses_txt_5'];
              $licenses_txt_6 = $Arow3['licenses_txt_6'];
              $licenses_txt_7 = $Arow3['licenses_txt_7'];
              $licenses_txt_8 = $Arow3['licenses_txt_8'];
              $licenses_txt_9 = $Arow3['licenses_txt_9'];
              $licenses_txt_10 = $Arow3['licenses_txt_10'];
              $licenses_txt_11 = $Arow3['licenses_txt_11'];
              $licenses_txt_12 = $Arow3['licenses_txt_12'];
              $licenses_txt_13 = $Arow3['licenses_txt_13'];
              $licenses_txt_14 = $Arow3['licenses_txt_14'];
              $licenses_txt_15 = $Arow3['licenses_txt_15'];
              $licenses_txt_16 = $Arow3['licenses_txt_16'];
              $licenses_txt_17 = $Arow3['licenses_txt_17'];
              $licenses_txt_18 = $Arow3['licenses_txt_18'];

              $awards_txt_1_1 = $Arow3['awards_txt_1_1'];
              $awards_txt_1_2 = $Arow3['awards_txt_1_2'];
              $awards_txt_1_3 = $Arow3['awards_txt_1_3'];
              $awards_txt_1_4 = $Arow3['awards_txt_1_4'];

              $awards_txt_2_1 = $Arow3['awards_txt_2_1'];
              $awards_txt_2_2 = $Arow3['awards_txt_2_2'];
              $awards_txt_2_3 = $Arow3['awards_txt_2_3'];
              $awards_txt_2_4 = $Arow3['awards_txt_2_4'];

              $awards_txt_3_1 = $Arow3['awards_txt_3_1'];
              $awards_txt_3_2 = $Arow3['awards_txt_3_2'];
              $awards_txt_3_3 = $Arow3['awards_txt_3_3'];
              $awards_txt_3_4 = $Arow3['awards_txt_3_4'];

              $awards_txt_4_1 = $Arow3['awards_txt_4_1'];
              $awards_txt_4_2 = $Arow3['awards_txt_4_2'];
              $awards_txt_4_3 = $Arow3['awards_txt_4_3'];
              $awards_txt_4_4 = $Arow3['awards_txt_4_4'];

              $awards_txt_5_1 = $Arow3['awards_txt_5_1'];
              $awards_txt_5_2 = $Arow3['awards_txt_5_2'];
              $awards_txt_5_3 = $Arow3['awards_txt_5_3'];
              $awards_txt_5_4 = $Arow3['awards_txt_5_4'];

              $awards_txt_6_1 = $Arow3['awards_txt_6_1'];
              $awards_txt_6_2 = $Arow3['awards_txt_6_2'];
              $awards_txt_6_3 = $Arow3['awards_txt_6_3'];
              $awards_txt_6_4 = $Arow3['awards_txt_6_4'];

              $awards_txt_7_1 = $Arow3['awards_txt_7_1'];
              $awards_txt_7_2 = $Arow3['awards_txt_7_2'];
              $awards_txt_7_3 = $Arow3['awards_txt_7_3'];
              $awards_txt_7_4 = $Arow3['awards_txt_7_4'];


              $awards_sel_1 = $Arow3['awards_sel_1'];
              $awards_sel_2 = $Arow3['awards_sel_2'];
              $awards_sel_3 = $Arow3['awards_sel_3'];
              $awards_sel_4 = $Arow3['awards_sel_4'];
              $awards_sel_5 = $Arow3['awards_sel_5'];
              $awards_sel_6 = $Arow3['awards_sel_6'];
              $awards_sel_7 = $Arow3['awards_sel_7'];

              $userlink = $Arow3['userlink'];

              echo "<input type='hidden' id='db_awards_sel_1' value='$awards_sel_1' />";
              echo "<input type='hidden' id='db_awards_sel_2' value='$awards_sel_2' />";
              echo "<input type='hidden' id='db_awards_sel_3' value='$awards_sel_3' />";
              echo "<input type='hidden' id='db_awards_sel_4' value='$awards_sel_4' />";
              echo "<input type='hidden' id='db_awards_sel_5' value='$awards_sel_5' />";
              echo "<input type='hidden' id='db_awards_sel_6' value='$awards_sel_6' />";
              echo "<input type='hidden' id='db_awards_sel_7' value='$awards_sel_7' />";
            ?>
            <div class="step_con step3">
              <div class="basic_infomation_wrap">
                <h2>자격증/수상/포토폴리오</h2>
              </div>
              <form id='fileForm' action='php/fnc/apply_temp_save_form.php' method='post' enctype='multipart/form-data'>
                <input type='hidden' name='upload_userid' id='upload_userid' value='<?=$usernum?>' />
                <input type='hidden' name='upload_sel_tab' id='upload_sel_tab' value='3' />
                <div class="basic_infomation">
                  <div class="flex">
                    <div class="form_title flex-direction">
                      <h6>자격증</h6>
                    </div>
                    <div class="form_con">
                      <?php
                        include "php/view/licenses_info_view.php";
                      ?>
                    </div>
                  </div>
                  <div class="flex baseline">
                    <div class="form_title flex-direction">
                      <h6>수상</h6>
                    </div>
                    <div class="form_con">
                      <?php
                        include "php/view/awards_info_view.php";
                      ?>
                    </div>
                  </div>
                  <div class="flex bordernone">
                    <div class="form_title flex-direction">
                      <h6>포토폴리오</h6>
                    </div>
                    <div class="form_con">
                      <div class="flex portfolio">
                        <?php
                          $strPdf = "portfolio/".$Urow[4].".pdf";
                          if(file_exists("portfolio/".$Urow[4].".pdf")) {
                              echo "<a href='$strPdf' target='_blank' style='cursor:pointer;background:#0559b5;padding:10px;color:#fff;font-size:16px;border-radius:5px;'>포트폴리오 보기</a>";
                          }else{
                              echo "<div style='color:#000;font-size:16px'>없음</div>";
                          }
                        ?>
                      </div>
                    </div>
                  </div>
                  <div class="flex">
                    <div class="form_title flex-direction">
                      <h6>링크</h6>
                    </div>
                    <div class="form_con pt-0">
                      <div class="link">
                        <input type="text" disabled name='userlink' id='userlink' placeholder="https://" value='<?=$userlink?>' required>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
              <script>
                function onApplyTempSaveForm2()
                {
                  if(!$('#pledgechk').is(':checked')) { alert("정보제공지원자 동의 서약서를 필수 동의하셔야합니다."); return; }
                  if($("#finish_1_filename").val() == "") { alert("정보제공동의서는 필수자료입니다."); return; }
                  else if($("#finish_2_filename").val() == "") { alert("장애인증명서는 필수자료입니다."); return; }

                  var bar = $('.bar');
                  var percent = $('.percent');
                  var status = $('#status');

                  //$("#uploadloadingBar").show();
                  $('#fileForm2').ajaxForm({
                    beforeSend: function() {
                        $("#uploadloadingBar").show();
                        status.empty();
                        var percentVal = '0%';
                        bar.width(percentVal);
                        percent.html(percentVal);
                      },
                      uploadProgress: function(event, position, total, percentComplete) {
                        var percentVal = percentComplete + '%';
                        bar.width(percentVal);
                        percent.html(percentVal);
                      },
                      success: function(response, textStatus, xhr, form) {
                        $("#uploadloadingBar").hide();
                        if(response == "success")
                        {
                          $('.popup_submission_wrap').fadeIn(300);
                        }
                        else
                        {
                          alert(response);
                        }
                     },
                      complete: function(xhr,statusText) {
                        $("#uploadloadingBar").hide();

                      },
                      //ajax error
                      error: function(){
                        $("#loadingBar").hide();
                        alert("에러발생!!");
                      }
                  });
                  $("#fileForm2").submit();
                }
                function onApplyTempSaveForm(Id)
                {
                   var bar = $('.bar');
                   var percent = $('.percent');
                   var status = $('#status');

                   //$("#uploadloadingBar").show();
                   $('#fileForm').ajaxForm({
                  	 beforeSend: function() {
                  			 $("#uploadloadingBar").show();
                  			 status.empty();
                  			 var percentVal = '0%';
                  			 bar.width(percentVal);
                  			 percent.html(percentVal);
                  		 },
                  		 uploadProgress: function(event, position, total, percentComplete) {
                  			 var percentVal = percentComplete + '%';
                  			 bar.width(percentVal);
                  			 percent.html(percentVal);


                  		 },
                  		 success: function(response, textStatus, xhr, form) {
                  			 $("#uploadloadingBar").hide();
                  			 if(response == "success")
                  			 {
                           alert("임시저장이 완료되었습니다.");
                  			 }
                         else
                         {
                           alert(response);
                         }
                      },
                  		 complete: function(xhr,statusText) {
                  			 $("#uploadloadingBar").hide();

                  		 },
                  		 //ajax error
                  		 error: function(){
                  			 $("#loadingBar").hide();
                  			 alert("에러발생!!");
                  		 }
                   });
                   $("#fileForm").submit();
                }

                if($("#licenses_txt_4").val() != "") { onLicensePlus(2); }
                if($("#licenses_txt_7").val() != "") { onLicensePlus(3); }
                if($("#licenses_txt_10").val() != "") { onLicensePlus(4); }
                if($("#licenses_txt_13").val() != "") { onLicensePlus(5); }
                if($("#licenses_txt_16").val() != "") { onLicensePlus(6); }

                if($("#awards_txt_2_1").val() != "") { onAwardsPlus(2); }
                if($("#awards_txt_3_1").val() != "") { onAwardsPlus(3); }
                if($("#awards_txt_4_1").val() != "") { onAwardsPlus(5); }
                if($("#awards_txt_5_1").val() != "") { onAwardsPlus(6); }
                if($("#awards_txt_6_1").val() != "") { onAwardsPlus(7); }
                if($("#awards_txt_7_1").val() != "") { onAwardsPlus(2); }

                $("#awards_sel_1").val($("#db_awards_sel_1").val()).prop("selected", true);
                $("#awards_sel_2").val($("#db_awards_sel_2").val()).prop("selected", true);
                $("#awards_sel_3").val($("#db_awards_sel_3").val()).prop("selected", true);
                $("#awards_sel_4").val($("#db_awards_sel_4").val()).prop("selected", true);
                $("#awards_sel_5").val($("#db_awards_sel_5").val()).prop("selected", true);
                $("#awards_sel_6").val($("#db_awards_sel_6").val()).prop("selected", true);
                $("#awards_sel_7").val($("#db_awards_sel_7").val()).prop("selected", true);

              </script>
              <div class="btns_wrap flex">
                <div class="flex btn_prevstep btn" onclick="prevBtn(2)"><span>이전단계</span></div>
                <div class="flex btn_nextstep btn" onclick="nextBtn(3);"><span>다음단계</span></div>
              </div>
            </div>
            <?php
              $query="select intro_sel_1,intro_txt_1_1,intro_txt_1_2,intro_sel_2,intro_txt_2_1,intro_txt_2_2,intro_sel_3,intro_txt_3_1,intro_txt_3_2,intro_sel_4,
              intro_txt_4_1,intro_txt_4_2,intro_sel_5,intro_txt_5_1,intro_txt_5_2 from apply_step_4 where userid = '$usernum'";
              $Aresult4 = mysqli_query($con,$query);
              $Arow4 = mysqli_fetch_array($Aresult4);

              $intro_sel_1 = $Arow4['intro_sel_1'];
              $intro_txt_1_1 = $Arow4['intro_txt_1_1'];
              $intro_txt_1_2 = $Arow4['intro_txt_1_2'];
              $intro_sel_2 = $Arow4['intro_sel_2'];
              $intro_txt_2_1 = $Arow4['intro_txt_2_1'];
              $intro_txt_2_2 = $Arow4['intro_txt_2_2'];
              $intro_sel_3 = $Arow4['intro_sel_3'];
              $intro_txt_3_1 = $Arow4['intro_txt_3_1'];
              $intro_txt_3_2 = $Arow4['intro_txt_3_2'];
              $intro_sel_4 = $Arow4['intro_sel_4'];
              $intro_txt_4_1 = $Arow4['intro_txt_4_1'];
              $intro_txt_4_2 = $Arow4['intro_txt_4_2'];
              $intro_sel_5 = $Arow4['intro_sel_5'];
              $intro_txt_5_1 = $Arow4['intro_txt_5_1'];
              $intro_txt_5_2 = $Arow4['intro_txt_5_2'];

              echo "<input type='hidden' id='db_intro_sel_1' value='$intro_sel_1' />";
              echo "<input type='hidden' id='db_intro_sel_2' value='$intro_sel_2' />";
              echo "<input type='hidden' id='db_intro_sel_3' value='$intro_sel_3' />";
              echo "<input type='hidden' id='db_intro_sel_4' value='$intro_sel_4' />";
              echo "<input type='hidden' id='db_intro_sel_5' value='$intro_sel_5' />";


            ?>
            <div class="step_con step4">
              <div class="basic_infomation_wrap">
                <div class="flex option_title">
                  <h2>자기소개서</h2>
                  <!-- <div class="optionbtns flex">
                    <div class="flex btn_grammar"><span>맞춤법 검사</span></div>
                    <div class="flex btn_change"><span>순서변경</span></div>
                  </div> -->
                </div>
              </div>
              <div class="basic_infomation">
                <div class="flex baseline">
                  <div class="form_title flex-direction">
                    <h6>항목구분</h6>
                  </div>
                  <div class="form_con listset">
                    <?php
                      include "php/view/introduction_info_view.php";
                    ?>
                  </div>
                </div>
              </div>
              <div class="btns_wrap flex">
                <div class="flex btn_prevstep btn" onclick="prevBtn(3)"><span>이전단계</span></div>
                <div class="flex btn_nextstep btn" onclick="nextBtn(4);"><span>다음단계</span></div>
              </div>
            </div>
            <script>
              if($("#db_intro_sel_1").val() == "") { $("#db_intro_sel_1").val("성장과정"); }
              if($("#db_intro_sel_2").val() == "") { $("#db_intro_sel_2").val("성장과정"); }
              if($("#db_intro_sel_3").val() == "") { $("#db_intro_sel_3").val("성장과정"); }
              if($("#db_intro_sel_4").val() == "") { $("#db_intro_sel_4").val("성장과정"); }
              if($("#db_intro_sel_5").val() == "") { $("#db_intro_sel_5").val("성장과정"); }

              $("#intro_sel_1").val($("#db_intro_sel_1").val()).prop("selected", true);
              $("#intro_sel_2").val($("#db_intro_sel_2").val()).prop("selected", true);
              $("#intro_sel_3").val($("#db_intro_sel_3").val()).prop("selected", true);
              $("#intro_sel_4").val($("#db_intro_sel_4").val()).prop("selected", true);
              $("#intro_sel_5").val($("#db_intro_sel_5").val()).prop("selected", true);

              if($("#intro_txt_2_2").val() != "") { onIntroPlus(2); }
              if($("#intro_txt_3_2").val() != "") { onIntroPlus(3); }
              if($("#intro_txt_4_2").val() != "") { onIntroPlus(4); }
              if($("#intro_txt_5_2").val() != "") { onIntroPlus(5); }
            </script>
            <script>
              function onIntroSel(Id)
              {
                if($("#intro_sel_"+Id).val() == "직접입력")
                {
                  $("#intro_txt_"+Id+"_1").show();
                }
                else
                {
                  $("#intro_txt_"+Id+"_1").hide();
                }
              }
            </script>
            <div class="step_con step5">
              <div class="basic_infomation_wrap">
                <div class="flex-direction">
                  <h2>최종제출</h2>
                  <div class="flex-direction">
                    <div class="pledge flex-direction">
                      <h6>지원자 동의 서약서</h6>
                      <div class="flex-direction">
                        <p>
                          1. 본인은 “[한국산업기술시험원] 장애인 전형 단기계약근로자(사무보조) 추가채용”에 지원함에 있어 인사 청탁 등 불명예스러운 일을 하지 않을 것이며,<br>
                          이를 어길 시 어떠한 불이익도 감수 할 것을 서약합니다.
                        </p>
                        <p>
                          2. 지원서 상의 모든 기재 사항은 사실과 다름이 없음을 증명하며, 차후 지원서 상의 내용이 허위로 판명되어 합격 또는 입사가 취소 되더라도<br>
                          이의를 제기하지 않을것을 서약합니다.
                        </p>
                      </div>
                      <span>제출일 : <?=$today?></span>
                      <span>지원자 : <?=$username?></span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="basic_infomation">
                <div class="flex baseline">
                  <div class="form_title flex-direction">
                    <h6>첨부파일</h6>
                  </div>
                  <div class="form_con">
                    <form id='fileForm2' action='php/fnc/apply_temp_save_form2.php' method='post' enctype='multipart/form-data'>

                    <div class="flex-direction attachments">
                        <input type='hidden' name='upload_userid2' id='upload_userid2' value='<?=$usernum?>' />
                        <input type='hidden' name='upload_sel_tab2' id='upload_sel_tab2' value='5' />
                        <div class="flex-direction attachmentsfile">
                          <span>정보제공동의서 <span>*</span></span>
                          <div class="flex file_form_wrap">
                            <?php
                              $strPdf = "user/".$Urow[4]."_1.pdf";
                              if(file_exists("user/".$Urow[4]."_1.pdf")) {
                                  echo "<a href='$strPdf' target='_blank' style='cursor:pointer;background:#0559b5;padding:10px;color:#fff;font-size:16px;border-radius:5px;'>파일 보기</a>";
                              }else{
                                  echo "<div style='color:#000;font-size:16px'>없음</div>";
                              }
                            ?>
                          </div>
                        </div>
                        <div class="flex-direction attachmentsfile">
                          <span>장애인증명서 <span>*</span></span>
                          <div class="flex file_form_wrap">
                            <?php
                              $strPdf = "user/".$Urow[4]."_2.pdf";
                              if(file_exists("user/".$Urow[4]."_2.pdf")) {
                                  echo "<a href='$strPdf' target='_blank' style='cursor:pointer;background:#0559b5;padding:10px;color:#fff;font-size:16px;border-radius:5px;'>파일 보기</a>";
                              }else{
                                  echo "<div style='color:#000;font-size:16px'>없음</div>";
                              }
                            ?>
                          </div>
                        </div>
                        <div class="flex-direction attachmentsfile">
                          <span>자격증사본</span>
                          <div class="flex file_form_wrap">
                            <?php
                              $strPdf = "user/".$Urow[4]."_3.pdf";
                              if(file_exists("user/".$Urow[4]."_3.pdf")) {
                                  echo "<a href='$strPdf' target='_blank' style='cursor:pointer;background:#0559b5;padding:10px;color:#fff;font-size:16px;border-radius:5px;'>파일 보기</a>";
                              }else{
                                  echo "<div style='color:#000;font-size:16px'>없음</div>";
                              }
                            ?>
                          </div>
                        </div>
                        <div class="flex-direction attachmentsfile">
                          <span>경력증명서</span>
                          <div class="flex file_form_wrap">
                            <?php
                              $strPdf = "user/".$Urow[4]."_4.pdf";
                              if(file_exists("user/".$Urow[4]."_4.pdf")) {
                                  echo "<a href='$strPdf' target='_blank' style='cursor:pointer;background:#0559b5;padding:10px;color:#fff;font-size:16px;border-radius:5px;'>파일 보기</a>";
                              }else{
                                  echo "<div style='color:#000;font-size:16px'>없음</div>";
                              }
                            ?>
                          </div>
                        </div>
                        <div class="flex-direction attachmentsfile">
                          <span>국민연금가입자가입증명서</span>
                          <div class="flex file_form_wrap">
                            <?php
                              $strPdf = "user/".$Urow[4]."_5.pdf";
                              if(file_exists("user/".$Urow[4]."_5.pdf")) {
                                  echo "<a href='$strPdf' target='_blank' style='cursor:pointer;background:#0559b5;padding:10px;color:#fff;font-size:16px;border-radius:5px;'>파일 보기</a>";
                              }else{
                                  echo "<div style='color:#000;font-size:16px'>없음</div>";
                              }
                            ?>
                          </div>
                        </div>
                        <div class="flex-direction attachmentsfile">
                          <span>건강보험자격득실확인서</span>
                          <div class="flex file_form_wrap">
                            <?php
                              $strPdf = "user/".$Urow[4]."_6.pdf";
                              if(file_exists("user/".$Urow[4]."_6.pdf")) {
                                  echo "<a href='$strPdf' target='_blank' style='cursor:pointer;background:#0559b5;padding:10px;color:#fff;font-size:16px;border-radius:5px;'>파일 보기</a>";
                              }else{
                                  echo "<div style='color:#000;font-size:16px'>없음</div>";
                              }
                            ?>
                          </div>
                        </div>
                        <div class="flex-direction attachmentsfile">
                          <span>고용보험피보험자격이력내역서</span>
                          <div class="flex file_form_wrap">
                            <?php
                              $strPdf = "user/".$Urow[4]."_7.pdf";
                              if(file_exists("user/".$Urow[4]."_7.pdf")) {
                                  echo "<a href='$strPdf' target='_blank' style='cursor:pointer;background:#0559b5;padding:10px;color:#fff;font-size:16px;border-radius:5px;'>파일 보기</a>";
                              }else{
                                  echo "<div style='color:#000;font-size:16px'>없음</div>";
                              }
                            ?>
                          </div>
                        </div>
                        <div class="flex-direction attachmentsfile">
                          <span>병적증명서/초본(병역사항)/군경력증명서</span>
                          <div class="flex file_form_wrap">
                            <?php
                              $strPdf = "user/".$Urow[4]."_8.pdf";
                              if(file_exists("user/".$Urow[4]."_8.pdf")) {
                                  echo "<a href='$strPdf' target='_blank' style='cursor:pointer;background:#0559b5;padding:10px;color:#fff;font-size:16px;border-radius:5px;'>파일 보기</a>";
                              }else{
                                  echo "<div style='color:#000;font-size:16px'>없음</div>";
                              }
                            ?>
                          </div>
                        </div>
                        <div class="flex-direction attachmentsfile">
                          <span>취업지원대상자 증명서</span>
                          <div class="flex file_form_wrap">
                            <?php
                              $strPdf = "user/".$Urow[4]."_9.pdf";
                              if(file_exists("user/".$Urow[4]."_9.pdf")) {
                                  echo "<a href='$strPdf' target='_blank' style='cursor:pointer;background:#0559b5;padding:10px;color:#fff;font-size:16px;border-radius:5px;'>파일 보기</a>";
                              }else{
                                  echo "<div style='color:#000;font-size:16px'>없음</div>";
                              }
                            ?>
                          </div>
                        </div>
                    </div>
                  </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include 'php/common_footer.php' ?>
  </div>
  <div class="popup_submission_wrap popup_wrap">
    <div class="popup_submission popup">
      <div class="popup_title flex">
        <div></div>
        <h6>최종 제출 확인</h6>
        <img src="images/btns/btn_cancel.png" alt="취소" class="btn_cancel" onclick='onSubmissionPopClose()'>
      </div>
      <div class="check_title flex-direction">
        <span>입력하신 정보를 한번 더 확인해주세요.</span>
        <p>최종제출하시면 더 이상 수정이 불가합니다.</p>
      </div>
      <div class="flex-direction info">
        <span>이름 : <?=$username?></span>
        <span>휴대전화 : <?=$userphone?></span>
      </div>
      <div class="flex-direction movepage">
        <span>최종제출 하시겠습니까?</span>
        <p>하단의 [최종 제출] 버튼 클릭 시 수정을 할 수 없습니다.</p>
      </div>
      <div class="pop_btns flex">
        <div class="popbtn btn_submissioncancel flex" onclick='onSubmissionPopClose()'><span>취소</span></div>
        <div class="popbtn btn_submission flex" onclick='onSubmissionSuc()'><span>최종제출</span></div>
      </div>
    </div>
  </div>
<?php include 'php/common_script.php' ?>
<script>
  $(".step_list li").click(function() {
    var idx = $(this).index();
    $('.step_list li').removeClass('on');
    $(this).addClass('on');
    $(".steps_wrap > .step_con").hide();
    $(".steps_wrap > .step_con").eq(idx).show();
  });

</script>

<script>
  let btnSubmission = $('.btn_submission');
  btnSubmission.click(function(){
    location.href = 'submissioncomplete.html';
  });

  $(".btn_plus").hide();
  $(".btn_minus").hide();
</script>
</body>
</html>

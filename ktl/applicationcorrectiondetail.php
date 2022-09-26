<!DOCTYPE html>
<?php include 'php/common_header.php' ?>
<link rel="stylesheet" href="css/applicationcorrectiondetail.css">
<script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
<script src="js/jquery.form.js"></script>
<body>
  <div id="uploadloadingBar" style="display:none;position:fixed; top:0; left:0; width:100%; height:100%; text-align:center; margin:0 auto; z-index:10000000000;background:rgba(0,0,0,0.9);">
    <table width="100%" height="100%" border="0">
    <tr><td align="center">
       <div style="margin-top:10px;font-size:14px;color:#000; text-align:center;color:white;"><strong style='font-size:18px;'>등록중입니다 . . .</strong><br><br>해당 페이지에서 나가시면 등록이 정상적으로 되지 않을 수 있습니다.
       <br><br>
       <div class="progress" style='color:black;width:250px;margin:0 auto;'>
      <div class="bar"></div>
      <div class="percent" style='text-align:center;margin:0 auto;margin-top:0px;'>0%</div>
    </div></div>
    </td></tr>
    </table>
  </div>
  <div class="wrap">
    <div id="layer" style="display:none;position:fixed;overflow:hidden;z-index:1;-webkit-overflow-scrolling:touch;">
    <img src="//t1.daumcdn.net/postcode/resource/images/close.png" id="btnCloseLayer" style="cursor:pointer;position:absolute;right:-3px;top:-3px;z-index:1" onclick="closeDaumPostcode()" alt="닫기 버튼">
    </div>
    <?php include 'php/common_header_menu.php' ?>
    <?php include 'php/common_usercheck.php' ?>
    <?php
      $user_rand_code = $_SESSION['apply_user_code'];
      $Id = $_GET["Id"];
      include "php/mysql.php";

      $query="select user_address,user_detailAddress,sel_tab_num,step0_view_sel,step0_view_sel2,sel2_tab_num,sel3_tab_num,sel4_tab_num,data1,data2,data3,data4,data5,data6,data7,data8,check_phone,data12,data13,sel5_tab_num,sel6_tab_num,sel7_tab_num from apply_step_1 where userid='$Urow[4]'";
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
      $sel5_tab_num = $ApplyRow1['sel5_tab_num'];
      $sel6_tab_num = $ApplyRow1['sel6_tab_num'];
      $sel7_tab_num = $ApplyRow1['sel7_tab_num'];
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
      else if($Urow[3] == 2) { $strStep = "학력/경력/대외활동 작성중";}
      else if($Urow[3] == 3) { $strStep = "자격/수상/포트폴리오 작성중";}
      else if($Urow[3] == 4) { $strStep = "자기소개서 작성중";}
      else if($Urow[3] == 5) { $strStep = "최종제출완료";}

      echo "<input type='hidden' id='sel_tab_num' value='$sel_tab_num' />";  //장애여부
      echo "<input type='hidden' id='sel2_tab_num' value='$sel2_tab_num' />";  //병역구분
      echo "<input type='hidden' id='sel3_tab_num' value='$sel3_tab_num' />";  //작성자
      echo "<input type='hidden' id='sel4_tab_num' value='$sel4_tab_num' />";  //보훈

      echo "<input type='hidden' id='sel5_tab_num' value='$sel5_tab_num' />";
      echo "<input type='hidden' id='sel6_tab_num' value='$sel6_tab_num' />";
      echo "<input type='hidden' id='sel7_tab_num' value='$sel7_tab_num' />";

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
        <div class="main_title flex-direction">
          <h2>2022년 한국산업기술시험원 기간제 장애 문화·예술인 채용 (오케스트라단원 부문)</h2>
          <div class="flex-direction">
            <div class="flex">
              <h6>수험번호</h6>
              <span><?=$user_rand_code?></span>
            </div>
            <div class="flex">
              <h6>공고기간</h6>
              <span>2022.09.01 ~ 09.15</span>
            </div>
            <div class="flex">
              <h6>지원서 업데이트</h6>
              <span><?=$user_update_date?></span>
            </div>
            <div class="flex">
              <h6>접수현황</h6>
              <span><?=$strStep?></span>
            </div>
          </div>
        </div>
        <div class="step flex-direction">
          <h2>지원서 작성</h2>
          <ul class="step_list flex">
            <li class="flex on step1_active">
              <span>1. <span class="mobiletabview">기본정보</span></span>
            </li>
            <li class="flex step2_active">
              <span>2. <span class="mobiletabview">학력/경력</span><span class="mobilenone">/대외활동</span></span>
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
                    <div class="flex-direction address_form">
                      <div class="flex address_wrap">
                        <div class="btn_address flex" onclick="execDaumPostcode()"><span>우편번호</span></div>
                        <span>주민등록상 주소를 입력하세요.</span>
                      </div>
                      <input type="hidden" id='user_postcode'>
                      <input type="text" placeholder="주소를 입력해주세요." id='user_address' value='<?=$user_address?>' onclick="execDaumPostcode()" required readonly>
                      <input type="text" placeholder="상세 주소를 입력해주세요." value='<?=$user_detailAddress?>' id='user_detailAddress' required>
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
                            echo "<div class='step0_tab step0_1_tab flex on' onclick='onStepTab_1(1,1)'><span>비대상</span></div>
                            <div class='step0_tab step0_2_tab flex' onclick='onStepTab_1(2,1)'><span>대상</span></div>";
                          }
                          else
                          {
                            echo "<div class='step0_tab step0_1_tab flex' onclick='onStepTab_1(1,1)'><span>비대상</span></div>
                            <div class='step0_tab step0_2_tab flex on' onclick='onStepTab_1(2,1)'><span>대상</span></div>";
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
                        <select id='step0_view_sel'>
                          <option value=''>장애정도</option>
                          <option value='중증 (기존1~3급)'>중증 (기존1~3급)</option>
                          <option value='경증 (기존4~6급)'>경증 (기존4~6급)</option>
                        </select>
                        <select id='step0_view_sel2'>
                          <option value=''>내용</option>
                          <option value='간장애'>간장애</option>
                          <option value='뇌전증장애(간질장애)'>뇌전증장애(간질장애)</option>
                          <option value='뇌병변장애'>뇌병변장애</option>
                          <option value='시각장애'>시각장애</option>
                          <option value='신장장애'>신장장애</option>
                          <option value='심장장애'>심장장애</option>
                          <option value='안면변형장애'>안면변형장애</option>
                          <option value='장루/요루장애'>장루/요루장애</option>
                          <option value='정신장애'>정신장애</option>
                          <option value='청각장애'>청각장애</option>
                          <option value='호흡기장애'>호흡기장애</option>
                          <option value='지체장애'>지체장애</option>
                          <option value='언어장애'>언어장애</option>
                          <option value='지적장애(정신박약/정신지체)'>지적장애(정신박약/정신지체)</option>
                          <option value='자폐성장애(발달장애)'>자폐성장애(발달장애)</option>
                          <option value='기타장애'>기타장애</option>
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
                <div class="flex baseline bordernone mobile">
                  <div class="form_title flex-direction mobilenone">
                    <h6>병역사항</h6>
                  </div>
                  <div class="form_con">
                    <div class="militaryservice flex-direction">
                      <span>[병역사항]</span>
                      <p>
                        복무 중인 경우에는 미필로 선택하시기 바랍니다.<br>
                        여성의 경우 “비대상”을 선택하시면 됩니다.
                      </p>
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
                          echo "<div class='step_tab step_1_tab flex on' onclick='onStepTab_2(1)'><span>비대상</span></div>
                          <div class='step_tab step_2_tab flex' onclick='onStepTab_2(2)'><span>군필</span></div>
                          <div class='step_tab step_3_tab flex' onclick='onStepTab_2(3)'><span>미필</span></div>
                          <div class='step_tab step_4_tab flex' onclick='onStepTab_2(4)'><span>면제</span></div>
                          <div class='step_tab step_5_tab flex' onclick='onStepTab_2(5)'><span>복무중</span></div>";
                        }
                        else if($sel2_tab_num == 2)
                        {
                          echo "<div class='step_tab step_1_tab flex' onclick='onStepTab_2(1)'><span>비대상</span></div>
                          <div class='step_tab step_2_tab flex on' onclick='onStepTab_2(2)'><span>군필</span></div>
                          <div class='step_tab step_3_tab flex' onclick='onStepTab_2(3)'><span>미필</span></div>
                          <div class='step_tab step_4_tab flex' onclick='onStepTab_2(4)'><span>면제</span></div>
                          <div class='step_tab step_5_tab flex' onclick='onStepTab_2(5)'><span>복무중</span></div>";
                        }
                        else if($sel2_tab_num == 3)
                        {
                          echo "<div class='step_tab step_1_tab flex' onclick='onStepTab_2(1)'><span>비대상</span></div>
                          <div class='step_tab step_2_tab flex' onclick='onStepTab_2(2)'><span>군필</span></div>
                          <div class='step_tab step_3_tab flex on' onclick='onStepTab_2(3)'><span>미필</span></div>
                          <div class='step_tab step_4_tab flex' onclick='onStepTab_2(4)'><span>면제</span></div>
                          <div class='step_tab step_5_tab flex' onclick='onStepTab_2(5)'><span>복무중</span></div>";
                        }
                        else if($sel2_tab_num == 4)
                        {
                          echo "<div class='step_tab step_1_tab flex' onclick='onStepTab_2(1)'><span>비대상</span></div>
                          <div class='step_tab step_2_tab flex' onclick='onStepTab_2(2)'><span>군필</span></div>
                          <div class='step_tab step_3_tab flex' onclick='onStepTab_2(3)'><span>미필</span></div>
                          <div class='step_tab step_4_tab flex on' onclick='onStepTab_2(4)'><span>면제</span></div>
                          <div class='step_tab step_5_tab flex' onclick='onStepTab_2(5)'><span>복무중</span></div>";
                        }
                        else if($sel2_tab_num == 5)
                        {
                          echo "<div class='step_tab step_1_tab flex' onclick='onStepTab_2(1)'><span>비대상</span></div>
                          <div class='step_tab step_2_tab flex' onclick='onStepTab_2(2)'><span>군필</span></div>
                          <div class='step_tab step_3_tab flex' onclick='onStepTab_2(3)'><span>미필</span></div>
                          <div class='step_tab step_4_tab flex' onclick='onStepTab_2(4)'><span>면제</span></div>
                          <div class='step_tab step_5_tab flex on' onclick='onStepTab_2(5)'><span>복무중</span></div>";
                        }
                      ?>
                    </div>
                  </div>
                </div>
                <script>
                  function onStepTab_4(Id)
                  {
                    $("#sel4_tab_num").val(Id);

                    if(Id == 1) { $("#military_view").hide(); }
                    else $("#military_view").show();

                    $(".step_tab3").removeClass("on");
                    $(".step3_"+Id+"_tab").addClass("on");

                  }
                  function onStepTab_2(Id)
                  {
                    $("#sel2_tab_num").val(Id);
                    $(".step1_tab1").hide();
                    $(".step1_tab2").hide();
                    $(".step1_tab3").hide();

                    $(".step_tab").removeClass("on");
                    $(".step_"+Id+"_tab").addClass("on");

                    if(Id == 2)
                    {
                      $(".step1_tab2").show();
                      $(".step1_tab3").show();
                    }
                    else if(Id == 5)
                    {
                      $(".step1_tab3").show();
                    }
                    else if(Id == 4)
                    {
                      $(".step1_tab1").show();
                    }
                  }
                  function onStepTab_3(Id,Num)
                  {
                    $("#sel3_tab_num").val(Id);
                    $("#agent_view").hide();
                    $(".step_tab2").removeClass("on");
                    $(".step2_"+Id+"_tab").addClass("on");

                    if(Id != 1)
                    {
                      $("#agent_view").show();
                    }
                  }
                </script>
                <!-- <div class="flex sum bordernone mobile step1_tab1" style='display:none;'>
                  <div class="form_title flex-direction">
                    <h6>계급</h6>
                  </div>
                  <div class="form_con">
                    <select class="log" id='data4'>
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
                    <input type='text' placeholder="면제사유" id='data4' required />
                    <!-- <select class="log" id='data4'>
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
                    <select class="log" id='data5'>
                      <option value=''>제대구분을 선택하세요.</option>
                      <option value='만기 제대'>만기 제대</option>
                      <option value='명예 제대'>명예 제대</option>
                      <option value='불명예 제대'>불명예 제대</option>
                      <option value='의가사 제대'>의가사 제대</option>
                      <option value='의병 제대'>의병 제대</option>
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

                    $("#data5").val($("#db_data5").val()).prop("selected", true);
                    $("#data6").val($("#db_data6").val());
                    $("#data7").val($("#db_data7").val());
                  }
                  else if($("#sel2_tab_num").val() == 4)
                  {
                    //$(".step1_tab1").show();
                    $(".step1_tab1").show();

                    $("#data4").val($("#db_data4").val());

                  }
                  else if($("#sel2_tab_num").val() == 5)
                  {
                    //$(".step1_tab1").show();
                    $(".step1_tab3").show();

                    //$("#data4").val($("#db_data4").val()).prop("selected", true);
                    $("#data6").val($("#db_data6").val());
                    $("#data7").val($("#db_data7").val());

                  }
                  
                </script>
                <div class="flex bordernone sum topval mobile">
                  <div class="form_title flex-direction">
                    <h6>작성자</h6>
                  </div>
                  <div class="form_con">
                    <div class="choice chmy flex">
                      <?php
                        if($sel3_tab_num == 1)
                        {
                          echo "<div class='step_tab2 step2_1_tab flex on' onclick='onStepTab_3(1)'><span>본인</span></div>
                          <div class='step_tab2 step2_2_tab flex' onclick='onStepTab_3(2)'><span>보호자</span></div>
                          <div class='step_tab2 step2_3_tab flex' onclick='onStepTab_3(3)'><span>대리인</span></div>";
                        }
                        else if($sel3_tab_num == 2)
                        {
                          echo "<div class='step_tab2 step2_1_tab flex' onclick='onStepTab_3(1)'><span>본인</span></div>
                          <div class='step_tab2 step2_2_tab flex on' onclick='onStepTab_3(2)'><span>보호자</span></div>
                          <div class='step_tab2 step2_3_tab flex' onclick='onStepTab_3(3)'><span>대리인</span></div>";
                        }
                        else if($sel3_tab_num == 3)
                        {
                          echo "<div class='step_tab2 step2_1_tab flex' onclick='onStepTab_3(1)'><span>본인</span></div>
                          <div class='step_tab2 step2_2_tab flex' onclick='onStepTab_3(2)'><span>보호자</span></div>
                          <div class='step_tab2 step2_3_tab flex on' onclick='onStepTab_3(3)'><span>대리인</span></div>";
                        }
                      ?>
                    </div>
                  </div>
                </div>
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
                        <input type="text" id='data8' value='<?=$data8?>' placeholder="이름을 입력해주세요." required>
                      </div>
                    </div>
                  </div>
                  <div class="flex bordernone sum mobile">
                    <div class="form_title flex-direction">
                      <h6>연락처</h6>
                    </div>
                    <div class="form_con">
                      <div class="phonebox flex">
                        <input type="text" id='data9' maxlength="3" value='<?=$phoneArr[0]?>' required>
                        <span class="linebar"></span>
                        <input type="text" id='data10' maxlength="4" value='<?=$phoneArr[1]?>' required>
                        <span class="linebar"></span>
                        <input type="text" id='data11' maxlength="4" value='<?=$phoneArr[2]?>' required>
                      </div>
                    </div>
                  </div>
                  <div class="flex bordernone sum mobile">
                    <div class="form_title flex-direction">
                      <h6>소속명</h6>
                    </div>
                    <div class="form_con">
                      <div class="inputbox">
                        <input type="text" id='data12' value='<?=$data12?>' placeholder="소속명을 입력해주세요." required>
                      </div>
                    </div>
                  </div>
                  <div class="flex sum botval">
                    <div class="form_title flex-direction">
                      <h6>사유</h6>
                    </div>
                    <div class="form_con">
                      <div class="inputbox">
                        <input type="text" id='data13' value='<?=$data13?>' placeholder="사유를 입력해주세요." required>
                      </div>
                    </div>
                  </div>
                  <div class="flex mobile">
                    <div class="form_title flex-direction">
                      <h6>대리인작성 동의</h6>
                    </div>
                    <div class="form_con">
                      <div class="flex checkbtn">
                        <div class="btn_contentcheck flex"><span>내용확인</span></div>
                        <span><span>*</span> 필수항목에 동의해주세요.</span>
                      </div>
                    </div>
                  </div>
                </div>
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
                            echo "<div class='step_tab3 step3_1_tab flex on' onclick='onStepTab_4(1)'><span>비대상</span></div>
                            <div class='step_tab3 step3_2_tab flex' onclick='onStepTab_4(2)'><span>대상</span></div>";
                          }
                          else
                          {
                            echo "<div class='step_tab3 step3_1_tab flex flex' onclick='onStepTab_4(1)'><span>비대상</span></div>
                            <div class='step_tab3 step3_2_tab flex on' onclick='onStepTab_4(2)'><span>대상</span></div>";
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
                        <input type='text' id='data1' value='<?=$data1?>' placeholder="보훈번호" required/>
                        <input type='text' id='data2' value='<?=$data2?>' placeholder="관계" required/>
                        <select id='data3'>
                          <option value=''>보훈비율</option>
                          <option value='5%'>5%</option>
                          <option value='10%'>10%</option>
                        </select>
                      </div>
                      <script>
                        $("#data3").val($("#db_data3").val()).prop("selected", true);
                      </script>
                    </div>
                  </div>
                </div>
                <div class="flex baseline">
                  <div class="form_title flex-direction">
                    <h6>우대사항</h6>
                  </div>
                  <div class="form_con flex-direction">
                    <div class="flex chse chsemili">
                      <span>저소득층</span>
                      <div class="choice flex">
                        <?php
                          if($sel5_tab_num == 1)
                          {
                            echo "<div class='step_tab4 step4_1_tab flex on' onclick='onStepTab_5(1)'><span>비대상</span></div>
                            <div class='step_tab4 step4_2_tab flex' onclick='onStepTab_5(2)'><span>대상</span></div>";
                          }
                          else
                          {
                            echo "<div class='step_tab4 step4_1_tab flex' onclick='onStepTab_5(1)'><span>비대상</span></div>
                            <div class='step_tab4 step4_2_tab flex on' onclick='onStepTab_5(2)'><span>대상</span></div>";
                          }
                        ?>

                      </div>
                    </div>
                    <div class="flex chse chsemili">
                      <span>북한이탈주민</span>
                      <div class="choice flex">
                        <?php
                          if($sel6_tab_num == 1)
                          {
                            echo "<div class='step_tab5 step5_1_tab flex on' onclick='onStepTab_6(1)'><span>비대상</span></div>
                            <div class='step_tab5 step5_2_tab flex' onclick='onStepTab_6(2)'><span>대상</span></div>";
                          }
                          else
                          {
                            echo "<div class='step_tab5 step5_1_tab flex' onclick='onStepTab_6(1)'><span>비대상</span></div>
                            <div class='step_tab5 step5_2_tab flex on' onclick='onStepTab_6(2)'><span>대상</span></div>";
                          }
                        ?>

                      </div>
                    </div>
                    <div class="flex chse chsemili">
                      <span>다문화가족자녀</span>
                      <div class="choice flex">
                        <?php
                          if($sel7_tab_num == 1)
                          {
                            echo "<div class='step_tab6 step6_1_tab flex on' onclick='onStepTab_7(1)'><span>비대상</span></div>
                            <div class='step_tab6 step6_2_tab flex' onclick='onStepTab_7(2)'><span>대상</span></div>";
                          }
                          else
                          {
                            echo "<div class='step_tab6 step6_1_tab flex' onclick='onStepTab_7(1)'><span>비대상</span></div>
                            <div class='step_tab6 step6_2_tab flex on' onclick='onStepTab_7(2)'><span>대상</span></div>";
                          }
                        ?>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="btns_wrap flex">
                <div class="flex btn_prevstep btn" style="display:none"><span>이전단계</span></div>
                <div class="flex btn_temporarystorage btn" onclick='onApplyTempSave(1)'><span>임시저장</span></div>
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

              function onStepTab_5(Id)
              {
                $("#sel5_tab_num").val(Id);

                $(".step_tab4").removeClass("on");
                $(".step4_"+Id+"_tab").addClass("on");

              }
              function onStepTab_6(Id)
              {
                $("#sel6_tab_num").val(Id);

                $(".step_tab5").removeClass("on");
                $(".step5_"+Id+"_tab").addClass("on");

              }
              function onStepTab_7(Id)
              {
                $("#sel7_tab_num").val(Id);

                $(".step_tab6").removeClass("on");
                $(".step6_"+Id+"_tab").addClass("on");

              }
              function onSchoolCheck(Id, object)
              {
                if(Id == 2) // 대입검정고시 - nCheckView = 1
                {
                  nCheckView = 1;
                  $("#sch_data1").attr("disabled",true);
                  $("#sch_data2").attr("disabled",true);
                  $("#sch_data3").attr("disabled",true);
                  $(".school_info_div").show();
                }
                else { // 고등학교미만 졸업 - nCheckView = 0
                  nCheckView = 0;
                  $("#sch_data1").val("");
                  $("#sch_data2").val("");
                  $("#sch_data3").val(0).prop("selected", false);
                  
                  $("#sch_data1").attr("disabled",false);
                  $("#sch_data2").attr("disabled",false);
                  $("#sch_data3").attr("disabled",false);
                  
                  $(".school_info_div").hide();
                }
                $("input:checkbox[id='chk"+Id+"']").prop("checked", false);
              }
              
              $(()=>{
                // $(".school_info_div").hide();
              })
            </script>
            <script>
              function onApplyTempSave(Id)
              {
                if(Id == 4)
                {
                  if($("#intro_txt_1_2").val() == "") { alert("최소 1개이상의 자기소개서는 필수입니다."); $("#intro_txt_1_2").focus(); return; }

                  $.post("php/fnc/Apply_temp_save.php",
                  {
                    step : Id,
                    user_id : $("#user_id").val(),
                    intro_sel_1 : $("#intro_sel_1").val(),
                    intro_txt_1_1 : $("#intro_txt_1_1").val(),
                    intro_txt_1_2 : $("#intro_txt_1_2").val(),
                    intro_sel_2 : $("#intro_sel_2").val(),
                    intro_txt_2_1 : $("#intro_txt_2_1").val(),
                    intro_txt_2_2 : $("#intro_txt_2_2").val(),
                    intro_sel_3 : $("#intro_sel_3").val(),
                    intro_txt_3_2 : $("#intro_txt_3_1").val(),
                    intro_txt_3_2 : $("#intro_txt_3_2").val(),
                    intro_sel_4 : $("#intro_sel_4").val(),
                    intro_txt_4_1 : $("#intro_txt_4_1").val(),
                    intro_txt_4_2 : $("#intro_txt_4_2").val(),
                    intro_sel_5 : $("#intro_sel_5").val(),
                    intro_txt_5_1 : $("#intro_txt_5_1").val(),
                    intro_txt_5_2 : $("#intro_txt_5_2").val(),
                  },
                   function(data,status){
                   if(status != "fail"){
                     if(data == "fail")
                     {
                       alert("동일한 항목구분이 존재합니다.");
                     }
                     else
                       alert("임시저장이 완료되었습니다.");
                   }
                   else
                   {
                    alert("네트워크 오류");
                   }
                  });

                }
                else if(Id == 1)
                {
                  if($("#user_address").val() == "") { alert("주소를 입력하세요."); $("#user_address").focus(); return; }

                  if($("#sel_tab_num").val() != 1)
                  {
                    if($("#step0_view_sel").val() == 0) { alert("장애정도를 선택하세요."); return; }
                    else if($("#step0_view_sel2").val() == 0) { alert("장애내용을 선택하세요."); return; }
                  }
                  else if($("#sel_tab_num").val() == 1)
                  {
                    alert("본 채용공고는 장애인 제한경쟁 채용으로 비장애인은 입사지원이 불가합니다.");
                    return 0;
                  }

                  if($("#sel4_tab_num").val() != 1)
                  {
                    if($("#data1").val() == "") { alert("보훈번호를 입력하세요."); $("#data1").focus(); return; }
                    else if($("#data2").val() == "") { alert("관계를 입력하세요."); $("#data2").focus(); return; }
                    else if($("#data3").val() == 0) { alert("보훈비율을 선택하세요."); return; }
                  }
                  if($("#sel2_tab_num").val() == 2)
                  {
                    if($("#data5").val() == 0) { alert("제대구분을 선택하세요."); return; }
                    else if($("#data6").val() == "") { alert("복무기간을 입력하세요."); $("#data6").focus(); return; }
                    else if($("#data7").val() == "") { alert("복무기간을 선택하세요."); $("#data7").focus(); return; }
                  }
                  else if($("#sel2_tab_num").val() == 5)
                  {
                    if($("#data6").val() == "") { alert("복무기간을 입력하세요."); $("#data6").focus(); return; }
                    else if($("#data7").val() == "") { alert("복무기간을 선택하세요."); $("#data7").focus(); return; }
                  }
                  else if($("#sel2_tab_num").val() == 4)
                  {
                    if($("#data4").val() == "") { alert("면제사유를 입력하세요."); $("#data4").focus(); return; }
                  }
                  if($("#sel3_tab_num").val() != 1)
                  {
                    if($("#data8").val() == "") { alert("이름을 입력하세요."); $("#data8").focus(); return; }
                    else if($("#data9").val() == "" || $("#data10").val() == "" || $("#data11").val() == "") { alert("연락처를 입력하세요."); $("#data9").focus(); return; }
                  }
                  //$("#data4").val()
                  $.post("php/fnc/Apply_temp_save.php",
                  {
                    step : Id,
                    user_id : $("#user_id").val(),
                    user_address : $("#user_address").val(),
                    user_detailAddress : $("#user_detailAddress").val(),
                    sel_tab_num : $("#sel_tab_num").val(),
                    step0_view_sel : $("#step0_view_sel").val(),
                    step0_view_sel2 : $("#step0_view_sel2").val(),
                    sel2_tab_num : $("#sel2_tab_num").val(),
                    sel3_tab_num : $("#sel3_tab_num").val(),
                    sel4_tab_num : $("#sel4_tab_num").val(),
                    sel5_tab_num : $("#sel5_tab_num").val(),
                    sel6_tab_num : $("#sel6_tab_num").val(),
                    sel7_tab_num : $("#sel7_tab_num").val(),
                    data1 : $("#data1").val(),
                    data2 : $("#data2").val(),
                    data3 : $("#data3").val(),
                    data4 : $("#data4").val(),
                    data5 : $("#data5").val(),
                    data6 : $("#data6").val(),
                    data7 : $("#data7").val(),
                    data7_1 : $("#data7_1").val(),  //면제사유
                    data8 : $("#data8").val(),
                    check_phone : $("#data9").val()+"-"+$("#data10").val()+"-"+$("#data11").val(),
                    data12 : $("#data12").val(),
                    data13 : $("#data13").val()
                  },
                   function(data,status){
                   if(status != "fail"){
                     console.log(data);
                     alert("임시저장이 완료되었습니다.");
                   }
                   else
                   {
                    alert("네트워크 오류");
                   }
                  });
                }
                else if(Id == 2)
                {
                  var nCheckView0 = 0;
                  var nCheckView1 = "";
                  var nCheckView2 = "";
                  var nCheckView3 = "";
                  var nCheckView4 = "";
                  var nCheckView5 = "";

                  if($('#chk1').is(':checked')) { nCheckView0 = 1; }
                  if($('#chkbox1').is(':checked')) { nCheckView1 = "전국규모 (콩쿨)대회 및 연주회 참여"; }
                  if($('#chkbox2').is(':checked')) { nCheckView2 = "시·도규모 (콩쿨) 대회 및 연주회 참여"; }
                  if($('#chkbox3').is(':checked')) { nCheckView3 = "공공·민간기관 주최 (콩쿨) 대회 및 연주회 참여"; }
                  if($('#chkbox4').is(':checked')) { nCheckView4 = "기관 및 기업소속 연주단 소속 경력"; }
                  if($('#chkbox5').is(':checked')) { nCheckView5 = "프리랜서 연주자 활동"; }

                  // console.dir($('#chk1').is(':checked'));
                  // console.dir(nCheckView0); //대입검정고시 - qualification_exam - nCheckView = 1
                  // console.dir(nCheckView); // 고등학교미만 졸업 - highschool_state - nCheckView = 0
                  //2. 학력/경력/대외활동
                  if(nCheckView0 == 0)
                  {
                    if($("#sch_data1").val() == "") { alert("학교명을 입력하세요."); $("#sch_data1").focus(); return; }
                    else if($("#sch_data2").val() == "") { alert("졸업연도를 선택하세요."); $("#sch_data2").focus(); return; }
                    else if($("#sch_data3").val() == "") { alert("졸업상태를 선택하세요."); $("#sch_data3").focus(); return; }
                  }
                  if($("#career_sel").val() == "기타(직접작성)")
                  {
                    if($("#career_input").val() == "") { alert("주전공을 입력하세요."); $("#career_input").focus(); return; }
                  }
                  else
                  {
                    if($("#career_sel").val() == "") { alert("주전공 분야를 선택하세요."); $("#career_sel").focus(); return; }
                  }
                  $.post("php/fnc/Apply_temp_save.php",
                  {
                    step : Id,
                    user_id : $("#user_id").val(),
                    sch_data1 : $("#sch_data1").val(),
                    sch_data2 : $("#sch_data2").val(),
                    sch_data3 : $("#sch_data3").val(),
                    highschool_state : nCheckView,
                    qualification_exam : nCheckView0,
                    sch_1_data1 : $("#sch_1_data1").val(),
                    sch_1_data2 : $("#sch_1_data2").val(),
                    sch_1_data3 : $("#sch_1_data3").val(),
                    sch_1_data4 : $("#sch_1_data4").val(),
                    sch_1_data5 : $("#sch_1_data5").val(),
                    sch_1_data6 : $("#sch_1_data6").val(),
                    sch_1_data7 : $("#sch_1_data7").val(),
                    sch_1_data8 : $("#sch_1_data8").val(),
                    sch_2_data1 : $("#sch_2_data1").val(),
                    sch_2_data2 : $("#sch_2_data2").val(),
                    sch_2_data3 : $("#sch_2_data3").val(),
                    sch_2_data4 : $("#sch_2_data4").val(),
                    sch_2_data5 : $("#sch_2_data5").val(),
                    sch_2_data6 : $("#sch_2_data6").val(),
                    sch_2_data7 : $("#sch_2_data7").val(),
                    sch_2_data8 : $("#sch_2_data8").val(),
                    sch_3_data1 : $("#sch_3_data1").val(),
                    sch_3_data2 : $("#sch_3_data2").val(),
                    sch_3_data3 : $("#sch_3_data3").val(),
                    sch_3_data4 : $("#sch_3_data4").val(),
                    sch_3_data5 : $("#sch_3_data5").val(),
                    sch_3_data6 : $("#sch_3_data6").val(),
                    sch_3_data7 : $("#sch_3_data7").val(),
                    sch_3_data8 : $("#sch_3_data8").val(),
                    grad_1_data1 : $("#grad_1_data1").val(),
                    grad_1_data2 : $("#grad_1_data2").val(),
                    grad_1_data3 : $("#grad_1_data3").val(),
                    grad_1_data4 : $("#grad_1_data4").val(),
                    grad_1_data5 : $("#grad_1_data5").val(),
                    grad_1_data6 : $("#grad_1_data6").val(),
                    grad_1_data7 : $("#grad_1_data7").val(),
                    grad_1_data8 : $("#grad_1_data8").val(),
                    grad_2_data1 : $("#grad_2_data1").val(),
                    grad_2_data2 : $("#grad_2_data2").val(),
                    grad_2_data3 : $("#grad_2_data3").val(),
                    grad_2_data4 : $("#grad_2_data4").val(),
                    grad_2_data5 : $("#grad_2_data5").val(),
                    grad_2_data6 : $("#grad_2_data6").val(),
                    grad_2_data7 : $("#grad_2_data7").val(),
                    grad_2_data8 : $("#grad_2_data8").val(),
                    grad_3_data1 : $("#grad_3_data1").val(),
                    grad_3_data2 : $("#grad_3_data2").val(),
                    grad_3_data3 : $("#grad_3_data3").val(),
                    grad_3_data4 : $("#grad_3_data4").val(),
                    grad_3_data5 : $("#grad_3_data5").val(),
                    grad_3_data6 : $("#grad_3_data6").val(),
                    grad_3_data7 : $("#grad_3_data7").val(),
                    grad_3_data8 : $("#grad_3_data8").val(),
                    career_sel : $("#career_sel").val(),
                    career_sel2 : $("#career_sel2").val(),
                    career_input : $("#career_input").val(),
                    career_input2 : $("#career_input2").val(),
                    major_history_1 : nCheckView1, //전국규모 (콩쿨)대회 및 연주회 참여
                    major_history_2 : nCheckView2, //시·도규모 (콩쿨) 대회 및 연주회 참여
                    major_history_3 : nCheckView3, //공공·민간기관 주최 (콩쿨) 대회 및 연주회 참여
                    major_history_4 : nCheckView4, //기관 및 기업소속 연주단 소속 경력
                    major_history_5 : nCheckView5,  //프리랜서 연주자 활동
                    active_data1 : $("#active_data1").val(),
                    active_data1_1 : $("#active_data1_1").val(),
                    active_data2 : $("#active_data2").val(),
                    active_data3 : $("#active_data3").val(),
                    active_data4 : $("#active_data4").val(),
                    active_data4_1 : $("#active_data4_1").val(),
                    active_data5 : $("#active_data5").val(),
                    active_data6 : $("#active_data6").val(),
                    active_data7 : $("#active_data7").val(),
                    active_data7_1 : $("#active_data7_1").val(),
                    active_data8 : $("#active_data8").val(),
                    active_data9 : $("#active_data9").val(),
                    active_data10 : $("#active_data10").val(),
                    active_data10_1 : $("#active_data10_1").val(),
                    active_data11 : $("#active_data11").val(),
                    active_data12 : $("#active_data12").val(),
                    active_data13 : $("#active_data13").val(),
                    active_data13_1 : $("#active_data13_1").val(),
                    active_data14 : $("#active_data14").val(),
                    active_data15 : $("#active_data15").val(),
                    active_data16 : $("#active_data16").val(),
                    active_data17 : $("#active_data17").val(),
                    active_data18 : $("#active_data18").val(),
                    active_data19 : $("#active_data19").val(),
                    active_data20 : $("#active_data20").val(),
                    active_data21 : $("#active_data21").val(),
                    active_data22 : $("#active_data22").val(),
                    active_data23 : $("#active_data23").val(),
                    active_data24 : $("#active_data24").val(),
                    active_data25 : $("#active_data25").val(),
                    active_data26 : $("#active_data26").val(),
                    active_data27 : $("#active_data27").val(),
                    active_data28 : $("#active_data28").val(),
                    active_data29 : $("#active_data29").val(),
                    active_data30 : $("#active_data30").val(),
                    edu_data1 : $("#edu_data1").val(),
                    edu_data2 : $("#edu_data2").val(),
                    edu_data3 : $("#edu_data3").val(),
                    edu_data4 : $("#edu_data4").val(),
                    edu_data5 : $("#edu_data5").val(),
                    edu_data6 : $("#edu_data6").val(),
                    edu_data7 : $("#edu_data7").val(),
                    edu_data8 : $("#edu_data8").val(),
                    edu_data9 : $("#edu_data9").val(),
                    edu_data10 : $("#edu_data10").val(),
                    edu_data11 : $("#edu_data11").val(),
                    edu_data12 : $("#edu_data12").val(),
                    edu_data13 : $("#edu_data13").val(),
                    edu_data14 : $("#edu_data14").val(),
                    edu_data15 : $("#edu_data15").val(),
                    edu_data16 : $("#edu_data16").val(),
                    edu_data17 : $("#edu_data17").val(),
                    edu_data18 : $("#edu_data18").val(),
                    edu_data19 : $("#edu_data19").val(),
                    edu_data20 : $("#edu_data20").val(),
                    edu_data21 : $("#edu_data21").val(),
                    edu_data22 : $("#edu_data22").val(),
                    edu_data23 : $("#edu_data23").val(),
                    edu_data24 : $("#edu_data24").val(),
                    edu_data25 : $("#edu_data25").val(),
                    edu_data26 : $("#edu_data26").val(),
                    edu_data27 : $("#edu_data27").val(),
                    edu_data28 : $("#edu_data28").val(),
                    edu_data29 : $("#edu_data29").val(),
                    edu_data30 : $("#edu_data30").val(),
                    edu_data31 : $("#edu_data31").val(),
                    edu_data32 : $("#edu_data32").val(),
                    edu_data33 : $("#edu_data33").val(),
                    edu_data34 : $("#edu_data34").val(),
                    edu_data35 : $("#edu_data35").val(),
                    edu_data36 : $("#edu_data36").val(),
                    edu_data37 : $("#edu_data37").val(),
                    edu_data38 : $("#edu_data38").val(),
                    edu_data39 : $("#edu_data39").val(),
                    edu_data40 : $("#edu_data40").val()
                  },
                   function(data,status){
                   if(status != "fail"){
                     alert("임시저장이 완료되었습니다.");
                   }
                   else
                   {
                    alert("네트워크 오류");
                   }
                  });

                }
              }

            </script>
            <?php
              $query="select sch_data1,sch_data2,sch_data3,highschool_state,qualification_exam,
              sch_1_data1,sch_1_data2,sch_1_data3,sch_1_data4,sch_1_data5,sch_1_data6,sch_1_data7,sch_1_data8,sch_1_data9,sch_1_data10,
              sch_2_data1,sch_2_data2,sch_2_data3,sch_2_data4,sch_2_data5,sch_2_data6,sch_2_data7,sch_2_data8,sch_2_data9,sch_2_data10,
              sch_3_data1,sch_3_data2,sch_3_data3,sch_3_data4,sch_3_data5,sch_3_data6,sch_3_data7,sch_3_data8,sch_3_data9,sch_3_data10,
              grad_1_data1,grad_1_data2,grad_1_data3,grad_1_data4,grad_1_data5,grad_1_data6,grad_1_data7,grad_1_data8,grad_1_data9,grad_1_data10,
              grad_2_data1,grad_2_data2,grad_2_data3,grad_2_data4,grad_2_data5,grad_2_data6,grad_2_data7,grad_2_data8,grad_2_data9,grad_2_data10,
              grad_3_data1,grad_3_data2,grad_3_data3,grad_3_data4,grad_3_data5,grad_3_data6,grad_3_data7,grad_3_data8,grad_3_data9,grad_3_data10,
              career_sel,career_input,career_sel2,career_input2,major_history_1,major_history_2,major_history_3,major_history_4,major_history_5,
              active_data1,active_data1_1,active_data2,active_data3,active_data4,active_data4_1,active_data5,
              active_data6,active_data7,active_data7_1,active_data8,active_data9,active_data10,active_data10_1,
              active_data11,active_data12,active_data13,active_data13_1,active_data14,active_data15,
              active_data16,active_data17,active_data18,active_data19,active_data20,
              active_data21,active_data22,active_data23,active_data24,active_data25,
              active_data26,active_data27,active_data28,active_data29,active_data30,
              edu_data1,edu_data2,edu_data3,edu_data4,edu_data5,edu_data6,edu_data7,edu_data8,edu_data9,edu_data10,
              edu_data11,edu_data12,edu_data13,edu_data14,edu_data15,edu_data16,edu_data17,edu_data18,edu_data19,edu_data20,
              edu_data21,edu_data22,edu_data23,edu_data24,edu_data25,edu_data26,edu_data27,edu_data28,edu_data29,edu_data30,
              edu_data31,edu_data32,edu_data33,edu_data34,edu_data35,edu_data36,edu_data37,edu_data38,edu_data39,edu_data40
              from apply_step_2 where userid = '$usernum'";
              $Aresult2 = mysqli_query($con,$query);
              $Arow2 = mysqli_fetch_array($Aresult2);

              $highschool_state = $Arow2['highschool_state']; // 고등학교미만 졸업
              $qualification_exam = $Arow2['qualification_exam']; // 대입검정고시

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
              $sch_1_data9 = $Arow2['sch_1_data9'];
              $sch_1_data10 = $Arow2['sch_1_data10'];

              $sch_2_data1 = $Arow2['sch_2_data1'];
              $sch_2_data2 = $Arow2['sch_2_data2'];
              $sch_2_data3 = $Arow2['sch_2_data3'];
              $sch_2_data4 = $Arow2['sch_2_data4'];
              $sch_2_data5 = $Arow2['sch_2_data5'];
              $sch_2_data6 = $Arow2['sch_2_data6'];
              $sch_2_data7 = $Arow2['sch_2_data7'];
              $sch_2_data8 = $Arow2['sch_2_data8'];
              $sch_2_data9 = $Arow2['sch_2_data9'];
              $sch_2_data10 = $Arow2['sch_2_data10'];

              $sch_3_data1 = $Arow2['sch_3_data1'];
              $sch_3_data2 = $Arow2['sch_3_data2'];
              $sch_3_data3 = $Arow2['sch_3_data3'];
              $sch_3_data4 = $Arow2['sch_3_data4'];
              $sch_3_data5 = $Arow2['sch_3_data5'];
              $sch_3_data6 = $Arow2['sch_3_data6'];
              $sch_3_data7 = $Arow2['sch_3_data7'];
              $sch_3_data8 = $Arow2['sch_3_data8'];
              $sch_3_data9 = $Arow2['sch_3_data9'];
              $sch_3_data10 = $Arow2['sch_3_data10'];


              $grad_1_data1 = $Arow2['grad_1_data1'];
              $grad_1_data2 = $Arow2['grad_1_data2'];
              $grad_1_data3 = $Arow2['grad_1_data3'];
              $grad_1_data4 = $Arow2['grad_1_data4'];
              $grad_1_data5 = $Arow2['grad_1_data5'];
              $grad_1_data6 = $Arow2['grad_1_data6'];
              $grad_1_data7 = $Arow2['grad_1_data7'];
              $grad_1_data8 = $Arow2['grad_1_data8'];
              $grad_1_data9 = $Arow2['grad_1_data9'];
              $grad_1_data10 = $Arow2['grad_1_data10'];

              $grad_2_data1 = $Arow2['grad_2_data1'];
              $grad_2_data2 = $Arow2['grad_2_data2'];
              $grad_2_data3 = $Arow2['grad_2_data3'];
              $grad_2_data4 = $Arow2['grad_2_data4'];
              $grad_2_data5 = $Arow2['grad_2_data5'];
              $grad_2_data6 = $Arow2['grad_2_data6'];
              $grad_2_data7 = $Arow2['grad_2_data7'];
              $grad_2_data8 = $Arow2['grad_2_data8'];
              $grad_2_data9 = $Arow2['grad_2_data9'];
              $grad_2_data10 = $Arow2['grad_2_data10'];

              $grad_3_data1 = $Arow2['grad_3_data1'];
              $grad_3_data2 = $Arow2['grad_3_data2'];
              $grad_3_data3 = $Arow2['grad_3_data3'];
              $grad_3_data4 = $Arow2['grad_3_data4'];
              $grad_3_data5 = $Arow2['grad_3_data5'];
              $grad_3_data6 = $Arow2['grad_3_data6'];
              $grad_3_data7 = $Arow2['grad_3_data7'];
              $grad_3_data8 = $Arow2['grad_3_data8'];
              $grad_3_data9 = $Arow2['grad_3_data9'];
              $grad_3_data10 = $Arow2['grad_3_data10'];

              $career_sel = $Arow2['career_sel'];
              $career_input = $Arow2['career_input'];
              $career_sel2 = $Arow2['career_sel2'];
              $career_input2 = $Arow2['career_input2'];

              $chkbox1 = $Arow2['major_history_1'];
              $chkbox2 = $Arow2['major_history_2'];
              $chkbox3 = $Arow2['major_history_3'];
              $chkbox4 = $Arow2['major_history_4'];
              $chkbox5 = $Arow2['major_history_5'];

              $active_data1 = $Arow2['active_data1'];
              $active_data1_1 = $Arow2['active_data1_1'];
              $active_data2 = $Arow2['active_data2'];
              $active_data3 = $Arow2['active_data3'];
              $active_data4 = $Arow2['active_data4'];
              $active_data4_1 = $Arow2['active_data4_1'];
              $active_data5 = $Arow2['active_data5'];
              $active_data6 = $Arow2['active_data6'];
              $active_data7 = $Arow2['active_data7'];
              $active_data7_1 = $Arow2['active_data7_1'];
              $active_data8 = $Arow2['active_data8'];
              $active_data9 = $Arow2['active_data9'];
              $active_data10 = $Arow2['active_data10'];
              $active_data10_1 = $Arow2['active_data10_1'];
              $active_data11 = $Arow2['active_data11'];
              $active_data12 = $Arow2['active_data12'];
              $active_data13 = $Arow2['active_data13'];
              $active_data13_1 = $Arow2['active_data13_1'];
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
              echo "<input type='hidden' id='db_qualification_exam' value='$qualification_exam' />";
              echo "<input type='hidden' id='db_sch_data3' value='$sch_data3' />";
              
              echo "<input type='hidden' id='db_sch_1_data1' value='$sch_1_data1' />";
              echo "<input type='hidden' id='db_sch_1_data3' value='$sch_1_data3' />";
              echo "<input type='hidden' id='db_sch_1_data4' value='$sch_1_data4' />";
              echo "<input type='hidden' id='db_sch_1_data5' value='$sch_1_data5' />";
              echo "<input type='hidden' id='db_sch_1_data6' value='$sch_1_data6' />";
              echo "<input type='hidden' id='db_sch_1_data7' value='$sch_1_data7' />";
              echo "<input type='hidden' id='db_sch_1_data10' value='$sch_1_data10' />";

              echo "<input type='hidden' id='db_sch_2_data1' value='$sch_2_data1' />";
              echo "<input type='hidden' id='db_sch_2_data3' value='$sch_2_data3' />";
              echo "<input type='hidden' id='db_sch_2_data4' value='$sch_2_data4' />";
              echo "<input type='hidden' id='db_sch_2_data5' value='$sch_2_data5' />";
              echo "<input type='hidden' id='db_sch_2_data6' value='$sch_2_data6' />";
              echo "<input type='hidden' id='db_sch_2_data7' value='$sch_2_data7' />";
              echo "<input type='hidden' id='db_sch_2_data10' value='$sch_2_data10' />";

              echo "<input type='hidden' id='db_sch_3_data1' value='$sch_3_data1' />";
              echo "<input type='hidden' id='db_sch_3_data3' value='$sch_3_data3' />";
              echo "<input type='hidden' id='db_sch_3_data4' value='$sch_3_data4' />";
              echo "<input type='hidden' id='db_sch_3_data5' value='$sch_3_data5' />";
              echo "<input type='hidden' id='db_sch_3_data6' value='$sch_3_data6' />";
              echo "<input type='hidden' id='db_sch_3_data7' value='$sch_3_data7' />";
              echo "<input type='hidden' id='db_sch_3_data10' value='$sch_3_data10' />";

              echo "<input type='hidden' id='db_grad_1_data2' value='$grad_1_data2' />";
              echo "<input type='hidden' id='db_grad_1_data3' value='$grad_1_data3' />";
              echo "<input type='hidden' id='db_grad_1_data4' value='$grad_1_data4' />";
              echo "<input type='hidden' id='db_grad_1_data5' value='$grad_1_data5' />";
              echo "<input type='hidden' id='db_grad_1_data6' value='$grad_1_data6' />";
              echo "<input type='hidden' id='db_grad_1_data9' value='$grad_1_data9' />";
              echo "<input type='hidden' id='db_grad_1_data10' value='$grad_1_data10' />";
              
              echo "<input type='hidden' id='db_grad_2_data2' value='$grad_2_data2' />";
              echo "<input type='hidden' id='db_grad_2_data3' value='$grad_2_data3' />";
              echo "<input type='hidden' id='db_grad_2_data4' value='$grad_2_data4' />";
              echo "<input type='hidden' id='db_grad_2_data5' value='$grad_2_data5' />";
              echo "<input type='hidden' id='db_grad_2_data6' value='$grad_2_data6' />";
              echo "<input type='hidden' id='db_grad_2_data9' value='$grad_2_data9' />";
              echo "<input type='hidden' id='db_grad_2_data10' value='$grad_2_data10' />";
              
              echo "<input type='hidden' id='db_grad_3_data2' value='$grad_2_data2' />";
              echo "<input type='hidden' id='db_grad_3_data3' value='$grad_2_data3' />";
              echo "<input type='hidden' id='db_grad_3_data4' value='$grad_2_data4' />";
              echo "<input type='hidden' id='db_grad_3_data5' value='$grad_2_data5' />";
              echo "<input type='hidden' id='db_grad_3_data6' value='$grad_2_data6' />";
              echo "<input type='hidden' id='db_grad_3_data9' value='$grad_2_data9' />";
              echo "<input type='hidden' id='db_grad_3_data10' value='$grad_2_data10' />";

              echo "<input type='hidden' id='db_career_sel' value='$career_sel' />";
              echo "<input type='hidden' id='db_career_sel2' value='$career_sel2' />";

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

              
            ?>
            <div class="step_con step2">
              <div class="basic_infomation_wrap">
                <h2>학력/경력/대외활동</h2>
              </div>
              <script>
                function onShoolCheck(Id,nIndex,num)
                {
                  if(Id == 0)
                  {
                    if($("#sch_data3").val() != "졸업")
                    {
                      $("#sch_data2").val("");
                      $("#sch_data2").attr("disabled",true);
                    }
                    else
                    {
                      $("#sch_data2").attr("disabled",false);
                    }
                  }
                  else if(Id == 1)
                  {
                    // if($("#sch_"+nIndex+"_data"+num).val() != "졸업")
                    // {
                    //   num -= 1;
                    //   $("#sch_"+nIndex+"_data"+num).val("");
                    //   $("#sch_"+nIndex+"_data"+num).attr("disabled",true);
                    // }
                    // else
                    // {
                    //   num -= 1;
                    //   $("#sch_"+nIndex+"_data"+num).attr("disabled",false);
                    // }
                    if($("#sch_"+nIndex+"_data"+(num+2)).val() === "재학중" || $("#sch_"+nIndex+"_data"+(num+2)).val() === "중퇴" ||
                        $("#sch_"+nIndex+"_data"+(num+2)).val() === "휴학"){
                      $("#sch_"+nIndex+"_data"+num).attr("disabled", true);
                      $("#sch_"+nIndex+"_data"+(num+1)).attr("disabled", true);
                    }else{
                      $("#sch_"+nIndex+"_data"+num).attr("disabled", false);
                      $("#sch_"+nIndex+"_data"+(num+1)).attr("disabled", false);
                    }
                  }
                  else if(Id == 2)
                  {
                    // if($("#grad_"+nIndex+"_data"+num).val() != "졸업")
                    // {
                    //   num -= 1;
                    //   $("#grad_"+nIndex+"_data"+num).val("");
                    //   $("#grad_"+nIndex+"_data"+num).attr("disabled",true);
                    // }
                    // else
                    // {
                    //   num -= 1;
                    //   $("#grad_"+nIndex+"_data"+num).attr("disabled",false);
                    // }
                    if($("#grad_"+nIndex+"_data"+(num+1)).val() === "재학중" || $("#grad_"+nIndex+"_data"+(num+1)).val() === "중퇴" ||
                      $("#grad_"+nIndex+"_data"+(num+1)).val() === "휴학"){
                      $("#grad_"+nIndex+"_data"+num).attr("disabled", true);
                      $("#grad_"+nIndex+"_data"+(num-1)).attr("disabled", true);
                    }else{
                      $("#grad_"+nIndex+"_data"+num).attr("disabled", false);
                      $("#grad_"+nIndex+"_data"+(num-1)).attr("disabled", false);
                    }
                  }
                }
              </script>
              <div class="basic_infomation">
                <div class="flex baseline">
                  <div class="form_title flex-direction">
                    <h6>고등학교 학력</h6>
                  </div>
                  <div class="form_con allform flex-direction">
                    <div class="flex scformbox">
                      <!-- 고등학교 학력 -->
                      <?php
                        if($Arow2['highschool_state'] == '0' && $Arow2['qualification_exam'] == '1')
                        {
                          echo "<div class='schoolbox'>
                            <div class='flex'>
                              <input type='text' placeholder='학교명' id='sch_data1' disabled required>
                            </div>
                          </div>
                          <div class='graduate'>
                            <div class='flex'>
                              <div class='flex mobiles'>
                                <input type='text' id='sch_data2' placeholder='졸업연도' disabled required>
                                <select id='sch_data3' disabled>
                                  <option value=''>졸업상태</option>
                                  <option value='졸업'>졸업</option>
                                  <option value='졸업예정'>졸업예정</option>
                                  <option value='재학중'>재학중</option>
                                  <option value='중퇴'>중퇴</option>
                                  <option value='휴학'>휴학</option>
                                </select>
                              </div>
                            </div>
                          </div>";
                        }
                        else
                        {
                          echo "<div class='schoolbox'>
                            <div class='flex'>
                              <input type='text' placeholder='학교명' id='sch_data1' value='$sch_data1'required>
                            </div>
                          </div>
                          <div class='graduate'>
                            <div class='flex'>
                              <div class='flex mobiles'>
                                <input type='text' id='sch_data2' value='$sch_data2' placeholder='졸업연도' required>
                                <select id='sch_data3' onchange='onShoolCheck(0,0,0)'>
                                  <<option value=''>졸업상태</option>
                                  <option value='졸업'>졸업</option>
                                  <option value='졸업예정'>졸업예정</option>
                                  <option value='재학중'>재학중</option>
                                  <option value='중퇴'>중퇴</option>
                                  <option value='휴학'>휴학</option>
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
                        <?php
                          if($Arow2['highschool_state'] == '0' && $Arow2['qualification_exam'] == '1'){
                            echo "
                              <div class='checkbox flex'>
                                <div class='flex'>
                                  <input type='checkbox' id='chk1' checked class='normal'>
                                  <label for='chk1' onclick='onSchoolCheck(2)'></label>
                                </div>
                                <span>대입검정고시</span>
                              </div>
                              <div class='checkbox flex'>
                                <div class='flex'>
                                  <input type='checkbox' id='chk2' class='normal'>
                                  <label for='chk2' onclick='onSchoolCheck(1)'></label>
                                </div>
                                <span>고등학교미만 졸업</span>
                              </div>
                            ";
                          }else{
                            echo "
                              <div class='checkbox flex'>
                                <div class='flex'>
                                  <input type='checkbox' id='chk1' class='normal'>
                                  <label for='chk1' onclick='onSchoolCheck(2)'></label>
                                </div>
                                <span>대입검정고시</span>
                              </div>
                              <div class='checkbox flex'>
                                <div class='flex'>
                                  <input type='checkbox' id='chk2' checked class='normal'>
                                  <label for='chk2' onclick='onSchoolCheck(1)'></label>
                                </div>
                                <span>고등학교미만 졸업</span>
                              </div>
                            ";
                          }
                        ?>
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
                      include "php/view/school_info_1_ch.php";
                    ?>

                  </div>
                </div>
                <div class="flex baseline school_info_div">
                  <div class="form_title flex-direction">
                    <h6>대학원 학력</h6>
                  </div>
                  <div class="form_con allform flex-direction">
                    <?php
                      include "php/view/school_info_2_ch.php";
                    ?>
                  </div>
                </div>
                <div class="flex baseline bordernone">
                  <div class="form_title flex-direction">
                    <h6>경력</h6>
                  </div>
                  <div class="form_con major">
                    <div>
                      <select class="career" id='career_sel' onchange="onCareerSel()">
                        <option value=''>주 전공명을 선택해주세요.</option>
                        <option value='피아노'>피아노</option>
                        <option value='바이올린'>바이올린</option>
                        <option value='첼로'>첼로</option>
                        <option value='하프'>하프</option>
                        <option value='풀루트'>풀루트</option>
                        <option value='오보에'>오보에</option>
                        <option value='클라리넷'>클라리넷</option>
                        <option value='바순'>바순</option>
                        <option value='트럼펫'>트럼펫</option>
                        <option value='호른'>호른</option>
                        <option value='비올라'>비올라</option>
                        <option value='베이스'>베이스</option>
                        <option value='팀파니'>팀파니</option>
                        <option>기타(직접작성)</option>
                      </select><br>
                      <div class="flex career_etc_info" style='display:none;margin-top:10px;'>
                        <input type="text" id='career_input' placeholder="주전공을 입력하시기 바랍니다." required>
                      </div>
                    </div>
                    <div>
                      <select class="career" id='career_sel2' onchange="onCareerSel2()">
                        <option value=0>부 전공명을 선택해주세요.</option>
                        <option>없음</option>
                        <option value='피아노'>피아노</option>
                        <option value='바이올린'>바이올린</option>
                        <option value='첼로'>첼로</option>
                        <option value='하프'>하프</option>
                        <option value='풀루트'>풀루트</option>
                        <option value='오보에'>오보에</option>
                        <option value='클라리넷'>클라리넷</option>
                        <option value='바순'>바순</option>
                        <option value='트럼펫'>트럼펫</option>
                        <option value='호른'>호른</option>
                        <option value='비올라'>비올라</option>
                        <option value='베이스'>베이스</option>
                        <option value='팀파니'>팀파니</option>
                        <option>기타(직접작성)</option>
                      </select><br>
                      <div class="flex career_etc_info2" style='display:none;margin-top:10px;'>
                        <input type="text" id='career_input' placeholder="부전공을 입력하시기 바랍니다." required>
                      </div>
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
                  function onCareerSel2()
                  {
                    if($("#career_sel2").val() == "기타(직접작성)")
                    {
                      $(".career_etc_info2").show();
                    }
                    else {
                      $(".career_etc_info2").hide();
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
                                if($chkbox1 == "전국규모 (콩쿨)대회 및 연주회 참여") echo "<input type='checkbox' checked id='chkbox1' class='normal'>";
                                else echo "<input type='checkbox' id='chkbox1' class='normal'>";
                              ?>
                              <label for="chkbox1"></label>
                            </div>
                            <span>전국규모 (콩쿨)대회 및 연주회 참여</span>
                          </label>
                          <label class="checkbox flex">
                            <div class="flex">
                              <?php
                                if($chkbox2 == "시·도규모 (콩쿨) 대회 및 연주회 참여") echo "<input type='checkbox' checked id='chkbox2' class='normal'>";
                                else echo "<input type='checkbox' id='chkbox2' class='normal'>";
                              ?>
                              <label for="chkbox2"></label>
                            </div>
                            <span>시·도규모 (콩쿨) 대회 및 연주회 참여</span>
                          </label>
                          <label class="checkbox flex">
                            <div class="flex">
                              <?php
                                if($chkbox3 == "공공·민간기관 주최 (콩쿨) 대회 및 연주회 참여") echo "<input type='checkbox' checked id='chkbox3' class='normal'>";
                                else echo "<input type='checkbox' id='chkbox3' class='normal'>";
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
                                if($chkbox4 == "기관 및 기업소속 연주단 소속 경력") echo "<input type='checkbox' checked id='chkbox4' class='normal'>";
                                else echo "<input type='checkbox' id='chkbox4' class='normal'>";
                              ?>
                              <label for="chkbox4"></label>
                            </div>
                            <span>기관 및 기업소속 연주단 소속 경력</span>
                          </label>
                          <label class="checkbox flex">
                            <div class="flex">
                              <?php
                                if($chkbox5 == "프리랜서 연주자 활동") echo "<input type='checkbox' checked id='chkbox5' class='normal'>";
                                else echo "<input type='checkbox' id='chkbox5' class='normal'>";
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
                        include "php/view/activity_info_1_ch.php";
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
                      include "php/view/education_info_1_ch.php";
                    ?>
                  </div>
                </div>
              </div>
              <div class="btns_wrap flex">
                <div class="flex btn_prevstep btn" onclick="prevBtn(1)"><span>이전단계</span></div>
                <div class="flex btn_temporarystorage btn" onclick='onApplyTempSave(2)'><span>임시저장</span></div>
                <div class="flex btn_nextstep btn" onclick="nextBtn(2)"><span>다음단계</span></div>
              </div>
            </div>
            <script>
              $("#sch_data3").val($("#db_sch_data3").val()).prop("selected", true);

              $("#sch_1_data1").val($("#db_sch_1_data1").val()).prop("selected", true);
              $("#sch_1_data3").val($("#db_sch_1_data3").val()).prop("selected", true);
              $("#sch_1_data4").val($("#db_sch_1_data4").val()).prop("selected", true);
              $("#sch_1_data5").val($("#db_sch_1_data5").val()).prop("selected", true);
              $("#sch_1_data6").val($("#db_sch_1_data6").val()).prop("selected", true);
              $("#sch_1_data7").val($("#db_sch_1_data7").val()).prop("selected", true);
              $("#sch_1_data10").val($("#db_sch_1_data10").val()).prop("selected", true);

              $("#sch_2_data1").val($("#db_sch_2_data1").val()).prop("selected", true);
              $("#sch_2_data3").val($("#db_sch_2_data3").val()).prop("selected", true);
              $("#sch_2_data4").val($("#db_sch_2_data4").val()).prop("selected", true);
              $("#sch_2_data5").val($("#db_sch_2_data5").val()).prop("selected", true);
              $("#sch_2_data6").val($("#db_sch_2_data6").val()).prop("selected", true);
              $("#sch_2_data7").val($("#db_sch_2_data7").val()).prop("selected", true);
              $("#sch_2_data10").val($("#db_sch_2_data10").val()).prop("selected", true);

              $("#sch_3_data1").val($("#db_sch_3_data1").val()).prop("selected", true);
              $("#sch_3_data3").val($("#db_sch_3_data3").val()).prop("selected", true);
              $("#sch_3_data4").val($("#db_sch_3_data4").val()).prop("selected", true);
              $("#sch_3_data5").val($("#db_sch_3_data5").val()).prop("selected", true);
              $("#sch_3_data6").val($("#db_sch_3_data6").val()).prop("selected", true);
              $("#sch_3_data7").val($("#db_sch_3_data7").val()).prop("selected", true);
              $("#sch_3_data10").val($("#db_sch_3_data10").val()).prop("selected", true);

              $("#grad_1_data2").val($("#db_grad_1_data2").val()).prop("selected", true);
              $("#grad_1_data3").val($("#db_grad_1_data3").val()).prop("selected", true);
              $("#grad_1_data4").val($("#db_grad_1_data4").val()).prop("selected", true);
              $("#grad_1_data5").val($("#db_grad_1_data5").val()).prop("selected", true);
              $("#grad_1_data6").val($("#db_grad_1_data6").val()).prop("selected", true);
              $("#grad_1_data9").val($("#db_grad_1_data9").val()).prop("selected", true);
              $("#grad_1_data10").val($("#db_grad_1_data10").val()).prop("selected", true);

              $("#grad_2_data2").val($("#db_grad_2_data2").val()).prop("selected", true);
              $("#grad_2_data3").val($("#db_grad_2_data3").val()).prop("selected", true);
              $("#grad_2_data4").val($("#db_grad_2_data4").val()).prop("selected", true);
              $("#grad_2_data5").val($("#db_grad_2_data5").val()).prop("selected", true);
              $("#grad_2_data6").val($("#db_grad_2_data6").val()).prop("selected", true);
              $("#grad_2_data9").val($("#db_grad_2_data9").val()).prop("selected", true);
              $("#grad_2_data10").val($("#db_grad_2_data10").val()).prop("selected", true);

              $("#grad_3_data2").val($("#db_grad_3_data2").val()).prop("selected", true);
              $("#grad_3_data3").val($("#db_grad_3_data3").val()).prop("selected", true);
              $("#grad_3_data4").val($("#db_grad_3_data4").val()).prop("selected", true);
              $("#grad_3_data5").val($("#db_grad_3_data5").val()).prop("selected", true);
              $("#grad_3_data6").val($("#db_grad_3_data6").val()).prop("selected", true);
              $("#grad_3_data9").val($("#db_grad_3_data9").val()).prop("selected", true);
              $("#grad_3_data10").val($("#db_grad_3_data10").val()).prop("selected", true);

              $("#career_sel").val($("#db_career_sel").val()).prop("selected", true);
              $("#career_sel2").val($("#db_career_sel2").val()).prop("selected", true);

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
              if($("#db_highschool_state").val() == "0" && $("#db_qualification_exam").val() == "1"){
                $(".school_info_div").show();
              }else{
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
                        include "php/view/licenses_info_ch.php";
                      ?>
                    </div>
                  </div>
                  <div class="flex baseline">
                    <div class="form_title flex-direction">
                      <h6>수상</h6>
                    </div>
                    <div class="form_con">
                      <?php
                        include "php/view/awards_info_ch.php";
                      ?>
                    </div>
                  </div>
                  <div class="flex bordernone">
                    <div class="form_title flex-direction">
                      <h6>포토폴리오</h6>
                    </div>
                    <div class="form_con">
                      <div class="flex portfolio">
                        <input type="file" name='portfolio_filename' id="portfolio_filename" required style='padding-top:10px;' accept="application/pdf">
                      </div>
                    </div>
                  </div>
                  <div class="flex">
                    <div class="form_title flex-direction">
                      <h6>링크</h6>
                    </div>
                    <div class="form_con pt-0">
                      <div class="link">
                        <input type="text" name='userlink' id='userlink' placeholder="https://" value='<?=$userlink?>' required>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
              <script>
                function onApplyTempSaveForm2()
                {
                  $('.popup_submission_wrap').fadeIn(300);
                  // if(!$('#pledgechk').is(':checked')) { alert("정보제공지원자 동의 서약서를 필수 동의하셔야합니다."); return; }
                  // if($("#finish_1_filename").val() == "") { alert("정보제공동의서는 필수자료입니다."); return; }
                  // else if($("#finish_2_filename").val() == "") { alert("장애인증명서는 필수자료입니다."); return; }

                  // var bar = $('.bar');
                  // var percent = $('.percent');
                  // var status = $('#status');

                  // $('#fileForm2').ajaxForm({
                  //   beforeSend: function() {
                  //       $("#uploadloadingBar").show();
                  //       status.empty();
                  //       var percentVal = '0%';
                  //       bar.width(percentVal);
                  //       percent.html(percentVal);
                  //     },
                  //     uploadProgress: function(event, position, total, percentComplete) {
                  //       var percentVal = percentComplete + '%';
                  //       bar.width(percentVal);
                  //       percent.html(percentVal);
                  //     },
                  //     success: function(response, textStatus, xhr, form) {
                  //       $("#uploadloadingBar").hide();
                  //       if(response == "success")
                  //       {
                  //         $('.popup_submission_wrap').fadeIn(300);
                  //       }
                  //       else
                  //       {
                  //         alert(response);
                  //       }
                  //    },
                  //     complete: function(xhr,statusText) {
                  //       $("#uploadloadingBar").hide();

                  //     },
                  //     //ajax error
                  //     error: function(){
                  //       $("#loadingBar").hide();
                  //       alert("에러발생!!");
                  //     }
                  // });
                  // $("#fileForm2").submit();
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
                <div class="flex btn_temporarystorage btn" onclick='onApplyTempSaveForm(3)'><span>임시저장</span></div>
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
                  <h2>자기소개서 (최대 3개 입력가능)</h2>
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
                      include "php/view/introduction_info_ch.php";
                    ?>
                  </div>
                </div>
              </div>
              <div class="btns_wrap flex">
                <div class="flex btn_prevstep btn" onclick="prevBtn(3)"><span>이전단계</span></div>
                <div class="flex btn_temporarystorage btn" onclick='onApplyTempSave(4)'><span>임시저장</span></div>
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
                    <label class="pledgechkbox flex">
                      <div class="flex">
                        <input type="checkbox" name='pledgechk' id="pledgechk" class="normal">
                        <label for="pledgechk"></label>
                      </div>
                      <span>위 내용을 모두 확인하였으며, 이에 동의합니다.</span>
                    </label>
                  </div>
                </div>
              </div>
              <div class="basic_infomation atts">
                <form id='fileForm2' action='php/fnc/apply_temp_save_form2.php' method='post' enctype='multipart/form-data'>
                  <div class="flex baseline">
                    <div class="form_title flex-direction">
                      <h6>필수 첨부자료</h6>
                    </div>
                    <div class="form_con">
                      <div class="flex-direction attachments">
                        <div class="flex-direction">
                          <span>[기타서류 첨부]</span>
                          <p>공고문의 제출서류목록을 잘 확인하시어, 서류 일부 미제출로 탈락하시는 일이 없도록 주의하시기 바랍니다.</p>
                        </div>
                        <input type='hidden' name='upload_userid2' id='upload_userid2' value='<?=$usernum?>' />
                        <input type='hidden' name='upload_sel_tab2' id='upload_sel_tab2' value='5' />
                        <div class="flex-direction attachmentsfile">
                          <span>정보제공동의서 <span>*</span><span>첨부파일 형식은 PDF로 제출부탁드립니다.</span></span>
                          <div class="flex file_form_wrap">
                            <!-- <div class="file_view"><span><span class="mobilenone">정보제공동의서 </span>파일을 첨부해주세요.</span></div>
                            <div class="flex file_form">
                              <label for="file1">파일첨부</label>
                              <input type="file" id="file1">
                            </div> -->
                            <input type="file" name='finish_1_filename' id="finish_1_filename" required style='padding-top:10px;' accept="application/pdf">
                          </div>
                          <div class="filedownload">※정보제공동의서 파일 다운로드</div>
                        </div>
                        <div class="flex-direction attachmentsfile">
                          <span>장애인증명서 <span>*</span><span>첨부파일 형식은 PDF로 제출부탁드립니다.</span></span>
                          <div class="flex file_form_wrap">
                            <input type="file" name='finish_2_filename' id="finish_2_filename" required style='padding-top:10px;' accept="application/pdf">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="flex baseline">
                    <div class="form_title flex-direction">
                      <h6>선택 첨부자료</h6>
                    </div>
                    <div class="form_con">
                      <div class="flex-direction attachments">
                        <div class="flex-direction attachmentsfile">
                          <span>자격증사본 <span></span><span>첨부파일 형식은 PDF로 제출부탁드립니다.</span></span>
                          <div class="flex file_form_wrap">
                            <input type="file" name='finish_3_filename' id="finish_3_filename" required style='padding-top:10px;' accept="application/pdf">
                          </div>
                        </div>
                        <div class="flex-direction attachmentsfile">
                          <span>경력증명서 <span></span><span>첨부파일 형식은 PDF로 제출부탁드립니다.</span></span>
                          <div class="flex file_form_wrap">
                            <input type="file" name='finish_4_filename' id="finish_4_filename" required style='padding-top:10px;' accept="application/pdf">
                          </div>
                        </div>
                        <div class="flex-direction attachmentsfile">
                          <span>국민연금가입자가입증명서 <span></span><span>첨부파일 형식은 PDF로 제출부탁드립니다.</span></span>
                          <div class="flex file_form_wrap">
                            <input type="file" name='finish_5_filename' id="finish_5_filename" required style='padding-top:10px;' accept="application/pdf">
                          </div>
                        </div>
                        <div class="flex-direction attachmentsfile">
                          <span>건강보험자격득실확인서 <span></span><span>첨부파일 형식은 PDF로 제출부탁드립니다.</span></span>
                          <div class="flex file_form_wrap">
                            <input type="file" name='finish_6_filename' id="finish_6_filename" required style='padding-top:10px;' accept="application/pdf">
                          </div>
                        </div>
                        <div class="flex-direction attachmentsfile">
                          <span>고용보험피보험자격이력내역서 <span></span><span>첨부파일 형식은 PDF로 제출부탁드립니다.</span></span>
                          <div class="flex file_form_wrap">
                            <input type="file" name='finish_7_filename' id="finish_7_filename" required style='padding-top:10px;' accept="application/pdf">
                          </div>
                        </div>
                        <div class="flex-direction attachmentsfile">
                          <span>병적증명서/초본(병역사항)/군경력증명서 <span></span><span>첨부파일 형식은 PDF로 제출부탁드립니다.</span></span>
                          <div class="flex file_form_wrap">
                            <input type="file" name='finish_8_filename' id="finish_8_filename" required style='padding-top:10px;' accept="application/pdf">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="flex baseline">
                    <div class="form_title flex-direction">
                      <h6>우대대상 첨부자료</h6>
                    </div>
                    <div class="form_con">
                      <div class="flex-direction attachments">
                        <div class="flex-direction attachmentsfile">
                          <span>취업지원대상자 증명서 <span></span><span>첨부파일 형식은 PDF로 제출부탁드립니다.</span></span>
                          <div class="flex file_form_wrap">
                            <input type="file" name='finish_9_filename' id="finish_9_filename" required style='padding-top:10px;' accept="application/pdf">
                          </div>
                        </div>
                        <div class="flex-direction attachmentsfile">
                          <span>기초생활수급자 증명서 <span></span><span>첨부파일 형식은 PDF로 제출부탁드립니다.</span></span>
                          <div class="flex file_form_wrap">
                            <input type="file" name='finish_10_filename' id="finish_10_filename" required style='padding-top:10px;' accept="application/pdf">
                          </div>
                        </div>
                        <div class="flex-direction attachmentsfile">
                          <span>다문화가정증명서 <span></span><span>첨부파일 형식은 PDF로 제출부탁드립니다.</span></span>
                          <div class="flex file_form_wrap">
                            <input type="file" name='finish_11_filename' id="finish_11_filename" required style='padding-top:10px;' accept="application/pdf">
                          </div>
                        </div>
                        <div class="flex-direction attachmentsfile">
                          <span>북한이탈주민증명서 <span></span><span>첨부파일 형식은 PDF로 제출부탁드립니다.</span></span>
                          <div class="flex file_form_wrap">
                            <input type="file" name='finish_12_filename' id="finish_12_filename" required style='padding-top:10px;' accept="application/pdf">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <div class="btns_wrap flex">
                <div class="flex btn_prevstep btn" onclick="prevBtn(4);"><span>이전단계</span></div>
                <div class="flex btn_submissionpop btn" onclick='onApplyTempSaveForm2();'><span>최종제출</span></div>
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
        <div class="popbtn btn_preview flex" onclick=''><span>미리보기</span></div>
        <div class="popbtn btn_submission flex" onclick='onSubmissionSuc()'><span>최종제출</span></div>
      </div>
    </div>
  </div>

  <div class="popup_submission_wrap2 popup_wrap2">
    <div class="popup_submission popup2">
      <div class="popup_title flex">
        <div></div>
        <h6>미리보기</h6>
        <img src="images/btns/btn_cancel.png" alt="취소" class="btn_cancel" onclick=''>
      </div>
      <div class="check_title flex-direction">
        <h6>1. 기본정보</h6>
      </div>
      <div class="flex-direction info">

      </div>
      <div class="pop_btns flex">
        <div class="popbtn btn_submissioncancel flex" onclick='previewClose()'><span>닫기</span></div>
      </div>
    </div>
  </div>
<?php include 'php/common_script.php' ?>
<script>
  function previewClose(){
    $(".popup_submission_wrap2").hide();
  }

  function onSubmissionPopClose()
  {
    $(".popup_submission_wrap").hide();
  }
  function onSubmissionSuc()
  {
    $.post("php/fnc/apply_finish.php",
    {
      user_id : $("#user_id").val(),
    },
     function(data,status){
     if(status != "fail"){
       alert("최종제출되었습니다.\n좋은 결과를 기대합니다.");
     }
     else
     {
      alert("네트워크 오류");
     }
    });
  }
  $(".step_list li").click(function() {
    var idx = $(this).index();
    $('.step_list li').removeClass('on');
    $(this).addClass('on');
    $(".steps_wrap > .step_con").hide();
    $(".steps_wrap > .step_con").eq(idx).show();
  });

</script>
<script>
  function nextBtn(num){
    $('.step_list li').removeClass('on');
    if(num === 1){
      $('.steps_wrap > .step_con').hide();
      $('.steps_wrap > .step2').show();
      $('.step2_active').addClass('on');
    }
    if(num === 2){
      $('.steps_wrap > .step_con').hide();
      $('.steps_wrap > .step3').show();
      $('.step3_active').addClass('on');
    }
    if(num === 3){
      $('.steps_wrap > .step_con').hide();
      $('.steps_wrap > .step4').show();
      $('.step4_active').addClass('on');
    }
    if(num === 4){
      $('.steps_wrap > .step_con').hide();
      $('.steps_wrap > .step5').show();
      $('.step5_active').addClass('on');
    }
  };
  function prevBtn(num){
    $('.step_list li').removeClass('on');
    if(num === 1){
      $('.steps_wrap > .step_con').hide();
      $('.steps_wrap > .step1').show();
      $('.step1_active').addClass('on');
    }
    if(num === 2){
      $('.steps_wrap > .step_con').hide();
      $('.steps_wrap > .step2').show();
      $('.step2_active').addClass('on');
    }
    if(num === 3){
      $('.steps_wrap > .step_con').hide();
      $('.steps_wrap > .step3').show();
      $('.step3_active').addClass('on');
    }
    if(num === 4){
      $('.steps_wrap > .step_con').hide();
      $('.steps_wrap > .step4').show();
      $('.step4_active').addClass('on');
    }
  };
</script>
<script>
    // 우편번호 찾기 화면을 넣을 element
    var element_layer = document.getElementById('layer');

    function closeDaumPostcode() {
        // iframe을 넣은 element를 안보이게 한다.
        element_layer.style.display = 'none';
    }

    function execDaumPostcode() {
        new daum.Postcode({
            oncomplete: function(data) {
                // 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.

                // 각 주소의 노출 규칙에 따라 주소를 조합한다.
                // 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
                var addr = ''; // 주소 변수
                var extraAddr = ''; // 참고항목 변수

                //사용자가 선택한 주소 타입에 따라 해당 주소 값을 가져온다.
                if (data.userSelectedType === 'R') { // 사용자가 도로명 주소를 선택했을 경우
                    addr = data.roadAddress;
                } else { // 사용자가 지번 주소를 선택했을 경우(J)
                    addr = data.jibunAddress;
                }

                // 사용자가 선택한 주소가 도로명 타입일때 참고항목을 조합한다.
                if(data.userSelectedType === 'R'){
                    // 법정동명이 있을 경우 추가한다. (법정리는 제외)
                    // 법정동의 경우 마지막 문자가 "동/로/가"로 끝난다.
                    if(data.bname !== '' && /[동|로|가]$/g.test(data.bname)){
                        extraAddr += data.bname;
                    }
                    // 건물명이 있고, 공동주택일 경우 추가한다.
                    if(data.buildingName !== '' && data.apartment === 'Y'){
                        extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
                    }
                    // 표시할 참고항목이 있을 경우, 괄호까지 추가한 최종 문자열을 만든다.
                    if(extraAddr !== ''){
                        extraAddr = ' (' + extraAddr + ')';
                    }
                    // 조합된 참고항목을 해당 필드에 넣는다.
                    //document.getElementById("user_extraAddress").value = extraAddr;

                } else {
                    //document.getElementById("user_extraAddress").value = '';
                }

                // 우편번호와 주소 정보를 해당 필드에 넣는다.
                document.getElementById('user_postcode').value = data.zonecode;
                document.getElementById("user_address").value = addr;
                // 커서를 상세주소 필드로 이동한다.
                document.getElementById("user_detailAddress").focus();

                // iframe을 넣은 element를 안보이게 한다.
                // (autoClose:false 기능을 이용한다면, 아래 코드를 제거해야 화면에서 사라지지 않는다.)
                element_layer.style.display = 'none';
            },
            width : '100%',
            height : '100%',
            maxSuggestItems : 5
        }).embed(element_layer);

        // iframe을 넣은 element를 보이게 한다.
        element_layer.style.display = 'block';

        // iframe을 넣은 element의 위치를 화면의 가운데로 이동시킨다.
        initLayerPosition();
    }

    // 브라우저의 크기 변경에 따라 레이어를 가운데로 이동시키고자 하실때에는
    // resize이벤트나, orientationchange이벤트를 이용하여 값이 변경될때마다 아래 함수를 실행 시켜 주시거나,
    // 직접 element_layer의 top,left값을 수정해 주시면 됩니다.
    function initLayerPosition(){
        var width = 300; //우편번호서비스가 들어갈 element의 width
        var height = 400; //우편번호서비스가 들어갈 element의 height
        var borderWidth = 5; //샘플에서 사용하는 border의 두께

        // 위에서 선언한 값들을 실제 element에 넣는다.
        element_layer.style.width = width + 'px';
        element_layer.style.height = height + 'px';
        element_layer.style.border = borderWidth + 'px solid';
        // 실행되는 순간의 화면 너비와 높이 값을 가져와서 중앙에 뜰 수 있도록 위치를 계산한다.
        element_layer.style.left = (((window.innerWidth || document.documentElement.clientWidth) - width)/2 - borderWidth) + 'px';
        element_layer.style.top = (((window.innerHeight || document.documentElement.clientHeight) - height)/2 - borderWidth) + 'px';
    }
</script>

<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>
  $(function() {
      $.post("php/view/high_school_list.php",
      {
      },
       function(data,status){
       if(status != "fail"){
         var searchSource = data.split("::::");
         $('#sch_data1').autocomplete({ // autocomplete 구현 시작부
             source : searchSource, //source 는 자동완성의 대상
             select : function(event, ui) { // item 선택 시 이벤트
                 console.log(ui.item);
             },
             focus : function(event, ui) { // 포커스 시 이벤트
                 return false;
             },
             minLength : 1, // 최소 글자 수
             autoFocus : true, // true로 설정 시 메뉴가 표시 될 때, 첫 번째 항목에 자동으로 초점이 맞춰짐
             classes : { // 위젯 요소에 추가 할 클래스를 지정
                 'ui-autocomplete' : 'highlight'
             },
             delay : 500, // 입력창에 글자가 써지고 나서 autocomplete 이벤트 발생될 떄 까지 지연 시간(ms)
             disable : false, // 해당 값 true 시, 자동완성 기능 꺼짐
             position : { my : 'right top', at : 'right bottom'}, // 제안 메뉴의 위치를 식별
             close : function(event) { // 자동완성 창 닫아질 때의 이벤트
                 console.log(event);
             }
         });
       }
       else
       {
        alert("Networks error");
       }
      });
    //var searchSource = ['엽기떡볶이', '신전떡볶이', '걸작떡볶이', '신당동떡볶이']; // 배열 생성


});
</script>
<script>
  $(function() {
      $.post("php/view/college_school_list.php",
      {
      },
       function(data,status){
       if(status != "fail"){
         var searchSource = data.split("::::");
         $('.college_txt2').autocomplete({ // autocomplete 구현 시작부
             source : searchSource, //source 는 자동완성의 대상
             select : function(event, ui) { // item 선택 시 이벤트
                 console.log(ui.item);
             },
             focus : function(event, ui) { // 포커스 시 이벤트
                 return false;
             },
             minLength : 1, // 최소 글자 수
             autoFocus : true, // true로 설정 시 메뉴가 표시 될 때, 첫 번째 항목에 자동으로 초점이 맞춰짐
             classes : { // 위젯 요소에 추가 할 클래스를 지정
                 'ui-autocomplete' : 'highlight'
             },
             delay : 500, // 입력창에 글자가 써지고 나서 autocomplete 이벤트 발생될 떄 까지 지연 시간(ms)
             disable : false, // 해당 값 true 시, 자동완성 기능 꺼짐
             position : { my : 'right top', at : 'right bottom'}, // 제안 메뉴의 위치를 식별
             close : function(event) { // 자동완성 창 닫아질 때의 이벤트
                 console.log(event);
             }
         });
       }
       else
       {
        alert("Networks error");
       }
      });
    //var searchSource = ['엽기떡볶이', '신전떡볶이', '걸작떡볶이', '신당동떡볶이']; // 배열 생성


});
</script>
<script>
  let btnSubmission = $('.btn_submission');
  btnSubmission.click(function(){
    location.href = 'submissioncomplete.html';
  });
</script>
</body>
</html>

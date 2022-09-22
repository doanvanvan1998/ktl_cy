<style>
.schoolbox .flex input { background:transparent;}
</style>
<script>
  function onSchoolPlus(Id,preId)
  {
    // $(".school_info_1_"+preId+"_btn").hide();
    $(".school_info_1_"+Id).show();
  }
  function onSchoolMinus(Id,preId)
  {
    $(".school_info_1_"+preId+"_btn").show();
    $(".school_info_1_"+Id).hide();
  }
  function onMobileSchoolPlus(Id,preId)
  {
    $(".m_school_info_1_"+preId+"_btn").hide();
    $(".school_info_1_"+Id).show();
  }
  function onMobileSchoolMinus(Id,preId)
  {
    $(".m_school_info_1_"+preId+"_btn").show();
    $(".school_info_1_"+Id).hide();
  }
</script>
<div class='school_info_1_1'>
  <div class="flex-direction sub_all_form">
    <div class="flex scformbox">
      <div class="schoolbox">
        <div class="flex">
          <select disabled style='color:#000' id='sch_1_data1'>
            <option value="">학교구분</option>
            <option>대학(2,3년)</option>
            <option>대학교(4년제)</option>
          </select>
          <input type="text" disabled style='color:#000'  id='sch_1_data2' value='<?=$sch_1_data2?>' placeholder="학교명" class='college_txt2' required>
        </div>
      </div>
      <div class="graduate">
        <div class="flex">
          <div class="flex">
            <input type="text" disabled style='color:#000'  id='sch_1_data3' value='<?=$sch_1_data3?>' placeholder="입학년월" required>
            <input type="text" disabled style='color:#000'  id='sch_1_data4' value='<?=$sch_1_data4?>' placeholder="졸업년월" required>
            <select disabled style='color:#000' id='sch_1_data5'>
              <option value="">졸업상태</option>
              <option>졸업</option>
              <option>졸업예정</option>
              <option>재학중</option>
              <option>중퇴</option>
              <option>휴학</option>
            </select>
          </div>
          <div class="btn_minus mobile flex m_school_info_1_1_btn" >
            <img src="images/btns/btn_minus.png" class='school_info_minus_btn_1' style='display:none;margin-right:5px;' alt="내용제외">
            <img src="images/btns/btn_plus.png" class='school_info_plus_btn_1' onclick='onMobileSchoolPlus(2,1)' alt="내용추가">
          </div>
        </div>
      </div>
      <div class="btn_minus flex school_info_1_1_btn">
        <img src="images/btns/btn_minus.png" class='school_info_minus_btn_1' style='display:none;margin-right:5px;' alt="내용제외">
        <img src="images/btns/btn_plus.png" class='school_info_plus_btn_1' onclick='onSchoolPlus(2,1)' alt="내용추가">
      </div>
    </div>
    <div class="flex scformbox subformbox">
      <div class="schoolbox">
        <div class="flex">
          <input type="text" disabled style='color:#000'  id='sch_1_data6' value='<?=$sch_1_data6?>' placeholder="전공명" required>
        </div>
      </div>
      <div class="graduate">
        <div class="flex">
          <input type="text" disabled style='color:#000'  id='sch_1_data7' value='<?=$sch_1_data7?>' placeholder="학점" required>
          <select disabled style='color:#000' id='sch_1_data8'>
            <option value="">총점</option>
            <option>4.5</option>
            <option>4.3</option>
            <option>4.0</option>
            <option>100</option>
          </select>
        </div>
      </div>
      <div class="flex checkboxwrap mobile">
        <div class="checkbox flex">
          <div class="flex">
            <input type="checkbox" id="chk4" class="normal">
            <label for="chk4"></label>
          </div>
          <span>편입</span>
        </div>
      </div>
    </div>
  </div>
</div>


<div class='school_info_1_2' style='display:none;'>
  <div class="flex-direction sub_all_form">
    <div class="flex scformbox">
      <div class="schoolbox">
        <div class="flex">
          <select disabled style='color:#000' id='sch_2_data1'>
            <option value="">학교구분</option>
            <option>대학(2,3년)</option>
            <option>대학교(4년제)</option>
          </select>
          <input type="text" disabled style='color:#000'  id='sch_2_data2' value='<?=$sch_2_data2?>' placeholder="학교명" class='college_txt2' required>
        </div>
      </div>
      <div class="graduate">
        <div class="flex">
          <div class="flex">
            <input type="text" disabled style='color:#000'  id='sch_2_data3' value='<?=$sch_2_data3?>' placeholder="입학년월" required>
            <input type="text" disabled style='color:#000'  id='sch_2_data4' value='<?=$sch_2_data4?>' placeholder="졸업년월" required>
            <select disabled style='color:#000' id='sch_2_data5'>
              <option value="">졸업상태</option>
              <option>졸업</option>
              <option>졸업예정</option>
              <option>재학중</option>
              <option>중퇴</option>
              <option>휴학</option>
            </select>
          </div>
          <div class="btn_minus mobile flex m_school_info_1_2_btn">
            <img src="images/btns/btn_minus.png" class='school_info_minus_btn_2' onclick='onMobileSchoolMinus(2,1)' style='margin-right:5px;' alt="내용제외">
            <img src="images/btns/btn_plus.png" class='school_info_plus_btn_2' onclick='onMobileSchoolPlus(3,2)' alt="내용추가">
          </div>
        </div>
      </div>
      <div class="btn_minus flex school_info_1_2_btn">
        <img src="images/btns/btn_minus.png" class='school_info_minus_btn_2' onclick='onSchoolMinus(2,1)' style='margin-right:5px;' alt="내용제외">
        <img src="images/btns/btn_plus.png" class='school_info_plus_btn_2' onclick='onSchoolPlus(3,2)' alt="내용추가">
      </div>
    </div>
    <div class="flex scformbox subformbox">
      <div class="schoolbox">
        <div class="flex">
          <input type="text" disabled style='color:#000'  id='sch_2_data6' value='<?=$sch_2_data6?>' placeholder="전공명" required>
        </div>
      </div>
      <div class="graduate">
        <div class="flex">
          <input type="text" disabled style='color:#000'  id='sch_2_data7' value='<?=$sch_2_data7?>' placeholder="학점" required>
          <select disabled style='color:#000' id='sch_2_data8'>
            <option value="">총점</option>
            <option>4.5</option>
            <option>4.3</option>
            <option>4.0</option>
            <option>100</option>
          </select>
        </div>
      </div>
      <div class="flex checkboxwrap mobile">
        <div class="checkbox flex">
          <div class="flex">
            <input type="checkbox" id="chk6" class="normal">
            <label for="chk6"></label>
          </div>
          <span>편입</span>
        </div>
      </div>
    </div>
  </div>
</div>



<div class='school_info_1_3' style='display:none;'>
  <div class="flex-direction sub_all_form">
    <div class="flex scformbox">
      <div class="schoolbox">
        <div class="flex">
          <select disabled style='color:#000' id='sch_3_data1'>
            <option value="">학교구분</option>
            <option>대학(2,3년)</option>
            <option>대학교(4년제)</option>
          </select>
          <input type="text" disabled style='color:#000'  id='sch_3_data2' value='<?=$sch_3_data2?>' placeholder="학교명" class='college_txt2' required>
        </div>
      </div>
      <div class="graduate">
        <div class="flex">
          <div class="flex">
            <input type="text" disabled style='color:#000'  id='sch_3_data3' value='<?=$sch_3_data3?>' placeholder="입학년월" required>
            <input type="text" disabled style='color:#000'  id='sch_3_data4' value='<?=$sch_3_data4?>' placeholder="졸업년월" required>
            <select disabled style='color:#000' id='sch_3_data5'>
              <option value="">졸업상태</option>
              <option>졸업</option>
              <option>졸업예정</option>
              <option>재학중</option>
              <option>중퇴</option>
              <option>휴학</option>
            </select>
          </div>
          <div class="btn_minus mobile flex m_school_info_1_3_btn">
            <img src="images/btns/btn_minus.png" class='school_info_minus_btn_3' onclick='onMobileSchoolMinus(3,2)' style='margin-right:5px;' alt="내용제외">
          </div>
        </div>
      </div>
      <div class="btn_minus flex school_info_1_3_btn">
        <img src="images/btns/btn_minus.png" class='school_info_minus_btn_3' onclick='onSchoolMinus(3,2)' style='margin-right:5px;' alt="내용제외">
      </div>
    </div>
    <div class="flex scformbox subformbox">
      <div class="schoolbox">
        <div class="flex">
          <input type="text" disabled style='color:#000'  id='sch_3_data6' value='<?=$sch_3_data6?>'  placeholder="전공명" required>
        </div>
      </div>
      <div class="graduate">
        <div class="flex">
          <input type="text" disabled style='color:#000'  id='sch_3_data7' value='<?=$sch_3_data7?>'  placeholder="학점" required>
          <select disabled style='color:#000' id='sch_3_data8'>
            <option value="">총점</option>
            <option>4.5</option>
            <option>4.3</option>
            <option>4.0</option>
            <option>100</option>
          </select>
        </div>
      </div>
      <div class="flex checkboxwrap mobile">
        <div class="checkbox flex">
          <div class="flex">
            <input type="checkbox" id="chk8" class="normal">
            <label for="chk8"></label>
          </div>
          <span>편입</span>
        </div>
      </div>
    </div>
  </div>
</div>

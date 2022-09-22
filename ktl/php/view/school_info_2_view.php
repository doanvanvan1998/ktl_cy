<script>
  function onSchool2Plus(Id,preId)
  {
    // $(".school_info_2_"+preId+"_btn").hide();
    $(".school_info_2_"+Id).show();
  }
  function onSchool2Minus(Id,preId)
  {
    $(".school_info_2_"+preId+"_btn").show();
    $(".school_info_2_"+Id).hide();
  }
  function onMobileSchool2Plus(Id,preId)
  {
    $(".m_school_info_2_"+preId+"_btn").hide();
    $(".school_info_2_"+Id).show();
  }
  function onMobileSchool2Minus(Id,preId)
  {
    $(".m_school_info_2_"+preId+"_btn").show();
    $(".school_info_2_"+Id).hide();
  }
</script>
<div class='school_info_2_1'>
  <div class="flex-direction sub_all_form">
    <div class="flex scformbox">
      <div class="schoolbox">
        <div class="flex">
          <input type="text" disabled style='color:#000'  id='grad_1_data1' value='<?=$grad_1_data1?>' placeholder="학교명" required>
        </div>
      </div>
      <div class="graduate">
        <div class="flex">
          <div class="flex">
            <input type="text" disabled style='color:#000'  id='grad_1_data2' value='<?=$grad_1_data2?>' placeholder="입학년월" required>
            <input type="text" disabled style='color:#000'  id='grad_1_data3' value='<?=$grad_1_data3?>' placeholder="졸업년월" required>
            <select disabled style='color:#000' id='grad_1_data4'>
              <option value="">졸업상태</option>
              <option>졸업</option>
              <option>졸업예정</option>
              <option>재학중</option>
              <option>중퇴</option>
              <option>휴학</option>
            </select>
          </div>
          <div class="btn_minus mobile flex m_school_info_2_1_btn" >
            <img src="images/btns/btn_minus.png" class='school_info_minus_btn_2_1' style='display:none;margin-right:5px;' alt="내용제외">
            <img src="images/btns/btn_plus.png" class='school_info_plus_btn_2_1' onclick='onMobileSchool2Plus(2,1)' alt="내용추가">
          </div>
        </div>
      </div>
      <div class="btn_minus flex school_info_2_1_btn">
        <img src="images/btns/btn_minus.png" class='school_info_minus_btn_2_1' style='display:none;margin-right:5px;' alt="내용제외">
        <img src="images/btns/btn_plus.png" class='school_info_plus_btn_2_1' onclick='onSchool2Plus(2,1)' alt="내용추가">
      </div>
    </div>
    <div class="flex scformbox subformbox">
      <div class="schoolbox">
        <div class="flex">
          <input type="text" disabled style='color:#000'  id='grad_1_data5' value='<?=$grad_1_data5?>' placeholder="전공명" required>
        </div>
      </div>
      <div class="graduate">
        <div class="flex">
          <input type="text" disabled style='color:#000'  id='grad_1_data6' value='<?=$grad_1_data6?>' placeholder="학점" required>
          <select disabled style='color:#000' id='grad_1_data7'>
            <option value="">총점</option>
            <option>4.5</option>
            <option>4.3</option>
            <option>4.0</option>
            <option>100</option>
          </select>
        </div>
      </div>
      <div class="degree">
        <div class="flex">
          <select id='grad_1_data8' value='<?=$grad_1_data8?>'>
            <option value="">학위</option>
            <option>석사</option>
            <option>박사</option>
            <option>석박사</option>
          </select>
        </div>
      </div>
      <div class="flex checkboxwrap mobile">
        <div class="checkbox flex">
          <div class="flex">
            <input type="checkbox" id="chk10" class="normal">
            <label for="chk10"></label>
          </div>
          <span>편입</span>
        </div>
      </div>
    </div>
  </div>
</div>


<div class='school_info_2_2' style='display:none;'>
  <div class="flex-direction sub_all_form">
    <div class="flex scformbox">
      <div class="schoolbox">
        <div class="flex">
          <input type="text" disabled style='color:#000'  id='grad_2_data1' value='<?=$grad_2_data1?>' placeholder="학교명" required>
        </div>
      </div>
      <div class="graduate">
        <div class="flex">
          <div class="flex">
            <input type="text" disabled style='color:#000'  id='grad_2_data2' value='<?=$grad_2_data2?>' placeholder="입학년월" required>
            <input type="text" disabled style='color:#000'  id='grad_2_data3' value='<?=$grad_2_data3?>' placeholder="졸업년월" required>
            <select disabled style='color:#000' id='grad_2_data4'>
              <option value="">졸업상태</option>
              <option>졸업</option>
              <option>졸업예정</option>
              <option>재학중</option>
              <option>중퇴</option>
              <option>휴학</option>
            </select>
          </div>
          <div class="btn_minus mobile flex m_school_info_2_2_btn">
            <img src="images/btns/btn_minus.png" class='school_info_minus_btn_2' onclick='onMobileSchool2Minus(2,1)' style='margin-right:5px;' alt="내용제외">
            <img src="images/btns/btn_plus.png" class='school_info_plus_btn_2' onclick='onMobileSchool2Plus(3,2)' alt="내용추가">
          </div>
        </div>
      </div>
      <div class="btn_minus flex school_info_2_2_btn">
        <img src="images/btns/btn_minus.png" class='school_info_minus_btn_2' onclick='onSchool2Minus(2,1)' style='margin-right:5px;' alt="내용제외">
        <img src="images/btns/btn_plus.png" class='school_info_plus_btn_2' onclick='onSchool2Plus(3,2)' alt="내용추가">
      </div>
    </div>
    <div class="flex scformbox subformbox">
      <div class="schoolbox">
        <div class="flex">
          <input type="text" disabled style='color:#000'  id='grad_2_data5' value='<?=$grad_2_data5?>' placeholder="전공명" required>
        </div>
      </div>
      <div class="graduate">
        <div class="flex">
          <input type="text" disabled style='color:#000'  id='grad_2_data6' value='<?=$grad_2_data6?>' placeholder="학점" required>
          <select disabled style='color:#000' id='grad_2_data7'>
            <option value="">총점</option>
            <option>4.5</option>
            <option>4.3</option>
            <option>4.0</option>
            <option>100</option>
          </select>
        </div>
      </div>
      <div class="degree">
        <div class="flex">
          <select id='grad_1_data8' value='<?=$grad_2_data8?>'>
            <option value="">학위</option>
            <option>석사</option>
            <option>박사</option>
            <option>석박사</option>
          </select>
        </div>
      </div>
      <div class="flex checkboxwrap mobile">
        <div class="checkbox flex">
          <div class="flex">
            <input type="checkbox" id="chk12" class="normal">
            <label for="chk12"></label>
          </div>
          <span>편입</span>
        </div>
      </div>
    </div>
  </div>
</div>

<div class='school_info_2_3' style='display:none;'>
  <div class="flex-direction sub_all_form">
    <div class="flex scformbox">
      <div class="schoolbox">
        <div class="flex">
          <input type="text" disabled style='color:#000'  id='grad_3_data1' value='<?=$grad_3_data1?>' placeholder="학교명" required>
        </div>
      </div>
      <div class="graduate">
        <div class="flex">
          <div class="flex">
            <input type="text" disabled style='color:#000'  id='grad_3_data2' value='<?=$grad_3_data2?>' placeholder="입학년월" required>
            <input type="text" disabled style='color:#000'  id='grad_3_data3' value='<?=$grad_3_data3?>' placeholder="졸업년월" required>
            <select disabled style='color:#000' id='grad_3_data4'>
              <option value="">졸업상태</option>
              <option>졸업</option>
              <option>졸업예정</option>
              <option>재학중</option>
              <option>중퇴</option>
              <option>휴학</option>
            </select>
          </div>
          <div class="btn_minus mobile flex m_school_info_3_3_btn">
            <img src="images/btns/btn_minus.png" class='school_info_minus_btn_3' onclick='onMobileSchool2Minus(3,2)' style='margin-right:5px;' alt="내용제외">
          </div>
        </div>
      </div>
      <div class="btn_minus flex school_info_3_3_btn">
        <img src="images/btns/btn_minus.png" class='school_info_minus_btn_3' onclick='onSchool2Minus(3,2)' style='margin-right:5px;' alt="내용제외">
      </div>
    </div>
    <div class="flex scformbox subformbox">
      <div class="schoolbox">
        <div class="flex">
          <input type="text" disabled style='color:#000'  id='grad_3_data5' value='<?=$grad_3_data5?>' placeholder="전공명" required>
        </div>
      </div>
      <div class="graduate">
        <div class="flex">
          <input type="text" disabled style='color:#000'  id='grad_3_data6' value='<?=$grad_3_data6?>' placeholder="학점" required>
          <select disabled style='color:#000' id='grad_3_data7'>
            <option value="">총점</option>
            <option>4.5</option>
            <option>4.3</option>
            <option>4.0</option>
            <option>100</option>
          </select>
        </div>
      </div>
      <div class="degree">
        <div class="flex">
          <select id='grad_3_data8' value='<?=$grad_3_data8?>'>
            <option value="">학위</option>
            <option>석사</option>
            <option>박사</option>
            <option>석박사</option>
          </select>
        </div>
      </div>
      <div class="flex checkboxwrap mobile">
        <div class="checkbox flex">
          <div class="flex">
            <input type="checkbox" id="chk14" class="normal">
            <label for="chk14"></label>
          </div>
          <span>편입</span>
        </div>
      </div>
    </div>
  </div>
</div>

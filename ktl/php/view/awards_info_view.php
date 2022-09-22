<script>
  function onAwardsPlus(Id)
  {
    $(".awards_"+Id).show();
  }
  function onAwardsMinus(Id)
  {
    $(".awards_"+Id).hide();
  }
</script>
<div class="flex-direction awards awards_1" style='margin-bottom:10px;'>
  <div class="flex">
    <input type="text" disabled name='awards_txt_1_1' id='awards_txt_1_1' value='<?=$awards_txt_1_1?>' placeholder="대회/수상명" required>
    <input type="text" disabled name='awards_txt_1_2' id='awards_txt_1_2' value='<?=$awards_txt_1_2?>' placeholder="수여기관" required>
    <div class="flex">
      <input type="text" disabled name='awards_txt_1_3' id='awards_txt_1_3' value='<?=$awards_txt_1_3?>' placeholder="수상연도" required>
      <select disabled name='awards_sel_1' id='awards_sel_1'>
        <option value=0 selected>수상구분</option>
        <option>입상</option>
        <option>금메달</option>
        <option>은메달</option>
        <option>동메달</option>
        <option>1위</option>
        <option>2위</option>
        <option>3위</option>
      </select>
    </div>
    <div class="btn_plus flex"><img src="images/btns/btn_plus.png" onclick='onAwardsPlus(2)' alt="수량더하기"></div>
  </div>
  <div class="flex mobile">
    <input type="text" disabled name='awards_txt_1_4' id='awards_txt_1_4' value='<?=$awards_txt_1_4?>' placeholder="수여내용을 입력해주세요. (30자이내)" maxlength="30" required>
    <div class="btn_plus mobile flex"><img src="images/btns/btn_plus.png" onclick='onAwardsPlus(2)' alt="수량더하기"></div>
  </div>
</div>

<div class="flex-direction awards awards_2" style='margin-bottom:10px;display:none;'>
  <div class="flex">
    <input type="text" disabled name='awards_txt_2_1' id='awards_txt_2_1' value='<?=$awards_txt_2_1?>' placeholder="대회/수상명" required>
    <input type="text" disabled name='awards_txt_2_2' id='awards_txt_2_2' value='<?=$awards_txt_2_2?>' placeholder="수여기관" required>
    <div class="flex">
      <input type="text" disabled name='awards_txt_2_3' id='awards_txt_2_3' value='<?=$awards_txt_2_3?>' placeholder="수상연도" required>
      <select disabled name='awards_sel_2' id='awards_sel_2'>
        <option value="">수상구분</option>
        <option>입상</option>
        <option>금메달</option>
        <option>은메달</option>
        <option>동메달</option>
        <option>1위</option>
        <option>2위</option>
        <option>3위</option>
      </select>
    </div>
    <div class="btn_plus flex">
      <img src="images/btns/btn_minus.png" onclick='onAwardsMinus(2)' style='margin-right:5px;' alt="내용 더하기">
      <img src="images/btns/btn_plus.png" onclick='onAwardsPlus(3)' alt="내용 더하기">
    </div>
  </div>
  <div class="flex mobile">
    <input type="text" disabled name='awards_txt_2_4' id='awards_txt_2_4' value='<?=$awards_txt_2_4?>' placeholder="수여내용을 입력해주세요. (30자이내)" maxlength="30" required>
    <div class="btn_plus mobile flex">
      <img src="images/btns/btn_minus.png" onclick='onAwardsMinus(2)' style='margin-right:5px;' alt="내용 더하기">
      <img src="images/btns/btn_plus.png" onclick='onAwardsPlus(3)' alt="내용 더하기">
    </div>
  </div>
</div>

<div class="flex-direction awards awards_3" style='margin-bottom:10px;display:none;'>
  <div class="flex">
    <input type="text" disabled name='awards_txt_3_1' id='awards_txt_3_1' value='<?=$awards_txt_3_1?>' placeholder="대회/수상명" required>
    <input type="text" disabled name='awards_txt_3_2' id='awards_txt_3_2' value='<?=$awards_txt_3_2?>' placeholder="수여기관" required>
    <div class="flex">
      <input type="text" disabled name='awards_txt_3_3' id='awards_txt_3_3' value='<?=$awards_txt_3_3?>' placeholder="수상연도" required>
      <select disabled name='awards_sel_3' id='awards_sel_3'>
        <option value="">수상구분</option>
        <option>입상</option>
        <option>금메달</option>
        <option>은메달</option>
        <option>동메달</option>
        <option>1위</option>
        <option>2위</option>
        <option>3위</option>
      </select>
    </div>
    <div class="btn_plus flex">
      <img src="images/btns/btn_minus.png" onclick='onAwardsMinus(3)' style='margin-right:5px;' alt="내용 더하기">
      <img src="images/btns/btn_plus.png" onclick='onAwardsPlus(4)' alt="내용 더하기">
    </div>
  </div>
  <div class="flex mobile">
    <input type="text" disabled name='awards_txt_3_4' id='awards_txt_3_4' value='<?=$awards_txt_3_4?>' placeholder="수여내용을 입력해주세요. (30자이내)" maxlength="30" required>
    <div class="btn_plus mobile flex">
      <img src="images/btns/btn_minus.png" onclick='onAwardsMinus(3)' style='margin-right:5px;' alt="내용 더하기">
      <img src="images/btns/btn_plus.png" onclick='onAwardsPlus(4)' alt="내용 더하기">
    </div>
  </div>
</div>

<div class="flex-direction awards awards_4" style='margin-bottom:10px;display:none;'>
  <div class="flex">
    <input type="text" disabled name='awards_txt_4_1' id='awards_txt_4_1' value='<?=$awards_txt_4_1?>' placeholder="대회/수상명" required>
    <input type="text" disabled name='awards_txt_4_2' id='awards_txt_4_2' value='<?=$awards_txt_4_2?>' placeholder="수여기관" required>
    <div class="flex">
      <input type="text" disabled name='awards_txt_4_3' id='awards_txt_4_3' value='<?=$awards_txt_4_3?>' placeholder="수상연도" required>
      <select disabled name='awards_sel_4' id='awards_sel_4'>
        <option value="">수상구분</option>
        <option>입상</option>
        <option>금메달</option>
        <option>은메달</option>
        <option>동메달</option>
        <option>1위</option>
        <option>2위</option>
        <option>3위</option>
      </select>
    </div>
    <div class="btn_plus flex">
      <img src="images/btns/btn_minus.png" onclick='onAwardsMinus(4)' style='margin-right:5px;' alt="내용 더하기">
      <img src="images/btns/btn_plus.png" onclick='onAwardsPlus(5)' alt="내용 더하기">
    </div>
  </div>
  <div class="flex mobile">
    <input type="text" disabled name='awards_txt_4_4' id='awards_txt_4_4' value='<?=$awards_txt_4_4?>' placeholder="수여내용을 입력해주세요. (30자이내)" maxlength="30" required>
    <div class="btn_plus mobile flex">
      <img src="images/btns/btn_minus.png" onclick='onAwardsMinus(4)' style='margin-right:5px;' alt="내용 더하기">
      <img src="images/btns/btn_plus.png" onclick='onAwardsPlus(5)' alt="내용 더하기">
    </div>
  </div>
</div>

<div class="flex-direction awards awards_5" style='margin-bottom:10px;display:none;'>
  <div class="flex">
    <input type="text" disabled name='awards_txt_5_1' id='awards_txt_5_1' value='<?=$awards_txt_5_1?>' placeholder="대회/수상명" required>
    <input type="text" disabled name='awards_txt_5_2' id='awards_txt_5_2' value='<?=$awards_txt_5_2?>' placeholder="수여기관" required>
    <div class="flex">
      <input type="text" disabled name='awards_txt_5_3' id='awards_txt_5_3' value='<?=$awards_txt_5_3?>' placeholder="수상연도" required>
      <select disabled name='awards_sel_5' id='awards_sel_5'>
        <option value="">수상구분</option>
        <option>입상</option>
        <option>금메달</option>
        <option>은메달</option>
        <option>동메달</option>
        <option>1위</option>
        <option>2위</option>
        <option>3위</option>
      </select>
    </div>
    <div class="btn_plus flex">
      <img src="images/btns/btn_minus.png" onclick='onAwardsMinus(5)' style='margin-right:5px;' alt="내용 더하기">
    </div>
  </div>
  <div class="flex mobile">
    <input type="text" disabled name='awards_txt_5_4' id='awards_txt_5_4' value='<?=$awards_txt_5_4?>' placeholder="수여내용을 입력해주세요. (30자이내)" maxlength="30" required>
    <div class="btn_plus mobile flex">
      <img src="images/btns/btn_minus.png" onclick='onAwardsMinus(5)' style='margin-right:5px;' alt="내용 더하기">
    </div>
  </div>
</div>

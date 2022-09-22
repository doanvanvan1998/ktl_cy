<script>
  function onLicensePlus(Id)
  {
    $(".licenses_"+Id).show();
  }
  function onLicenseMinus(Id)
  {
    $(".licenses_"+Id).hide();
  }
</script>
<div class="flex certificate licenses_1" style='margin-bottom:10px;'>
  <input type="text" name='licenses_txt_1' id='licenses_txt_1' value='<?=$licenses_txt_1?>' placeholder="자격증 명" class="search" required>
  <input type="text" name='licenses_txt_2' id='licenses_txt_2' value='<?=$licenses_txt_2?>' placeholder="발행처" required>
  <div class="flex">
    <input type="date" name='licenses_txt_3' id='licenses_txt_3' value='<?=$licenses_txt_3?>' required>
    <div class="btn_plus mobile flex">
      <img src="images/btns/btn_plus.png" onclick='onLicensePlus(2)' alt="내용 더하기">
    </div>
  </div>

  <div class="btn_plus flex">
    <img src="images/btns/btn_plus.png" onclick='onLicensePlus(2)' alt="내용 더하기"></div>
</div>
<div class="flex certificate licenses_2" style='margin-bottom:10px;display:none;'>
  <input type="text" name='licenses_txt_4' id='licenses_txt_4' value='<?=$licenses_txt_4?>' placeholder="자격증 명" class="search" required>
  <input type="text" name='licenses_txt_5' id='licenses_txt_5' value='<?=$licenses_txt_5?>' placeholder="발행처" required>
  <div class="flex">
    <input type="date" name='licenses_txt_6' id='licenses_txt_6' value='<?=$licenses_txt_6?>' required>
    <div class="btn_plus mobile flex">
      <img src="images/btns/btn_minus.png" onclick='onLicenseMinus(2)' style='margin-right:5px;' alt="내용 더하기">
      <img src="images/btns/btn_plus.png" onclick='onLicensePlus(3)' alt="내용 더하기">
    </div>
  </div>

  <div class="btn_plus flex">
    <img src="images/btns/btn_minus.png" onclick='onLicenseMinus(2)' style='margin-right:5px;' alt="내용 더하기">
    <img src="images/btns/btn_plus.png" onclick='onLicensePlus(3)' alt="내용 더하기">
  </div>
</div>
<div class="flex certificate licenses_3" style='margin-bottom:10px;display:none;'>
  <input type="text" name='licenses_txt_7'id='licenses_txt_7' value='<?=$licenses_txt_7?>' placeholder="자격증 명" class="search" required>
  <input type="text" name='licenses_txt_8' id='licenses_txt_8' value='<?=$licenses_txt_8?>' placeholder="발행처" required>
  <div class="flex">
    <input type="date" name='licenses_txt_9' id='licenses_txt_9' value='<?=$licenses_txt_9?>' required>
    <div class="btn_plus mobile flex">
      <img src="images/btns/btn_minus.png" onclick='onLicenseMinus(3)' style='margin-right:5px;' alt="내용 더하기">
      <img src="images/btns/btn_plus.png" onclick='onLicensePlus(4)' alt="내용 더하기">
    </div>
  </div>

  <div class="btn_plus flex">
    <img src="images/btns/btn_minus.png" onclick='onLicenseMinus(3)' style='margin-right:5px;' alt="내용 더하기">
    <img src="images/btns/btn_plus.png" onclick='onLicensePlus(4)' alt="내용 더하기">
  </div>
</div>
<div class="flex certificate licenses_4" style='margin-bottom:10px;display:none;'>
  <input type="text" name='licenses_txt_10' id='licenses_txt_10' value='<?=$licenses_txt_10?>' placeholder="자격증 명" class="search" required>
  <input type="text" name='licenses_txt_11' id='licenses_txt_11' value='<?=$licenses_txt_11?>' placeholder="발행처" required>
  <div class="flex">
    <input type="date" name='licenses_txt_12' id='licenses_txt_12' value='<?=$licenses_txt_12?>' required>
    <div class="btn_plus mobile flex">
      <img src="images/btns/btn_minus.png" onclick='onLicenseMinus(4)' style='margin-right:5px;' alt="내용 더하기">
      <img src="images/btns/btn_plus.png" onclick='onLicensePlus(5)' alt="내용 더하기">
    </div>
  </div>

  <div class="btn_plus flex">
    <img src="images/btns/btn_minus.png" onclick='onLicenseMinus(4)' style='margin-right:5px;' alt="내용 더하기">
    <img src="images/btns/btn_plus.png" onclick='onLicensePlus(5)' alt="내용 더하기">
  </div>
</div>
<div class="flex certificate licenses_5" style='margin-bottom:10px;display:none;'>
  <input type="text" name='licenses_txt_13' id='licenses_txt_13' value='<?=$licenses_txt_13?>' placeholder="자격증 명" class="search" required>
  <input type="text" name='licenses_txt_14' id='licenses_txt_14' value='<?=$licenses_txt_14?>' placeholder="발행처" required>
  <div class="flex">
    <input type="date" name='licenses_txt_15' id='licenses_txt_15' value='<?=$licenses_txt_15?>' required>
    <div class="btn_plus mobile flex">
      <img src="images/btns/btn_minus.png" onclick='onLicenseMinus(5)' style='margin-right:5px;' alt="내용 더하기">
      <img src="images/btns/btn_plus.png" onclick='onLicensePlus(6)' alt="내용 더하기">
    </div>
  </div>

  <div class="btn_plus flex">
    <img src="images/btns/btn_minus.png" onclick='onLicenseMinus(5)' style='margin-right:5px;' alt="내용 더하기">
    <img src="images/btns/btn_plus.png" onclick='onLicensePlus(6)' alt="내용 더하기">
  </div>
</div>
<div class="flex certificate licenses_6" style='margin-bottom:10px;display:none;'>
  <input type="text" name='licenses_txt_16' id='licenses_txt_16' value='<?=$licenses_txt_16?>' placeholder="자격증 명" class="search" required>
  <input type="text" name='licenses_txt_17' id='licenses_txt_17' value='<?=$licenses_txt_17?>' placeholder="발행처" required>
  <div class="flex">
    <input type="date" name='licenses_txt_18' id='licenses_txt_18' value='<?=$licenses_txt_18?>' required>
    <div class="btn_plus mobile flex">
      <img src="images/btns/btn_minus.png" onclick='onLicenseMinus(6)' style='margin-right:5px;' alt="내용 더하기">
      <img src="images/btns/btn_plus.png" onclick='onLicensePlus(7)' alt="내용 더하기">
    </div>
  </div>

  <div class="btn_plus flex">
    <img src="images/btns/btn_minus.png" onclick='onLicenseMinus(6)' style='margin-right:5px;' alt="내용 더하기">
  </div>
</div>

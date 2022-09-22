<script>
  function onIntroPlus(Id)
  {
    $(".intro_"+Id).show();
  }
  function onIntroMinus(Id)
  {
    $(".intro_"+Id).hide();
  }
</script>

<div class="flex-direction statement intro_1" style='margin-bottom:10px'>
  <div class="flex">
    <select id='intro_sel_1' onchange='onIntroSel(1)'>
      <option>성장과정</option>
      <option>지원동기</option>
      <option>성격의 장단점</option>
      <option>입사 후 포부</option>
      <option>자신이 타인에 비해 차별화 된 점과 이를 갖추기 위해 어떤 노력을 했는지 기술</option>
      <option>어려운 일을 끝까지 수행해내어 성공하였거나, 노력 했지만 실패한 경험들 중 한 가지 사례를 선택하여 서술</option>
      <option>직접입력</option>
    </select>
    <div class="btn_plus flex">
      <img src="images/btns/btn_plus.png" onclick='onIntroPlus(2)' alt="내용 추가">
    </div>
    <div class="btn_plus mobile flex">
      <img src="images/btns/btn_plus.png" onclick='onIntroPlus(2)' alt="내용 추가">
    </div>
  </div>

  <div class="statement_info flex-direction" style='margin-top:10px;width:100%;'>
    <input type="text" id='intro_txt_1_1' value='<?=$intro_txt_1_1?>' placeholder="항목구분을 입력하시기 바랍니다." style='display:none;' required />
  </div>
  <div class="flex-direction">
    <textarea class="textcounbox" id='intro_txt_1_2' placeholder="내용 작성 (최소 50자 이상, 최대 300자 이내)"><?=$intro_txt_1_2?></textarea>
  </div>
</div>

<div class="flex-direction statement intro_2" style='margin-bottom:10px;display:none;'>
  <div class="flex">
    <select id='intro_sel_2' onchange='onIntroSel(2)'>
      <option>성장과정</option>
      <option>지원동기</option>
      <option>성격의 장단점</option>
      <option>입사 후 포부</option>
      <option>자신이 타인에 비해 차별화 된 점과 이를 갖추기 위해 어떤 노력을 했는지 기술</option>
      <option>어려운 일을 끝까지 수행해내어 성공하였거나, 노력 했지만 실패한 경험들 중 한 가지 사례를 선택하여 서술</option>
      <option>직접입력</option>
    </select>
    <div class="btn_plus flex">
      <img src="images/btns/btn_minus.png" onclick='onIntroMinus(2)' alt="내용 더하기">
      <img src="images/btns/btn_plus.png" onclick='onIntroPlus(3)' alt="내용 더하기">
    </div>
    <div class="btn_plus mobile flex">
      <img src="images/btns/btn_minus.png" onclick='onIntroMinus(2)' alt="내용 더하기">
      <img src="images/btns/btn_plus.png" onclick='onIntroPlus(3)' alt="내용 더하기">
    </div>
  </div>

  <div class="statement_info flex-direction" style='margin-top:10px;width:100%;display:none;'>
    <input type="text" id='intro_txt_2_1' value='<?=$intro_txt_2_1?>' placeholder="항목구분을 입력하시기 바랍니다." style='display:none;' required />
  </div>
  <div class="flex-direction">
    <textarea class="textcounbox" id='intro_txt_2_2' placeholder="내용 작성 (최소 50자 이상, 최대 300자 이내)"><?=$intro_txt_2_2?></textarea>
  </div>
</div>
<div class="flex-direction statement intro_3" style='margin-bottom:10px;display:none;'>
  <div class="flex">
    <select id='intro_sel_3' onchange='onIntroSel(3)'>
      <option>성장과정</option>
      <option>지원동기</option>
      <option>성격의 장단점</option>
      <option>입사 후 포부</option>
      <option>자신이 타인에 비해 차별화 된 점과 이를 갖추기 위해 어떤 노력을 했는지 기술</option>
      <option>어려운 일을 끝까지 수행해내어 성공하였거나, 노력 했지만 실패한 경험들 중 한 가지 사례를 선택하여 서술</option>
      <option>직접입력</option>
    </select>
    <div class="btn_plus flex">
      <img src="images/btns/btn_minus.png" onclick='onIntroMinus(3)' alt="내용 더하기">
    </div>
    <div class="btn_plus mobile flex">
      <img src="images/btns/btn_minus.png" onclick='onIntroMinus(3)' alt="내용 더하기">
    </div>
  </div>

  <div class="statement_info flex-direction" style='margin-top:10px;width:100%;'>
    <input type="text" id='intro_txt_3_1' value='<?=$intro_txt_3_1?>' placeholder="항목구분을 입력하시기 바랍니다." style='display:none;' required />
  </div>
  <div class="flex-direction">
    <textarea class="textcounbox" id='intro_txt_3_2' placeholder="내용 작성 (최소 50자 이상, 최대 300자 이내)"><?=$intro_txt_3_2?></textarea>
  </div>
</div>

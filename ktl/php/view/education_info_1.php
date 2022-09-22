<script>
  function onEduPlus(Id)
  {
    $(".education_"+Id).show();
  }
  function onEduMinus(Id)
  {
    $(".education_"+Id).hide();
  }
</script>
<div class="flex-direction education education_1" style='margin-bottom:10px;'>
  <div class="flex">
    <input type="text" id='edu_data1' placeholder="교육명" required>
    <input type="text"  id='edu_data2'placeholder="교육기관" class="search" required>
    <div class="flex">
      <input type="date" id='edu_data3' placeholder="시작년월" style="padding:0 0.1rem;"required>
      <input type="date" id='edu_data4' placeholder="종료년월" style="padding:0 0.1rem;"required>
    </div>
    <div class="btn_plus flex"><img src="images/btns/btn_plus.png" onclick='onEduPlus(2)' alt="내용 더하기"></div>
  </div>
  <textarea id='edu_data5' placeholder="직무와 관련한 교육의 내용을 요약하여 작성해주세요. (50자이내)"maxlength="50"></textarea>
  <div class="btn_plus mobile flex"><img src="images/btns/btn_plus.png" onclick='onEduPlus(2)' alt="내용 더하기"></div>
</div>


<div class="flex-direction education education_2" style='display:none;margin-bottom:10px;'>
  <div class="flex">
    <input type="text" id='edu_data6' placeholder="교육명" required>
    <input type="text" id='edu_data7' placeholder="교육기관" class="search" required>
    <div class="flex">
      <input type="date" id='edu_data8' placeholder="시작년월" style="padding:0 0.1rem;"required>
      <input type="date" id='edu_data9' placeholder="종료년월" style="padding:0 0.1rem;"required>
    </div>
    <div class="btn_plus flex">
      <img src="images/btns/btn_minus.png" onclick='onEduMinus(2)' style='margin-right:5px;' alt="내용 더하기">
      <img src="images/btns/btn_plus.png" onclick='onEduPlus(3)' alt="내용 더하기">
    </div>
  </div>
  <textarea id='edu_data10' placeholder="직무와 관련한 교육의 내용을 요약하여 작성해주세요. (50자이내)"maxlength="50"></textarea>
  <div class="btn_plus mobile flex">
    <img src="images/btns/btn_minus.png" onclick='onEduMinus(2)' style='margin-right:5px;' alt="내용 더하기">
    <img src="images/btns/btn_plus.png" onclick='onEduPlus(3)' alt="내용 더하기">
  </div>
</div>

<div class="flex-direction education education_3" style='display:none;margin-bottom:10px;'>
  <div class="flex">
    <input type="text" id='edu_data11' placeholder="교육명" required>
    <input type="text" id='edu_data12' placeholder="교육기관" class="search" required>
    <div class="flex">
      <input type="date" id='edu_data13' placeholder="시작년월" style="padding:0 0.1rem;"required>
      <input type="date" id='edu_data14' placeholder="종료년월" style="padding:0 0.1rem;"required>
    </div>
    <div class="btn_plus flex">
      <img src="images/btns/btn_minus.png" onclick='onEduMinus(3)' style='margin-right:5px;' alt="내용 더하기">
      <!-- <img src="images/btns/btn_plus.png" onclick='onEduPlus(4)' alt="내용 더하기"> -->
    </div>
  </div>
  <textarea id='edu_data15' placeholder="직무와 관련한 교육의 내용을 요약하여 작성해주세요. (50자이내)"maxlength="50"></textarea>
  <div class="btn_plus mobile flex">
    <img src="images/btns/btn_minus.png" onclick='onEduMinus(3)' style='margin-right:5px;' alt="내용 더하기">
    <!-- <img src="images/btns/btn_plus.png" onclick='onEduPlus(4)' alt="내용 더하기"> -->
  </div>
</div>

<!-- <div class="flex-direction education education_4" style='display:none;margin-bottom:10px;'>
  <div class="flex">
    <input type="text" id='edu_data16' placeholder="교육명" required>
    <input type="text" id='edu_data17' placeholder="교육기관" class="search" required>
    <div class="flex">
      <input type="date" id='edu_data18' placeholder="시작년월" style="padding:0 0.1rem;"required>
      <input type="date" id='edu_data19' placeholder="종료년월" style="padding:0 0.1rem;"required>
    </div>
    <div class="btn_plus flex">
      <img src="images/btns/btn_minus.png" onclick='onEduMinus(4)' style='margin-right:5px;' alt="내용 더하기">
      <img src="images/btns/btn_plus.png" onclick='onEduPlus(5)' alt="내용 더하기">
    </div>
  </div>
  <textarea id='edu_data20' placeholder="직무와 관련한 교육의 내용을 요약하여 작성해주세요. (50자이내)"maxlength="50"></textarea>
  <div class="btn_plus mobile flex">
    <img src="images/btns/btn_minus.png" onclick='onEduMinus(4)' style='margin-right:5px;' alt="내용 더하기">
    <img src="images/btns/btn_plus.png" onclick='onEduPlus(5)' alt="내용 더하기">
  </div>
</div>


<div class="flex-direction education education_5" style='display:none;margin-bottom:10px;'>
  <div class="flex">
    <input type="text" id='edu_data21' placeholder="교육명" required>
    <input type="text" id='edu_data22' placeholder="교육기관" class="search" required>
    <div class="flex">
      <input type="date" id='edu_data23' placeholder="시작년월" style="padding:0 0.1rem;"required>
      <input type="date" id='edu_data24' placeholder="종료년월" style="padding:0 0.1rem;"required>
    </div>
    <div class="btn_plus flex">
      <img src="images/btns/btn_minus.png" onclick='onEduMinus(5)' style='margin-right:5px;' alt="내용 더하기">
      <img src="images/btns/btn_plus.png" onclick='onEduPlus(6)' alt="내용 더하기">
    </div>
  </div>
  <textarea id='edu_data25' placeholder="직무와 관련한 교육의 내용을 요약하여 작성해주세요. (50자이내)"maxlength="50"></textarea>
  <div class="btn_plus mobile flex">
    <img src="images/btns/btn_minus.png" onclick='onEduMinus(5)' style='margin-right:5px;' alt="내용 더하기">
    <img src="images/btns/btn_plus.png" onclick='onEduPlus(6)' alt="내용 더하기">
  </div>
</div>

<div class="flex-direction education education_6" style='display:none;margin-bottom:10px;'>
  <div class="flex">
    <input type="text" id='edu_data26' placeholder="교육명" required>
    <input type="text" id='edu_data27' placeholder="교육기관" class="search" required>
    <div class="flex">
      <input type="date" id='edu_data28' placeholder="시작년월" style="padding:0 0.1rem;"required>
      <input type="date" id='edu_data29' placeholder="종료년월" style="padding:0 0.1rem;"required>
    </div>
    <div class="btn_plus flex">
      <img src="images/btns/btn_minus.png" onclick='onEduMinus(6)' style='margin-right:5px;' alt="내용 더하기">
      <img src="images/btns/btn_plus.png" onclick='onEduPlus(7)' alt="내용 더하기">
    </div>
  </div>
  <textarea id='edu_data30' placeholder="직무와 관련한 교육의 내용을 요약하여 작성해주세요. (50자이내)"maxlength="50"></textarea>
  <div class="btn_plus mobile flex">
    <img src="images/btns/btn_minus.png" onclick='onEduMinus(6)' style='margin-right:5px;' alt="내용 더하기">
    <img src="images/btns/btn_plus.png" onclick='onEduPlus(7)' alt="내용 더하기">
  </div>
</div>

<div class="flex-direction education education_7" style='display:none;margin-bottom:10px;'>
  <div class="flex">
    <input type="text" id='edu_data31' placeholder="교육명" required>
    <input type="text" id='edu_data32' placeholder="교육기관" class="search" required>
    <div class="flex">
      <input type="date" id='edu_data33' placeholder="시작년월" style="padding:0 0.1rem;"required>
      <input type="date" id='edu_data34' placeholder="종료년월" style="padding:0 0.1rem;"required>
    </div>
    <div class="btn_plus flex">
      <img src="images/btns/btn_minus.png" onclick='onEduMinus(7)' style='margin-right:5px;' alt="내용 더하기">
      <img src="images/btns/btn_plus.png" onclick='onEduPlus(8)' alt="내용 더하기">
    </div>
  </div>
  <textarea id='edu_data35' placeholder="직무와 관련한 교육의 내용을 요약하여 작성해주세요. (50자이내)"maxlength="50"></textarea>
  <div class="btn_plus mobile flex">
    <img src="images/btns/btn_minus.png" onclick='onEduMinus(7)' style='margin-right:5px;' alt="내용 더하기">
    <img src="images/btns/btn_plus.png" onclick='onEduPlus(8)' alt="내용 더하기">
  </div>
</div>


<div class="flex-direction education education_8" style='display:none;margin-bottom:10px;'>
  <div class="flex">
    <input type="text" id='edu_data36' placeholder="교육명" required>
    <input type="text" id='edu_data37' placeholder="교육기관" class="search" required>
    <div class="flex">
      <input type="date" id='edu_data38' placeholder="시작년월" style="padding:0 0.1rem;"required>
      <input type="date" id='edu_data39' placeholder="종료년월" style="padding:0 0.1rem;"required>
    </div>
    <div class="btn_plus flex">
      <img src="images/btns/btn_minus.png" onclick='onEduMinus(8)' style='margin-right:5px;' alt="내용 더하기">
    </div>
  </div>
  <textarea id='edu_data40' placeholder="직무와 관련한 교육의 내용을 요약하여 작성해주세요. (50자이내)" maxlength="50"></textarea>
  <div class="btn_plus mobile flex">
    <img src="images/btns/btn_minus.png" onclick='onEduMinus(8)' style='margin-right:5px;' alt="내용 더하기">
  </div>
</div> -->

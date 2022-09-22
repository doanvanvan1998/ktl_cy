<script>
  function onActivePlus(Id)
  {
    $(".activity_"+Id).show();
  }
  function onActiveMinus(Id)
  {
    $(".activity_"+Id).hide();
  }
</script>
<div class="flex-direction activity_1">
  <div class="flex">
    <div class="flex">
      <input type="date" id='active_data1' required>
      <input type="date" id='active_data1_1' required>
    </div>
    <input type="text" id='active_data2' placeholder="소속/기관/단체명 또는 대회/연주회명을 입력해주세요." required>
    <div class="btn_plus flex">
      <img src="images/btns/btn_plus.png" onclick='onActivePlus(2)' alt="내용추가">
    </div>
  </div>
  <div class="flex mobile">
    <input type="text" id='active_data3' placeholder="활동내용을 입력해주세요. (30자이내)" maxlength="30" required>
    <div class="btn_plus mobile flex">
      <img src="images/btns/btn_plus.png" onclick='onActivePlus(2)' alt="내용 추가">
    </div>
  </div>
</div>
<div class="flex-direction activity_2" style='display:none;'>
  <div class="flex">
    <div class="flex">
      <input type="date" id='active_data4' required>
      <input type="date"  id='active_data4_1'required>
    </div>
    <input type="text" id='active_data5' placeholder="소속/기관/단체명 또는 대회/연주회명을 입력해주세요." required>
    <div class="btn_plus flex">
      <img src="images/btns/btn_minus.png" onclick='onActiveMinus(2)' alt="내용 추가">
      <img src="images/btns/btn_plus.png" onclick='onActivePlus(3)' alt="내용추가">
    </div>
  </div>
  <div class="flex mobile">
    <input type="text" id='active_data6' placeholder="활동내용을 입력해주세요. (30자이내)" maxlength="30" required>
    <div class="btn_plus mobile flex">
      <img src="images/btns/btn_minus.png" onclick='onActiveMinus(2)' alt="내용 추가">
      <img src="images/btns/btn_plus.png" onclick='onActivePlus(3)' alt="내용 추가">
    </div>
  </div>
</div>
<div class="flex-direction activity_3" style='display:none;'>
  <div class="flex">
    <div class="flex">
      <input type="date" id='active_data7' required>
      <input type="date" id='active_data7_1'required>
    </div>
    <input type="text" id='active_data8' placeholder="소속/기관/단체명 또는 대회/연주회명을 입력해주세요." required>
    <div class="btn_plus flex">
      <img src="images/btns/btn_minus.png" onclick='onActiveMinus(3)' alt="내용 추가">
      <img src="images/btns/btn_plus.png" onclick='onActivePlus(4)' alt="내용추가">
    </div>
  </div>
  <div class="flex mobile">
    <input type="text" id='active_data9' placeholder="활동내용을 입력해주세요. (30자이내)" maxlength="30" required>
    <div class="btn_plus mobile flex">
      <img src="images/btns/btn_minus.png" onclick='onActiveMinus(3)' alt="내용 추가">
      <img src="images/btns/btn_plus.png" onclick='onActivePlus(4)' alt="내용추가">
    </div>
  </div>
</div>
<div class="flex-direction activity_4" style='display:none;'>
  <div class="flex">
    <div class="flex">
      <input type="date" id='active_data10' required>
      <input type="date"  id='active_data10_1'required>
    </div>
    <input type="text" id='active_data11' placeholder="소속/기관/단체명 또는 대회/연주회명을 입력해주세요." required>
    <div class="btn_plus flex">
      <img src="images/btns/btn_minus.png" onclick='onActiveMinus(4)' alt="내용 추가">
      <img src="images/btns/btn_plus.png" onclick='onActivePlus(5)' alt="내용추가">
    </div>
  </div>
  <div class="flex mobile">
    <input type="text" id='active_data12' placeholder="활동내용을 입력해주세요. (30자이내)" maxlength="30" required>
    <div class="btn_plus mobile flex">
      <img src="images/btns/btn_minus.png" onclick='onActiveMinus(4)' alt="내용 추가">
      <img src="images/btns/btn_plus.png" onclick='onActivePlus(5)' alt="내용추가">
    </div>
  </div>
</div>
<div class="flex-direction activity_5" style='display:none;'>
  <div class="flex">
    <div class="flex">
      <input type="date" id='active_data13' required>
      <input type="date" id='active_data13_1'required>
    </div>
    <input type="text" id='active_data14' placeholder="소속/기관/단체명 또는 대회/연주회명을 입력해주세요." required>
    <div class="btn_plus flex">
      <img src="images/btns/btn_minus.png" onclick='onActiveMinus(5)' alt="내용 추가">
      <!-- <img src="images/btns/btn_plus.png" onclick='onActivePlus(6)' alt="내용추가"> -->
    </div>
  </div>
  <div class="flex mobile">
    <input type="text" id='active_data15' placeholder="활동내용을 입력해주세요. (30자이내)" maxlength="30" required>
    <div class="btn_plus mobile flex">
      <img src="images/btns/btn_minus.png" onclick='onActiveMinus(5)' alt="내용 추가">
      <!-- <img src="images/btns/btn_plus.png" onclick='onActivePlus(6)' alt="내용추가"> -->
    </div>
  </div>
</div>
<!-- <div class="flex-direction activity_6" style='display:none;'>
  <div class="flex">
    <div class="flex">
      <input type="date" id='active_data16' required>
      <input type="date" required>
    </div>
    <input type="text" id='active_data17' placeholder="소속/기관/단체명 또는 대회/연주회명을 입력해주세요." required>
    <div class="btn_plus flex">
      <img src="images/btns/btn_minus.png" onclick='onActiveMinus(6)' alt="내용 추가">
      <img src="images/btns/btn_plus.png" onclick='onActivePlus(7)' alt="내용추가">
    </div>
  </div>
  <div class="flex mobile">
    <input type="text" id='active_data18' placeholder="활동내용을 입력해주세요. (30자이내)" maxlength="30" required>
    <div class="btn_plus mobile flex">
      <img src="images/btns/btn_minus.png" onclick='onActiveMinus(6)' alt="내용 추가">
      <img src="images/btns/btn_plus.png" onclick='onActivePlus(7)' alt="내용추가">
    </div>
  </div>
</div>
<div class="flex-direction activity_7" style='display:none;'>
  <div class="flex">
    <div class="flex">
      <input type="date" id='active_data19' required>
      <input type="date" required>
    </div>
    <input type="text" id='active_data20' placeholder="소속/기관/단체명 또는 대회/연주회명을 입력해주세요." required>
    <div class="btn_plus flex">
      <img src="images/btns/btn_minus.png" onclick='onActiveMinus(7)' alt="내용 추가">
      <img src="images/btns/btn_plus.png" onclick='onActivePlus(8)' alt="내용추가">
    </div>
  </div>
  <div class="flex mobile">
    <input type="text" id='active_data21' placeholder="활동내용을 입력해주세요. (30자이내)" maxlength="30" required>
    <div class="btn_plus mobile flex">
      <img src="images/btns/btn_minus.png" onclick='onActiveMinus(7)' alt="내용 추가">
      <img src="images/btns/btn_plus.png" onclick='onActivePlus(8)' alt="내용추가">
    </div>
  </div>
</div>
<div class="flex-direction activity_8" style='display:none;'>
  <div class="flex">
    <div class="flex">
      <input type="date" id='active_data22' required>
      <input type="date" required>
    </div>
    <input type="text" id='active_data23' placeholder="소속/기관/단체명 또는 대회/연주회명을 입력해주세요." required>
    <div class="btn_plus flex">
      <img src="images/btns/btn_minus.png" onclick='onActiveMinus(8)' alt="내용 추가">
      <img src="images/btns/btn_plus.png" onclick='onActivePlus(9)' alt="내용추가">
    </div>
  </div>
  <div class="flex mobile">
    <input type="text" id='active_data24' placeholder="활동내용을 입력해주세요. (30자이내)" maxlength="30" required>
    <div class="btn_plus mobile flex">
      <img src="images/btns/btn_minus.png" onclick='onActiveMinus(8)' alt="내용 추가">
      <img src="images/btns/btn_plus.png" onclick='onActivePlus(9)' alt="내용추가">
    </div>
  </div>
</div>
<div class="flex-direction activity_9" style='display:none;'>
  <div class="flex">
    <div class="flex">
      <input type="date" id='active_data25' required>
      <input type="date" required>
    </div>
    <input type="text" id='active_data26' placeholder="소속/기관/단체명 또는 대회/연주회명을 입력해주세요." required>
    <div class="btn_plus flex">
      <img src="images/btns/btn_minus.png" onclick='onActiveMinus(9)' alt="내용 추가">
      <img src="images/btns/btn_plus.png" onclick='onActivePlus(10)' alt="내용추가">
    </div>
  </div>
  <div class="flex mobile">
    <input type="text" id='active_data27' placeholder="활동내용을 입력해주세요. (30자이내)" maxlength="30" required>
    <div class="btn_plus mobile flex">
      <img src="images/btns/btn_minus.png" onclick='onActiveMinus(9)' alt="내용 추가">
      <img src="images/btns/btn_plus.png" onclick='onActivePlus(10)' alt="내용추가">
    </div>
  </div>
</div>
<div class="flex-direction activity_10" style='display:none;'>
  <div class="flex">
    <div class="flex">
      <input type="date" id='active_data28' required>
      <input type="date" required>
    </div>
    <input type="text" id='active_data29' placeholder="소속/기관/단체명 또는 대회/연주회명을 입력해주세요." required>
    <div class="btn_plus flex">
      <img src="images/btns/btn_minus.png" onclick='onActiveMinus(10)' alt="내용 추가">
    </div>
  </div>
  <div class="flex mobile">
    <input type="text" id='active_data30' placeholder="활동내용을 입력해주세요. (30자이내)" maxlength="30" required>
    <div class="btn_plus mobile flex">
      <img src="images/btns/btn_minus.png" onclick='onActiveMinus(10)' alt="내용 추가">
    </div>
  </div>
</div> -->

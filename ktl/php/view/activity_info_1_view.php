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
      <input type="date" id='active_data1' value='<?=$active_data1?>' required>
      <input type="date" id='active_data1_1' value='<?=$active_data1_1?>' required>
    </div>
    <input type="text" id='active_data2' value='<?=$active_data2?>' placeholder="소속/기관/단체명 또는 대회/연주회명을 입력해주세요." required>
    <div class="btn_plus flex">
      <img src="images/btns/btn_plus.png" onclick='onActivePlus(2)' alt="내용추가">
    </div>
  </div>
  <div class="flex mobile">
    <input type="text" id='active_data3' value='<?=$active_data3?>' placeholder="활동내용을 입력해주세요." required>
    <div class="btn_plus mobile flex">
      <img src="images/btns/btn_plus.png" onclick='onActivePlus(2)' alt="내용 추가">
    </div>
  </div>
</div>
<div class="flex-direction activity_2" style='display:none;'>
  <div class="flex">
    <div class="flex">
      <input type="date" id='active_data4' value='<?=$active_data4?>' required>
      <input type="date" id='active_data4_1' value='<?=$active_data4_1?>' required>
    </div>
    <input type="text" id='active_data5' value='<?=$active_data5?>' placeholder="소속/기관/단체명 또는 대회/연주회명을 입력해주세요." required>
    <div class="btn_plus flex">
      <img src="images/btns/btn_minus.png" onclick='onActiveMinus(2)' alt="내용 추가">
      <img src="images/btns/btn_plus.png" onclick='onActivePlus(3)' alt="내용추가">
    </div>
  </div>
  <div class="flex mobile">
    <input type="text" id='active_data6' value='<?=$active_data6?>' placeholder="활동내용을 입력해주세요." required>
    <div class="btn_plus mobile flex">
      <img src="images/btns/btn_minus.png" onclick='onActiveMinus(2)' alt="내용 추가">
      <img src="images/btns/btn_plus.png" onclick='onActivePlus(3)' alt="내용 추가">
    </div>
  </div>
</div>
<div class="flex-direction activity_3" style='display:none;'>
  <div class="flex">
    <div class="flex">
      <input type="date" id='active_data7' value='<?=$active_data7?>' required>
      <input type="date" id='active_data7_1' value='<?=$active_data7_1?>' required>
    </div>
    <input type="text" id='active_data8' value='<?=$active_data8?>' placeholder="소속/기관/단체명 또는 대회/연주회명을 입력해주세요." required>
    <div class="btn_plus flex">
      <img src="images/btns/btn_minus.png" onclick='onActiveMinus(3)' alt="내용 추가">
      <img src="images/btns/btn_plus.png" onclick='onActivePlus(4)' alt="내용추가">
    </div>
  </div>
  <div class="flex mobile">
    <input type="text" id='active_data9' value='<?=$active_data9?>' placeholder="활동내용을 입력해주세요." required>
    <div class="btn_plus mobile flex">
      <img src="images/btns/btn_minus.png" onclick='onActiveMinus(3)' alt="내용 추가">
      <img src="images/btns/btn_plus.png" onclick='onActivePlus(4)' alt="내용추가">
    </div>
  </div>
</div>
<div class="flex-direction activity_4" style='display:none;'>
  <div class="flex">
    <div class="flex">
      <input type="date" id='active_data10' value='<?=$active_data10?>' required>
      <input type="date" id='active_data10_1' value='<?=$active_data10_1?>' required>
    </div>
    <input type="text" id='active_data11' value='<?=$active_data11?>' placeholder="소속/기관/단체명 또는 대회/연주회명을 입력해주세요." required>
    <div class="btn_plus flex">
      <img src="images/btns/btn_minus.png" onclick='onActiveMinus(4)' alt="내용 추가">
      <img src="images/btns/btn_plus.png" onclick='onActivePlus(5)' alt="내용추가">
    </div>
  </div>
  <div class="flex mobile">
    <input type="text" id='active_data12' value='<?=$active_data12?>' placeholder="활동내용을 입력해주세요." required>
    <div class="btn_plus mobile flex">
      <img src="images/btns/btn_minus.png" onclick='onActiveMinus(4)' alt="내용 추가">
      <img src="images/btns/btn_plus.png" onclick='onActivePlus(5)' alt="내용추가">
    </div>
  </div>
</div>
<div class="flex-direction activity_5" style='display:none;'>
  <div class="flex">
    <div class="flex">
      <input type="date" id='active_data13' value='<?=$active_data13?>' required>
      <input type="date" id='active_data13_1' value='<?=$active_data13_1?>' required>
    </div>
    <input type="text" id='active_data14' value='<?=$active_data14?>' placeholder="소속/기관/단체명 또는 대회/연주회명을 입력해주세요." required>
    <div class="btn_plus flex">
      <img src="images/btns/btn_minus.png" onclick='onActiveMinus(4)' alt="내용 추가">
      <img src="images/btns/btn_plus.png" onclick='onActivePlus(5)' alt="내용추가">
    </div>
  </div>
  <div class="flex mobile">
    <input type="text" id='active_data15' value='<?=$active_data15?>' placeholder="활동내용을 입력해주세요." required>
    <div class="btn_plus mobile flex">
      <img src="images/btns/btn_minus.png" onclick='onActiveMinus(5)' alt="내용 추가">
      <img src="images/btns/btn_plus.png" onclick='onActivePlus(6)' alt="내용추가">
    </div>
  </div>
</div>

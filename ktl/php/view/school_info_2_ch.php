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
          <input type="text" id='grad_1_data1' value='<?=$grad_1_data1?>' placeholder="학교명" class='college_txt' required>
        </div>
      </div>
      <div class="graduate">
        <div class="flex">
          <div class="flex">
            <!-- <input type="text" id='grad_1_data2' value='<?=$grad_1_data2?>' placeholder="입학년월" required> -->
            <!-- <input type="text" id='grad_1_data3' value='<?=$grad_1_data3?>' placeholder="졸업년월" required> -->
            <select id="grad_1_data2">
              <option value="">입학년도</option>
              <option value="1990">1990</option>
              <option value="1991">1991</option>
              <option value="1992">1992</option>
              <option value="1993">1993</option>
              <option value="1994">1994</option>
              <option value="1995">1995</option>
              <option value="1996">1996</option>
              <option value="1997">1997</option>
              <option value="1998">1998</option>
              <option value="1999">1999</option>
              <option value="2000">2000</option>
              <option value="2001">2001</option>
              <option value="2002">2002</option>
              <option value="2003">2003</option>
              <option value="2004">2004</option>
              <option value="2005">2005</option>
              <option value="2006">2006</option>
              <option value="2007">2007</option>
              <option value="2008">2008</option>
              <option value="2009">2009</option>
              <option value="2010">2010</option>
              <option value="2011">2011</option>
              <option value="2012">2012</option>
              <option value="2013">2013</option>
              <option value="2014">2014</option>
              <option value="2015">2015</option>
              <option value="2016">2016</option>
              <option value="2017">2017</option>
              <option value="2018">2018</option>
              <option value="2019">2019</option>
              <option value="2020">2020</option>
              <option value="2021">2021</option>
              <option value="2022">2022</option>
              <option value="2023">2023</option>
              <option value="2024">2024</option>
            </select>
            <select id="grad_1_data3">
              <option value="">입학월</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
            </select>
            <select id="grad_1_data4">
              <option value="">졸업년도</option>
              <option value="1990">1990</option>
              <option value="1991">1991</option>
              <option value="1992">1992</option>
              <option value="1993">1993</option>
              <option value="1994">1994</option>
              <option value="1995">1995</option>
              <option value="1996">1996</option>
              <option value="1997">1997</option>
              <option value="1998">1998</option>
              <option value="1999">1999</option>
              <option value="2000">2000</option>
              <option value="2001">2001</option>
              <option value="2002">2002</option>
              <option value="2003">2003</option>
              <option value="2004">2004</option>
              <option value="2005">2005</option>
              <option value="2006">2006</option>
              <option value="2007">2007</option>
              <option value="2008">2008</option>
              <option value="2009">2009</option>
              <option value="2010">2010</option>
              <option value="2011">2011</option>
              <option value="2012">2012</option>
              <option value="2013">2013</option>
              <option value="2014">2014</option>
              <option value="2015">2015</option>
              <option value="2016">2016</option>
              <option value="2017">2017</option>
              <option value="2018">2018</option>
              <option value="2019">2019</option>
              <option value="2020">2020</option>
              <option value="2021">2021</option>
              <option value="2022">2022</option>
              <option value="2023">2023</option>
              <option value="2024">2024</option>
            </select>
            <select id="grad_1_data5">
              <option value="">졸업월</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
            </select>
            <select id='grad_1_data6' onchange='onShoolCheck(2,1,5)'>
              <option value="">졸업상태</option>
              <option value='졸업'>졸업</option>
              <option value='졸업예정'>졸업예정</option>
              <option value='재학중'>재학중</option>
              <option value='중퇴'>중퇴</option>
              <option value='휴학'>휴학</option>
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
          <input type="text" id='grad_1_data7' value='<?=$grad_1_data7?>' placeholder="전공명" required>
        </div>
      </div>
      <div class="graduate">
        <div class="flex">
          <input type="text" id='grad_1_data8' value='<?=$grad_1_data8?>' placeholder="학점" required>
          <select id='grad_1_data9'>
            <option value="">총점</option>
            <option value='4.5'>4.5</option>
            <option value='4.3'>4.3</option>
            <option value='4.0'>4.0</option>
            <option value='100'>100</option>
          </select>
        </div>
      </div>

      <div class="degree">
        <div class="flex">
          <select id='grad_1_data10'>
            <option value="">학위</option>
            <option value='석사'>석사</option>
            <option value='박사'>박사</option>
            <option value='석박사'>석박사</option>
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
          <input type="text" id='grad_2_data1' value='<?=$grad_2_data1?>' placeholder="학교명" class='college_txt' required>
        </div>
      </div>
      <div class="graduate">
        <div class="flex">
          <div class="flex">
            <!-- <input type="text" id='grad_2_data2' value='<?=$grad_2_data2?>' placeholder="입학년월" required> -->
            <!-- <input type="text" id='grad_2_data3' value='<?=$grad_2_data3?>' placeholder="졸업년월" required> -->
            <select id="grad_2_data2">
              <option value="">입학년도</option>
              <option value="1990">1990</option>
              <option value="1991">1991</option>
              <option value="1992">1992</option>
              <option value="1993">1993</option>
              <option value="1994">1994</option>
              <option value="1995">1995</option>
              <option value="1996">1996</option>
              <option value="1997">1997</option>
              <option value="1998">1998</option>
              <option value="1999">1999</option>
              <option value="2000">2000</option>
              <option value="2001">2001</option>
              <option value="2002">2002</option>
              <option value="2003">2003</option>
              <option value="2004">2004</option>
              <option value="2005">2005</option>
              <option value="2006">2006</option>
              <option value="2007">2007</option>
              <option value="2008">2008</option>
              <option value="2009">2009</option>
              <option value="2010">2010</option>
              <option value="2011">2011</option>
              <option value="2012">2012</option>
              <option value="2013">2013</option>
              <option value="2014">2014</option>
              <option value="2015">2015</option>
              <option value="2016">2016</option>
              <option value="2017">2017</option>
              <option value="2018">2018</option>
              <option value="2019">2019</option>
              <option value="2020">2020</option>
              <option value="2021">2021</option>
              <option value="2022">2022</option>
              <option value="2023">2023</option>
              <option value="2024">2024</option>
            </select>
            <select id="grad_2_data3">
              <option value="">입학월</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
            </select>
            <select id="grad_2_data4">
              <option value="">졸업년도</option>
              <option value="1990">1990</option>
              <option value="1991">1991</option>
              <option value="1992">1992</option>
              <option value="1993">1993</option>
              <option value="1994">1994</option>
              <option value="1995">1995</option>
              <option value="1996">1996</option>
              <option value="1997">1997</option>
              <option value="1998">1998</option>
              <option value="1999">1999</option>
              <option value="2000">2000</option>
              <option value="2001">2001</option>
              <option value="2002">2002</option>
              <option value="2003">2003</option>
              <option value="2004">2004</option>
              <option value="2005">2005</option>
              <option value="2006">2006</option>
              <option value="2007">2007</option>
              <option value="2008">2008</option>
              <option value="2009">2009</option>
              <option value="2010">2010</option>
              <option value="2011">2011</option>
              <option value="2012">2012</option>
              <option value="2013">2013</option>
              <option value="2014">2014</option>
              <option value="2015">2015</option>
              <option value="2016">2016</option>
              <option value="2017">2017</option>
              <option value="2018">2018</option>
              <option value="2019">2019</option>
              <option value="2020">2020</option>
              <option value="2021">2021</option>
              <option value="2022">2022</option>
              <option value="2023">2023</option>
              <option value="2024">2024</option>
            </select>
            <select id="grad_2_data5">
              <option value="">졸업월</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
            </select>
            <select id='grad_2_data6' onchange='onShoolCheck(2,2,5)'>
              <option value="">졸업상태</option>
              <option value='졸업'>졸업</option>
              <option value='졸업예정'>졸업예정</option>
              <option value='재학중'>재학중</option>
              <option value='중퇴'>중퇴</option>
              <option value='휴학'>휴학</option>
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
          <input type="text" id='grad_2_data7' value='<?=$grad_2_data7?>' placeholder="전공명" required>
        </div>
      </div>
      <div class="graduate">
        <div class="flex">
          <input type="text" id='grad_2_data8' value='<?=$grad_2_data8?>' placeholder="학점" required>
          <select id='grad_2_data9'>
            <option value="">총점</option>
            <option value='4.5'>4.5</option>
            <option value='4.3'>4.3</option>
            <option value='4.0'>4.0</option>
            <option value='100'>100</option>
          </select>
        </div>
      </div>
      <div class="degree">
        <div class="flex">
          <select id='grad_2_data10'>
            <option value="">학위</option>
            <option value='석사'>석사</option>
            <option value='박사'>박사</option>
            <option value='석박사'>석박사</option>
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
          <input type="text" id='grad_3_data1' value='<?=$grad_3_data1?>' placeholder="학교명" class='college_txt' required>
        </div>
      </div>
      <div class="graduate">
        <div class="flex">
          <div class="flex">
            <!-- <input type="text" id='grad_3_data2' value='<?=$grad_3_data2?>' placeholder="입학년월" required> -->
            <!-- <input type="text" id='grad_3_data3' value='<?=$grad_3_data3?>' placeholder="졸업년월" required> -->
            <select id="grad_3_data2">
              <option value="">입학년도</option>
              <option value="1990">1990</option>
              <option value="1991">1991</option>
              <option value="1992">1992</option>
              <option value="1993">1993</option>
              <option value="1994">1994</option>
              <option value="1995">1995</option>
              <option value="1996">1996</option>
              <option value="1997">1997</option>
              <option value="1998">1998</option>
              <option value="1999">1999</option>
              <option value="2000">2000</option>
              <option value="2001">2001</option>
              <option value="2002">2002</option>
              <option value="2003">2003</option>
              <option value="2004">2004</option>
              <option value="2005">2005</option>
              <option value="2006">2006</option>
              <option value="2007">2007</option>
              <option value="2008">2008</option>
              <option value="2009">2009</option>
              <option value="2010">2010</option>
              <option value="2011">2011</option>
              <option value="2012">2012</option>
              <option value="2013">2013</option>
              <option value="2014">2014</option>
              <option value="2015">2015</option>
              <option value="2016">2016</option>
              <option value="2017">2017</option>
              <option value="2018">2018</option>
              <option value="2019">2019</option>
              <option value="2020">2020</option>
              <option value="2021">2021</option>
              <option value="2022">2022</option>
              <option value="2023">2023</option>
              <option value="2024">2024</option>
            </select>
            <select id="grad_3_data3">
              <option value="">입학월</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
            </select>
            <select id="grad_3_data4">
              <option value="">졸업년도</option>
              <option value="1990">1990</option>
              <option value="1991">1991</option>
              <option value="1992">1992</option>
              <option value="1993">1993</option>
              <option value="1994">1994</option>
              <option value="1995">1995</option>
              <option value="1996">1996</option>
              <option value="1997">1997</option>
              <option value="1998">1998</option>
              <option value="1999">1999</option>
              <option value="2000">2000</option>
              <option value="2001">2001</option>
              <option value="2002">2002</option>
              <option value="2003">2003</option>
              <option value="2004">2004</option>
              <option value="2005">2005</option>
              <option value="2006">2006</option>
              <option value="2007">2007</option>
              <option value="2008">2008</option>
              <option value="2009">2009</option>
              <option value="2010">2010</option>
              <option value="2011">2011</option>
              <option value="2012">2012</option>
              <option value="2013">2013</option>
              <option value="2014">2014</option>
              <option value="2015">2015</option>
              <option value="2016">2016</option>
              <option value="2017">2017</option>
              <option value="2018">2018</option>
              <option value="2019">2019</option>
              <option value="2020">2020</option>
              <option value="2021">2021</option>
              <option value="2022">2022</option>
              <option value="2023">2023</option>
              <option value="2024">2024</option>
            </select>
            <select id="grad_3_data5">
              <option value="">졸업월</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
            </select>
            <select id='grad_3_data6' onchange='onShoolCheck(2,3,5)'>
              <option value="">졸업상태</option>
              <option value='졸업'>졸업</option>
              <option value='졸업예정'>졸업예정</option>
              <option value='재학중'>재학중</option>
              <option value='중퇴'>중퇴</option>
              <option value='휴학'>휴학</option>
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
          <input type="text" id='grad_3_data7' value='<?=$grad_3_data7?>' placeholder="전공명" required>
        </div>
      </div>
      <div class="graduate">
        <div class="flex">
          <input type="text" id='grad_3_data8' value='<?=$grad_3_data8?>' placeholder="학점" required>
          <select id='grad_3_data9'>
            <option value="">총점</option>
            <option value='4.5'>4.5</option>
            <option value='4.3'>4.3</option>
            <option value='4.0'>4.0</option>
            <option value='100'>100</option>
          </select>
        </div>
      </div>
      <div class="degree">
        <div class="flex">
          <select id='grad_3_data10'>
            <option value="">학위</option>
            <option value='석사'>석사</option>
            <option value='박사'>박사</option>
            <option value='석박사'>석박사</option>
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

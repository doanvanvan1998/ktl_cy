<!DOCTYPE html>
<?php include 'php/common_header.php' ?>
<link rel="stylesheet" href="css/application.css">
<body>
  <div class="wrap">
    <?php include 'php/common_header_menu.php' ?>
    <div class="contents_wrap">
      <div class="container-fluid">
        <div class="banner flex">
          <div class="flex-direction">
            <h2>지원서 작성</h2>
            <span>
                최종제출 후 지원서 수정이 불가능하므로 반드시 내용 확인 후 제출
            </span>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="title flex">
          <h2>지원서 작성</h2>
          <div class="flex">
            <span>Home</span>
            <img src="images/icons/ic_next.png" alt="">
            <span>지원관리</span>
            <img src="images/icons/ic_next.png" alt="">
            <span class="on">지원서 작성</span>
          </div>
        </div>
        <div class="contibox">
          <div>
            <div class="flex contitop">
              <img src="images/icons/ic_ktl_s.png" alt="KTL">
              <span>한국산업기술시험원</span>
            </div>
            <h6>2022년 한국산업기술시험원 기간제 장애·문화예술인 채용 (오케스트라단원 부문)</h6>
          </div>
        </div>
        <div class="box">
          <div class="recruitment flex-direction">
            <h6 class="title">모집부문</h6>
            <div class="con flex-direction">
              <div class="flex">
                <h6>공고명</h6>
                <span>2022 한국산업기술시험원 기간제 장애 문화 예술인 채용(오케스트라단원 부문)</span>
              </div>
              <div class="flex">
                <h6>채용분야</h6>
                <span>홍보 공연팀</span>
              </div>
              <div class="flex">
                <h6>모집인원</h6>
                <span>10명(기간제)</span>
              </div>
              <div class="flex">
                <h6>응시자격</h6>
                <span>장애인고용촉진 및 직업재활법시형령 제3조의 규정에 해당하는 장애인</span>
              </div>
              <div class="flex">
                <h6>채용형태</h6>
                <span>제한경쟁 채용</span>
              </div>
            </div>
          </div>
        </div>
        <div class="box">
          <div class="duty flex-direction">
            <h6 class="title">직무소개</h6>
            <div class="con flex-direction">
              <div class="flex">
                <h6>담당업무</h6>
                <span>문화 예술연주회 참여 및 그것을 활용한 회사홍보 활동</span>
              </div>
              <div class="flex">
                <h6>자격요건</h6>
                <span>
                  1. 악기에 대한 기본적인 지식과 악기 활용능력을 겸비한 자<br>
                  2. 합동연주에 대한 이해를 가진자<br>
                  3. 진주시에 있는 본원에 근무가 가능한자 (최소 월 1~2회)
                </span>
              </div>
              <div class="flex">
                <h6>경력사항</h6>
                <span>제한없음</span>
              </div>
            </div>
          </div>
        </div>
        <div class="btnbox">
          <div class="btn_write flex"><span>입사지원서 작성</span></div>
        </div>
      </div>
    </div>
    <?php include 'php/common_footer.php' ?>
  </div>
<?php include 'php/common_script.php' ?>
<script>
  let btnWrite = $('.btn_write');
  btnWrite.click(function(){
    location.href = 'jobapplication.php';
  });
</script>
</body>
</html>

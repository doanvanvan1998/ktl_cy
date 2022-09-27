<!DOCTYPE html>
<?php include 'php/common_header.php' ?>
<link rel="stylesheet" href="css/faq.css">
<body>
  <div class="wrap">
    <?php include 'php/common_header_menu.php' ?>
    <div class="contents_wrap">
      <div class="container-fluid">
        <div class="banner flex">
          <div class="flex-direction">
            <h2>자주하는 질문 FAQ</h2>
            <span>유사한 질문이 많은 관계로 반드시 채용공고를 숙지하시고 추가 문의사항은 채용문의를 통해 질의해주시기 바랍니다.</span>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="title flex">
          <h2>자주하는 질문 FAQ</h2>
          <div class="flex">
            <span>Home</span>
            <img src="images/icons/ic_next.png" alt="">
            <span>공지사항</span>
            <img src="images/icons/ic_next.png" alt="">
            <span class="on">자주하는 질문 FAQ</span>
          </div>
        </div>
        <div class="faq">
          <ul class="flex-direction dropdown">
            <li class="dropdown_tab">
              <div class="flex faq_title">
                <div class="flex">
                  <div class="icons flex"><img src="images/icons/ic_faq.png" alt="FAQ"></div>
                  <h6>입사지원을 했는데 접수 확인이 가능한가요?</h6>
                </div>
                <div class="flex downarrow"><img src="images/btns/btn_dropdown_arrow.png" alt="보기"></div>
              </div>
              <div class="dropdown_con">
                <span>접수 확인 여부는 지원 후 이력서에 등록된 개인 E-mail로 자동 통보됩니다. 또한 지원관리 전형결과를 통해 확인이 가능합니다.</span>
              </div>
            </li>
            <li class="dropdown_tab">
              <div class="flex faq_title">
                <div class="flex">
                  <div class="icons flex"><img src="images/icons/ic_faq.png" alt="FAQ"></div>
                  <h6>입사지원서 수정이 가능한가요?</h6>
                </div>
                <div class="flex downarrow"><img src="images/btns/btn_dropdown_arrow.png" alt="보기"></div>
              </div>
              <div class="dropdown_con">
                <span>입사지원서 수정은 항시 가능합니다. 단 최종 제출 시 더 이상 수정이 불가능하니 신중하게 작성하시고 지원서를 제출하시기 바랍니다.</span>
              </div>
            </li>
            <li class="dropdown_tab">
              <div class="flex faq_title">
                <div class="flex">
                  <div class="icons flex"><img src="images/icons/ic_faq.png" alt="FAQ"></div>
                  <h6>홈페이지 지원 외에는 다른 지원 방법이 있나요?</h6>
                </div>
                <div class="flex downarrow"><img src="images/btns/btn_dropdown_arrow.png" alt="보기"></div>
              </div>
              <div class="dropdown_con">
                <span>입사지원은 해당 채용사이트에서만 접수 가능하며 다른 경로를 통한 지원을 받고 있지 않습니다.</span>
              </div>
            </li>
            <li class="dropdown_tab">
              <div class="flex faq_title">
                <div class="flex">
                  <div class="icons flex"><img src="images/icons/ic_faq.png" alt="FAQ"></div>
                  <h6>입사지원 후 절차는 어떻게 되나요?</h6>
                </div>
                <div class="flex downarrow"><img src="images/btns/btn_dropdown_arrow.png" alt="보기"></div>
              </div>
              <div class="dropdown_con">
                <span>채용단계는 1차 서류전형과 2차 면접전형으로 진행됩니다. 각 전형별 합격자는 개별통지 및 채용홈페이지를 통해 안내됩니다.</span>
              </div>
            </li>
            <li class="dropdown_tab">
              <div class="flex faq_title">
                <div class="flex">
                  <div class="icons flex"><img src="images/icons/ic_faq.png" alt="FAQ"></div>
                  <h6>입사지원서 삭제가 가능한가요?</h6>
                </div>
                <div class="flex downarrow"><img src="images/btns/btn_dropdown_arrow.png" alt="보기"></div>
              </div>
              <div class="dropdown_con">
                <span>작성중인 입사지원서는 삭제 가능합니다. 지원서수정 하단의 지원철회를 누르시면 삭제 가능합니다.
                단, 지원서를 삭제할 경우 기존에 작성한 정보는 모두 삭제되므로 신중하게 확인하신 후 제출하시기 바랍니다.
                </span>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <?php include 'php/common_footer.php' ?>
  </div>
<?php include 'php/common_script.php' ?>
<script type="text/javascript">
  let dropdwon = $('.dropdown li .faq_title');
  let dropdwoncon = $('.dropdown li .dropdown_con');
  dropdwon.click(function(){
    $(this).parents('li').find(dropdwon).toggleClass('on');
    $(this).parents('li').siblings().find(dropdwon).removeClass('on');
    $(this).parents('li').find(dropdwoncon).slideToggle();
    $(this).parents('li').siblings().find(dropdwoncon).slideUp();
  });
</script>
</body>
</html>

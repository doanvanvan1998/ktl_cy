<div class="header_wrap">
  <div class="container flex">
    <div class="flex">
      <div class="logo flex"><a href="index.html"><img src="images/icons/ic_logo_on.png" alt="KTL 한국산업기술시험원"></a></div>
      <nav>
        <ul class="flex main_header_menu">
          <li><a href="#" onclick='onBackView()'>관리자화면이동</a></li>
        </ul>
      </nav>
    </div>
    <!-- <div class="flex sub">
      <a href="#">회원가입</a>
      <a href="login.html">로그인</a>
    </div> -->
    <div class="mobile_menu"></div>
  </div>
  <div class="mobile_toggle_menu">
    <div class="toggle_menu">
      <div class="flex-direction menu_list">
        <!-- <div class="flex sub">
          <a href="#">회원가입</a>
          <span class="linebar"></span>
          <a href="login.html">로그인</a>
        </div> -->
        <ul class="menu">
          <li><a href="#" onclick='onBackView()'>관리자화면이동</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<script>
  function onBackView()
  {
    history.back(-1);
  }
</script>

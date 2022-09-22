<style>
.none { display:none; }
</style>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="../../index.html" class="brand-link">
    <span class="brand-text font-weight-bold"><img src='http://ktl-recruit.ableup.kr/images/icons/ic_logo_off.png' style='width:100%;padding:20px;' /></span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="info">
        <span class="d-block" style='color:#fff'><?=$Arow[0]?> 관리자 <a href='#' onclick='onLogout()'>[ 로그아웃 ]</a></span>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
       <li class="nav-header">내정보</li>
       <li class="nav-item" id='nav_1'>
         <a href="myinfo.html" class="nav-link" id='nav_1_1'>
           <i class="nav-icon fas fa-pen"></i>
           <p>
             정보수정
           </p>
         </a>
       </li>
       <li class="nav-header">면접관관리</li>
       <li class="nav-item" id='nav_2'>
         <a href="subadmin_add.html" class="nav-link" id='nav_2_1'>
           <i class="nav-icon fas fa-pen"></i>
           <p>
             면접관등록
           </p>
         </a>
       </li>
       <li class="nav-item" id='nav_3'>
         <a href="subadmin_list.html" class="nav-link" id='nav_3_1'>
           <i class="nav-icon fas fa-user"></i>
           <p>
             면접관리스트
           </p>
         </a>
       </li>
       <li class="nav-header">지원자현황</li>

       <li class="nav-item" id='nav_4'>
         <a href="#" class="nav-link" id='nav_4_1'>
           <i class="nav-icon fas fa-copy"></i>
           <p>
             지원자관리
             <i class="fas fa-angle-left right"></i>
             <!-- <span class="badge badge-info right">6</span> -->
           </p>
         </a>
         <ul class="nav nav-treeview">
           <li class="nav-item">
             <a href="apply_list.html?Id=1" class="nav-link" id='nav_5_1'>
               <i class="far fa-circle nav-icon"></i>
               <p>서류전형</p>
             </a>
           </li>
           <li class="nav-item">
             <a href="apply_list.html?Id=2" class="nav-link" id='nav_5_2'>
               <i class="far fa-circle nav-icon"></i>
               <p>면접현황</p>
             </a>
           </li>
           <li class="nav-item">
             <a href="apply_list.html?Id=3" class="nav-link" id='nav_5_3'>
               <i class="far fa-circle nav-icon"></i>
               <p>최종합격자</p>
             </a>
           </li>
         </ul>
       </li>
        <li class="nav-header">이의신청</li>
        <li class="nav-item" id='nav_6'>
          <a href="inquire_list.html" class="nav-link" id='nav_6_1'>
            <i class="nav-icon fas fa-book"></i>
            <p>
              신청리스트
            </p>
          </a>
        </li>
        <li class="nav-header">채용문의</li>
        <li class="nav-item" id='nav_7'>
          <a href="employment_list.html" class="nav-link" id='nav_7_1'>
            <i class="nav-icon fas fa-book"></i>
            <p>
              문의리스트
            </p>
          </a>
        </li>
        <li class="nav-header">공지사항</li>
        <li class="nav-item" id='nav_8'>
          <a href="notice_add.html" class="nav-link" id='nav_8_1'>
            <i class="nav-icon fas fa-pen"></i>
            <p>
              공지등록
            </p>
          </a>
        </li>
        <li class="nav-item" id='nav_9'>
          <a href="notice_list.html" class="nav-link" id='nav_9_1'>
            <i class="nav-icon fas fa-book"></i>
            <p>
              공지리스트
            </p>
          </a>
        </li>
        <li class="nav-header">사이트</li>
        <li class="nav-item">
          <a href="https://kiat.or.kr/front/user/main.do" target="_blank" class="nav-link">
            <i class="fas fa-circle nav-icon"></i>
            <p>한국산업기술원</p>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
<script>
  function onLogout()
  {
    $.post("../../php/fnc/logout.php",
    {
    },
     function(data,status){
     if(status != "fail"){
      location.href='login.html';
     }
     else
     {
      alert("네트워크 오류");
     }
    });
  }
</script>

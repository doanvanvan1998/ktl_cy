<?php

  if(isset($_SESSION["m_user_id"]))
  {
    $userid = $_SESSION["m_user_id"];

    include "php/mysql.php";

    $query="select username from recruit_able_admin where userid='$userid'";
    $Aresult = mysqli_query($con,$query);
    $Arow = mysqli_fetch_array($Aresult);

    echo "<input type='hidden' id='sel_userid' value='$userid' />";
    
    mysqli_close($con);
  }
  else
  {
    echo "<script>alert('로그인 후 이용이 가능합니다.');location.href='pages/forms/login.php';</script>";
  }
?>
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="index.html" class="nav-link">Home</a>
    </li>
  </ul>
</nav>

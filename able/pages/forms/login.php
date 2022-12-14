<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="kr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>채용플랫폼 관리자</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <img src='http://ktl-recruit.ableup.kr/images/icons/ic_logo_on.png' style='width:100%;padding:30px;' />
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <div class="input-group mb-3">
          <input type="email" id='userid' class="form-control" placeholder="아이디를 입력하세요.">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" id='pass' class="form-control" placeholder="패스워드를 입력하세요.">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block" onclick='onLogin()' style='width:100%;'>Sign In</button>
          </div>
          <!-- /.col -->
        </div>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<script>
  function onLogin()
  {
    if($("#userid").val() == "")
    {
      alert("아이디를 입력하세요.");
      $("#userid").focus();
      return;
    }
    else if($("#pass").val() == "")
    {
      alert("패스워드를 입력하세요.");
      $("#pass").focus();
      return;
    }

    $.post("../../php/fnc/login.php",
    {
      userid : $("#userid").val(),
      pass : $("#pass").val()
    },
     function(data,status){
     if(status != "fail"){
       console.log(data);
       if(data == "fail") 
       { alert("로그인정보가 다릅니다."); $("#pass").val(""); return; }
      location.href='../../index.php';
     }
     else
     {
      alert("네트워크 오류");
     }
    });
  }
</script>
</body>
</html>

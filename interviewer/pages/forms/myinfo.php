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
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../../plugins/summernote/summernote-bs4.min.css">
  <!-- CodeMirror -->
  <link rel="stylesheet" href="../../plugins/codemirror/codemirror.css">
  <link rel="stylesheet" href="../../plugins/codemirror/theme/monokai.css">
  <!-- SimpleMDE -->
  <link rel="stylesheet" href="../../plugins/simplemde/simplemde.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <!-- Main Sidebar Container -->
  <?php
    include "../../php/sub_nav.php";
    include "../../php/sub_left_menu.php";
//    comment quang
//    $Id = $_GET["Id"];
//    echo "<input type='hidden' id='Id' value='$Id'/>";
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>정보수정</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">내정보</li>
              <li class="breadcrumb-item active">정보수정</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">로그인정보</h3>

            </div>
            <?php
              include "../../php/mysql.php";
              include "../../php/crypt.php";

              $query="select username,userphone,useremail from recruit_able_subadmin where userid='$userid'";
              $Aresult = mysqli_query($con,$query);
              $Arow = mysqli_fetch_array($Aresult);

              $Arow[1] = Decrypt($Arow[1],$secret_key,$secret_iv);
              $Arow[2] = Decrypt($Arow[2],$secret_key,$secret_iv);

              mysqli_close($con);
            ?>
            <div class="card-body">
            <div class="form-group">
              <label for="inputClientCompany">아이디</label>
              <input type="text" id="userid" value='<?=$userid?>' class="form-control" placeholder="아이디를 입력하세요.">
            </div>
            <div class="form-group">
              <label for="inputProjectLeader">수정하실 패스워드</label>
              <input type="password" id="pass" class="form-control" placeholder="패스워드를 입력하세요." disabled="true">
            </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">기본정보</h3>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">이름</label>
                <input type="text"  id="username" value='<?=$Arow[0]?>' class="form-control" placeholder="이름을 입력하세요." disabled="true">
              </div>
              <div class="form-group">
                <label for="inputEstimatedBudget">휴대폰번호</label>
                <input type="number" id="userphone" value='<?=$Arow[1]?>' class="form-control" placeholder="휴대폰번호를 입력하세요." disabled="true">
              </div>
              <div class="form-group">
                <label for="inputSpentBudget">E-mail</label>
                <input type="email" id="useremail" value='<?=$Arow[2]?>' class="form-control" placeholder="이메일주소를 입력하세요." disabled="true">
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <a href="subadmin_list.html" class="btn btn-secondary">리스트 보기</a>
          <input type="submit" onclick='onSubAdminAdd()' value="등록하기" class="btn btn-success float-right">
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php
    include "../../php/footer.php";
  ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- Page specific script -->
<script>
  function onSubAdminAdd()
  {
    $.post("../../php/fnc/admin_add.php",
    {
      userid : $("#userid").val(),
      pass : $("#pass").val(),
      username : $("#username").val(),
      description : $("#description").val(),
      userphone : $("#userphone").val(),
      useremail : $("#useremail").val()

    },
     function(data,status){
     if(status != "fail"){
      alert("정보가 수정되었습니다.");
     }
     else
     {
      alert("네트워크 오류");
     }
    });
  }

  $("#nav_1").attr("class","nav-item menu-is-opening menu-open");
  $("#nav_1_1").attr("class","nav-link active");
  //menu-is-opening menu-open
  //active
</script>
</body>
</html>

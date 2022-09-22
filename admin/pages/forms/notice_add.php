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
    // vandv comment
    //$Id = $_GET["Id"];
   // echo "<input type='hidden' id='Id' value='$Id'/>";
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>공지등록</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">공지사항</li>
              <li class="breadcrumb-item active">공지등록</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
                공지사항 등록
              </h3>
            </div>
            <div class="card-body">
              <input type='text' id='subject' value='<?php $row[1]  ?>' style='padding:8px;width:100%;' placeholder="제목을 입력하세요."/>
              <div style='height:10px;'></div>
              <textarea id="summernote">
                <!-- vandv comment -->
                <!-- <?=$row[2]?> -->
              </textarea>
              <button class='btn btn-info' onclick='onBackMove()'>목록보기</button>
              <button onclick='onEdit()' class='btn btn-primary ' >등록하기</button>
            </div>
          </div>
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
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
<!-- Summernote -->
<script src="../../plugins/summernote/summernote-bs4.min.js"></script>
<!-- CodeMirror -->
<script src="../../plugins/codemirror/codemirror.js"></script>
<script src="../../plugins/codemirror/mode/css/css.js"></script>
<script src="../../plugins/codemirror/mode/xml/xml.js"></script>
<script src="../../plugins/codemirror/mode/htmlmixed/htmlmixed.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- Page specific script -->
<script>
  $(function () {
    // Summernote
    $(document).ready(function() {
      var t = $('#summernote').summernote(
      {
          height: 400,
          focus: true
        }
      );
    });

  });
  function onBackMove()
  {
    location.href='notice_list.html';
  }
  function onEdit()
  {
    $.post("../../php/fnc/notice_add.php",
    {
      Id : $("#Id").val(),
      subject : $("#subject").val(),
      contents : $("#summernote").val(),
    },
     function(data,status){
     if(status != "fail"){
      alert("해당 공지내용이 등록되었습니다.");
      location.href='notice_list.php';
     }
     else
     {
      alert("네트워크 오류");
     }
    });
  }
  $("#nav_8").attr("class","nav-item menu-is-opening menu-open");
  $("#nav_8_1").attr("class","nav-link active");
</script>
</body>
</html>

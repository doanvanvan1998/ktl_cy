<?php
require_once '../../../session/loggedUser.php';
forceLogin();
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
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <!-- Main Sidebar Container -->
  <?php
    include "../../php/sub_nav.php";
    include "../../php/sub_left_menu.php";
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>공지리스트</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">공지사항</li>
              <li class="breadcrumb-item active">공지리스트</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>공지제목</th>
                    <th>등록날짜</th>
                    <th style='width:95px;'>수정/삭제</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
//                  quang comment
//                    include "../../php/mysql.php";
//                    $nIndex = 1;
//                    $query="select id,subject,contents,date from recruit_able_notice order by id desc";
//                    $result = mysqli_query($con, $query);
//
//                    while($row = mysqli_fetch_array($result))
//                    {
//                      echo "<tr id='tr_$row[0]'><td>$nIndex</td><td><div class='view_input' id='subject_view_$row[0]'>".$row['subject']."</div></td><td>".$row['date']."</td>";
//                      echo "<td><button class='btn btn-primary' id='ch_btn_$row[0]'  onclick='onCh($row[0])'>수정</button> <button class='btn btn-danger' onclick='onDel($row[0])'>삭제</button></td></tr>";
//
//
//                      $nIndex++;
//                    }
//                    mysqli_close($con);
                  ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->


          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
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
<script>
  function onCh(Id)
  {
    location.href='notice_ch.html?Id='+Id;
  }
  function onDel(Id)
  {
    if(confirm("정말로 삭제하시겠습니까?"))
    {
      $.post("../../php/fnc/notice_del.php",
      {
        Id : Id,
      },
       function(data,status){
       if(status != "fail"){
        alert("해당 공지내용이 삭제되었습니다.");
        $("#tr_"+Id).remove();
       }
       else
       {
        alert("네트워크 오류");
       }
      });
    }
  }
</script>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
$(function () {
  $('#example1').DataTable({
    "paging": true,
    "lengthChange": false,
    "searching": true,
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "responsive": true,
  });
});
$("#nav_9").attr("class","nav-item menu-is-opening menu-open");
$("#nav_9_1").attr("class","nav-link active");
</script>
</body>
</html>

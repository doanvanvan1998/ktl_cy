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
    $Id = $_GET["Id"];
    echo "<input type='hidden' id='SelId' value='$Id'/>";
    $strtitle = "";
    if($Id == 1) { $strtitle = "서류전형"; }
    else if($Id == 2) { $strtitle = "면접현황"; }
    else if($Id == 3) { $strtitle = "최종합격자"; }

  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">

          <div class="col-sm-6">
            <h1><?=$strtitle?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">지원자현황</li>
              <li class="breadcrumb-item active"><?=$strtitle?></li>
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
                <table id="example1" style='text-align:center;'  class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style='width:30px;'>No.</th>
                    <th>지원번호</th>
                    <th>지원자명</th>
                    <th>휴대전화</th>
                    <th>이메일</th>
                    <th>평가점수</th>
                    <th style='width:125px;'>포트폴리오</th>
                    <th style='width:125px;'>지원서보기</th>
                    <th style='width:85px;'>합격여부</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                      include "../../php/mysql.php";
                      include "../../php/crypt.php";

                      $nIndex = 1;
                      if($Id == 1)
                        $query="select id,username,phone,email,apply_num,result_check_num,result_check from recruit_able_user where apply_step=5 and result_check_num = 1";
                      else if($Id == 2)
                        $query="select id,username,phone,email,apply_num,result_check_num,result_check from recruit_able_user where apply_step=5 and result_check_num = 2 ";
                      else if($Id == 3)
                        $query="select id,username,phone,email,apply_num,result_check_num,result_check from recruit_able_user where apply_step=5 and result_check_num = 3 ";

                      $Uresult = mysqli_query($con,$query);
                      while($Urow = mysqli_fetch_array($Uresult))
                      {
                        $query="select sum(score) from recruit_able_score where step='$Id' and userid='$Urow[0]'";
                        $ScoreResult = mysqli_query($con,$query);
                        $ScoreRow = mysqli_fetch_array($ScoreResult);

                        if($ScoreRow[0] == "") $ScoreRow[0] = 0;

                        $query="select user_address,user_detailAddress,sel_tab_num,step0_view_sel,step0_view_sel2,sel2_tab_num,sel3_tab_num,sel4_tab_num,data1,data2,data3,data4,data5,data6,data7,data8,check_phone,data12,data13 from apply_step_1 where userid='$Urow[0]'";
                        $ApplyResult1 = mysqli_query($con,$query);
                        $ApplyRow1 = mysqli_fetch_array($ApplyResult1);

                        $Urow[2] = Decrypt($Urow[2],$secret_key,$secret_iv);
                        $Urow[3] = Decrypt($Urow[3],$secret_key,$secret_iv);

                        echo "<tr><td>$nIndex</td><td>$Urow[4]</td><td>$Urow[1]</td><td>$Urow[2]</td><td>$Urow[3]</td><td>$ScoreRow[0]</td><td>";
                        $strPdf = "../../../ktl/portfolio/".$Urow[0].".pdf";
                        if(file_exists("../../../ktl/portfolio/".$Urow[0].".pdf")) {
                            echo "<a href='$strPdf' target='_blank' class='btn btn-warning' style='font-weight:600'>포트폴리오</a>";
                        }else{
                            echo "없음";
                        }
                        echo "</td><td><button class='btn btn-primary' onclick='onApplyView($Urow[0],$Id)'>지원페이지로 이동</button></td>";

                        if($Id == 1) {
                          if($Urow['result_check_num'] == 1)
                          {
                            //지원상태
                            echo "<td><button class='btn btn-info' onclick='onApplySuc($Urow[0],2)'>서류통과</button></td>";
                          }
                          else
                          {
                            if($Urow['result_check'] == 1)
                            {
                              echo "<td>서류통과</td>";
                            }
                            else if($Urow['result_check'] == 0)
                            {
                              echo "<td>서류 불합격</td>";
                            }
                          }
                        }
                        else if($Id == 2) {
                          if($Urow['result_check_num'] == 2)
                          {
                            //서류통과한 상태
                            echo "<td><button class='btn btn-info' onclick='onApplySuc($Urow[0],3)'>최종합격</button></td>";
                          }
                          else
                          {
                            if($Urow['result_check'] == 1)
                            {
                              echo "<td>면접통과</td>";
                            }
                            else if($Urow['result_check'] == 0)
                            {
                              echo "<td>면접 불합격</td>";
                            }
                          }
                        }
                        else if($Id == 3) {
                          if($Urow['result_check_num'] == 3)
                          {
                            //서류통과한 상태
                            echo "<td>최종합격</td>";
                          }
                          else
                          {
                            if($Urow['result_check'] == 1)
                            {
                              echo "<td>최종합격 통과</td>";
                            }
                            else if($Urow['result_check'] == 0)
                            {
                              echo "<td>최종합격 불합격</td>";
                            }
                          }
                        }

                        else if($Id == 2) { echo "<td><button class='btn btn-info' onclick='onApplySuc($Urow[0])'>최종합격</button></td>"; }
                        else if($Id == 3) { echo "<td>최종합격자</td>"; }

                        echo "</tr>";

                        $nIndex++;
                      }
                      mysqli_close($con);
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
  function onApplySuc(Id,step)
  {
    if(confirm("해당 지원서를 통과하시겠습니까?"))
    {
      $.post("../../php/fnc/apply_pass.php",
      {
        Id : Id,
        step : step
      },
       function(data,status){
       if(status != "fail"){
        alert("해당 지원서가 통과었습니다.");
        location.reload();
       }
       else
       {
        alert("네트워크 오류");
       }
      });
    }
  }
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
  function onApplyView(Id,step)
  {
    location.href='http://ktl-recruit.ableup.kr/apply_view.html?Id='+Id+"&userid="+$("#sel_userid").val();
    }
  $(function () {
    $('#example1').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "order": [[5, 'desc']],
    });
  });

  $("#nav_4").attr("class","nav-item menu-is-opening menu-open");
  $("#nav_5_"+$("#SelId").val()).attr("class","nav-link active");
</script>
</body>
</html>

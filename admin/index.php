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
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Navbar -->
    <?php
    include 'php/nav.php';
    include 'php/main_left_menu.php';
    ?>
    <!-- /.navbar -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">메인화면</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">메인화면</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- /.card -->

                        <div class="card">
                            <div class="card-header border-0">
                                <h3 class="card-title">지원자현황 ( 최종제출완료자 )</h3>
                            </div>
                            <div class="card-body table-responsive p-10">
                                <table id="example1" style='text-align:center;'
                                       class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th style='width:30px;'>No.</th>
                                        <th>지원번호</th>
                                        <th>지원자명</th>
                                        <th>휴대전화</th>
                                        <th style='width:205px;'>이메일</th>
                                        <th style='width:155px;'>포트폴리오</th>
                                        <th style='width:175px;'>지원서보기</th>
                                        <th style='width:85px;'>상태</th>
                                        <th style='width:80px;'>삭제</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    include "php/mysql.php";
                                    include "php/crypt.php";
                                    $nIndex = 1;
                                    $query = "select id,username,phone,email,apply_num,result_check_num,result_check from recruit_able_user where apply_step=5  order by id desc";
                                    $Uresult = mysqli_query($con, $query);
                                    while ($Urow = mysqli_fetch_array($Uresult)) {
                                        $query = "select user_address,user_detailAddress,sel_tab_num,step0_view_sel,step0_view_sel2,sel2_tab_num,sel3_tab_num,sel4_tab_num,data1,data2,data3,data4,data5,data6,data7,data8,check_phone,data12,data13 from apply_step_1 where userid='$Urow[0]'";
                                        $ApplyResult1 = mysqli_query($con, $query);
                                        $ApplyRow1 = mysqli_fetch_array($ApplyResult1);

                                        $Urow[2] = Decrypt($Urow[2], $secret_key, $secret_iv);
                                        $Urow[3] = Decrypt($Urow[3], $secret_key, $secret_iv);

                                        echo "<tr id='tr_1_$Urow[0]'><td>$nIndex</td><td>$Urow[4]<br>( $Urow[0] )</td><td>$Urow[1]</td><td>$Urow[2]</td><td>$Urow[3]</td><td>";
                                        $strPdf = "../ktl/portfolio/" . $Urow[0] . ".pdf";
                                        if (file_exists("../ktl/portfolio/" . $Urow[0] . ".pdf")) {
                                            echo "<a href='$strPdf' target='_blank' class='btn btn-info'>새창으로 보기</a>";
                                        } else {
                                            echo "없음";
                                        }
                                        echo "</td><td><button class='btn btn-primary' onclick='onApplyView($Urow[0])'>지원페이지로 이동</button></td>";

                                        if ($Urow['result_check_num'] == 1) {
                                            echo "<td>최종제출</td>";
                                        } else if ($Urow['result_check_num'] == 2) {
                                            if ($Urow['result_check'] == 1) echo "<td>서류통과</td>";
                                            else echo "<td>서류 불합격</td>";
                                        } else if ($Urow['result_check_num'] == 3) {
                                            if ($Urow['result_check'] == 1) echo "<td>면접통과</td>";
                                            else echo "<td>면접 불합격</td>";
                                        } else if ($Urow['result_check_num'] == 4) {
                                            echo "<td>최종합격자</td>";
                                        }
                                        echo "<td><button class='btn btn-danger' onclick='onApplyDel($Urow[0],1)'>삭제</button></td>";


                                        echo "</tr>";

                                        $nIndex++;
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>

                    <div class="col-lg-12">
                        <!-- /.card -->

                        <div class="card">
                            <div class="card-header border-0">
                                <h3 class="card-title">지원중인인 지원자</h3>
                            </div>
                            <div class="card-body table-responsive p-10">
                                <table id="example2" style='text-align:center;'
                                       class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th style='width:30px;'>No.</th>
                                        <th>지원번호</th>
                                        <th>지원자명</th>
                                        <th>휴대전화</th>
                                        <th style='width:175px;'>이메일</th>
                                        <th style='width:125px;'>포트폴리오</th>
                                        <th style='width:185px;'>지원서보기</th>
                                        <th style='width:130px;'>상태</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php

                                    $nIndex = 1;
                                    $query = "select id,username,phone,email,apply_num,result_check_num,result_check from recruit_able_user where apply_step != 5  order by id desc";
                                    $Uresult = mysqli_query($con, $query);
                                    while ($Urow = mysqli_fetch_array($Uresult)) {
                                        $query = "select user_address,user_detailAddress,sel_tab_num,step0_view_sel,step0_view_sel2,sel2_tab_num,sel3_tab_num,sel4_tab_num,data1,data2,data3,data4,data5,data6,data7,data8,check_phone,data12,data13 from apply_step_1 where userid='$Urow[0]'";
                                        $ApplyResult1 = mysqli_query($con, $query);
                                        $ApplyRow1 = mysqli_fetch_array($ApplyResult1);

                                        $Urow[2] = Decrypt($Urow[2], $secret_key, $secret_iv);
                                        $Urow[3] = Decrypt($Urow[3], $secret_key, $secret_iv);

                                        echo "<tr id='tr_2_$Urow[0]'><td>$nIndex</td><td>$Urow[4]<br>( $Urow[0] )</td><td>$Urow[1]</td><td>$Urow[2]</td><td>$Urow[3]</td><td>";
                                        $strPdf = "../ktl/portfolio/" . $Urow[0] . ".pdf";
                                        if (file_exists("../ktl/portfolio/" . $Urow[0] . ".pdf")) {
                                            echo "<a href='$strPdf' target='_blank' class='btn btn-info'>새창으로 보기</a>";
                                        } else {
                                            echo "없음";
                                        }
                                        echo "</td><td><button class='btn btn-primary' onclick='onApplyView($Urow[0])'>지원페이지로 이동</button></td>";

                                        echo "<td><button class='btn btn-danger' onclick='onApplyDel($Urow[0],2)'>지원서 삭제</button></td>";


                                        echo "</tr>";

                                        $nIndex++;
                                    }
                                    mysqli_close($con);
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col-md-6 -->

                    <!-- /.col-md-6 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <?php
    include "php/footer.php";
    ?>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script>
    function onApplyDel(Id, nIndex) {
        if (confirm("정말로 삭제하시겠습니까? 모든 지원내용이 삭제가 됩니다.")) {
            $.post("php/fnc/apply_del.php",
                {
                    Id: Id
                },
                function (data, status) {
                    if (status != "fail") {
                        alert("해당 모든 지원내용이 삭제되었습니다.");
                        $("#tr_" + nIndex + "_" + Id).remove();
                    } else {
                        alert("네트워크 오류");
                    }
                });
        }
    }

    function onApplyView(Id) {
        location.href = 'http://ktl-recruit.ableup.kr/apply_view.html?Id=' + Id + "&userid=" + $("#sel_userid").val();
    }

    $(function () {
        $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["excel", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        $("#example2").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["excel", "colvis"]
        }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');

    });
</script>
</body>
</html>

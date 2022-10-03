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
                        <h1>면접관리스트</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">면접관관리</li>
                            <li class="breadcrumb-item active">면접관리스트</li>
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
                                <table id="example1" style='text-align:center;'
                                       class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th style='width:30px;'>No.</th>
                                        <th style='width:90px;'>아이디</th>
                                        <th style='width:80px;'>면접관 이름</th>
                                        <th style='width:80px;'>연락처</th>
                                        <th style='width:100px;'>이메일주소</th>
                                        <th style='width:300px;'>경력 & 설명</th>
                                        <th style='width:35px;'>비번리셋</th>
                                        <th style='width:25px;'>삭제</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    include "../../php/mysql.php";
                                    include "../../php/crypt.php";
                                    $nIndex = 1;
                                    $query = "select id,userid,username,userphone,pass,useremail,description from recruit_able_subadmin order by id desc";
                                    $result = mysqli_query($con, $query);
                                    while ($row = mysqli_fetch_array($result)) {
                                        $userphone = Decrypt($row['userphone'], $secret_key, $secret_iv);
                                        $useremail = Decrypt($row['useremail'], $secret_key, $secret_iv);
                                        $row['userphone'] = Decrypt($row['userphone'], $secret_key, $secret_iv);
                                        $row['useremail'] = Decrypt($row['useremail'], $secret_key, $secret_iv);
                                        $row['pass'] = Decrypt($row['pass'], $secret_key, $secret_iv);


                                        echo "<tr id='tr_$row[0]'><td>$nIndex</td><td>" . $row['userid'] . "</td><td>" . $row['username'] . "</td><td>" . $userphone . "</td><td>" . $useremail . "</td><td>" . $row['description'] . "</td><td><button   class='btn btn-info' onclick='onSubAdminReset(";
                                        echo json_encode($row, JSON_UNESCAPED_UNICODE); ?><?php echo ")' >리셋</button></td><td><button class='btn btn-danger' onclick='onSubAdminDel("; echo $row['id'] .")'>삭제</button></td></tr>";
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
            <button data-toggle='modal' data-target='#exampleModal' style="display: none" id="btn-update"></button>
        </section>


        <!-- Button trigger modal -->

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background: #17a2b8;color: white">
                        <h5 class="modal-title" id="exampleModalLabel"> 수정 </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" style="color: white">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="../../php/fnc/subadmin_update.php" id="onSubmit">
                        <div class="modal-body" id="form-Update">
                        </div>
                    </form>
                    <div class="modal-footer " style="margin: auto">
                        <button type="button" class="btn btn-primary" onclick="update()" style="background: #17a2b8;border: #17a2b8;">저장</button>
                    </div>
                </div>
            </div>
        </div>

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
    function onCh(Id) {
        location.href = 'notice_ch.html?Id=' + Id;
    }

    function onDel(Id) {
        if (confirm("정말로 삭제하시겠습니까?")) {
            $.post("../../php/fnc/notice_del.php",
                {
                    Id: Id,
                },
                function (data, status) {
                    if (status != "fail") {
                        alert("해당 공지내용이 삭제되었습니다.");
                        $("#tr_" + Id).remove();
                    } else {
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

    function  update(){
        $("#onSubmit").submit();
    }
    function onSubAdminReset(data) {
        console.log(data);
        $("#btn-update").click();
        data['pass'] ="";
        let html = ` <div class="form-group">
            <div>
            아이디
            </div>
                                        <input name="Id" id="id"  type="hidden" class="form-control"  placeholder="아이디" value="${data["id"]}"> <br>
                                        <input name="userid" id="아이디"  type="text" class="form-control"  placeholder="아이디" value="${data["userid"]}"> <br>
            <div>
            면접관 이름
            </div>
                                        <input name="username" id="면접관이름" type="text" class="form-control"  placeholder="면접관 이름" value="${data["username"]}"> <br>
             <div>
             연락처
            </div>
                                        <input name="phone" id="연락처" type="text" class="form-control"  placeholder="연락처" value="${data["userphone"]}"> <br>
<div>
이메일주소
</div>
                            <input name="email" id="이메일주소" type="text" class="form-control"  placeholder="경력 & 설명" value="${data["useremail"]}"><br>
            <div>
            패스워드
            </div>
                            <input name="pass" id="경력설명" type="text" class="form-control"  placeholder="패스워드를 입력해주세요." value="${data["pass"]}"> <br>

<div>
경력설명
</div>

                            <input name="description" id="경력설명" type="text" class="form-control"  placeholder="경력 & 설명" value="${data["description"]}">

                        </div>`
        $("#form-Update").empty();
        $("#form-Update").append(html);

    }

    function onSubAdminDel(Id) {
        if (confirm("정말로 삭제하시겠습니까?")) {
            $.post("../../php/fnc/subadmin_del.php",
                {
                    Id: Id,
                },
                function (data, status) {
                    if (status != "fail") {
                        alert("해당 면접관을 삭제되었습니다.");
                        $("#tr_" + Id).remove();
                    } else {
                        alert("네트워크 오류");
                    }
                });
        }
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
        });
    });
    $("#nav_3").attr("class", "nav-item menu-is-opening menu-open");
    $("#nav_3_1").attr("class", "nav-link active");
</script>
</body>
</html>

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
    $strtitle = "지원자현황";
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
<!--                                <button onclick='exportPdf()' class='btn btn-info mb-2' > PDF다운</button>-->
<!--                                <button  class='btn btn-warning mb-2' >이전 </button>-->
<!--                                <button  class='btn btn-success mb-2' >최종제출 </button>-->
                                <div id="dataPdf">
                                    <table  style='text-align:center;'  class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th style='border: 1px solid #dee2e6;width: 100px'>No.</th>
                                            <th style='border: 1px solid #dee2e6;width: 250px'>수험번호</th>
                                            <th style='border: 1px solid #dee2e6;width: 250px'>지원자명</th>
                                            <th style='border: 1px solid #dee2e6;width: 250px'>장애정도</th>
                                            <th style='border: 1px solid #dee2e6;width: 250px'>주전공</th>
                                            <th style='border: 1px solid #dee2e6;width: 250px'>부전공</th>
                                            <th style='border: 1px solid #dee2e6;width: 250px'>주요이력</th>
                                            <th style='border: 1px solid #dee2e6;width: 350px;'>대회/수상명</th>
                                            <th style='border: 1px solid #dee2e6;width: 250px'>수상구분</th>
                                            <th style='border: 1px solid #dee2e6;width: 350px'>포트폴리오</th>
                                            <th style='border: 1px solid #dee2e6;width: 350px'>메모</th>
                                            <th style='border: 1px solid #dee2e6;width: 350px'></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include "../../php/mysql.php";
                                            include "../../php/crypt.php";
                                            $nIndex = 1;

                                            $query = "select distinct u.note,a3.file_portlio,u.id,u.email,u.phone,a.is_disabilities,u.username,u.imp_uid, a2.major_main_id , a2.major_sub  from recruit_able_user u inner join apply_step_1 a on u.id = a.able_id inner join apply_step_2 a2 on a2.able_id = u.id inner join apply_step_3 a3 on a3.able_id = u.id where u.status_pass !='0'";
                                            $result = mysqli_query($con, $query);

                                            while ($row = mysqli_fetch_array($result)) {
                                                $sql = "select * from recruit_able_award m where m.able_id =" .$row[ 'id'];
                                                $resultSql = mysqli_query($con, $sql);

                                                $arr = $resultSql->fetch_all();
                                                $length = count($arr);
                                                if ($length < 2){
                                                    $length = 1;
                                                }

                                                ?>
                                                 <tr>
                                                    <th style='border: 1px solid #dee2e6;width: 100px' rowspan='<?php echo $length ?>'><?php echo $nIndex; ?></th>
                                                    <th rowspan='<?php echo $length; ?>' style='border: 1px solid #dee2e6;padding: 10px 25px'><?php echo $row['imp_uid']; ?></th>
                                                    <th rowspan='<?php echo $length; ?>' style='border: 1px solid #dee2e6;padding: 10px 25px'><?php echo $row['username']; ?></th>
                                                    <th rowspan='<?php echo $length; ?>' style='border: 1px solid #dee2e6;padding: 10px 25px'><?php echo $row['is_disabilities'] == 1 ? "중증" :'경증' ?></th>
                                                    <th rowspan='<?php echo $length; ?>' style='border: 1px solid #dee2e6;padding: 10px 25px'><?php
                                                        switch ($row['major_main_id']) {
                                                            case 1:
                                                                echo "바이올린";
                                                                break;
                                                            case 2:
                                                                echo "첼로";
                                                                break;
                                                            case 3:
                                                                echo "하프";
                                                                break;
                                                            case 4:
                                                                echo "풀루트";
                                                                break;
                                                            case 5:
                                                                echo "오보에";
                                                                break;
                                                            case 6:
                                                                echo "클라리넷";
                                                                break;
                                                            case 7:
                                                                echo "바순";
                                                                break;
                                                            case 8:
                                                                echo "트럼폣";
                                                                break;
                                                            case 9:
                                                                echo "호른";
                                                                break;
                                                            case 10:
                                                                echo "비올라";
                                                                break;
                                                            case 11:
                                                                echo "베이스";
                                                                break;
                                                            case 12:
                                                                echo "팀파니";
                                                                break;
                                                            case 0:
                                                                echo "기타 (직접작성)";
                                                                break;
                                                            default:
                                                                echo "error";
                                                        } ?></th>
                                                    <th rowspan='<?php echo $length; ?>' style='border: 1px solid #dee2e6;padding: 10px 25px'><?php
                                                        switch ($row['major_sub']) {
                                                            case 1:
                                                                echo "바이올린";
                                                                break;
                                                            case 2:
                                                                echo "첼로";
                                                                break;
                                                            case 3:
                                                                echo "하프";
                                                                break;
                                                            case 4:
                                                                echo "풀루트";
                                                                break;
                                                            case 5:
                                                                echo "오보에";
                                                                break;
                                                            case 6:
                                                                echo "클라리넷";
                                                                break;
                                                            case 7:
                                                                echo "바순";
                                                                break;
                                                            case 8:
                                                                echo "트럼폣";
                                                                break;
                                                            case 9:
                                                                echo "호른";
                                                                break;
                                                            case 10:
                                                                echo "비올라";
                                                                break;
                                                            case 11:
                                                                echo "베이스";
                                                                break;
                                                            case 12:
                                                                echo "팀파니";
                                                                break;
                                                            case 0:
                                                                echo "기타 (직접작성)";
                                                                break;
                                                            default:
                                                                echo "error";
                                                        } ?></th>
                                                     <th rowspan='<?php echo $length; ?>' style='border: 1px solid #dee2e6;padding: 0 25px'>
                                                <?php

                                                foreach ($arr as $item) {
                                                   echo $item[2] ."<br>";
                                                   }
                                                ?>
                                                     </th>
                                                     <?php
                                                     if ($length == 1){
                                                         ?>
                                                         <th  style='border: 1px solid #dee2e6;padding: 10px 25px'></th>
                                                         <th  style='border: 1px solid #dee2e6;padding: 10px 25px'></th>
                                                             <?php
                                                     }
                                                     foreach ($arr as $item) {
                                                         ?>
                                                         <th  style='border: 1px solid #dee2e6;padding: 10px 25px'>abd</th>
                                                         <th  style='border: 1px solid #dee2e6;padding: 10px 25px'>abd</th>
                                                             <?php
                                                         break;
                                                     }
                                                     ?>

                                                     <?php
                                                        if ($row['file_portlio'] != null ){
                                                            ?>
                                                            <th rowspan='<?php echo $length; ?>' style='border: 1px solid #dee2e6;'><button style='width:100px;border: none;background: none;color: blue;text-decoration: underline;' onclick="openFile('<?php echo $row['file_portlio'];?>')">미리보기</button></td>
                                                            <?php
                                                        }else{
                                                            ?>
                                                            <th rowspan='<?php echo $length; ?>' style='border: 1px solid #dee2e6;'>미첨부</td>
                                                            <?php
                                                        }
                                                     ?>

                                                     <th rowspan='<?php echo $length ?>'> <textarea id="note<?php echo $row['id']; ?>"><?php echo $row['note']; ?></textarea></th>
                                                     <th rowspan='<?php echo $length ?>'> <button class="btn btn-info" onclick="updateNote(<?php echo $row['id']; ?>)">수정</button></th>
                                                 </tr>
                                                     <?php

                                                if ($length > 1){
                                                    $sql2 = "select m.title from recruit_able_award m where m.able_id =" .$row['id'] ." limit 1 , 100";
                                                    $resultSql2 = mysqli_query($con, $sql2);
                                                    while ($row2 = mysqli_fetch_array($resultSql2)) {
                                                        ?>
                                                        <tr>
                                                            <th  style='border: 1px solid #dee2e6;padding: 0 25px'>abd</th>
                                                            <th  style='border: 1px solid #dee2e6;padding: 0 25px'>abd</th>
                                                        </tr>
                                                        <?php
                                                    }
                                                }
                                                $nIndex++;
                                            }
                                            mysqli_close($con);
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
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

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 1200px">
            <div class="modal-content">
                <div class="modal-header" style="background: #17a2b8;color: white">
                    <h5 class="modal-title" id="exampleModalLabel"> 포트폴리오 </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="color: white">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="table_profile" style="padding: 0.5rem">

                </div>
                <div class="modal-footer " style="margin: auto">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" style="background: #17a2b8;border: #17a2b8;">돌아와</button>
                </div>
            </div>
        </div>
    </div>
    <button data-toggle='modal' data-target='#exampleModal' style="display: none" id="btn-profile"></button>

    <!-- /.control-sidebar -->
</div>
<script>
    function preview(data) {
        let html = `
    <div>

        <div class="container-fluid ">
            <div class="row " style=" border-bottom: 1px solid grey">
                <div class="col " style=" font-size: 1.3rem; color: #212121;font-weight: bold;">
                    ?? ??? ??? ???? ?????.
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col " >
                    <span style=" font-size: 1.3rem; color: #212121;font-weight: bold;">???</span> 1989? (34?/? 33?) ?
                </div>
            </div>
        </div>

        <div class="container-fluid mt-2 mb-2" >
            <div class="row mx">
                <div>
                    <i class="fa-solid fa-square-envelope" style="color: grey"></i> <span>hihi@gmail.com</span>
                </div>
                <div class="mx">
                    <i class="fa-solid fa-phone" style="color: grey"></i> <span>0987678888</span>
                </div>
                <div class="mx">
                    <i class="fa-solid fa-mobile-screen-button" style="color: grey"></i> <span>0987679999</span>
                </div>
                <div class="mx">
                    <i class="fa-solid fa-house-user" style="color: grey"></i><span>Address: 123/123/123</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class=" col-lg-12 col-xl-6  col-md-12 col-sm-12 col-xs-12">
                <div class="container-fluid">
                    <div style="">
                        <div class="row mx" style=" margin-right: 1rem">
                         <div style=" font-size: 1.3rem; color: #212121;font-weight: bold;">
                                ????
                            </div>
                            <table class="table table-borderless" style="background: #fffffc">
                                <thead style="background: #F3EFF9;border-top: 1px solid">
                                <tr>
                                    <th scope="col">Handle</th>
                                    <th scope="col">First</th>
                                    <th scope="col">Last</th>
                                    <th scope="col">Handle</th>
                                    <th scope="col">Handle</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td scope="row">1</td>
                                    <td style="width= 20%">MarkMark MarkMarkMark MarkMarkMarkMarkMarkMark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                    <td>@mdo</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" col-lg-12 col-xl-6  col-md-12 col-sm-12 col-xs-12">
                <div class="container-fluid" >
                    <div style="">
                        <div class="row mx" style=" margin-right: 1rem">
                         <div style=" font-size: 1.3rem; color: #212121;font-weight: bold;">
                                ????
                            </div>
                            <table class="table table-borderless" style="background: #fffffc">
                                <thead style="background: #F3EFF9;border-top: 1px solid">
                                <tr>
                                    <th scope="col">Handle</th>
                                    <th scope="col">First</th>
                                    <th scope="col">Last</th>
                                    <th scope="col">Handle</th>
                                    <th scope="col">Handle</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td scope="row">1</td>
                                    <td style="width= 20%">MarkMark MarkMarkMark MarkMarkMarkMarkMarkMark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                    <td>@mdo</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div >
<div class="row">
            <div class=" col-lg-12 col-xl-6  col-md-12 col-sm-12 col-xs-12">
                <div class="container-fluid" >
                    <div style="">
                        <div class="row mx" style=" margin-right: 1rem">
                         <div style=" font-size: 1.3rem; color: #212121;font-weight: bold;">
                                ????
                            </div>
                            <table class="table table-borderless" style="background: #fffffc">
                                <thead style="background: #F3EFF9;border-top: 1px solid">
                                <tr>
                                    <th scope="col">Handle</th>
                                    <th scope="col">First</th>
                                    <th scope="col">Last</th>
                                    <th scope="col">Handle</th>
                                    <th scope="col">Handle</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td scope="row">1</td>
                                    <td style="width= 20%">MarkMark MarkMarkMark MarkMarkMarkMarkMarkMark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                    <td>@mdo</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" col-lg-12 col-xl-6  col-md-12 col-sm-12 col-xs-12">
                <div class="container-fluid" >
                    <div style="">
                        <div class="row mx" style=" margin-right: 1rem">
                         <div style=" font-size: 1.3rem; color: #212121;font-weight: bold;">
                                ????
                            </div>
                            <table class="table table-borderless" style="background: #fffffc">
                                <thead style="background: #F3EFF9;border-top: 1px solid">
                                <tr>
                                    <th scope="col">Handle</th>
                                    <th scope="col" style="text-align: center">First</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td scope="row">1</td>
                                    <td >MarkMark MarkMarkMark MarkMarkMarkMarkMarkMark</td>

                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div >
<div class="row">
            <div class=" col-lg-12 col-xl-6  col-md-12 col-sm-12 col-xs-12">
                <div class="container-fluid" >
                    <div style="">
                        <div class="row mx" style=" margin-right: 1rem">
                         <div style=" font-size: 1.3rem; color: #212121;font-weight: bold;">
                                ????
                            </div>
                            <table class="table table-borderless" style="background: #fffffc">
                                <thead style="background: #F3EFF9;border-top: 1px solid">
                                <tr>
                                    <th scope="col">Handle</th>
                                    <th scope="col">First</th>
                                    <th scope="col">Last</th>
                                    <th scope="col">Handle</th>
                                    <th scope="col">Handle</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td scope="row">1</td>
                                    <td style="width= 20%">MarkMark MarkMarkMark MarkMarkMarkMarkMarkMark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                    <td>@mdo</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" col-lg-12 col-xl-6  col-md-12 col-sm-12 col-xs-12">
                <div class="container-fluid" >
                    <div style="">
                        <div class="row mx" style=" margin-right: 1rem">
                         <div style=" font-size: 1.3rem; color: #212121;font-weight: bold;">
                                ????
                            </div>
                            <table class="table table-borderless" style="background: #fffffc">
                                <thead style="background: #F3EFF9;border-top: 1px solid">
                                <tr>
                                    <th scope="col">Handle</th>

                                </thead>
                                <tbody>
                                <tr>
                                    <td scope="row">1</td>

                                </tr>
                                <tr>
                                    <th scope="row">2</th>

                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div >
    </div>
        `
        $("#table_profile").empty();
        $("#table_profile").append(html);
        $("#btn-profile").click();
    }
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
    function openFile(data){
        window.open(data);
    }
    function onApplyView(Id,step)
    {
        location.href='http://ktl-recruit.ableup.kr/apply_view_interview.html?Id='+Id+"&step="+step+"&userid="+$("#sel_userid").val();
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

    function updateNote(id){
        if(confirm("정말로 삭제하시겠습니까?"))
        {
            $.post("../../php/fnc/update_noteUser.php",
                {
                    Id : id,
                    note : $("#note"+id).val()
                },
                function(data,status){
                    if(status != "fail"){

                        alert("해당 공지내용이 삭제되었습니다.");
                        location.reload();
                    }
                    else
                    {
                        alert("네트워크 오류");
                    }
                });
        }
    }

    $("#nav_4").attr("class","nav-item menu-is-opening menu-open");
    $("#nav_5_"+$("#SelId").val()).attr("class","nav-link active");
    $("#" + "nav_10").attr("class","nav-item menu-is-opening menu-open");
    $("#nav_11_"+$("#SelId").val()).attr("class","nav-link active");
    $("#" + "nav_14").attr("class","nav-item menu-is-opening menu-open");
    $("#nav_15_"+$("#SelId").val()).attr("class","nav-link active");
    $("#" + "nav_19").attr("class","nav-item menu-is-opening menu-open");
    $("#nav_20_"+$("#SelId2").val()).attr("class","nav-link active");
</script>
</body>
</html>

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
    echo "<input type='hidden' id='SelId2' value='$Id'/>";
    $strtitle = "";
    if($Id == 3) { $strtitle = "서류평가"; }
    else if($Id == 4) { $strtitle = "면접평가"; }
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
                                <button onclick='exportPdf()' class='btn btn-info mb-2' > PDF다운</button>
                                <button  class='btn btn-warning mb-2' >이전 </button>
                                <button  class='btn btn-success mb-2' >최종제출 </button>
                                <div id="dataPdf">
                                    <div id='dataPdf'>
                                        <table   style='text-align:center;padding: 5px;text-align:center;width: 100%' id='dataPdf' >
                                            <thead>
                                            <tr rowspan ='2'>
                                                <th rowspan ='2' style='border: 1px solid #dee2e6;'>no</th>
                                                <th rowspan ='2' style='border: 1px solid #dee2e6;'>수험번호</th>
                                                <th rowspan ='2' style='border: 1px solid #dee2e6;'>지원자명</th>
                                                <th rowspan ='2' style='border: 1px solid #dee2e6;'>장애정도</th>
                                                <th rowspan ='2' style='border: 1px solid #dee2e6;'>주전공</th>
                                                <th rowspan ='2' style='border: 1px solid #dee2e6;'>부전공</th>
                                                <th rowspan ='2' style='border: 1px solid #dee2e6;'>주요이력</th>
                                                <th rowspan ='2' style='border: 1px solid #dee2e6;'>대회/수상명</th>
                                                <th rowspan ='2' style='border: 1px solid #dee2e6;'></th>
                                                <th colspan ='4' style='border: 1px solid #dee2e6;'>평가점수</th>
                                                <th rowspan ='2' style='border: 1px solid #dee2e6;'></th>
                                                <th rowspan ='2' style='border: 1px solid #dee2e6;'>종합평가 (코멘트)</th>
                                            </tr>
                                            <tr>
                                                <th style='border: 1px solid #dee2e6;'>활동분야지식</th>
                                                <th style='border: 1px solid #dee2e6;'>활동경험</th>
                                                <th style='border: 1px solid #dee2e6;'>활동태도</th>
                                                <th style='border: 1px solid #dee2e6;'>총점</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                        <?php
                                        include "../../php/mysql.php";
                                        include "../../php/crypt.php";
                                        $nIndex = 1;
                                        if ($Id == 3){
                                            echo "
                                                   <tr rowspan ='2'>
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;width: 100px'>abc</th>
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;width: 250px'>abc</th>
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;width: 250px'>abc</th>   
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;width: 250px'>abc 1</th>   
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;width: 250px'>abc 2</th>    
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;width: 250px'>abc 3</th>    
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;width: 250px;'>abc</th>  
                                                    <th rowspan ='1' style='border: 1px solid #dee2e6;width: 250px;'>abc</th> 
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;'></th> 
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;width: 250px'>abc</th>
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;width: 250px'>abc</th>
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;width: 250px'>abc</th>
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;width: 250px'>abc</th>
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;'></th> 
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;width: 250px'>abc</th>  
                                                  </tr>
                                                 
                                                                <th style='border: 1px solid #dee2e6;padding: 0 20px'>
                                                                 abc
                                                                 </th>
                                                  </tr>
                                            ";
                                            echo "
                                              </tbody>
                                            </table>
                                            </div>
                                        </div>";

                                        }else{
                                            ?>

                                                   <tr rowspan ='2'>
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;padding: 0 20px'>abc</th>
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;padding: 0 20px'>abc</th>
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;padding: 0 20px'>abc</th>   
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;padding: 0 20px'>abc 1</th>   
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;padding: 0 20px'>abc 2</th>    
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;padding: 0 20px'>abc 3</th>    
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;padding: 0 20px ;width: 200px;'>abc</th>  
                                                    <th rowspan ='1' style='border: 1px solid #dee2e6;padding: 0 20px;width: 200px;'>abc</th> 
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;'></th> 
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;padding: 0 20px'>abc</th>
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;padding: 0 20px'>abc</th>
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;padding: 0 20px'>abc</th>
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;padding: 0 20px'>abc</th>
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;'></th> 
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;padding: 0 20px'>abc</th>  
                                                  </tr>
                                                 
                                                                <th style='border: 1px solid #dee2e6;padding: 0 20px'>
                                                                 abc
                                                                 </th>
                                                  </tr>
                                            <?php
                                            echo "
                                              </tbody>
                                            </table>
                                            </div>
                                        </div>";
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

    $("#nav_4").attr("class","nav-item menu-is-opening menu-open");
    $("#nav_5_"+$("#SelId").val()).attr("class","nav-link active");
    $("#" + "nav_10").attr("class","nav-item menu-is-opening menu-open");
    $("#nav_11_"+$("#SelId").val()).attr("class","nav-link active");
    $("#" + "nav_14").attr("class","nav-item menu-is-opening menu-open");
    $("#nav_15_"+$("#SelId").val()).attr("class","nav-link active");
    $("#" + "nav_19").attr("class","nav-item menu-is-opening menu-open");
    $("#nav_20_"+$("#SelId2").val()).attr("class","nav-link active");
    function exportPdf()
    {

        var mywindow = window.open('', 'my div', 'height=1000,width=1600');
        mywindow.document.write('<html><head><title>전형결과</title>');
        mywindow.document.write('</head><body>');
        mywindow.document.write($("#dataPdf").html());

        mywindow.document.write('</body></html>');

        mywindow.print();
        mywindow.close();

        return true;
    }
</script>
</body>
</html>

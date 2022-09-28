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

    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">

                    <div class="col-sm-6">
                        <h1>지원자관리</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <?php
                            $Id = $_GET["Id"];
                            if($Id == 1){
                                echo "<li class='breadcrumb-item active'>서류평가</li>";
                            }else {
                                echo "<li class='breadcrumb-item active'>면접평가</li>";
                            }
                            ?>
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
                            <div class="card-body" >
                                <?php
                                $Id = $_GET["Id"];
                                include "../../php/mysql.php";
                                include "../../php/crypt.php";

                                if($Id == 1){
                                    echo "
                                            <button onclick='exportPdf()' class='btn btn-info mb-2' > PDF다운</button>
                                            <div id='dataPdf'>
                                            <table   style='text-align:center;padding: 5px;    width: 100% '   style='text-align:center;' >
                                              <thead>
                                                 <tr rowspan ='2'>
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;padding: 0 20px'>no</th>
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;padding: 0 20px'>수험번호</th>
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;padding: 0 20px'>지원자명</th>   
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;padding: 0 20px'>평가위원 1</th>   
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;padding: 0 20px'>평가위원 2</th>    
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;padding: 0 20px'>평가위원 2</th>    
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;padding: 0 22px ;width: 200px;'>abc</th>  
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;padding: 0 20px;width: 200px;'>평가점수</th> 
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;'></th> 
                                                    <th colspan ='4' style='border: 1px solid #dee2e6;padding: 0 20px'>우대사항</th>
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;'></th> 
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;padding: 0 20px'>취업지원</th>  
                                                  </tr>
                                                  <tr>
                                                    <th style='border: 1px solid #dee2e6;padding: 0 20px;'>abc</th>
                                                    <th style='border: 1px solid #dee2e6;padding: 0 20px'>abc</th>
                                                    <th style='border: 1px solid #dee2e6;padding: 0 20px;'>abc</th>
                                                    <th style='border: 1px solid #dee2e6;padding: 0 20px;'>abc</th>
                                                    </tr>
                                              </thead>
                                              <tbody>";
//                                    $query="select id,code_profile,username,phone,email,level_disabilities,subject,sub_subject,Verifi,date from objection_info";
//                                    if($Id == 2 ){
//                                        $query =  $query . " where Verifi !='부적격'";
//                                    }else{
//                                        $query =  $query . " where Verifi !='부적격'";
//                                    }
//
//                                    $result = mysqli_query($con,$query);
//                                    $nIndex=0;
//                                    while($row = mysqli_fetch_array($result)){
                                        echo "
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
                                            ";
//                                       break;
//                                    }
                                    echo "
                                              </tbody>
                                            </table>
                                            </div>
                                        </div>";
                                }else{


                                    echo "
                                            <button onclick='exportPdf()' class='btn btn-info mb-2'> PDF다운</button>
                                            <div id='dataPdf' >
                                            <table   style='text-align:center;padding: 5px ' style='text-align:center;' >
                                              <thead>
                                                 <tr rowspan ='2'>
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;padding: 0 20px'>no</th>
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;padding: 0 20px'>수험번호</th>
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;padding: 0 20px'>지원자명</th>   
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;padding: 0 20px'>평가위원 1</th>   
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;padding: 0 20px'>평가위원 2</th>    
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;padding: 0 20px'>평가위원 2</th>    
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;padding: 0 22px ;width: 200px;'>abc</th>  
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;padding: 0 20px;width: 200px;'>평가점수</th> 
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;'></th> 
                                                    <th colspan ='4' style='border: 1px solid #dee2e6;padding: 0 20px'>우대사항</th>
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;'></th> 
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;padding: 0 20px'>취업지원</th>  
                                                  </tr>
                                                  <tr>
                                                    <th style='border: 1px solid #dee2e6;padding: 0 20px;'>abc</th>
                                                    <th style='border: 1px solid #dee2e6;padding: 0 20px'>abc</th>
                                                    <th style='border: 1px solid #dee2e6;padding: 0 20px;'>abc</th>
                                                    <th style='border: 1px solid #dee2e6;padding: 0 20px;'>abc</th>
                                                    </tr>
                                              </thead>
                                              <tbody>";
//                                    $query="select id,code_profile,username,phone,email,level_disabilities,subject,sub_subject,Verifi,date from objection_info";
//                                    if($Id == 2 ){
//                                        $query =  $query . " where Verifi !='부적격'";
//                                    }else{
//                                        $query =  $query . " where Verifi !='부적격'";
//                                    }
//
//                                    $result = mysqli_query($con,$query);
//                                    $nIndex=0;
//                                    while($row = mysqli_fetch_array($result)){
                                    echo "
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
                                            ";
//                                       break;
//                                    }
                                    echo "
                                              </tbody>
                                            </table>
                                            </div>
                                        </div>";
                                }
                                ?>


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
<script src="../../plugins/jquery/jquery.min.js"></script>
<script src="../../plugins/chart.js/Chart.min.js"></script>

<script src="https://js.pusher.com/7.2/pusher.min.js"></script>
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
    
    var pathname =window.location.href;
    var splitUrl = pathname.split('?');
    var value_result =splitUrl[1].split('=');
    var id = value_result[1];
    if(id ==1){
        $("#nav_15_2").attr("class","nav-link active");
    }else{
        $("#nav_15_3").attr("class","nav-link active");
    }

    $('.nav-item ul li a').each(function() {
        console.log($("#nav_15_2").hasClass('active'));
    if ($("#nav_15_2").hasClass('active')) {
        
        $("#nav_14").attr("class","nav-item menu-is-opening menu-open");
    }if($("#nav_15_3").hasClass('active')){
        $("#nav_14").attr("class","nav-item menu-is-opening menu-open");
    }
    })

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

    $("#" + "nav_4").attr("class","nav-item menu-is-opening menu-open");
    $("#nav_5_"+$("#SelId").val()).attr("class","nav-link active");
    $("#" + "nav_12").attr("class","nav-item menu-is-opening menu-open");
    $("#nav_13_"+$("#SelId").val()).attr("class","nav-link active");
    $("#" + "nav_10").attr("class","nav-item menu-is-opening menu-open");
    $("#nav_11_"+$("#SelId").val()).attr("class","nav-link active");
</script>
<script >
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


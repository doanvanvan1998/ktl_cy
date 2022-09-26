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
                            }else if ($id = 2 ){
                                echo "<li class='breadcrumb-item active'>면접평가</li>";
                            }else {
                                echo "<li class='breadcrumb-item active'>최종평가</li>";
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
                            <div class="card-body">
                                <?php
                                $Id = $_GET["Id"];
                                include "../../php/mysql.php";
                                include "../../php/crypt.php";

                                if($Id != 3){

                                    echo "
                                            <table id='#example1'  style='text-align:center;padding: 5px ' style='text-align:center;' >
                                              <thead>
                                                 <tr rowspan ='2'>
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;padding: 0 22px'>no</th>
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;padding: 0 22px'>수험번호</th>
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;padding: 0 22px'>지원자명</th>   
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;padding: 0 22px'>평가위원 1</th>   
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;padding: 0 22px'>평가위원 2</th>    
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;padding: 0 22px'>평가위원 3</th>  
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;padding: 0 22px'>평가점수</th> 
                                                     <th rowspan ='2' style='border: 1px solid #dee2e6;padding: 0 22px'>장애정도</th> 
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;'></th> 
                                                    <th colspan ='4' style='border: 1px solid #dee2e6;padding: 0 22px'>우대사항</th>
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;'></th> 
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;padding: 0 22px'>취업지원</th>  
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;padding: 0 22px'>저소득층</th> 
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;padding: 0 22px'>북한이탈주민</th>  
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;padding: 0 22px'>다문화</th> 
                                                  </tr>
                                                  <tr>
                                                    <th style='border: 1px solid #dee2e6;padding: 0 22px'>우대점수</th>
                                                    <th style='border: 1px solid #dee2e6;padding: 0 22px'>최종합계</th>
                                                    <th style='border: 1px solid #dee2e6;padding: 0 22px'>최종순위</th>
                                                    <th style='border: 1px solid #dee2e6;padding: 0 22px'>합격여부</th>
                                               <tr>
                                              </thead>
                                              <tbody>";

                                                    $query="select id,code_profile,username,phone,email,level_disabilities,subject,sub_subject,Verifi,date from objection_info";
                                                    if($Id == 2 ){
                                                        $query =  $query . " where Verifi !='부적격'";
                                                    }else{
                                                        $query =  $query . " where Verifi !='부적격'";
                                                    }

                                                    $result = mysqli_query($con,$query);
                                                    $nIndex=0;
                                                    while($row = mysqli_fetch_array($result)){
                                                        echo "
                                                                <tr id='tr_$row[0]'><td>$nIndex</td>
                                                                         <th  style='border: 1px solid #dee2e6;padding: 0 22px'>no</th>
                                                                        <th  style='border: 1px solid #dee2e6;padding: 0 22px'>수험번호</th>
                                                                        <th  style='border: 1px solid #dee2e6;padding: 0 22px'>지원자명</th>   
                                                                        <th  style='border: 1px solid #dee2e6;padding: 0 22px'>평가위원 1</th>   
                                                                        <th  style='border: 1px solid #dee2e6;padding: 0 22px'>평가위원 2</th>    
                                                                        <th  style='border: 1px solid #dee2e6;padding: 0 22px'>평가위원 3</th>  
                                                                        <th  style='border: 1px solid #dee2e6;padding: 0 22px'>평가점수</th> 
                                                                         <th  style='border: 1px solid #dee2e6;padding: 0 22px'>장애정도</th> 
                                                                        <th  style='border: 1px solid #dee2e6;'></th> 
                                                                        <th  style='border: 1px solid #dee2e6;padding: 0 22px'>우대사항</th>
                                                                        <th  style='border: 1px solid #dee2e6;'></th> 
                                                                        <th  style='border: 1px solid #dee2e6;padding: 0 22px'>취업지원</th>  
                                                                        <th  style='border: 1px solid #dee2e6;padding: 0 22px'>저소득층</th> 
                                                                        <th  style='border: 1px solid #dee2e6;padding: 0 22px'>북한이탈주민</th>  
                                                                        
                                                                <td>
                                                                    <select class='custom-select'  style='border: none'  name='verifi' onchange='updateVerifi(";echo $row['id'] ?><?php echo ")' id= ".$row['id'].">
                                                                    <option selected>".$row['Verifi']."</option>
                                                                    <option value='적격'>적격</option>
                                                                    <option value='부적격'>부적격</option>
                                                                  </select></td>
                                            ";
                                                    echo "
                                              </tbody>
                                            </table>
                                        </div>";
                                }
                                }else{


                                echo "
                                     <table id='example1' style='text-align:center;'  class='table table-bordered table-striped'>
                              <thead>
                              <tr>
                                  <th>No.</th>
                                  <th>수험번호</th>
                                  <th>지원자명</th>
                                  <th >주전공</th>
                                  <th >서류평가점수</th>
                                  <th>면접평가점수</th>
                                  <th>지원서 보기</th>
                                  <th>메모</th>
                                  <th>합격여부</th>
                               
                              </tr>
                              </thead>
                              <tbody>";

                                $query="select id,code_profile,username,phone,email,level_disabilities,subject,sub_subject,Verifi,date from objection_info";
                                if($Id == 2 ){
                                    $query =  $query . " where Verifi !='부적격'";
                                }else{
                                    $query =  $query . " where Verifi !='부적격'";
                                }

                                echo $query;
                                $result = mysqli_query($con,$query);
                                $nIndex=0;
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr id='tr_$row[0]'><td>$nIndex</td>
                                               <th></th>
                                              <th></th>
                                              <th ></th>
                                              <th ></th>
                                              <th></th>
                                              <td><button style='border: none;background: none;color: blue;text-decoration: underline;' onclick='preview(";echo json_encode($row, JSON_UNESCAPED_UNICODE); ?><?php echo ")' >미리보기</button></td>
                                         
                                              <th></th>
                                            <td>
                                                <select class='custom-select'  style='border: none'  name='verifi' onchange='updateVerifi(";echo $row['id'] ?><?php echo ")' id= ".$row['id'].">
                                                <option selected>".$row['Verifi']."</option>
                                                <option value='적격'>적격</option>
                                                <option value='부적격'>부적격</option>
                                              </select></td>
                                            ";

                                    echo "
                                              </tbody>
                                            </table>
                                        </div>";
                                }
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

    $("#" + "nav_10").attr("class","nav-item menu-is-opening menu-open");
    $("#nav_11_"+$("#SelId").val()).attr("class","nav-link active");
</script>
</body>
</html>


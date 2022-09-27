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
                                echo "<li class='breadcrumb-item active'>지원자현황</li>";
                            }else{
                                echo "<li class='breadcrumb-item active'>지원자통계</li>";
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
                                if($Id == 1){
//                                    include "../../php/mysql.php";
//                                    include "../../php/crypt.php";
//                                    $query="select id,code_profile,username,phone,email,level_disabilities,subject,sub_subject,Verifi,date from objection_info where Verifi !='부적격'";
//                                    $result = mysqli_query($con,$query);
                                    echo "
                            <table id='example1' style='text-align:center;'  class='table table-bordered table-striped'>
                              <thead>
                              <tr>
                                  <th>No.</th>
                                  <th>수험번호</th>
                                  <th>지원자명</th>
                                  <th >연락처</th>
                                  <th >이메일</th>
                                  <th>장애정도</th>
                                  <th>주전공</th>
                                  <th>부전공</th>
                                  <th>제출일</th>
                                  <th>지원서
                                      보기</th>
                                  <th>적격 검증</th>
                              </tr>
                              </thead>
                              <tbody>";
                                    $nIndex = 1;
//                                    while($row = mysqli_fetch_array($result)){
//                                        $row['phone'] = Decrypt($row['phone'],$secret_key,$secret_iv);
//                                        $row['email'] = Decrypt($row['email'],$secret_key,$secret_iv);
                                        echo "<tr id='10'><td>$nIndex</td>
                                        <td>abc</td>
                                        <td>abc</td>
                                        <td>abc</td>
                                        <td>abc</td>
                                        <td>abc</td>
                                        <td>abc</td>
                                        <td>abc</td>
                                        <td>abc</td>
                                        <td><button style='border: none;background: none;color: blue;text-decoration: underline;' onclick='preview(";echo json_encode(1, JSON_UNESCAPED_UNICODE); ?><?php echo ")' >미리보기</button></td>
                                        <td>
                                            <select class='custom-select'  style='border: none'  name='verifi' onchange='updateVerifi(";echo 1 ?><?php echo ")' id= 1>
                                            <option selected>적격</option>
                                            <option value='적격'>적격</option>
                                            <option value='부적격'>부적격</option>
                                          </select></td>
                            ";
                                        $nIndex++;
//                                    }
                                    echo "<a href='../../php/fnc/inquire_excel.php' style=' position: relative;top: 30px;z-index: 1; border: 1px #1e4a28 solid;background: #28a745;color: white;padding: 10px;border-radius: 22px;'>엑셀 파일 출력</a>
                              </tbody>
                            </table>
                          </div>";

//                                    mysqli_close($con);
                                }else{
                                    echo "<div class='container'>
                                    <div class='row'>
                                        <div class='col-6'>
                                        <canvas id='myChart' ></canvas>
                                        </div>
                                        <div class='col-6'>
                                        ";
                                    echo "
                                     <table class='table ' style='margin-top: 15px'>
                                      <thead  style='color:#523737'>
                                        <tr style='border-top:2px solid'>
                                          <th scope='col' class='border-0'  style='color:#e18181' >1</th>
                                          <th scope='col'  class='border-0'>경기</th>
                                          <th scope='col'  class='border-0'></th>
                                          <th scope='col'   class='border-0'></th>
                                          <th scope='col'  class='border-0' style='color:#b9adad'>10명</th>
                                          <th scope='col'  class='border-0'>10%</th>
                                        </tr>
                                        <tr >
                                          <th scope='col' class='border-0'  style='color:#e18181' >2</th>
                                          <th scope='col'  class='border-0'>경기</th>
                                          <th scope='col'  class='border-0'></th>
                                          <th scope='col'   class='border-0'></th>
                                          <th scope='col'  class='border-0' style='color:#b9adad'>20명</th>
                                          <th scope='col'  class='border-0'>20%</th>
                                        </tr><tr >
                                          <th scope='col' class='border-0'  style='color:#e18181' >3</th>
                                          <th scope='col'  class='border-0'>경기</th>
                                          <th scope='col'  class='border-0'></th>
                                          <th scope='col'   class='border-0'></th>
                                          <th scope='col'  class='border-0' style='color:#b9adad'>30명</th>
                                          <th scope='col'  class='border-0'>30%</th>
                                        </tr>
                                        <tr >
                                          <th scope='col' class='border-0'  style='color:#e18181' >4</th>
                                          <th scope='col'  class='border-0'>경기</th>
                                          <th scope='col'  class='border-0'></th>
                                          <th scope='col'   class='border-0'></th>
                                          <th scope='col'  class='border-0' style='color:#b9adad'>40명</th>
                                          <th scope='col'  class='border-0'>40%</th>
                                        </tr>
                                        
                                      </thead>
                                      </tbody>
                                    </table>
                          ";


                                    echo "
                                        </div>
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
    let dataChart =[];
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
<script>

    window.addEventListener('DOMContentLoaded', (event) => {
        setInterval(function () {
            refreshData();
        }, 1000);
        function refreshData() {
            fetch("/ktl_cy/admin/php/fnc/chart.php")
            .then(res=>res.json())
                .then(data => {
                    if (dataChart.length < 1){
                    dataChart =  data;
                    chart(dataChart);
                }else if (!equal(data,dataChart)){
                    dataChart = data;
                    chart(data);
                }})
                .catch(error => {console.log(error)})
        }
        refreshData();
    });
    function equal(data , dataChart){
        for (let i = 0 ; i < data.length ; i++){
            if (data[i] !=  dataChart[i]){
                return false;
            }
        }
        return true;
    }

    function chart(data){
        const ctx = document.getElementById('myChart');
        const myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: [
                    '학력',
                    '고졸',
                    '전문대',
                    '학사 (편입포함)',
                    '석사',
                    '박사',
                    '기타',
                ],
                datasets: [{
                    label: 'My First Dataset',
                    data: data,
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 95, 86)',
                        'rgb(255, 50, 86)',
                        'rgb(255, 120, 76)',
                        'rgb(255, 10, 66)',
                        'rgb(255, 140, 56)',
                    ],
                    hoverOffset: 4
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
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
        $("#nav_5_1").attr("class","nav-link active");
    }else{
        $("#nav_5_2").attr("class","nav-link active");
    }




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
    $("#" + "nav_12").attr("class","nav-item menu-is-opening menu-open");
    $("#nav_13_"+$("#SelId").val()).attr("class","nav-link active");
    $("#" + "nav_10").attr("class","nav-item menu-is-opening menu-open");
    $("#nav_11_"+$("#SelId").val()).attr("class","nav-link active");
    $("#" + "nav_14").attr("class","nav-item menu-is-opening menu-open");
    $("#nav_15_"+$("#SelId").val()).attr("class","nav-link active");
    $("#" + "nav_16").attr("class","nav-item menu-is-opening menu-open");
    $("#nav_17_"+$("#SelId").val()).attr("class","nav-link active");

  

</script>
</body>
</html>

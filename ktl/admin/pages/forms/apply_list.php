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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
                                    include "../../php/mysql.php";
                                    include "../../php/crypt.php";
                                    $query="select distinct u.status_pass,u.round_one,u.id,a.able_detailAddress,u.username,u.phone,u.email,u.imp_uid,u.status_pass,a3.sent_date,a.is_disabilities,a2.major_main_id, a2.major_sub  , a2.status_graduation_high_school, a2.graduation_high_school_year , a2.name_high_school from recruit_able_user u left join  apply_step_1 a on u.id = a.able_id left join apply_step_2 a2 on u.id = a2.able_id left join apply_step_5 a3 on u.id = a3.userid ";

                                    $result = mysqli_query($con,$query);
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
                                    while($row = mysqli_fetch_array($result)){
                                        $row['phone'] = Decrypt($row['phone'],$secret_key,$secret_iv);
                                        $row['email'] = Decrypt($row['email'],$secret_key,$secret_iv);
                                        echo "<tr><td>$nIndex</td>
                                        <td>". $row['imp_uid'] ."</td>
                                        <td>". $row['username'] ."</td>
                                        <td>". $row['phone']  ."</td>
                                        <td>". $row['email']  ."</td>
                                        <td>";  if ($row['is_disabilities'] == 1){
                                            echo "중증";
                                        }else{
                                            echo "경증";
                                        } echo "</td>
                                        <td>";
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
                                        }?>
                                        <td>
                                        <?php
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
                                        }
                                        ?>
                                        </td>
                                        <?php
                                        echo"</td>
                                        <td>". $row['sent_date'] ."</td>
                                        <td><button style='border: none;background: none;color: blue;text-decoration: underline;' onclick='preview(";echo json_encode($row, JSON_UNESCAPED_UNICODE); ?><?php echo ")' >미리보기</button></td>
                                        <td>
                                            <select class='custom-select'  style='border: none;width: 90px' id='status". $row['id']."'  onchange='updateStatusPass(";echo $row['id']; ?><?php echo ")' id= 1>
                                            <option selected>";
                                            switch ($row['status_pass']){
                                                case 1:
                                                    echo "적격";
                                                    break;
                                                case 0:
                                                    echo "불적격";
                                                    break;
                                                default:
                                                    echo "선택";
                                            }
                                            echo "</option>
                                            <option value='1'>합격</option>
                                            <option value='0'>불합격</option>
                                          </select></td>
                            ";
                                        $nIndex++;
                                    }
                                    echo "<a href='../../php/fnc/inquire_excel.php' style=' position: relative;top: 30px;z-index: 1; border: 1px #1e4a28 solid;background: #28a745;color: white;padding: 10px;border-radius: 22px;'>엑셀 파일 출력</a>
                              </tbody>
                            </table>
                          </div>";

                                    mysqli_close($con);
                                }else{
                                    ?>
                                <div >
                                    <div class='row'>
                                        <div class='col-6'>
                                            <canvas id='myChart'></canvas>
                                        </div>
                                        <div class='col-6'>
                                            <canvas id='ChartDisabilities'></canvas>
                                        </div>
                                    </div>
                                    <div class='row mt-5  justify-content-md-center' >
                                        <div class='col-6 mt-5'>
                                            <canvas id='ChartMajor'></canvas>
                                        </div>
                                    </div>
                                </div>
                                <?php
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

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 1200px">
            <div class="modal-content">
                <div class="modal-header" style="background: #17a2b8;color: white ;padding: 0.5rem">
                    <h5 class="modal-title" id="exampleModalLabel"> 수정 </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="color: white">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="table_profile" style="padding: 0.5rem">
                </div>
                <div class="modal-footer " style="margin: auto ; margin-top: -1.5rem" >
                    <button type="button" class="btn btn-primary" data-dismiss="modal"  style="background: #17a2b8;border: #17a2b8;">저장</button>
                </div>
            </div>
        </div>
    </div>
    <button data-toggle='modal' data-target='#exampleModal' style="display: none" id="btn-profile"></button>
</div>
<script src="../../plugins/jquery/jquery.min.js"></script>
<script src="../../plugins/chart.js/Chart.min.js"></script>

<script src="https://js.pusher.com/7.2/pusher.min.js"></script>

<script>
    let dataChart =[];
    let dataDisability =[];

    function updateStatusPass(Id)
    {
        if(confirm("해당 지원서를 통과하시겠습니까?"))
        {
            $.post("../../php/fnc/apply_pass.php",
                {
                    Id : Id,
                    category : "status_pass",
                    status : $("#status"+Id).val()
                },
                function(data,status){
                    console.log(data);
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
    dataDisability = [];
    dataMajor = [];
    DataExperience = [];
    window.addEventListener('DOMContentLoaded', (event) => {
        setInterval(function () {
            refreshData();
            refreshDataDisability();
            refreshDataMajor();
        }, 1000);
        function refreshData() {
            fetch("/admin/php/fnc/chart.php")
            .then(res=>res.json())
                .then(data => {
                    if (dataChart.length < 1){
                        dataChart = data;
                    chart('myChart',dataChart,['고등학교 미만 졸업','고졸','학원','대학교','석사','박사']);
                }else if (!equal(data,dataChart)){
                        dataChart = data;
                    chart('myChart',dataChart,['고등학교 미만 졸업','고졸','학원','대학교','석사','박사']);

                }})
                .catch(error => {console.log(error)})
        }
        refreshData();
        function refreshDataDisability() {
            fetch("/admin/php/fnc/chartDisability.php")
                .then(res=>res.json())
                .then(data => {
                    if (dataDisability.length < 1){
                        dataDisability = data;

                        chart("ChartDisabilities",dataDisability,['중증','경증']);
                    }else if (!equal(data,dataDisability)){
                        dataDisability = data;

                        chart("ChartDisabilities",dataDisability,['중증','경증']);
                    }})
                .catch(error => {console.log(error)})
        }
        refreshDataDisability();
        function refreshDataMajor() {
            fetch("/admin/php/fnc/chartMajor.php")
                .then(res=>res.json())
                .then(data => {
                    if (dataMajor.length < 1){
                        dataMajor = data;
                        chart("ChartMajor",dataMajor,['바이올린','첼로','하프','풀루트','오보에','클라리넷','바순','트럼폣','호른','비올라','베이스','팀파니','기타 (직접작성)']);
                    }else if (!equal(data,dataMajor)){

                        dataMajor = data;
                        chart("ChartMajor",dataMajor,['바이올린','첼로','하프','풀루트','오보에','클라리넷','바순','트럼폣','호른','비올라','베이스','팀파니','기타 (직접작성)']);
                    }})
                .catch(error => {console.log(error)})
        }
        refreshDataMajor();

    });
    function equal(data , dataChart){
        for (let i = 0 ; i < data.length ; i++){
            if (data[i] !=  dataChart[i]){
                return false;
            }
        }
        return true;
    }

    function chart(name,data ,labels){
        const ctx = document.getElementById(name);
        const myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels:labels,
                datasets: [{
                    label: 'My First Dataset',
                    data: data,
                    backgroundColor: [
                        'rgb(54, 162, 235)',
                        'rgb(255, 95, 86)',
                        'rgb(255, 50, 86)',
                        'rgb(255, 120, 76)',
                        'rgb(255, 10, 66)',
                        'rgb(255, 140, 56)',
                        'rgb(255, 30, 56)',
                        'rgb(255, 10, 56)',
                        'rgb(255, 255, 56)',
                        'rgb(255, 200, 56)',
                        'rgb(255, 50, 30)',
                        'rgb(255, 68, 10)',
                        'rgb(255, 72, 40)',
                    ],
                    hoverOffset: 4
                }]
            },
            options: {
                legend: {
                    display: true,
                    position: 'right',
                    align: "center",
                    boxWidth : 80,
                    boxHeight : 60,
                    padding : 10
                }
            }
        });
    }
    function checkName(name){
        switch (name) {
            case 1:
                name =  "바이올린";
                break;
            case 2:
                name = "첼로";
                break;
            case 3:
                name = "하프";
                break;
            case 4:
                name = "풀루트";
                break;
            case 5:
                name = "오보에";
                break;
            case 6:
                name = "클라리넷";
                break;
            case 7:
                name = "바순";
                break;
            case 8:
                name = "트럼폣";
                break;
            case 9:
                name = "호른";
                break;
            case 10:
                name = "비올라";
                break;
            case 11:
                name = "베이스";
                break;
            case 12:
                name = "팀파니";
                break;
            case 0:
                name = "기타 (직접작성)";
                break;
            default:
                name = "error";
        }
        return name;
    }
    function preview(data) {

        fetch("/admin/php/fnc/prize.php?Id="+data['id'])
            .then(res=>res.json())
            .then(dataPrize => {
                let htmlPrize ='';
                console.log(dataPrize);
                for (let i = 0 ; i < dataPrize.length; i++){
                    htmlPrize += `
                    <tr style="font-size: 14px">
                        <td>${dataPrize[i].title}</td>
                        <td>${dataPrize[i].date}</td>
                    </tr>
                    `
                }
                $('#dataPrize').empty();
                $('#dataPrize').append(htmlPrize);

            })
            .catch(error => {console.log(error)});

        fetch("/admin/php/fnc/university.php?Id="+data['id'])
            .then(res=>res.json())
            .then(dataUniversity => {
                console.log(dataUniversity);

                let htmlSchool='';
                if (data['status_graduation_high_school'] == 1){
                    htmlSchool = `<tr style="font-size: 14px">
                            <th scope="col">대학</th>
                            <th scope="col">  </th>
                            <th scope="col">${data['graduation_high_school_year'] == null ? "" : data['graduation_high_school_year'] } </th>
                            <th scope="col"> ${data['name_high_school'] == null ? "" : data['name_high_school'] }</th>
                            <th scope="col"></th>
                            <th scope="col"> </th>
                             <th scope="col"> </th>
                        </tr>`;
                }

                for (let i = 0 ; i < dataUniversity.length; i++){
                    if (dataUniversity[i].type_school == 'college'){
                        htmlSchool += `
                         <tr style="font-size: 14px">
                            <th scope="col">대학 학위</th>
                    `
                    }else if (dataUniversity[i].type_school == 'university'){
                        htmlSchool += `
                         <tr style="font-size: 14px">
                            <th scope="col">대학 학위</th>
                    `
                    }else if (dataUniversity[i].type_school == 'postgraduate' && dataUniversity[i].degree == 1 ){
                        htmlSchool += `
                         <tr style="font-size: 14px">
                            <th scope="col">석사 학위</th>
                    `
                    }else {
                        htmlSchool += `
                         <tr style="font-size: 14px">
                            <th scope="col">박사</th>
                    `
                    }
                    htmlSchool += `
                            <th scope="col">${dataUniversity[i].date_start}</th>
                            <th scope="col">${dataUniversity[i].date_end} </th>
                            <th scope="col"> ${dataUniversity[i].name}</th>
                            <th scope="col">${checkName(parseInt(dataUniversity[i].main_major))}</th>
                            <th scope="col">${dataUniversity[i].poit_average} </th>
                            <th scope="col">${dataUniversity[i].total_point} </th>
                        </tr>`
                }
                $('#degree').empty();
                $('#degree').append(htmlSchool);
            })
            .catch(error => {console.log(error)});
        fetch("/admin/php/fnc/resume.php?Id="+data['id'])
            .then(res=>res.json())
            .then(dataPrize => {
                let htmlResume ='';
                console.log(dataPrize);
                for (let i = 0 ; i < dataPrize.length; i++){
                    htmlResume += `
                            <tr style="font-size: 16px">
                                <th scope="row">${dataPrize[i].name_type}</th>
                            </tr>
                            <tr style="font-size: 14px">
                                <td>${dataPrize[i].content}</td>
                            </tr>
                    `
                }
                $('#resume').empty();
                $('#resume').append(htmlResume);

            })
            .catch(error => {console.log(error)});

        let html = `
        <div  >

        <div class="container-fluid ">
            <div class="row " style=" border-bottom: 1px solid grey">
                <div class="col " style=" font-size: 1.3rem; color: #212121;font-weight: bold;">
                   ${data['username']}
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col " >
                    <span style=" font-size: 1.3rem; color: #212121;font-weight: bold;"></span>
                </div>
            </div>
        </div>
        <div class="container-fluid mt-2 mb-2" style="margin-left: 8px;">
            <div class="row mx">
                <div class="mr-5">
                    <i class="fa-solid fa-square-envelope" style="color: grey"></i> <span>${data['email']}</span>
                </div>
                <div class=" mr-5">
                    <i class="fa-solid fa-phone" style="color: grey"></i> <span>${data['phone']}</span>
                </div>
                <div class="mr-5">
                    <i class="fa-solid fa-house-user" style="color: grey"></i><span>Address: ${data['able_detailAddress']}</span>
                </div>
            </div>
        </div>
        <!-- Content Header (Page header) -->

   <div class="row mt-3">
         <div class=" col-lg-12 col-xl-12  col-md-12 col-sm-12 col-xs-12">
          <div class="container-fluid" >
            <div class="row">
                <div class="col mx" style="margin-right: 1rem">
                    <div style=" font-size: 1.3rem; color: #212121;font-weight: bold;">
                        학력사항
                    </div>
                     <table class="table table-borderless" style="text-align: center">
                        <thead style="background:#e1fbff;border-top: 1px solid">
                        <tr style="font-size: 16px">
                            <th scope="col">학력</th>
                            <th scope="col">입학년일 </th>
                            <th scope="col">졸업년일 </th>
                            <th scope="col">학교명 </th>

                            <th scope="col">전공</th>
                            <th scope="col">학점</th>
                            <th scope="col">총점</th>
                        </tr>
                        </thead>
                        <tbody id="degree">

                        </tbody>
                    </table>
                </div>
            </div>
          </div>
        </div>

        <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 col-xl-6 mt-3">
             <div class="container-fluid">
                <div class="row">
                    <div class="col mx" style="margin-right: 1rem">
                        <div style=" font-size: 1.3rem; color: #212121;font-weight: bold;">
                            수상
                        </div>
                         <table class="table table-borderless">
                            <thead style="background:#e1fbff;border-top: 1px solid" >
                            <tr style="font-size: 16px">
                                <th scope="col">수상명</th>
                                <th scope="col">수상 날짜</th>
                            </tr>
                            </thead>
                            <tbody id="dataPrize">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 col-xl-6 mt-3">
             <div class="container-fluid">
                <div class="row">
                    <div class="col mx" style="margin-right: 1rem">
                        <div style=" font-size: 1.3rem; color: #212121;font-weight: bold;border-bottom: 1px solid">
                         자기소개서
                        </div>
                         <table class="table table-borderless">
                            <tbody id='resume'>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
        `
        $("#table_profile").empty();
        $("#table_profile").append(html);
        $("#btn-profile").click();
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

    function sort(){
        fetch("/admin/php/fnc/sortReview.php?=")
            .then(res=>res.json())
            .then(dataSort => {
                let htmlPrize ='';
                console.log(dataPrize);
                // for (let i = 0 ; i < dataPrize.length; i++){
                //     htmlPrize += `
                //     <tr style="font-size: 14px">
                //         <td>${dataPrize[i].title}</td>
                //         <td>${dataPrize[i].date}</td>
                //     </tr>
                //     `
                // }
                // $('#dataPrize').empty();
                // $('#dataPrize').append(htmlPrize);

            })
            .catch(error => {console.log(error)});


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
    $("#" + "nav_19").attr("class","nav-item menu-is-opening menu-open");
    $("#nav_20_"+$("#SelId").val()).attr("class","nav-link active");

  

</script>
</body>
</html>

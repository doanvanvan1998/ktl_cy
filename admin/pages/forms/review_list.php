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

    $pointResultOne=0;
    $pointResultTwo=0;


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
                            if ($Id == 1) {
                                echo "<li class='breadcrumb-item active'>서류평가</li>";
                            } else if ($id = 2) {
                                echo "<li class='breadcrumb-item active'>면접평가</li>";
                            } else {
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
                                echo "<input type='hidden' id='category' value='$Id'>";
                                if ($Id == 1) {
                                    echo "
                                            <table id=''  style='text-align:center;padding: 5px ' style='text-align:center;width: 100%' >
                                              <thead>
                                                 <tr rowspan ='2'>
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;padding: 0 22px'>no</th>
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;padding: 0 22px'>수험번호</th>
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;padding: 0 22px'>지원자명</th>   
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;padding: 0 22px'>평가위원 1</th>   
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;padding: 0 22px'>평가위원 2</th>    
                                                    
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;padding: 0 22px;color: blue'>평가점수</th> 
                                                     <th rowspan ='2' style='border: 1px solid #dee2e6;padding: 0 22px'>장애정도</th> 
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;'></th> 
                                                    <th colspan ='4' style='border: 1px solid #dee2e6;padding: 0 22px'>우대사항</th>
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;'></th> 
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;padding: 0 22px ;color: blue'>우대점수</th>  
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;padding: 0 22px;color: red'>최종합계</th> 
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;padding: 0 22px'>최종순위</th>  
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;padding: 0 22px'>합격여부</th> 
                                                  </tr>
                                                  <tr>
                                                    <th style='border: 1px solid #dee2e6;padding: 0 22px'>취업지원</th>
                                                    <th style='border: 1px solid #dee2e6;padding: 0 22px'>저소득층</th>
                                                    <th style='border: 1px solid #dee2e6;padding: 0 22px'>북한이탈주민</th>
                                                    <th style='border: 1px solid #dee2e6;padding: 0 22px'>다문화</th>
                                               <tr>
                                              </thead>
                                              <tbody>";

                                    $query10 = "select u.round_one,a.veterans,u.id,u.username,u.imp_uid,u.status_pass,a.is_disabilities,a.low_income,a.children_of_migrant_families,a.immigrant from recruit_able_user u inner join apply_step_1 a on a.able_id = u.id where u.status_pass != '0'";

                                    $result10 = mysqli_query($con, $query10);
                                    $nIndex = 1;
                                    while ($row = mysqli_fetch_array($result10)) {
                                        $sum = 0;
                                        if ($row['is_disabilities'] == 1) {
                                            $sum = 10;
                                        } else {
                                            $sum = 5;
                                        }

                                        if ($row['veterans'] == 1) {
                                            $sum = $sum + 10;
                                        }else if ($row['immigrant'] == 1 || $row['children_of_migrant_families'] == 1 || $row['low_income'] == 1){
                                            $sum = $sum + 5;
                                        }
                                        if ($sum > 15){
                                            $sum = 15;
                                        }

                                        echo "
                                                                <tr style='
                                                                
                                                                border: 1px solid #dee2e6;padding: 0 22px' id=20><td>$nIndex</td>
                                                                         <th  style='border: 1px solid #dee2e6;padding: 0 22px'>" . $row['imp_uid'] . "</th>
                                                                        <th  style='border: 1px solid #dee2e6;padding: 0 22px'>" . $row['username'] . "</th>            
                                                                        ";
                                        $query = "select p.point from recruit_able_point p inner join recruit_able_user u on p.able_id = u.id  where u.status_pass !='0' and p.able_id = " . $row['id'];
                                        $result = mysqli_query($con, $query);
                                        $medium = 0;
                                        while ($row1 = mysqli_fetch_array($result)) {
                                            $medium = $medium + $row1['point'];
                                            ?>
                                            <th style='border: 1px solid #dee2e6;padding: 0 22px'><?php echo $row1['point'] ?></th>
                                            <?php
                                        }
                                        $sumAll = 0;
                                        if ($row['is_disabilities'] == 1) {
                                            $sumAll = round($medium / 2, 2) + $sum;
                                        } else {
                                            $sumAll = round($medium / 2, 2) + $sum;
                                        }
                                        $pointResultOne = $sumAll;
                                        echo "   
                                                                        <th  style='border: 1px solid #dee2e6;padding: 0 22px'>" . $medium = round($medium / 2, 2) . "</th> 
                                                                        <th  style='border: 1px solid #dee2e6;'>";

                                        if ($row['is_disabilities'] == 1) {
                                            echo "중증";
                                        } else {
                                            echo "경증";
                                        }
                                        echo "</th>"; ?>
                                        <th style='border: 1px solid #dee2e6;'></th>
                                        <th style='border: 1px solid #dee2e6;padding: 0 22px'><?php echo $row['veterans'] == 1 ? "10%" : "5%"; ?></th>
                                        <th style='border: 1px solid #dee2e6;padding: 0 22px'><?php echo $row['low_income'] == 1 ? "v" : ""; ?></th>
                                        <th style='border: 1px solid #dee2e6;padding: 0 22px'><?php echo $row['immigrant'] == 1 ? "v" : ""; ?></th>
                                        <th style='border: 1px solid #dee2e6;padding: 0 22px'><?php echo $row['children_of_migrant_families'] == 1 ? "v" : ""; ?></th>
                                        <th style='border: 1px solid #dee2e6;'></th>
                                        <th style='border: 1px solid #dee2e6;padding: 0 22px'><?php echo $sum ?></th>
                                        <th style='border: 1px solid #dee2e6;padding: 0 22px'><?php echo $sumAll; ?></th>
                                        <th style='border: 1px solid #dee2e6;padding: 0 22px' id="<?php echo $row['id']?>">abc</th>

                                        <th style='border: 1px solid #dee2e6;padding: 0 22px'>
                                            <select class='custom-select' style='border: none;width: 90px' name='verifi'
                                                    id="status<?php echo $row['id']?>"
                                                    onchange='updateVerifi(<?php echo $row['id']?>)' >
                                                <option checked> <?php
                                                switch ($row['round_one']) {
                                                        case 1:
                                                            echo "합격";
                                                            break;
                                                        case 0:
                                                            echo "불합격";
                                                            break;
                                                        default:
                                                            echo "선택";
                                                    } ?></option>
                                                <option value='1'>합격</option>
                                                <option value='0'>불합격</option>
                                            </select></th>

                                        <?php
                                        $nIndex++;

                                    }
                                    echo "
                                              </tbody>
                                            </table>
                                        </div>";
                                    ?>
                                    <?php

                                } else if ($Id == 2) {
                                    echo "
                                            <table id='#example2'  style='text-align:center;padding: 5px ;width: 100%' >
                                              <thead>
                                                 <tr rowspan ='2'>
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;padding: 0 22px'>no</th>
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;padding: 0 22px'>수험번호</th>
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;padding: 0 22px'>지원자명</th>   
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;padding: 0 22px'>평가위원 1</th>   
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;padding: 0 22px'>평가위원 2</th>    
                                          
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;padding: 0 22px'>평가점수</th> 
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;'></th>
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;padding: 0 22px'>장애정도</th> 
                                                    <th rowspan ='1' style='border: 1px solid #dee2e6;padding: 0 22px'> 우대사항</th> 
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;padding: 0 22px'> 우대점수</th>
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;'></th> 
                                                     <th rowspan ='2' style='border: 1px solid #dee2e6;padding: 0 22px'> 최종합계</th>
                                                   <th rowspan ='2' style='border: 1px solid #dee2e6;padding: 0 22px'> 최종순위</th>  
                                                    <th rowspan ='2' style='border: 1px solid #dee2e6;padding: 0 22px'> 합격여부</th>   
                                                  </tr>
                                                  <tr>
                                                    <th style='border: 1px solid #dee2e6;padding: 0 22px'>취업지원</th>
                               
                                               <tr>
                                              </thead>
                                              <tbody>";

                                    $query10 = "select u.round_two,a.veterans,u.id,u.username,u.imp_uid,u.status_pass,a.is_disabilities,a.low_income,a.children_of_migrant_families,a.immigrant from recruit_able_user u inner join apply_step_1 a on a.able_id = u.id where u.status_pass !='0'";

                                    $result10 = mysqli_query($con, $query10);
                                    $nIndex = 1;
                                    while ($row = mysqli_fetch_array($result10)) {
                                        $sum = 0;
                                        if ($row['is_disabilities'] == 1) {
                                            $sum = 10;
                                        } else {
                                            $sum = 5;
                                        }

                                        echo "
                                                                <tr style='border: 1px solid #dee2e6;padding: 0 22px' id=20>
                                                                <td>$nIndex</td>
                                                                         <th  style='border: 1px solid #dee2e6;padding: 0 22px'>" . $row['imp_uid'] . "</th>
                                                                        <th  style='border: 1px solid #dee2e6;padding: 0 22px'>" . $row['username'] . "</th>            
                                                                        ";
                                        $query = "select p.point from recruit_able_point p inner join recruit_able_user u on p.able_id = u.id  where u.status_pass !='0' and p.able_id = " . $row['id'];
                                        $result = mysqli_query($con, $query);
                                        $medium = 0;
                                        while ($row1 = mysqli_fetch_array($result)) {
                                            $medium = $medium + $row1['point'];
                                            ?>
                                            <th style='border: 1px solid #dee2e6;padding: 0 22px'><?php echo $row1['point'] ?></th>
                                            <?php
                                        }

                                        $medium = round($medium/2,2);
                                        if ($row['is_disabilities'] == 1){
                                            $pointResultTwo = $medium + 10;
                                        }else{
                                            $pointResultTwo = $medium + 5;
                                        }
                                        echo " 
                                      
                                                    <th rowspan ='1' style='border: 1px solid #dee2e6;padding: 0 22px'>".$medium."</th> 
                                                    <th rowspan ='1' style='border: 1px solid #dee2e6;'></th>
                                                    <th rowspan ='1' style='border: 1px solid #dee2e6;padding: 0 22px'>"; echo $row['is_disabilities'] == 1 ? '중증' : '경증'; echo "</th> 
                                                    <th rowspan ='1' style='border: 1px solid #dee2e6;padding: 0 22px'> "; echo $row['is_disabilities'] == 1 ? '10' : '5'; echo "</th> 
                                                    <th rowspan ='1' style='border: 1px solid #dee2e6;padding: 0 22px'> "; echo $row['is_disabilities'] == 1 ? '10' : '5'; echo "</th>
                                                    <th rowspan ='1' style='border: 1px solid #dee2e6;'></th> 
                                                     <th rowspan ='1' style='border: 1px solid #dee2e6;padding: 0 22px'> "; echo $row['is_disabilities'] == 1 ? $medium +10 : $medium +5; echo "</th>
                                                   <th rowspan ='1' style='border: 1px solid #dee2e6;padding: 0 22px' id='".$row['id']."'> abc</th>  
                                                 
                                                      <th style='border: 1px solid #dee2e6;padding: 0 22px'>
                                                    <select class='custom-select' style='border: none;width: 90px' name='verifi' id='status".$row['id']."'
                                                            onchange='updateVerifi(".$row['id'].")' >
                                                        <option>"?>   <?php
                                                            switch ($row['round_two']) {
                                                                case 1:
                                                                    echo "합격";
                                                                    break;
                                                                case 0:
                                                                    echo "불합격";
                                                                    break;
                                                                default:
                                                                    echo   "선택";
                                                            }
                                                     echo "</option>
                                                        <option value='1'>합격</option>
                                                        <option value='0'>불합격</option>
                                                    </select></th>
                                                  </tr>            
                                            ";

                                        }
                                        echo "
                                                </tbody>
                                             </table>
                                            </div>";

                                } else {
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

                                    $query10 = "select distinct u.round_three,u.id,a.able_detailAddress,u.username,u.phone,u.email,u.imp_uid,u.status_pass,a3.sent_date,a.is_disabilities,a2.major_main_id, a2.major_sub  , a2.status_graduation_high_school, a2.graduation_high_school_year , a2.name_high_school from recruit_able_user u left join  apply_step_1 a on u.id = a.able_id left join apply_step_2 a2 on u.id = a2.able_id left join apply_step_5 a3 on u.id = a3.userid where u.status_pass !='0'";
                                    $result10 = mysqli_query($con, $query10);

                                    $nIndex = 0;
                                    while($row = mysqli_fetch_array($result10)){
                                    echo "<tr style='border: 1px solid #dee2e6;padding: 0 22px' id=20>
                                                                <td>$nIndex</td>
                                                                         <th  style='border: 1px solid #dee2e6;'>" . $row['imp_uid'] . "</th>
                                                                        <th  style='border: 1px solid #dee2e6;'>" . $row['username'] . "</th>  
                                              <th style='border: 1px solid #dee2e6;'>";?>
                                        <?php
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
                                        }
                                        ?>
                                        <?php echo "</th>
                                              <th style='border: 1px solid #dee2e6;' id='pointResultOne" . $row['id'] . "'></th>
                                              <th style='border: 1px solid #dee2e6; 'id='pointResultTwo" . $row['id'] . "'></th>
                                              
                                              <td style='border: 1px solid #dee2e6;'><button style='border: none;background: none;color: blue;text-decoration: underline;' onclick='preview(";echo json_encode(1, JSON_UNESCAPED_UNICODE); ?><?php echo ")' >미리보기</button></td>
                                              <th width='300px'> <textarea > </textarea></th>
                                            <td>
                                                <select class='custom-select'  style='border: none;width: 90px;' id='status".$row['id']."' name='verifi' onchange='updateVerifi(";echo $row['id']; ?><?php echo ")'>
                                                <option selected>";?>   <?php
                                        switch ($row['round_three']) {
                                            case 1:
                                                echo "합격";
                                                break;
                                            case 0:
                                                echo "불합격";
                                                break;
                                            default:
                                                echo "선택";
                                        }
                                        echo "</option>
                                                <option value='1'>적격</option>
                                                <option value='0'>부적격</option>
                                              </select></td>
                                              </tr>
                                            ";
                                    }
                                    echo "
                                              </tbody>
                                            </table>
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

    function updateVerifi(Id) {
        if(confirm("해당 지원서를 통과하시겠습니까?"))
        {
            $.post("../../php/fnc/apply_pass.php",
                {
                    Id : Id,
                    category : $("#category").val(),
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
    var pathname = window.location.href;
    var splitUrl = pathname.split('?');
    var value_result = splitUrl[1].split('=');
    var id = value_result[1];
    if (id == 1) {
        $("#nav_11_1").attr("class", "nav-link active");
    }
    if (id == 2) {
        $("#nav_11_2").attr("class", "nav-link active");
    }
    if (id == 3) {
        $("#nav_11_3").attr("class", "nav-link active");
    }


    function onApplyView(Id, step) {
        location.href = 'http://ktl-recruit.ableup.kr/apply_view.html?Id=' + Id + "&userid=" + $("#sel_userid").val();
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

    $("#" + "nav_4").attr("class", "nav-item menu-is-opening menu-open");
    $("#nav_5_" + $("#SelId").val()).attr("class", "nav-link active");
    $("#" + "nav_12").attr("class", "nav-item menu-is-opening menu-open");
    $("#nav_13_" + $("#SelId").val()).attr("class", "nav-link active");
    $("#" + "nav_10").attr("class", "nav-item menu-is-opening menu-open");
    $("#nav_11_" + $("#SelId").val()).attr("class", "nav-link active");

    function sortPoint(id) {
        let a =[];
        fetch("/ktl_cy/admin/php/fnc/sortReview.php?category="+id)
            .then(res => res.json())
            .then(data => {
                    a = data.sort((a, b) => {
                            return Number(b[1]) - Number(a[1]);
                        }
                    )
                    a.forEach((item,index) => {document.getElementById(item[0]).innerText = index+1;})
                }
            )
            .catch(error => {
                console.log(error)
            })
    }
    let category = $("#category").val();
    sortPoint(category);

    function getPoint(){
        fetch("/ktl_cy/admin/php/fnc/review_getPoint.php")
            .then(res => res.json())
            .then(data => {
                console.log(data);
                for (let i = 0 ; i < data.length ; i++){
                       document.getElementById("pointResultOne"+data[i][0]).innerHTML =  data[i][1];
                       document.getElementById("pointResultTwo"+data[i][0]).innerHTML =  data[i][2];
                    }
                }
            )
            .catch(error => {
                console.log(error)
            })
    }
    getPoint();

</script>
</body>
</html>


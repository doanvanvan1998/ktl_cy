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

                                if($Id == 1){
                                    echo "
                                            <table style='text-align: center' id='notify_table' class='table table-bordered table-striped'>
                                              <thead>
                                                 <tr >
                                                    <th   >선택</th>
                                                  
                                                    <th >no</th>   
                                                    <th >수험번호 </th>   
                                                    <th >지원자명</th>    
                                                    <th  >연락처</th>  
                                                    <th>이메일</th> 
                                                     <th >장애정도</th> 
                                           
                                                    <th  >주전공</th>
                                                    <th  >부전공</th>  
                                                    <th  >서류전형</th> 
                                                    <th  >면접전형</th>  
                                                    <th  >최종합격</th> 
                                                  </tr>
                                            
                                              </thead>
                                              <tbody>";

                                    $query="select distinct a2.major_main_id,a2.major_sub, u.round_two,u.round_one,u.round_three,u.phone,u.email,a.veterans,u.id,u.username,
                                             u.imp_uid,u.status_pass,a.is_disabilities,a.low_income,a.children_of_migrant_families,
                                             a.immigrant from recruit_able_user u inner join apply_step_1 a on a.able_id = u.id inner join apply_step_2 a2 on a2.able_id = u.id where u.status_pass !='0'";

                                    $result = mysqli_query($con,$query);
                                    $nIndex=1;
                                    while($row = mysqli_fetch_array($result)){
                                        $row['phone'] = Decrypt($row['phone'],$secret_key,$secret_iv);
                                        $row['email'] = Decrypt($row['email'],$secret_key,$secret_iv);
                                        ?>

                                               <tr>
                                                    <th style='border: 1px solid #dee2e6;'></th>
                                                    <th style='border: 1px solid #dee2e6;' ><?php echo $nIndex;?></th>
                                                    <th  style='border: 1px solid #dee2e6;'><?php echo $row['imp_uid'];?> </th>
                                                    <th   style='border: 1px solid #dee2e6;'><?php echo $row['username'];?></th>
                                                    <th  style='border: 1px solid #dee2e6;'><?php echo $row['phone'];?></th>
                                                    <th   style='border: 1px solid #dee2e6;'><?php echo $row['email'];?></th>
                                                     <th style='border: 1px solid #dee2e6;'><?php echo $row['is_disabilities'] ==1 ?"중증":"경증";?></th>
                                                    <th   style='border: 1px solid #dee2e6;'><?php
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
                                                        ?></th>
                                                   <th   style='border: 1px solid #dee2e6;'><?php
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
                                                       ?></th>
                                                    <th  style='border: 1px solid #dee2e6;'><?php switch ($row['round_one']) {
                                                            case 1:
                                                                echo "합격";
                                                                break;
                                                            case 0:
                                                                echo "불합격";
                                                                break;
                                                            default:
                                                                echo "선택";
                                                        } ?></th>
                                                    <th  style='border: 1px solid #dee2e6;'>
                                                        <?php switch ($row['round_two']) {
                                                            case 1:
                                                                echo "합격";
                                                                break;
                                                            case 0:
                                                                echo "불합격";
                                                                break;
                                                            default:
                                                                echo "선택";
                                                        } ?>
                                                    </th>
                                                    <th  style='border: 1px solid #dee2e6;'>
                                                        <?php switch ($row['round_three']) {
                                                            case 1:
                                                                echo "합격";
                                                                break;
                                                            case 0:
                                                                echo "불합격";
                                                                break;
                                                            default:
                                                                echo "선택";
                                                        }?></th>
                                                  </tr>
                                        <?php
                                    }
                                    echo "
                                              </tbody>
                                            </table>
                                        </div>";
                                }else{
                                    echo "
                                       <button class='btn btn-info' style=' position: relative; top: 35px; left: 0px' >선택삭제</button>
                                            <table style='text-align: center' id='example1'  class='table table-bordered table-striped'>
                                              <thead>
                                                 <tr>
                                                    <th    style='border: 1px solid #dee2e6;'>선택</th>
                                              
                                                    <th style='border: 1px solid #dee2e6;' >no</th>   
                                                    <th  style='border: 1px solid #dee2e6;'>구분 </th>   
                                                    <th   style='border: 1px solid #dee2e6;'>전송일시</th>    
                                                    <th  style='border: 1px solid #dee2e6;'>종류</th>  
                                                    <th   style='border: 1px solid #dee2e6;'>발신번호</th> 
                                                     <th style='border: 1px solid #dee2e6;'>발신 이메일</th> 
                                           
                                                    <th   style='border: 1px solid #dee2e6;'>수신자</th>
                                                    <th   style='border: 1px solid #dee2e6;'>발송내용</th>  
                                                    <th  style='border: 1px solid #dee2e6;'>발송결과</th> 
                                      
                                                  </tr>
                                            
                                              </thead>
                                              <tbody>";

//                                    $query="select id,code_profile,username,phone,email,level_disabilities,subject,sub_subject,Verifi,date from objection_info where Verifi !='부적격'";
//
//                                    $result = mysqli_query($con,$query);
                                    $nIndex=0;
//                                    while($row = mysqli_fetch_array($result)){
                                        echo "
                                               <tr>
                                                   <th    >abc</th>
                                              
                                                    <th >abc</th>   
                                                    <th  >abc </th>   
                                                    <th   >abc</th>    
                                                    <th>abc</th>  
                                                    <th  >abc</th> 
                                                     <th >abc</th> 
                                           
                                                     <td><button style='border: none;background: none;color: blue;text-decoration: underline;' onclick='preview(";echo json_encode(1, JSON_UNESCAPED_UNICODE); ?><?php echo ")' >미리보기</button></td>
                                                     <td><button style='border: none;background: none;color: blue;text-decoration: underline;' onclick='preview(";echo json_encode(1, JSON_UNESCAPED_UNICODE); ?><?php echo ")' >미리보기</button></td>
                                                    <th>
                                                    <div>abc</div>
                                                    <button type='button' class='btn btn-danger'>예약발송</button>
                                                    </th> 
                                                  </tr>
                                            ";
//                                       break;
//                                    }
                                    echo "
                                              </tbody>
                                            </table>
                                        </div>";
                                    $nIndex++;
                                }
                                mysqli_close($con);
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
        $("#nav_13_1").attr("class","nav-link active");
    }else{
        $("#nav_13_2").attr("class","nav-link active");
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
    $(document).ready( function () {
        $('#notify_table').DataTable();
    } );

    $("#" + "nav_4").attr("class","nav-item menu-is-opening menu-open");
    $("#nav_5_"+$("#SelId").val()).attr("class","nav-link active");

    $("#" + "nav_10").attr("class","nav-item menu-is-opening menu-open");
    $("#nav_11_"+$("#SelId").val()).attr("class","nav-link active");

    $("#" + "nav_12").attr("class","nav-item menu-is-opening menu-open");
    $("#nav_13_"+$("#SelId").val()).attr("class","nav-link active");


</script>
</body>
</html>


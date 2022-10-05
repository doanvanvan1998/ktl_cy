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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
                <table id="example1" style='text-align:center;'  class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style='width:30px;'>No.</th>
                    <th>지원번호</th>
                    <th>지원자명</th>
                    <th>휴대전화</th>
                    <th>이메일</th>
                    <th style='width:125px;'>포트폴리오</th>
                    <th style='width:125px;'>지원서보기</th>
                    <th style='width:55px;'>상태</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  include "../interviewer/php/mysql.php";
                  include "../interviewer/php/crypt.php";
                  $nIndex = 1;

                  $userid = $_SESSION["m_sub_user_id"];
                  $query="select id from recruit_able_subadmin where userid='$userid'";
                  $Aresult = mysqli_query($con,$query);
                  $Arow = mysqli_fetch_array($Aresult);


                  $query="select distinct p.id as point_id,p.verify,a10.file_portlio,p.point,u.status_pass,u.round_one,u.id,a.able_detailAddress,u.username,u.phone,u.email,u.imp_uid,u.status_pass,a3.sent_date,a.is_disabilities,a2.major_main_id, a2.major_sub  , a2.status_graduation_high_school, a2.graduation_high_school_year , a2.name_high_school from recruit_able_user u left join  apply_step_1 a on u.id = a.able_id left join apply_step_2 a2 on u.id = a2.able_id left join apply_step_5 a3 on u.id = a3.userid left join recruit_able_point p on u.id = p.able_id left join  apply_step_3 a10 on u.id = a10.able_id where p.id_subadmin = ".$Arow[0];
                  //quan
                  $Uresult = mysqli_query($con,$query);
                  while($Urow = mysqli_fetch_array($Uresult)) {
                      $Urow['phone'] = Decrypt($Urow['phone'], $secret_key, $secret_iv);
                      $Urow['email'] = Decrypt($Urow['email'], $secret_key, $secret_iv);
                      ?>
                      <tr>
                          <th><?php echo  $nIndex ?></th>
                          <th><?php echo  $Urow['imp_uid'];?></th>
                          <th><?php echo  $Urow['username'];?></th>
                          <th><?php echo  $Urow['email']; ?></th>
                          <th><?php echo  $Urow['phone']; ?></th>


                          <?php
                          if ($Urow['file_portlio'] != null ){
                              ?>
                              <th  ><button style='width:100px;border: none;background: none;color: blue;text-decoration: underline;' onclick="openFile('<?php echo $Urow['file_portlio'];?>')">미리보기</button></td>
                              <?php
                          }else{
                              ?>
                              <th >미첨부</td>
                              <?php
                          }
                          ?>
                          <td><button style='border: none;background: none;color: blue;text-decoration: underline;' onclick='preview(<?php echo json_encode($Urow, JSON_UNESCAPED_UNICODE); ?>)' >미리보기</button></td>

                          <td>
                              <select class='custom-select'  style='border: none;width: 90px'  onchange='updateStatusPass(<?php echo $Urow['point_id']?>)' id="status<?php echo $Urow['point_id']?>"  >
                                  <option selected>
                                      <?php
                                      switch ($Urow['verify']){
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
                                          </select></td>";?>

                      </tr>
                      <?php
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
  function onApplyView(Id)
  {
    location.href='http://ktl-recruit.ableup.kr/apply_view_interview.html?Id='+Id+"&userid="+$("#sel_userid").val();
  }
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["excel","colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
    function openFile(data){
        window.open(data);
    }
</script>
</body>
</html>

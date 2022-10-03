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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
          integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/3.2.40/vue.cjs.js"
            integrity="sha512-zdVl3VXeIbC+voYo4oJ7cIvMb8mP1l8LFe2pF0PlYlHwqEP0mcAyDIl1XSaQZwALrC2tYsFg+rww4TF4I/4lTA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
                        <h1></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">지원자현황</li>
                            <li class="breadcrumb-item active">
                                Chi tiết ứng viên
                            </li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>


        <div id="page1" class="container-fluid "
             style="overflow: scroll; height: 25rem; width: auto; position: relative">
            <div class="container-fluid" style="position: sticky; top: 0; z-index: 10">
                <div class="row"
                     style="background: darkgrey; color: #212121; font-weight: bold; margin-right: 1rem; margin-left: 1rem;">
                    <div style="padding: 1rem; display: flex; width: 100%">
                        <div class="col mx">
                            <span style=" font-size: 1.3rem;font-weight: bold;">임선균</span> 1989년 (34세/만
                            33세)
                            남
                        </div>
                        <div class="col mx">
                            <span style=" font-size: 1.3rem; font-weight: bold;">임선균</span> 1989년 (34세/만
                            33세)
                            남
                        </div>
                        <div class="col mx">
                            <span style=" font-size: 1.3rem; font-weight: bold;">임선균</span> 1989년 (34세/만
                            33세)
                            남
                        </div>
                        <div class="col" style="display: flex; justify-content: end; align-items: center">
                            <div style="font-size: 1.5rem; font-weight: bold">1/50</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid" style="margin-top: 1rem">
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


            <div class="container-fluid" style="margin-top: 1.5rem">
                <div style="">
                    <div class="row mx" style=" margin-right: 1rem">

                        <table class="table table-borderless" style="background: #fffffc">
                            <thead style="background:darkgrey ">
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
                                <th scope="row">1</th>
                                <td>Mark</td>
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


            <div class="container-fluid" style="margin-top: 1rem">
                <div class="row">
                    <div class="col mx" style="margin-right: 1rem">
                        <div style=" font-size: 1.3rem; color: #212121;font-weight: bold;">
                            채용정보
                        </div>
                        <table class="table table-bordered">
                            <thead style="background:darkgrey ">
                            <tr>
                                <th scope="col">vfvf</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
                                <th scope="col">Handle</th>
                            </tr>
                            </thead>
                            <tbody style="background: #fffffc">
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
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
                            <tr>
                                <th scope="row">3</th>
                                <td>Larry the Bird</td>
                                <td>@twitter</td>
                                <td>@mdo</td>
                                <td>@mdo</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="container-fluid" style="margin-top: 1rem">
                <div class="row">
                    <div class="col mx" style="margin-right: 1rem">
                        <div style=" font-size: 1.3rem; color: #212121;font-weight: bold;">
                            채용정보
                        </div>
                        <table class="table table-bordered">
                            <thead style="background:darkgrey ">
                            <tr>
                                <th scope="col">vfvf</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
                                <th scope="col">Handle</th>
                            </tr>
                            </thead>
                            <tbody style="background: #fffffc">
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
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
                            <tr>
                                <th scope="row">3</th>
                                <td>Larry the Bird</td>
                                <td>@twitter</td>
                                <td>@mdo</td>
                                <td>@mdo</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <!--        ba cai cuoi-->
        <div class="container-fluid">
            <div class="container-fluid" style="margin-top: 1rem">
                <div class="row">
                    <div class="col mx" style="margin-right: 1rem">
                        <div style=" font-size: 1.3rem; color: #212121;font-weight: bold; color: #0c84ff">
                            면접평가
                        </div>
                        <table class="table table-bordered">
                            <thead style="background: darkgrey" style="height: 0.2rem !important;">
                            <tr>
                                <th scope="col">vxcccccfvf</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
                            </tr>
                            </thead>

                            <tbody style="background: #fffffc">
                            <tr>
                                <th scope="row" >
                                    <input type="number" style="width: 100%; height: 2rem; border: none; outline: none " placeholder="number1">
                                </th>
                                <td>
                                    <input type="number" style="width: 100%; height: 2rem; border: none; outline: none " placeholder="number2">
                                </td>
                                <td>
                                    <input type="number" style="width: 100%; height: 2rem; border: none; outline: none " placeholder="number3">
                                </td>
                                <td>
                                    <input type="number" style="width: 100%; height: 2rem; border: none; outline: none " placeholder="number4">
                                </td>
                            </tr>
                            </tbody>


                        </table>
                    </div>
                </div>
            </div>


            <div class="container-fluid"
            ">

            <div class="row">
                <div class="col mx" style="margin-right: 1rem">
                    <table class="table table-bordered">
                        <thead style="background: darkgrey;">
                        <tr>
                            <th scope="col"
                                style="height: 0.2rem; display: flex; justify-content: center; align-items: center">vfvf
                            </th>
                        </tr>
                        </thead>
                        <tbody style="background: #fffffc">
                        <tr>
                            <th scope="col"
                                style="height: 0.2rem; display: flex; justify-content: center; align-items: center">vfvf
                            </th>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <div class="container-fluid"
        ">

        <div class="row">
            <div class="col mx" style="margin-right: 1rem">
                <table class="table table-bordered">
                    <thead style="background: darkgrey">
                    <tr>
                        <th scope="col"
                            style="height: 0.2rem; display: flex; justify-content: center; align-items: center">vfvf
                        </th>
                    </tr>
                    </thead>
                    <tbody style="background: #fffffc">
                    <tr>
                        <th scope="col"
                            style="height: 0.2rem; display: flex; justify-content: center; align-items: center">vfvf
                        </th>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<div class="container">
    <div onclick="prePage()" class="row" style="justify-content: center; align-items: center">
        <div style="cursor: pointer; color:white; display: flex; justify-content: center; align-items: center; clip-path: polygon(40% 0%, 40% 20%, 100% 20%, 100% 80%, 40% 80%, 40% 100%, 0% 50%); background: green; margin-right: 0.5rem; width: 10rem; height: 3rem">
            이전 페이지
        </div>
        <div onclick="nextPage()"
             style=" cursor: pointer; color: white; display: flex; justify-content: center; align-items: center; clip-path: polygon(0% 20%, 60% 20%, 60% 0%, 100% 50%, 60% 100%, 60% 80%, 0% 80%); background: blue; margin-left: 0.5rem ;width: 10rem; height: 3rem">
            다음 페이지
        </div>
    </div>


</div>

</div>
<!-- /.content-wrapper -->
<script>

    function nextPage() {
        document.getElementById("page1").classList.add("hide");
        var newPage = document.createElement("div");
        newPage.style.overflow = "scroll";
        newPage.style.height = "25rem";
        newPage.style.width = "auto";
        newPage.id = "page2";
        newPage.classList.add("page");
        newPage.innerHTML = `
        <h1>Page 2</h1>
        `;
        document.getElementById("page1").after(newPage);


    }

    function prePage() {

    }
</script>

<!--    --><?php
//    include "../../php/footer.php";
//    ?>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->

</div>


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
</body>
<style>
    .mx {
        margin-left: 1rem;
    }

    .hide {
        display: none;
    }
</style>
</html>

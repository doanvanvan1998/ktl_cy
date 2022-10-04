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
    <!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/3.2.40/vue.cjs.js"-->
    <!--            integrity="sha512-zdVl3VXeIbC+voYo4oJ7cIvMb8mP1l8LFe2pF0PlYlHwqEP0mcAyDIl1XSaQZwALrC2tYsFg+rww4TF4I/4lTA=="-->
    <!--            crossorigin="anonymous" referrerpolicy="no-referrer"></script>-->
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
        <?php
        include "../../php/mysql.php";
        include "../../php/crypt.php";
        $nIndex = 1;

        $nextUser = isset($_GET['nextUser']) ? $_GET['nextUser'] : 0;
        $query = "select distinct p.id as point_id,p.verify,a10.file_portlio,p.point,u.status_pass,u.round_one,u.id,a.able_detailAddress,u.username,u.phone,u.email,u.imp_uid,u.status_pass,a3.sent_date,a.is_disabilities,a2.major_main_id, a2.major_sub  , a2.status_graduation_high_school, a2.graduation_high_school_year , a2.name_high_school from recruit_able_user u left join  apply_step_1 a on u.id = a.able_id left join apply_step_2 a2 on u.id = a2.able_id left join apply_step_5 a3 on u.id = a3.userid left join recruit_able_point p on u.id = p.able_id left join  apply_step_3 a10 on u.id = a10.able_id where u.pointed=0 limit " . $nextUser . ",1";
        //quan

        $Uresult = mysqli_query($con, $query);
        $Urow = mysqli_fetch_array($Uresult);
        if ($Urow != null) {
            $Urow['phone'] = Decrypt($Urow['phone'], $secret_key, $secret_iv);
            $Urow['email'] = Decrypt($Urow['email'], $secret_key, $secret_iv);
        }

        if (isset($_GET['point'])) {
            $uPoint = $_GET['point'];
            $uKnowledgePoint = $_GET['point_knowledge'];
            $uExperiencePoint = $_GET['point_experience'];
            $uAttitudePoint = $_GET['point_attitude'];
            $uId = $_GET['userId'];
            $currentUserId = 1;


            $getPrevPointQuery = "SELECT * FROM `recruit_able_point` where able_id=$uId";
            $getPrevPointResult = mysqli_query($con, $getPrevPointQuery);
            $getPrevPointData = $getPrevPointResult->fetch_assoc();
            if (isset($getPrevPointData)) {
                mysqli_query($con, "DELETE FROM `recruit_able_point` WHERE id=" . $getPrevPointData['id']);
            }

            $savePointQuery = "INSERT INTO `recruit_able_point` (`id`, `point`, `able_id`, `id_subadmin`, `point_knowledge`, `point_experience`, `point_attitude`, `verify`)
                                    VALUES (NULL, '$uPoint', '$uId', '$currentUserId', '$uKnowledgePoint', '$uExperiencePoint', '$uAttitudePoint', '0');";

            $savePointRs = mysqli_query($con, $savePointQuery);

        }
        if (isset($_GET['confirm'])) {
            $confirmQuery = "UPDATE `recruit_able_point` SET verify = 1 WHERE id_subadmin = 1 AND verify = 0";
            mysqli_query($con, $confirmQuery);
            ?>
            <script>
                window.location.href = "evaluate_list.php?Id=3";
            </script>
            <?php
            die();
        }


        $userId = isset($Urow) ? $Urow['id'] : 0;

        ?>

        <div id="page1" class="container-fluid "
             style="overflow: scroll; height: 25rem; width: auto; position: relative">
            <div class="container-fluid" style="position: sticky; top: 0; z-index: 10">
                <div class="row"
                     style="background: darkgrey; color: #212121; font-weight: bold; margin-right: 1rem; margin-left: 1rem;">
                    <div style="padding: 1rem; display: flex; width: 100%">
                        <div class="col" style="display: flex; justify-content: end; align-items: center">
                            <div style="font-size: 1.5rem; font-weight: bold">
                                <?php
                                $countResult = mysqli_query($con, "SELECT count(id) as total from recruit_able_user where pointed = 0");
                                $countData = $countResult->fetch_assoc();
                                echo ($nextUser + 1) . "/" . $countData['total'];
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="container-fluid">
                <div class="" style=" margin-right: 1rem">
                    <!--                    <div id="table_profile" style="padding-left: 15px">-->
                    <!---->
                    <!--                    </div>-->

                    <div style="padding-left: 15px">
                        <div class="container-fluid ">
                            <div class="row " style=" border-bottom: 1px solid grey">
                                <div class="col " style=" font-size: 1.3rem; color: #212121;font-weight: bold;">
                                    <?php echo $Urow == null ? "" : $Urow['username'] ?>
                                </div>
                            </div>
                        </div>

                        <div class="container-fluid">
                            <div class="row">
                                <div class="col ">
                                    <span style=" font-size: 1.3rem; color: #212121;font-weight: bold;"></span>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid mt-2 mb-2" style="margin-left: 8px;">
                            <div class="row mx">
                                <div class="mr-5">
                                    <i class="fa-solid fa-square-envelope" style="color: grey"></i>
                                    <span><?php echo $Urow == null ? "" : $Urow['email']; ?></span>
                                </div>
                                <div class=" mr-5">
                                    <i class="fa-solid fa-phone" style="color: grey"></i>
                                    <span><?php echo $Urow == null ? "" : $Urow['phone']; ?></span>
                                </div>
                                <div class="mr-5">
                                    <i class="fa-solid fa-house-user"
                                       style="color: grey"></i><span>Address:<?php echo $Urow == null ? "" : $Urow['able_detailAddress']; ?></span>
                                </div>
                            </div>
                        </div>
                        <!-- Content Header (Page header) -->

                        <div class="row mt-3">
                            <div class=" col-lg-12 col-xl-12  col-md-12 col-sm-12 col-xs-12">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col mx" style="margin-right: 1rem">
                                            <div style=" font-size: 1.3rem; color: #212121;font-weight: bold;">
                                                학력사항
                                            </div>
                                            <table class="table table-borderless" style="text-align: center">
                                                <thead style="background:#e1fbff;border-top: 1px solid">
                                                <tr style="font-size: 16px">
                                                    <th scope="col">학력</th>
                                                    <th scope="col">입학년일</th>
                                                    <th scope="col">졸업년일</th>
                                                    <th scope="col">학교명</th>

                                                    <th scope="col">전공</th>
                                                    <th scope="col">학점</th>
                                                    <th scope="col">총점</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                if ($Urow != null) {
                                                    $queryThree = "select * from apply_step_2 p where p.able_id =" . $Urow['id'];

                                                    $UresultThree = mysqli_query($con, $queryThree);

                                                    while ($Urow3 = mysqli_fetch_array($UresultThree)) {

                                                        ?>
                                                        <tr style="font-size: 14px">
                                                            <th scope="col">대학</th>
                                                            <th scope="col"></th>
                                                            <th scope="col"><?php echo $Urow3['graduation_high_school_year'] == null ? "" : $Urow3['graduation_high_school_year'] ?></th>
                                                            <th scope="col"><?php echo $Urow3['name_high_school'] == null ? "" : $Urow3['name_high_school'] ?></th>
                                                            <th scope="col"></th>
                                                            <th scope="col"></th>
                                                            <th scope="col"></th>
                                                        </tr>
                                                        <?php
                                                    };
                                                    ?>

                                                    <?php
                                                }
                                                if ($Urow != null) {
                                                    $query4 = "select * from university p where p.able_id=" . $Urow['id'];

                                                    $Uresult4 = mysqli_query($con, $query4);
                                                    while ($Urow4 = mysqli_fetch_array($Uresult4)) {
                                                        if ($Urow4['type_school'] == 'college') {
                                                            ?>
                                                            <tr style="font-size: 14px">
                                                            <th scope="col">대학 학위</th>
                                                            <?php
                                                        } else if ($Urow4['type_school'] == 'university') {
                                                            ?>
                                                            <tr style="font-size: 14px">
                                                            <th scope="col">대학 학위</th>
                                                            <?php
                                                        } else if ($Urow4['type_school'] == 'postgraduate' && $Urow4['degree'] == 1) {
                                                            ?>
                                                            <tr style="font-size: 14px">
                                                            <th scope="col">석사 학위</th>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <tr style="font-size: 14px">
                                                            <th scope="col">박사</th>
                                                            <?php
                                                        }
                                                        ?>
                                                        <th scope="col"> <?php echo $Urow4['date_start']; ?></th>
                                                        <th scope="col"><?php echo $Urow4['date_end']; ?></th>
                                                        <th scope="col"><?php echo $Urow4['name']; ?></th>
                                                        <th scope="col"><?php switch ($Urow4['main_major']) {
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
                                                        <th scope="col"><?php echo $Urow4['poit_average']; ?></th>
                                                        <th scope="col"><?php echo $Urow4['total_point']; ?></th>
                                                        </tr>

                                                        <?php
                                                    };
                                                }
                                                ?>

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
                                                <thead style="background:#e1fbff;border-top: 1px solid">
                                                <tr style="font-size: 16px">
                                                    <th scope="col">수상명</th>
                                                    <th scope="col">수상 날짜</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                if ($Urow != null) {
                                                    $queryOne = "select * from recruit_able_award p where p.able_id =" . $Urow['id'];

                                                    $UresultOne = mysqli_query($con, $queryOne);
                                                    while ($Urow1 = mysqli_fetch_array($UresultOne)) {
                                                        ?>
                                                        <tr>
                                                            <td> <?php echo $Urow1['title']; ?></td>
                                                            <td><?php echo $Urow1['date']; ?></td>
                                                        </tr>
                                                        <?php
                                                    };
                                                }
                                                ?>
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
                                                <tbody>
                                                <?php
                                                if ($Urow != null) {

                                                    $queryTwo = "select * from main_resume p where p.able_id =" . $Urow['id'];

                                                    $UresultTwo = mysqli_query($con, $queryTwo);
                                                    while ($Urow2 = mysqli_fetch_array($UresultTwo)) {
                                                        ?>
                                                        <tr style="font-size: 16px">
                                                            <th scope="row"><?php echo $Urow2['name_type'] ?></th>
                                                        </tr>
                                                        <tr style="font-size: 14px">
                                                            <td><?php echo $Urow2['content'] ?></td>
                                                        </tr>
                                                        <?php
                                                    };
                                                }
                                                ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
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
                                <th scope="col">활동분야지식(30점)</th>
                                <th scope="col">활동경험(40점)</th>
                                <th scope="col">활동태도(30점)</th>
                                <th scope="col">합계</th>
                            </tr>
                            </thead>
                            <tbody style="background: #fffffc">
                            <?php
                            $getPointQuery = "SELECT * FROM `recruit_able_point` WHERE able_id = $userId";
                            $getPointResult = mysqli_query($con, $getPointQuery);
                            $pointData = $getPointResult->fetch_assoc();

                            if (!isset($pointData)) {
                                $pointData['point_knowledge'] = 0;
                                $pointData['point_experience'] = 0;
                                $pointData['point_attitude'] = 0;
                                $pointData['point'] = 0;
                            }
                            ?>
                            <tr>
                                <th scope="row">
                                    <input type="number" value="<?php echo $pointData['point_knowledge']; ?>"
                                           style="width: 100%; height: 2rem; border: none; outline: none "
                                           placeholder="number1" id="point_knowledge" onchange="onTypingPoint()">
                                </th>
                                <td>
                                    <input type="number" style="width: 100%; height: 2rem; border: none; outline: none "
                                           placeholder="number2" value="<?php echo $pointData['point_experience']; ?>"
                                           id="point_experience"
                                           onchange="onTypingPoint()">
                                </td>
                                <td>
                                    <input type="number" value="<?php echo $pointData['point_attitude']; ?>"
                                           style="width: 100%; height: 2rem; border: none; outline: none "
                                           placeholder="number3 " id="point_attitude" onchange="onTypingPoint()">
                                </td>
                                <td>
                                    <input type="number" value="<?php echo $pointData['point']; ?>"
                                           style="width: 100%; height: 2rem; border: none; outline: none "
                                           placeholder="number4" readonly id="point">
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
                                style="height: 0.2rem; display: flex; justify-content: center; align-items: center">종합평가 코멘트
                            </th>
                        </tr>
                        </thead>
                        <tbody style="background: #fffffc">
                        <tr>
                            <th scope="col"
                                style="height: 0.2rem; display: flex; justify-content: center; align-items: center">ㅇㄴㅇㄹㅇㄴ
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
                            style="height: 0.2rem; display: flex; justify-content: center; align-items: center">참고메모
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
    <div class="row" style="justify-content: center; align-items: center">

        <?php

        $prevUser = $nextUser - 1;
        if ($prevUser <= -1) {
            echo "<a class='pr-3' style='cursor: pointer; color:white; display: flex; justify-content: end; align-items: center; clip-path: polygon(40% 0%, 40% 20%, 100% 20%, 100% 80%, 40% 80%, 40% 100%, 0% 50%); background: green; margin-right: 0.5rem; width: 10rem; height: 3rem'>
            이전 페이지
        </a>";
        } else {

            echo "<a onclick='beforeClick(\"?nextUser=$prevUser\", 0, $userId)' class='pr-3' style='cursor: pointer; color:white; display: flex; justify-content: end; align-items: center; clip-path: polygon(40% 0%, 40% 20%, 100% 20%, 100% 80%, 40% 80%, 40% 100%, 0% 50%); background: green; margin-right: 0.5rem; width: 10rem; height: 3rem'>
            이전 페이지
        </a>";
        }

        $nextUser += 1;
        ?>
        <?php

        //        echo "<a class='btn btn-info' style='position: relative;left: 30px;margin-bottom: 15px;' onclick='preview("; ?><!-- -->
        <?php //echo json_encode($Urow10, JSON_UNESCAPED_UNICODE); ?><!-- --><?php //echo ")' >next</a>";

        if ($nextUser >= $countData['total']) {
            $nextUser--;
            echo "<a class='pl-3' onclick='beforeClick(\"?nextUser=$nextUser\", 1, $userId)' style='cursor: pointer; color:white; display: flex; justify-content: start; align-items: center;  clip-path: polygon(0% 20%, 60% 20%, 60% 0%, 100% 50%, 60% 100%, 60% 80%, 0% 80%); background: green; margin-right: 0.5rem; width: 10rem; height: 3rem'>다음 페이지</a>";
        } else {
            echo "<a class='pl-3' onclick='beforeClick(\"?nextUser=$nextUser\", 1, $userId)' style='cursor: pointer; color:white; display: flex; justify-content: start; align-items: center; clip-path: polygon(0% 20%, 60% 20%, 60% 0%, 100% 50%, 60% 100%, 60% 80%, 0% 80%); background: green; margin-right: 0.5rem; width: 10rem; height: 3rem'>다음 페이지</a>";
        }
        ?>

        <script>
            function beforeClick(href, type, userId) {
                if (type == 1) {
                    const obj = onTypingPoint();
                    if (obj.point > 0) {
                        href = `${href}&point_knowledge=${obj.point_knowledge}&point_experience=${obj.point_experience}&point_attitude=${obj.point_attitude}&point=${obj.point}&userId=${userId}`
                    }
                }
                window.location.href = href;
            }

            function onTypingPoint() {
                const obj = {
                    point_knowledge: $('#point_knowledge').val(Number($('#point_knowledge').val())).val(),
                    point_experience: $('#point_experience').val(Number($('#point_experience').val())).val(),
                    point_attitude: $('#point_attitude').val(Number($('#point_attitude').val())).val(),
                    point: 0
                }
                $('#point').val(Number(obj.point_knowledge) + Number(obj.point_experience) + Number(obj.point_attitude));
                obj.point = Number($('#point').val());
                return obj;
            }
        </script>
    </div>
    <?php
    echo "<a onclick='beforeClick(\"?confirm=1&nextUser=$nextUser\", 1, $userId)' class='btn btn-primary d-block' style='margin: auto; width: fit-content'>Confirm</a>";
    ?>


</div>

</div>
<!-- /.content-wrapper -->
<script>
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

<script>

    function preview(data) {
        fetch("/ktl_cy/admin/php/fnc/prize.php?Id=" + data['id'] + "&nextUser=<?php echo $nextUser + 1;?>")
            .then(res => res.json())
            .then(dataPrize => {
                let htmlPrize = '';
                console.log(dataPrize);
                for (let i = 0; i < dataPrize.length; i++) {
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
            .catch(error => {
                console.log(error)
            });

        fetch("/ktl_cy/admin/php/fnc/university.php?Id=" + data['id'])
            .then(res => res.json())
            .then(dataUniversity => {
                console.log(dataUniversity);
                let htmlSchool = '';
                if (data['status_graduation_high_school'] == 1) {
                    htmlSchool = `<tr style="font-size: 14px">
                            <th scope="col">대학</th>
                            <th scope="col">  </th>
                            <th scope="col">${data['graduation_high_school_year'] == null ? "" : data['graduation_high_school_year']} </th>
                            <th scope="col"> ${data['name_high_school'] == null ? "" : data['name_high_school']}</th>
                            <th scope="col"></th>
                            <th scope="col"> </th>
                             <th scope="col"> </th>
                        </tr>`;
                }

                for (let i = 0; i < dataUniversity.length; i++) {
                    if (dataUniversity[i].type_school == 'college') {
                        htmlSchool += `
                         <tr style="font-size: 14px">
                            <th scope="col">대학 학위</th>
                    `
                    } else if (dataUniversity[i].type_school == 'university') {
                        htmlSchool += `
                         <tr style="font-size: 14px">
                            <th scope="col">대학 학위</th>
                    `
                    } else if (dataUniversity[i].type_school == 'postgraduate' && dataUniversity[i].degree == 1) {
                        htmlSchool += `
                         <tr style="font-size: 14px">
                            <th scope="col">석사 학위</th>
                    `
                    } else {
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
            .catch(error => {
                console.log(error)
            });
        fetch("/ktl_cy/admin/php/fnc/resume.php?Id=" + data['id'])
            .then(res => res.json())
            .then(dataPrize => {
                let htmlResume = '';
                console.log(dataPrize);
                for (let i = 0; i < dataPrize.length; i++) {
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
            .catch(error => {
                console.log(error)
            });

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

    function checkName(name) {
        switch (name) {
            case 1:
                name = "바이올린";
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

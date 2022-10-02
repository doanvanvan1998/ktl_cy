<!DOCTYPE html>
<?php include 'php/common_header.php' ?>
<link rel="stylesheet" href="css/login.css">
<link rel="stylesheet" href="css/infor_general.css">
<body id="pdf">
<div class="wrap">
    <?php include 'php/common_header_menu.php' ?>

    <div class="container-fluid" style="margin-top: 2rem; margin-bottom: 1rem">
        <div class="container">
            <div class="row">
                <div class="col text_main">
                    채용정보 입사지원담당자 채용 Q&A 공지사항
                </div>
            </div>

            <div class="row" style="margin-top: 1rem">
                <span class="text_main2">임선균</span> 1989년 (34세/만 33세) 남
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="container" style="margin-top: 1rem">
                    <div class="row ">
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
                    <div style="display: flex; justify-content: end; align-items: center"
                         onclick="exportFile()">
                        <i class="fa-regular fa-file-pdf" style="color: red; font-size: 2rem; cursor: pointer"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <table class="table table-borderless">
                <thead class="table1">
                <tr>
                    <th scope="col">xcdc#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1cd</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!--    table-->
    <div class="container">
        <div class="row">
            <div>
                <span class="text_main2">학력</span> 최종학력 대학원 <span style="color: red">석사</span> 휴학중
            </div>
            <table class="table table-bordered">
                <thead style="background: lightgrey">
                <tr>
                    <th scope="col">#</th>
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
    <div class="container" style="margin-top: 1rem">
        <div class="row">
            <div>
                <span class="text_main2">경력</span> 총 <span style="color:red;">8</span> 년 <span
                        style="color: red">6</span> 개월
            </div>
            <table class="table table-bordered">
                <thead style="background: lightgrey">
                <tr>
                    <th scope="col">#</th>
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
    <div class="container" style="margin-top: 1rem">
        <div class="row">
            <div>
                <span class="text_main2">대외활동</span>
            </div>
            <table class="table table-bordered">
                <thead style="background: lightgrey">
                <tr>
                    <th scope="col">#</th>
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
    <div class="container " style="margin-top: 1rem">
        <div class="row">
            <div>
                <span class="text_main2">자격증/어학/수상내역</span>
            </div>
            <table class="table table-bordered">
                <thead style="background: lightgrey">
                <tr>
                    <th scope="col">lorem</th>
                    <th scope="col">First</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">3</th>
                    <td colspan="3">Larry the Bird</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td colspan="3">Larry the Bird</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div  st>
    <div class="container" style="margin-top: 1rem">
        <div class="row">
            <div>
                <span class="text_main2">포트폴리오/기타문서
</span>
            </div>
            <table class="table table-bordered">
                <thead style="background: lightgrey">
                <tr>
                    <th scope="col">#</th>
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


    <div class="container" style="margin-top: 1rem; padding: unset">
        <div class="text_main2">
            자기소개서
        </div>
        <div class="row">
            <div class="col">
                <div class="table_last">
                    <div>
                        <div>
                            <div class="text_main2">
                                [성장과정]
                            </div>
                            <div>
                                열심히 하겠습니다
                            </div>
                        </div>

                        <div class="mt">


                            <div class="text_main2">
                                [성격의 장단점]

                            </div>
                            <div>
                                열심히 하겠습니다
                            </div>

                        </div>
                        <div class="mt">

                            <div class="text_main2">
                                [생활신조 및 가치관]

                            </div>
                            <div>
                                열심히 하겠습니다
                            </div>

                        </div>
                        <div class="mt">

                            <div class="text_main2">
                                [직장경력 및 특별활동]
                            </div>
                            <div>
                                열심히 하겠습니다
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--    --><?php //include 'php/common_footer.php' ?>
    <script>
        function exportFile() {
            //export to pdf
            var mywindow = window.open('', 'my div', 'height=1000,width=1600');
            mywindow.document.write('<html><head><title>전형결과</title>');
            mywindow.document.write('</head><body>');
            mywindow.document.write($("#pdf").html());

            mywindow.document.write('</body></html>');

            mywindow.print();
            mywindow.close();

            return true;

        }
    </script>
</div>
<?php include 'php/common_script.php' ?>
</body>
</html>

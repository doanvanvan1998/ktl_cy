<!DOCTYPE html>
<?php include 'php/common_header.php' ?>
<link rel="stylesheet" href="css/applicationcorrection.css">
<link rel="stylesheet" href="css/login.css">
<body>


<div class="wrap">
    <?php include 'php/common_header_menu.php' ?>

    <div class="contents_wrap">
        <div class="container">
            <div class="title flex">
                <h2>지원서 수정</h2>
                <div class="flex">
                    <span>Home</span>
                    <img src="images/icons/ic_next.png" alt="">
                    <span>지원관리</span>
                    <img src="images/icons/ic_next.png" alt="">
                    <span class="on">지원서 수정</span>
                </div>
            </div>
            <div class="notice">
                <div class="flex">
                    <img src="images/icons/ic_ktl2.png" alt="KTL">
                    <div class="notice_con flex-direction">
                        <span>· 입사지원서는 <span>마감시간 전까지 수정 가능하나, 지원서 제출 이후에는 수정이 불가</span>합니다.</span>
                        <span>· 마감시간이 지나면 <span>지원서 작성 및 제출이 불가하니 지원서는 마감시간 전까지 반드시 제출</span>하여 주시기 바랍니다.</span>
                        <span>· 마감시간 전까지 <span>지원서를 제출하지 않으시면 응시하지 않은 것으로 처리</span>됩니다. 작성 중인 지원서는 <span>반드시 기간 내에 제출</span>하여 주시기 바랍니다.</span>
                    </div>
                </div>
            </div>

            <form method="post" id="form_login">
                <div class="login_form">
                    <div class="login flex-direction">
                        <div class="flex-direction">
                            <span>이름</span>
                            <input type="text" id='username' name="username" placeholder="이름을 입력해주세요.">
                        </div>
                        <div class="flex-direction">
                            <span>이메일</span>
                            <input type="text" id='useremail' name="useremail" placeholder="이메일을 입력해주세요.">
                        </div>
                        <div class="flex-direction">
                            <span>비밀번호</span>
                            <input type="password" id='userpass' name="userpass"
                                   placeholder="비밀번호를 입력해주세요.( 지원서 입력시 등록한 비밀번호 )">
                        </div>
                        <button class="btn_login flex" type="submit"><span>본인확인</span></button>
                    </div>
                    <div style='font-size:14px;text-align:center;'>이메일 /비밀번호를 잊어버리셨나요? <strong style='cursor:pointer;'
                                                                                               onclick='onFindPw()'>이메일
                            /
                            비밀번호 찾기</strong></div>
                </div>
            </form>


            <script type="text/javascript" src="https://cdn.iamport.kr/js/iamport.payment-1.1.5.js"></script>
            <script>

                $('#form_login').submit(function (e) {
                    e.preventDefault();
                    $.post("php/fnc/login.php", {
                            email: $("#username").val(),
                            pass: $("#useremail").val(),
                            name: $("#userpass").val()
                        },
                        function (data, status) {
                            if (status != "fail") {
                                if (data == "success") {
                                    window.location.href = "../../ktl_cy/ktl/index.php";
                                } else {
                                    alert(" please check your email or password");
                                }
                            } else {
                                alert('không thành công')
                            }
                        });
                });

            </script>
            <div class="table" id='apply_list_view' style='display:none;'>
                <table>
                    <thead>
                    <tr>
                        <th>수험번호</th>
                        <th>공고명</th>
                        <th>공고기간</th>
                        <th>접수현황</th>
                        <th>비고</th>
                    </tr>
                    </thead>
                    <tbody id='user_apply_list'>

                    </tbody>
                </table>
            </div>
            <div class="table table_mobile">
                <div class="flex-direction" id='apply_list_view_m'>

                </div>
            </div>
            <div class="sns flex-direction">
                <h2>한국산업기술시험원의 다양한 소식을 확인하세요.</h2>
                <div class="flex sns_wrap">
                    <a href="https://www.ktl.re.kr/main.do"><img src="images/icons/ic_homepage.png" alt="홈페이지"></a>
                    <a href="https://blog.naver.com/ktl_blog"><img src="images/icons/ic_blog.png" alt="블로그"></a>
                    <a href="https://www.youtube.com/channel/UCf4ZOUfSJOJ1mbvKjMcLMCQ"><img
                                src="images/icons/ic_youtube.png" alt="유튜브"></a>
                    <a href="https://ko-kr.facebook.com/KoreaTestingLab"><img src="images/icons/ic_facebook.png"
                                                                              alt="페이스북"></a>
                </div>
            </div>
        </div>
    </div>
    <?php include 'php/common_footer.php' ?>
</div>
<?php include 'php/common_script.php' ?>

</body>
</html>

<!DOCTYPE html>
<?php include 'php/common_header.php' ?>
<link rel="stylesheet" href="css/result.css">
<link rel="stylesheet" href="css/login.css">
<body>
<div class="wrap">
    <?php include 'php/common_header_menu.php' ?>
    <div class="contents_wrap">
        <div class="container">
            <div class="title flex">
                <h2>이메일 / 비밀번호찾기</h2>
                <div class="flex">
                    <span>Home</span>
                    <img src="images/icons/ic_next.png" alt="">
                    <span class="on">이메일 / 비밀번호찾기</span>
                </div>
            </div>
            <div class="result_notice flex-direction">
                <div class="flex-direction comment">
                    <h6>유의사항</h6>
                    <span>
              · 이력서 작성시 기본정보에 등록된 이름과 휴대폰번호를 입력하시기 바랍니다.<br>
              · 휴대폰 본인인증을 통해 해당 지원자의 이메일 / 비밀번호를 알려드립니다.
            </span>
                </div>
            </div>
            <div class="login_form">
                <div class="login flex-direction">
                    <div class="flex-direction">
                        <span>이름</span>
                        <input type="text" id='username' placeholder="이름을 입력해주세요." required>
                    </div>
                    <div class="flex-direction">
                        <span>연락처</span>
                        <input type="text" id='userphone' placeholder="휴대폰번호를 입력해주세요." required>
                    </div>
                    <div class="flex-direction" id='email_view' style='display:none;'>
                        <span>찾으시는 이메일</span>
                        <input type="text" readonly id='useremail' required>
                    </div>
                    <div class="flex-direction" id='pass_view' style='display:none;'>
                        <span>찾으시는 비밀번호</span>
                        <input type="text" readonly id='userpass' required>
                    </div>
                    <div class="btn_login flex" id='btn_pass' onclick='onUserCheck()'><span>비밀번호 찾기</span></div>
                </div>
            </div>
            <script type="text/javascript" src="https://cdn.iamport.kr/js/iamport.payment-1.1.5.js"></script>
            <script>
                function onUserCheck() {
                    if ($("#username").val() == "") {
                        alert("이름을 입력하시기 바랍니다.");
                        $("#username").focus();
                        return;
                    } else if ($("#userphone").val() == "") {
                        alert("휴대폰번호를 입력하시기 바랍니다.");
                        $("#userphone").focus();
                        return;
                    }

                    $.post("php/fnc/user_check_pass.php",
                        {
                            username: $("#username").val(),
                            userphone: $("#userphone").val()
                        },
                        function (data, status) {
                            if (status != "fail") {
                                var arr = data.split("::::");
                                console.log(data);
                                $("#userpass").val(arr[0]);
                                $("#useremail").val(arr[1]);

                                if (data == "fail") {
                                    alert("해당정보가 존재하지 않습니다.");
                                    $("#username").val("");
                                    $("#userphone").val("");
                                    return;
                                } else {
                                    var date = new Date();
                                    var check = "recruit-" + date;
                                    //성인인경우는 본인인증 필수
                                    //mogwaplay@gmail.com
                                    var IMP = window.IMP; // 생략해도 괜찮습니다.
                                    IMP.init("imp00000000"); // "imp00000000" 대신 발급받은 "가맹점 식별코드"를 사용합니다.
                                    IMP.certification({ // param
                                        min_age: 18,
                                        name: $("#username").val(),
                                        phone: $("#userphone").val(),
                                        merchant_uid: check
                                    }, function (rsp) { // callback
                                        if (rsp.success) {
                                            $("#btn_pass").hide();
                                            $("#pass_view").show();
                                            $("#email_view").show();
                                        } else {
                                            alert("인증처리가 에러가 발생했습니다.");
                                        }
                                    });
                                }

                            } else {
                                alert("네트워크 오류");
                            }
                        });

                }
            </script>
        </div>
    </div>
    <?php include 'php/common_footer.php' ?>
</div>
<?php include 'php/common_script.php' ?>
</body>
</html>

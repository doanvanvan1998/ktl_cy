\<!DOCTYPE html>
<?php include 'php/common_header.php' ?>
<link rel="stylesheet" href="css/result.css">
<link rel="stylesheet" href="css/login.css">
<body>
<div class="wrap">
    <?php include 'php/common_header_menu.php' ?>
    <div class="contents_wrap">
        <div class="container">
            <div class="title flex">
                <h2>전형결과</h2>
                <div class="flex">
                    <span>Home</span>
                    <img src="images/icons/ic_next.png" alt="">
                    <span>지원관리</span>
                    <img src="images/icons/ic_next.png" alt="">
                    <span class="on">전형결과</span>
                </div>
            </div>
            <div class="result_notice flex-direction">
                <img src="images/icons/ic_result.png" alt="결과 순서">
            </div>

            <div>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col"> 수험번호​</th>
                        <th scope="col"> 이름</th>
                        <th scope="col">이메일​</th>
                        <th scope="col">지원부문</th>
                        <th scope="col">전형결과</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">
                            2022-00121
                        </th>
                        <td>홍길동​</td>
                        <td>ableup@ableup.org​</td>
                        <td>@2022년 기간제 장애 문화·예술인 채용​</td>
                        <td style="color: #0c84ff; cursor: pointer"  data-toggle="modal" data-target="#exampleModalCenter">@면접-불합격​</td>
                    </tr>
                    </tbody>
                </table>
            </div>


            <div  class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document" ">
                    <div class="modal-content" >
                        <div class="modal-header" style="border-bottom:none;">
                            <h5 class="modal-title" id="exampleModalLongTitle">xem chi tiết kết quả sàng lọc</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col"> vfvf</th>
                                    <th scope="col">서류</th>
                                    <th scope="col">면접</th>
                                    <th scope="col">최종발</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">12022.09. lorem20 </th>
                                    <td>합격</td>
                                    <td>불합격</td>
                                    <td>@해당없</td>
                                </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>



            <script type="text/javascript" src="https://cdn.iamport.kr/js/iamport.payment-1.1.5.js"></script>
            <script>
                function onFindPw() {
                    location.href = 'find_pass.html';
                }

                function onUserCheck() {
                    if ($("#username").val() == "") {
                        alert("이름을 입력하시기 바랍니다.");
                        $("#username").focus();
                        return;
                    } else if ($("#useremail").val() == "") {
                        alert("이메일을 입력하시기 바랍니다.");
                        $("#useremail").focus();
                        return;
                    } else if ($("#userpass").val() == "") {
                        alert("비밀번호를 입력하시기 바랍니다.");
                        $("#userpass").focus();
                        return;
                    }

                    $.post("php/fnc/apply_user_check.php",
                        {
                            username: $("#username").val(),
                            userpass: $("#userpass").val(),
                            useremail: $("#useremail").val()
                        },
                        function (data, status) {
                            if (status != "fail") {
                                if (data == "fail") {
                                    alert("해당정보가 존재하지 않습니다.");
                                    $("#username").val("");
                                    $("#userphone").val("");
                                    return;
                                } else {
                                    var arr = data.split("::::");
                                    $(".login_form").hide();
                                    $("#user_apply_list").html(arr[0]);
                                    $("#apply_list_view_m").html(arr[1]);
                                    $("#apply_list_view").fadeIn(400);
                                    return;

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
                                            $("#apply_list_view").show();
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
            <div class="table" id='apply_list_view' style='display:none;'>
                <table>
                    <thead>
                    <tr>
                        <th>수험번호</th>
                        <th>지원부문</th>
                        <th>이름</th>
                        <th>이메일</th>
                        <th>전형결과</th>
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
        </div>
    </div>
    <div class="popup_pass_wrap popup_wrap">
        <div class="popup_pass popup">
            <div class="popup_title flex">
                <img src="images/btns/btn_cancel.png" alt="취소" class="btn_cancel">
            </div>
            <div class="pass_title">
                <div class="flex">
                    <div class="flex-direction">
                        <h6>최종 <span>합격</span>을 축하드립니다!</h6>
                        <p>
                            안녕하세요. 한국산업기술시험원 입니다.<br>
                            채용에 관심을 갖고 면접에 참여해주셔서 대한히 감사합니다.
                        </p>
                    </div>
                    <img src="images/icons/ic_ktl2.png" alt="KTL">
                </div>
            </div>
            <div class="popresult flex">
                <div class="flex-direction retit">
                    <div class="flex"><h6>접수일시</h6></div>
                    <div class="flex"><h6>서류전형</h6></div>
                    <div class="flex"><h6>면접전형</h6></div>
                    <div class="flex"><h6>신원조사</h6></div>
                    <div class="flex"><h6>최종발표</h6></div>
                </div>
                <div class="flex-direction recon">
                    <div class="flex"><span>2022.09.01 19:23:32</span></div>
                    <div class="flex"><span class="chk">합격</span></div>
                    <div class="flex"><span class="chk">합격</span></div>
                    <div class="flex"><span class="chk">합격</span></div>
                    <div class="flex"><span class="chk">합격</span></div>
                </div>
            </div>
            <div class="btn_confirm flex"><span>확인</span></div>
        </div>
    </div>
    <div class="popup_fail_wrap popup_wrap">
        <div class="popup_fail popup">
            <div class="popup_title flex">
                <img src="images/btns/btn_cancel.png" alt="취소" class="btn_cancel">
            </div>
            <div class="fail_title">
                <div class="flex">
                    <div class="flex-direction">
                        <h6>아쉽게도 <span>불합격</span> 하셨습니다.</h6>
                        <p>
                            안녕하세요. 한국산업기술시험원 입니다.<br>
                            채용에 관심을 갖고 면접에 참여해주셔서 대한히 감사합니다.
                        </p>
                    </div>
                    <img src="images/icons/ic_ktl2.png" alt="KTL">
                </div>
            </div>
            <div class="popresult flex">
                <div class="flex-direction retit">
                    <div class="flex"><h6>접수일시</h6></div>
                    <div class="flex"><h6>서류전형</h6></div>
                    <div class="flex"><h6>면접전형</h6></div>
                    <div class="flex"><h6>신원조사</h6></div>
                    <div class="flex"><h6>최종발표</h6></div>
                </div>
                <div class="flex-direction recon">
                    <div class="flex"><span>2022.09.01 19:23:32</span></div>
                    <div class="flex"><span class="chk">합격</span></div>
                    <div class="flex"><span class="chk2">불합격</span></div>
                    <div class="flex"><span>해당없음</span></div>
                    <div class="flex"><span>해당없음</span></div>
                </div>
            </div>
            <div class="btn_confirm flex"><span>확인</span></div>
        </div>
    </div>
        <?php include 'php/common_footer.php' ?>
</div>
<?php include 'php/common_script.php' ?>
<script type="text/javascript">
    let btnPass = $('.btn_pass');
    btnPass.click(function () {
        $('.popup_pass_wrap').fadeIn(300);
    });
    let btnFail = $('.btn_fail');
    btnFail.click(function () {
        $('.popup_fail_wrap').fadeIn(300);
    })
    let btnCancel = $('.btn_cancel');
    btnCancel.click(function () {
        $('.popup_wrap').hide();
    });
</script>
</body>
</html>

<!DOCTYPE html>
<?php include 'php/common_header.php' ?>
<link rel="stylesheet" href="css/objection.css">
<link rel="stylesheet" href="css/login.css">
<link rel="stylesheet" href="css/notice.css">
<link rel="stylesheet" href="css/inquiry.css">
<body>
<style>
    .error-msg {
        font-size: 0.6rem;
        color: red;
    }
</style>
<div class="wrap">
    <?php include 'php/common_header_menu.php' ?>
    <div class="contents_wrap">
        <div class="container-fluid">
            <div class="banner flex">
                <div class="flex-direction">
                    <h2>이의신청</h2>
                </div>
            </div>
        </div>
        <div class="container">

            <div class="login_form">
                <div class="login flex-direction">
                    <div class="flex-direction">
                        <span>이름</span>
                        <input type="text" id='username' placeholder="이름을 입력해주세요." required>
                    </div>
                    <div class="flex-direction">
                        <span>이메일</span>
                        <input type="email" id='useremail' placeholder="이메일주소를 입력해주세요." required>
                    </div>
                    <div class="flex-direction">
                        <span>연락처</span>
                        <input type="number" id='userphone' placeholder="연락처를 입력해주세요." required>
                    </div>
                    <div class="btn_login flex" onclick='onUserCheck()'><span>본인확인</span></div>
                </div>
            </div>
            <script type="text/javascript" src="https://cdn.iamport.kr/js/iamport.payment-1.1.5.js"></script>
            <script>
                function onApplyDel(Id) {
                    if (confirm("해당 지원서를 삭제하시겠습니까?\n삭제하시면 지원한 모든 내용이 삭제됩니다."))
                        $.post("php/fnc/user_apply_del.php",
                            {
                                Id: Id
                            },
                            function (data, status) {
                                if (status != "fail") {
                                    location.href = 'index.html';
                                } else {
                                    alert("네트워크 오류");
                                }
                            });
                }

                function onUserCheck() {


                    if ($("#username").val() == "") {
                        alert("이름을 입력하시기 바랍니다.");
                        $("#username").focus();
                        return;
                    }
                    if ($("#useremail").val() == "") {
                        alert("이메일을 입력하시기 바랍니다.");
                        $("#useremail").focus();
                        return;
                    } else if ($("#useremail").val().indexOf("@") == -1) {
                        alert("이메일을 틀림.");
                        $("#useremail").focus();
                        return;
                    }

                    if ($("#userphone").val() == "") {
                        alert("연락처를 입력하시기 바랍니다.");
                        $("#userphone").focus();
                        return;
                    }


                    $.post("php/fnc/user_objection_list.php",
                        {
                            username: $("#username").val(),
                            useremail: $("#useremail").val(),
                            userphone: $("#userphone").val()
                        },
                        function (data, status) {
                            if (status != "fail") {
                                if (data == "fail") {
                                    alert("해당정보가 존재하지 않습니다.");
                                    $("#username").val("");
                                    $("#userphone").val("");
                                    return;
                                } else {
                                    $(".login_form").hide();
                                    var arr = data.split("::::");
                                    if (arr[1] == "") {
                                        arr[1] = "<tr><td colspan=6>이의신청한 내역이 존재하지 않습니다.</td></tr>";
                                    }
                                    $("#objection_username").val($("#username").val());
                                    $("#objection_phone").val($("#userphone").val());
                                    $("#objection_email").val(arr[0]);
                                    $("#objection_list_tbody").html(arr[1]);
                                    $("#objection_list").fadeIn(400);
                                    return;

                                    var date = new Date();
                                    var check = "recruit-" + date;
                                    //성인인경우는 본인인증 필수
                                    //mogwaplay@gmail.com
                                    var IMP = window.IMP; // 생략해도 괜찮습니다.
                                    IMP.init("imp16718708"); // "imp00000000" 대신 발급받은 "가맹점 식별코드"를 사용합니다.
                                    IMP.certification({ // param
                                        min_age: 18,
                                        name: $("#username").val(),
                                        phone: $("#userphone").val(),
                                        merchant_uid: check
                                    }, function (rsp) { // callback
                                        if (rsp.success) {
                                            $("#objection_list").show();
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
            <div id='objection_list' style='display:none'>
                <div class="title flex">
                    <h2>이의신청 리스트</h2>
                    <div class="flex">
                        <span>Home</span>
                        <img src="images/icons/ic_next.png" alt="">
                        <span class="on">지원관리</span>
                        <img src="images/icons/ic_next.png" alt="">
                        <span class="on">이의신청 리스트</span>
                    </div>
                </div>
                <div class="list formbase">
                    <div class="table">
                        <table>
                            <thead>
                            <tr>
                                <th>번호</th>
                                <th>문의형태</th>
                                <th>제목</th>
                                <th>신청일</th>
                                <th>상태</th>
                                <th style='width:90px;'>삭제</th>
                            </tr>
                            </thead>
                            <tbody id='objection_list_tbody'>
                            </tbody>
                        </table>
                        <div class="btn_write flex" onclick='onObjectionInput()'><span>이의신청</span></div>
                    </div>
                </div>
            </div>
            <script>
                function onObjectionInput() {
                    $("#objection_list").hide();
                    $("#objection_list_view").show();
                }

                function onObjectionInputView(Id) {
                    $.post("php/fnc/objection_detail_view.php",
                        {
                            Id: Id
                        },
                        function (data, status) {
                            if (status != "fail") {
                                var arr = data.split("::::");
                                $("#objection_detail_type").html(arr[0]);
                                $("#objection_detail_title").html(arr[1]);
                                $("#objection_detail_date").html(arr[2]);
                                $("#objection_detail_contents").html(arr[3]);
                                $("#objection_answer_date").html("답변일 : " + arr[5]);
                                $("#objection_answer_contents").html(arr[4]);

                                $("#objection_list").hide();
                                $(".objection_detail_view").fadeIn(400);

                            } else {
                                alert("네트워크 오류");
                            }
                        });

                }
            </script>
            <div class="table_view objection_detail_view" style='display:none'>
                <div class="write_title flex">
                    <div class="flex">
                        <img src="images/icons/ic_writeform.png" alt="문의내용">
                        <h6>이의신청</h6>
                    </div>
                    <span id='objection_detail_date'>읽는중...</span>
                </div>
                <div class="flex headline">
                    <div class="view_hd">
                        <h6>문의형태</h6>
                    </div>
                    <div class="view_con">
                        <span id='objection_detail_type'>읽는중...</span>
                    </div>
                </div>
                <div class="flex">
                    <div class="view_hd">
                        <h6>제목</h6>
                    </div>
                    <div class="view_con">
                        <span id='objection_detail_title'>읽는중...</span>
                    </div>
                </div>
                <div class="flex baseline">
                    <div class="view_hd">
                        <h6>내용</h6>
                    </div>
                    <div class="view_con">
              <textarea id='objection_detail_contents' readonly>
                DB에서 가져오는중...
              </textarea>
                    </div>
                </div>
                <div class="answer" style='margin-top:50px;'>
                    <div class="write_title flex">
                        <div class="flex">
                            <img src="images/icons/ic_writeform.png" alt="문의내용">
                            <h6>문의답변</h6>
                        </div>
                        <span id='objection_answer_date'>답변일 : 읽는중...</span>
                    </div>
                    <div class="write_form flex-direction">
                        <div class="flex">
                            <div class="form_hd"><h6>내용</h6></div>
                            <div class="form_con">
                  <textarea id='objection_answer_contents'
                            style='border:0;overflow:auto;font-size:16px;background-color:transparent;width:100%;height:100px;'
                            readonly>
      DB에서 가져오는중...
                  </textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="btn_list_prev flex" onclick='onObjectionDetailViewClose()'><span>목록으로 돌아가기</span></div>


            </div>
            <div id='objection_list_view' style='display:none'>
                <div class="title flex">
                    <h2>이의신청</h2>
                    <div class="flex">
                        <span>Home</span>
                        <img src="images/icons/ic_next.png" alt="">
                        <span class="on">지원관리</span>
                        <img src="images/icons/ic_next.png" alt="">
                        <span class="on">이의신청</span>
                    </div>
                </div>
                <div class="write formbase">
                    <div class="write_title flex">
                        <div class="flex">
                            <img src="images/icons/ic_writeform.png" alt="문의내용">
                            <h6>이의신청</h6>
                        </div>
                        <span>작성일 : <?php echo $today; ?></span>
                    </div>
                    <div class="write_form flex-direction">
                        <div class="flex">
                            <div class="form_hd"><h6>채용공고</h6></div>
                            <div class="form_con">
                                <select id='objection_title' class="validate-required">
                                    <option value=''>채용공고를 선택해주세요.</option>
                                    <option value="1">2022년 한국산업기술시험원 기간제 장애 문화 예술인 채용</option>
                                </select>
                                <div class="error-msg">
                                </div>
                            </div>
                        </div>
                        <div class="flex">
                            <div class="form_hd"><h6>문의형태</h6></div>
                            <div class="form_con">
                                <select id='objection_type' class="validate-required">
                                    <option value=''>문의형태를 선택해주세요.</option>
                                    <option>채용절차</option>
                                    <option>채용결과</option>
                                    <option>시스템오류</option>
                                    <option>기타</option>
                                </select>
                                <div class="error-msg">
                                </div>
                            </div>
                        </div>
                        <div class="flex">
                            <div class="form_hd"><h6>성명</h6></div>
                            <div class="form_con sht">
                                <input type="text" id='objection_username' disabled required/>
                            </div>
                        </div>
                        <div class="flex">
                            <div class="form_hd"><h6>연락처</h6></div>
                            <div class="form_con sht">
                                <input type="text" id='objection_phone' disabled maxlength="11" required/>
                            </div>
                        </div>
                        <div class="flex">
                            <div class="form_hd">
                                <h6>이메일</h6>
                            </div>
                            <div class="form_con sht">
                                <input type="email" id='objection_email' required/>
                            </div>
                        </div>
                        <div class="flex">
                            <div class="form_hd"><h6>제목</h6></div>
                            <div class="form_con">
                                <input type="text" placeholder="제목을 입력하세요." id='objection_subject'
                                       class="validate-required" required/>
                                <div class="error-msg">
                                </div>
                            </div>
                        </div>
                        <div class="flex baseline">
                            <div class="form_hd"><h6>내용</h6></div>
                            <div class="form_con">
                                <textarea placeholder="내용을 입력하세요." id='objection_contents' class="validate-required"
                                          required></textarea>
                                <div class="error-msg">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex-direction check">
                        <div class="flex">
                            <div class="checkbox flex">
                                <input type="checkbox" id="chk1" class="normal">
                                <label for="chk1"><span>개인정보 제공에 동의합니다.</span></label>
                            </div>
                        </div>
                        <div class="flex-direction">
                            <span>- 개인정보 필수 수집항목: 성명, 연락처, 이메일</span>
                            <span>- 수집목적: 질문내역에 대한 안내</span>
                            <span>- 개인정보 보관 기간: 3년 <br><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>(전자상거래 등에서의 소비자 보호에 관련 법률 시행령 제 6조에 근거)</span>
                            <span>※상기 항목은 필수항목으로 동의하지 않을 경우 해당 서비스 이용이 불가합니다.</span>
                        </div>
                    </div>
                    <div class="wrtiebtns flex">
                        <div class="btn btn_writecancel flex" onclick='onBack()'><span>취소</span></div>
                        <div class="btn_objection flex btn" onclick='onObjectionSave()'><span>이의신청</span></div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <?php include 'php/common_footer.php' ?>
</div>
<?php include 'php/common_script.php' ?>
<script>
    function onObjectionDel(Id) {
        if (confirm("이의신청을 삭제하시겠습니까?")) {
            $.post("php/fnc/objection_del.php",
                {
                    Id: Id
                },
                function (data, status) {
                    if (status != "fail") {
                        alert("해당 이의신청이 삭제되었습니다.");
                        $("#tr_" + Id).remove();
                    } else {
                        alert("네트워크 오류");
                    }
                });
        }
    }

    function onObjectionDetailViewClose() {
        $(".objection_detail_view").hide();
        $("#objection_list").fadeIn(400);
    }

    function onBack() {
        $("#objection_list_view").hide();
        $("#objection_list").fadeIn(400);
    }

    function onObjectionSave() {
        // handle validate
        let isValid = true;
        $('#objection_list_view .validate-required').each(function (index, value) {
            if ($(this).val() == '' && !$(this).closest('.form-item').hasClass('disable-input')) {
                $(this).next('.error-msg')
                    .html('이 필드는 필수 항목입니다.');
                isValid = false;
            } else {
                $(this).next('.error-msg').html('');
            }
        });

        if (!isValid) {
            alert("누락된 정보를 확인해주세요.");
            return;
        }

        if (!$('#chk1').is(':checked')) {
            alert("개인정보제공 동의 부분에 체크해주시기 바랍니다.");
            return;
        }

        if ($("#objection_type").val() == 0) {
            alert("문의형태를 선택하세요.");
            return;
        } else if ($("#objection_username").val() == "") {
            alert("이름을 입력하세요.");
            $("#objection_username").focus();
            return;
        } else if ($("#objection_phone").val() == "") {
            alert("연락처를 입력하세요.");
            $("#objection_phone").focus();
            return;
        } else if ($("#objection_email").val() == "") {
            alert("이메일을 입력하세요.");
            $("#objection_email").focus();
            return;
        } else if ($("#objection_subject").val() == "") {
            alert("제목을 입력하세요.");
            $("#objection_subject").focus();
            return;
        } else if ($("#objection_contents").val() == "") {
            alert("내용을 입력하세요.");
            $("#objection_contents").focus();
            return;
        }

        $.post("php/fnc/objection_save.php",
            {
                objection_title: $("#objection_title").val(),
                objection_type: $("#objection_type").val(),
                objection_username: $("#objection_username").val(),
                objection_phone: $("#objection_phone").val(),
                objection_email: $("#objection_email").val(),
                objection_subject: $("#objection_subject").val(),
                objection_contents: $("#objection_contents").val(),
                objection_pass: ""
            },
            function (data, status) {
                if (status != "fail") {
                    alert("이의신청 접수가 완료되었습니다.");
                    location.reload();

                } else {
                    alert("네트워크 오류");
                }
            });
    }
</script>
</body>
</html>

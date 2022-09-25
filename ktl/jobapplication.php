<!DOCTYPE html>
<?php include 'php/common_header.php' ?>
<link rel="stylesheet" href="css/jobapplication.css">
<body>
<div class="wrap">
    <?php include 'php/common_header_menu.php' ?>
    <div class="contents_wrap">
        <div class="container">
            <div class="jobapplication_title flex">
                <h6>입사지원서 작성</h6>
                <div class="flex">
                    <span>Home</span>
                    <img src="images/icons/ic_next.png" alt="다음">
                    <span>채용공고</span>
                    <img src="images/icons/ic_next.png" alt="다음">
                    <span class="bor">채용공고 내용보기</span>
                </div>
            </div>
            <div class="forms">
                <div class="flex">
                    <div class="form_title">
                        <h6>공고명</h6>
                    </div>
                    <div class="form_con">
                        <span>2022년 문화/예술 장애인 채용공고</span>
                    </div>
                </div>
                <div class="flex">
                    <div class="form_title">
                        <h6>개인정보 수집·이용 동의</h6>
                    </div>
                    <div class="form_con">
                        <div class="flex agree">
                            <button class=" btn_agree flex btnFocus" style="color: white">내용확인</button>
                            <span class="noti errorCheck"
                                  style="color: red; font-size: small">(*) 필수항목에 동의해주세요.</span>
                        </div>
                    </div>
                </div>
                <div class="flex baseline">
                    <div class="form_title">
                        <h6>성명</h6>
                    </div>
                    <div class="form_con">
                        <div class="flex-direction inputbox">
                            <input type="text" id='username' placeholder="이름을 입력해주세요." required>
                            <span class="noti errorName" style="color: red; font-size: small"> (*) </span>
                        </div>
                    </div>
                </div>
                <div class="flex baseline">
                    <div class="form_title">
                        <h6>휴대전화</h6>
                    </div>
                    <div class="form_con">
                        <div class="flex-direction inputbox">
                            <input placeholder="전화 번호" type="text" id='userphone' required numberOnly>
                            <span class="noti errorPhone" style="color: red; font-size: small">(*) </span>
                        </div>
                    </div>
                </div>
                <div class="flex baseline">
                    <div class="form_title">
                        <h6>이메일</h6>
                    </div>
                    <div class="form_con">
                        <div class="flex-direction inputbox">
                            <input type="email" id='useremail' placeholder="이메일을 입력해주세요." required>
                            <input type="email" id='useremail_check' placeholder="이메일 확인을 위해 다시 한번 입력해주세요." required>
                            <span class="noti errorEmail" style="color: red; font-size: small">(*)</span>
                        </div>
                    </div>
                </div>
                <div class="flex baseline">
                    <div class="form_title">
                        <h6>비밀번호</h6>
                    </div>
                    <div class="form_con">
                        <div class="flex-direction inputbox">
                            <input type="password" id='userpass' placeholder="비밀번호를 입력해주세요." required
                            ">
                            <input type="password" id='userpass_check' placeholder="비밀번호 확인을 위해 다시 한번 입력해주세요." required>
                            <span class="noti errorPassword" style="color: red; font-size: small">(*) <span
                                        class="textlength"></span>
                        </div>
                    </div>
                </div>
                <div class="flex">
                    <div class="form_title">
                        <h6>본인확인</h6>
                    </div>
                    <div class="form_con">
                        <div class=" flex">
                            <input type="text" id="accuracy" placeholder="전화번호 또는 이메일 확인">
                            <button style=" margin-left: 0.5rem; background: #333; width: auto; cursor: pointer; border-radius: 0.2rem; padding: 0.7rem; color: white"
                                    class=" accuracy " onclick='onAccuracy()'>전화번호 또는 이메일 확인
                            </button>

                        </div>

                        <span class="noti errorAccuracy" style="color: red; font-size: small">(*) <span
                                    class="textlength"></span>
                    </div>
                </div>
            </div>
            <div class="btn_write flex" onclick="onSubmit()"><span>입사지원서 작성</span></div>
        </div>
    </div>
    <?php include 'php/common_footer.php' ?>
</div>
<div class="popup_agree_wrap popup_wrap">
    <div class="popup_agree popup">
        <div class="popup_title flex">
            <div></div>
            <h6>개인정보 수집·이용 동의</h6>
            <img src="images/btns/btn_cancel.png" alt="취소" class="btn_cancel">
        </div>
        <div class="agree_form">
            <div class="all_agree flex">
                <input type="checkbox" id="all" class="normal">
                <label for="all"></label>
                <span>전체동의</span>
            </div>
            <div class="dropdown">
                <ul>
                    <li>
                        <div class="btn_conview flex">
                            <span>개인정보 제공 및 활용 동의서</span>
                            <img src="images/btns/btn_down_arrow.png" alt="펼쳐보기">
                        </div>
                        <div class="dropdown_con">
                <span>
                  한국산업기술시험원은 직원 채용을 위해 관계법령(｢개인정보보호법｣ 및 ｢채용절차의 공정화에 관한 법률｣)에 따라 개인정보 수집‧이용 및 제3자 제공하고자 하오니, 아래의 내용을 자세히 읽으신 후 동의 여부를 결정하여 주시기 바랍니다.
                  <br>
(개인정보의 수집·이용 목적)<br>
한국산업기술시험원은 채용을 목적으로 입사지원자의 개인정보를 수집하고자 하며, 수집정보는 채용 및 채용관리, 지원자평가, 지원자 사후관리 목적으로만 이용됩니다.
<br><br>
(개인정보의 보유·이용기간)<br>
수집된 개인정보는 수집 후 1년 또는 입사지원서 파기 요청 시까지 보유합니다.
 <br><br>
(동의를 거부할 권리 및 동의 거부에 따른 불이익)<br>
개인정보 수집 및 이용에 대하여 동의를 거부할 수 있으나 거부할 시 채용이 제한될 수 있습니다.
<br><br>
□ 상기사항 이외에 기타 개인정보침해에 대한 상담이 필요하신 경우에는 한국정보보호진흥원(개인정보침해센터) 또는 개인정보분쟁조정위원회에 신청하실 수 있습니다.

                </span>
                        </div>
                    </li>
                    <li>
                        <div class="flex">
                            <div class="all_agree">
                                <input type="checkbox" id="chk1" class="normal">
                                <label for="chk1"></label>
                            </div>
                            <div class="btn_conview flex">
                                <span>개인정보 제공 및 활용에 관한 동의 (필수)</span>
                                <img src="images/btns/btn_down_arrow.png" alt="펼쳐보기">
                            </div>
                        </div>
                        <div class="dropdown_con">
                <span>
                  1. 수집하는 개인정보 항목<br>
 가. 개인식별정보 : 성명, 생년월일, 주소<br>
 나. 선발전형의 진행 : 학력, 자격, 경력사항(교육 및 수상경력 포함)<br>
 다. 전형단계별 안내 및 합격자 발표 : 휴대전화번호, E-mail
<br><br>
2. 개인정보 수집 및 이용 목적<br>
​한국산업기술시험원은 본인 및 지원자격 확인, 전형안내, 진행단계별 합격자 발표 등 선발절차의 원활한 진행 및 채용정보 안내를 위하여 지원자의 개인정보를 수집 및 이용하고 있습니다. 수집된 귀하의 개인정보는 선발전형 이외의 목적으로는 이용되지 않습니다.
<br><br>
3. 개인정보의 보유 및 이용 기간<br>
한국산업기술시험원에서 수집한 개인정보는 선발관련 사실관계 확인 등 사후관리를 위하여 관련 법령 등에 의해 필요한 기간 한도 내에서 보유하게 됩니다.
                </span>
                        </div>
                    </li>
                    <li>
                        <div class="flex">
                            <div class="all_agree">
                                <input type="checkbox" id="chk2" class="normal">
                                <label for="chk2"></label>
                            </div>
                            <div class="btn_conview flex">
                                <span>민감정보 수집 및 이용에 관한 동의 (필수)</span>
                                <img src="images/btns/btn_down_arrow.png" alt="펼쳐보기">
                            </div>
                        </div>
                        <div class="dropdown_con">
                <span>
                  1. 수집하는 민감정보 항목<br>
장애인 대상여부, 취업지원대상자·저소득층·북한이탈주민·다문화가정 등 우대 증명에 필요한 정보, 병역, 자기소개(취미, 특기 등)
<br><br>
​2. 수집 및 이용 목적<br>
​채용전형의 진행, 진행단계별 평가 및 결과 등 채용정보 안내
<br><br>
​3. 민감정보의 보유 및 이용 기간<br>
​지원서상에 작성하신 민감정보는 시험원의 인재채용을 위해 활용될 예정으로 채용전형 결과 통보일로부터 1개월까지 보관됩니다. 지원자께서 삭제를 요청하실 경우 해당 민감정보는 삭제됩니다.
                </span>
                        </div>
                    </li>
                    <li>
                        <div class="flex">
                            <div class="all_agree">
                                <input type="checkbox" id="chk3" class="normal">
                                <label for="chk3"></label>
                            </div>
                            <div class="btn_conview flex">
                                <span>개인정보의 위탁 제공에 대한 동의 (필수)</span>
                                <img src="images/btns/btn_down_arrow.png" alt="펼쳐보기">
                            </div>
                        </div>
                        <div class="dropdown_con">
                <span>
                  1. 위탁 제공 개인정보<br>
​성명, 생년월일, 주소, 학력, 자격, 경력사항(교육 및 수상경력 포함), 휴대전화번호, E-mail, 장애인 대상여부, 취업지원대상자·저소득층·북한이탈주민·다문화가정 등 우대 증명에 필요한 정보, 병역, 자기소개(취미, 특기 등)
<br><br>
​2. 위탁처리 기관 및 위탁업무 내용<br>
​위탁업무 내용 : 개인정보 수집 및 변경<br>
수탁업체 : ㈜에이블업
                </span>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="pop_btns flex">
                <div class="popbtn btn_agreecancel flex" onclick='onPerInfoCheck(0)'><span>취소</span></div>
                <div class="popbtn btn_confirm flex" onclick='onPerInfoCheck(1)'><span>확인</span></div>
            </div>
        </div>
    </div>
</div>
<div class="popup_email_wrap popup_wrap">
    <div class="popup_email popup">
        <div class="popup_title flex">
            <div></div>
            <h6>이메일 본인 인증</h6>
            <img src="images/btns/btn_cancel.png" alt="취소" class="btn_cancel">
        </div>
        <div class="flex-direction">
            <p>
                이메일로 인증번호가 발송완료 되었습니다.<br>
                받는 메일서버의 사황에 따라 최대 5분 정도 소요됩니다.<br>
                받으신 인증번호를 하단에 입력해주세요.
            </p>
            <input type="text" placeholder="인증번호 입력" required>
        </div>
        <div class="pop_btns flex">
            <div class="popbtn btn_agreecancel flex"><span>취소</span></div>
            <div class="popbtn btn_confirm flex"><span>확인</span></div>
        </div>
    </div>
</div>
<div class="popup_check_wrap popup_wrap">
    <div class="popup_check popup">
        <div class="popup_title flex">
            <div></div>
            <h6>지원 정보 확인</h6>
            <img src="images/btns/btn_cancel.png" alt="취소" class="btn_cancel">
        </div>
        <div class="check_title flex-direction">
            <span>입력하신 정보를 한번 더 확인해주세요.</span>
            <p>지원서 작성을 시작하면 이름,휴대전화,이메일등의 기초정보는 수정 할 수 없습니다.</p>
        </div>
        <div class="flex-direction info">
            <span>이름 : 홍길동</span>
            <span>휴대전화 : 010-1234-1234</span>
            <span>이메일 : ckdjw@naver.com</span>
        </div>
        <div class="flex-direction movepage">
            <span>지원서 작성 페이지로 이동하시겠습니까?</span>
            <p>하단의 [지원서 작성] 버튼 클릭 시 기초 정보 수정을 할 수 없습니다.</p>
        </div>
        <div class="pop_btns flex">
            <div class="popbtn btn_agreecancel flex"><span>취소</span></div>
            <div class="popbtn btn_confirm flex"><span>지원서 작성</span></div>
        </div>
    </div>
</div>
<?php include 'php/common_script.php' ?>
<script type="text/javascript" src="https://cdn.iamport.kr/js/iamport.payment-1.1.5.js"></script>
<script>
    // cofirm or cancel
    function onPerInfoCheck(nCheck) {
        $('.popup_wrap').hide();
    }

    // mở popup
    let btnAgree = $('.btn_agree');
    btnAgree.click(function () {
        $('.popup_agree_wrap').fadeIn(300);
    });
    // đóng popup
    let btnCancel = $('.btn_cancel');
    btnCancel.click(function () {
        $('.popup_wrap').hide();
    });

    // validate
    function validate() {
        if (!sessionStorage.getItem('checked') ) {
            document.querySelector('.errorCheck').style.color = 'red';
            document.querySelector('.errorCheck').innerHTML = '필수 항목에 동의해주세요.'
            document.querySelector('.btnFocus').focus();
            return;
        } else {
            document.querySelector('.errorCheck').innerHTML = '확인 완료';
            document.querySelector('.errorCheck').style.color = 'blue';
        }
        if (!document.querySelector('#username').value) {
            document.querySelector('.errorName').innerHTML = '당신의 이름을 입력하세요'
            document.querySelector('#username').focus();
            return;
        } else {
            document.querySelector('.errorName').innerHTML = ''
        }
        // validate phone using regex number phone in korean
        if (!document.querySelector('#userphone').value.match(/^(01[016789]{1}|02|0[3-9]{1}[0-9]{1})-?([0-9]{3,4})-?([0-9]{4})$/)) {
            document.querySelector('.errorPhone').innerHTML = '휴대전화 번호를 입력하세요'
            document.querySelector('#userphone').focus();
            return;
        } else {
            document.querySelector('.errorPhone').innerHTML = ''
        }
        if (!document.querySelector('#useremail').value) {
            document.querySelector('.errorEmail').innerHTML = '이메일을 입력하세요'
            document.querySelector('#useremail').focus();
            return;
        } else {
            document.querySelector('.errorEmail').innerHTML = ''
        }
        if (!document.querySelector('#useremail_check').value) {
            document.querySelector('.errorEmail').innerHTML = '이메일을 확인해주세요'
            document.querySelector('#useremail_check').focus();
            return;
        } else {
            document.querySelector('.errorEmail').innerHTML = ''
        }
        if (document.querySelector('#useremail_check').value !== document.querySelector('#useremail').value) {
            document.querySelector('.errorEmail').innerHTML = '확인 이메일을 입력하세요'
            document.querySelector('#useremail_check').focus();
            return;
        } else {
            document.querySelector('.errorEmail').innerHTML = ''
        }
        if (!document.querySelector('#userpass').value.match(/^(?=.*[a-zA-Z])(?=.*[!@#$%^*+=-])(?=.*[0-9]).{10,}$/)) {
            document.querySelector('.errorPassword').innerHTML = '영문/숫자/특수문자 포함 10자 이상 입력해주세요.'
            document.querySelector('#userpass').focus();
            return;
        } else {
            document.querySelector('.errorPassword').innerHTML = ''
        }
        if (!document.querySelector('#userpass_check').value.match(/^(?=.*[a-zA-Z])(?=.*[!@#$%^*+=-])(?=.*[0-9]).{10,}$/)) {
            document.querySelector('.errorPassword').innerHTML = '비밀번호를 다시 확인'
            document.querySelector('#userpass_check').focus();
            return;
        } else {
            document.querySelector('.errorPassword').innerHTML = ''
        }
        if (document.querySelector('#userpass_check').value !== document.querySelector('#userpass').value) {
            document.querySelector('.errorPassword').innerHTML = '두 개의 비밀번호가 일치하지 않습니다'
            document.querySelector('#userpass_check').focus();
            return;
        } else {
            document.querySelector('.errorPassword').innerHTML = ''
        }
        if (!document.querySelector('#accuracy').value) {
            document.querySelector('.errorAccuracy').innerHTML = '이메일 또는 비밀번호를 입력하세요'
            document.querySelector('#accuracy').focus();
            return;
        } else {
            document.querySelector('.errorAccuracy').innerHTML = ''
        }

        return true;
    }


    // handle form submit
    function onSubmit() {
        if (validate()) {
            alert('submit')
        }
    }


    // miendz comment
    // var nUserCheck = 0;
    // var imp_uid = "";
    // var bPhoneCheck = 0;
    //
    // let userPhone = "";
    // let userPhone2 = "";
    // let userPhone3 = "";
    //
    // function checkSpace(str) {
    //     if(str.search(/\s/) != -1) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }
    // function fn_emailChk(email){
    //     var regExp = /\w+([-+.]\w+)*@\w+([-.]\w+)*\.[a-zA-Z]{2,4}$/;
    //     if(!regExp.test(email)){
    //         return false;
    //     }
    //     return true;
    // }
    // $("input:text[numberOnly]").on("keyup", function() {
    //     $(this).val($(this).val().replace(/[^0-9]/g,""));
    // });
    // function onUserCheck()
    // {
    //     if($("#username").val() == "") { alert("이름을 입력하시기 바랍니다."); $("#username").focus(); return;}
    //     else if($("#userphone").val() == "" || $("#userphone2").val() == "" || $("#userphone3").val() == "") { alert("휴대폰번호를 모두 입력하시기 바랍니다."); return;}
    //
    //     var date = new Date();
    //     var check = "recruit-"+date;
    //     //성인인경우는 본인인증 필수
    //     //mogwaplay@gmail.com
    //     var IMP = window.IMP; // 생략해도 괜찮습니다.
    //     IMP.init("imp00000000"); // "imp00000000" 대신 발급받은 "가맹점 식별코드"를 사용합니다.
    //     IMP.certification({ // param
    //         min_age :18,
    //         name : $("#username").val(),
    //         phone : $("#userphone").val()+"-"+$("#userphone2").val()+"-"+$("#userphone3").val(),
    //         merchant_uid : check
    //     }, function (rsp) { // callback
    //         if (rsp.success) {
    //             bPhoneCheck = 1;
    //             userPhone = $("#userphone").val();
    //             userPhone2 = $("#userphone2").val();
    //             userPhone3 = $("#userphone3").val();
    //         } else {
    //             alert("인증처리가 에러가 발생했습니다.");
    //         }
    //     });
    // }

    // let btnEmail = $('.btn_email');
    // btnEmail.click(function(){
    //     $('.popup_email_wrap').fadeIn(300);
    // })
    // let btnWrite = $('.btn_write');
    // btnWrite.click(function(){
    //     var checked = $("#all").is(":checked");
    //
    //     if(bPhoneCheck == 0) { alert("본인인증 후 진행이 가능합니다."); return;}
    //
    //     if(userPhone !== $("#userphone").val() || userPhone2 !== $("#userphone2").val() || userPhone3 !== $("#userphone3").val()){
    //         alert("본인인증과 동일한 휴대폰번호를 입력해야합니다."); return;
    //     }
    //
    //     if(!checked){
    //         alert("개인정보 수집 동의를 모두 하셔야 진행이 가능합니다."); return;
    //     }
    //
    //     var pw = $("#userpass").val();
    //     var num = pw.search(/[0-9]/g);
    //     var eng = pw.search(/[a-z]/ig);
    //     var spe = pw.search(/[`~!@@#$%^&*|₩₩₩'₩";:₩/?]/gi);
    //     var bEmailChk = fn_emailChk($("#useremail").val());
    //     if(!bEmailChk) { alert("이메일 형식으로 입력하시기 바랍니다."); $("#useremail").val(""); $("#useremail").focus(); return; }
    //     else if(checkSpace($("#username").val())) { alert("이름에 공백이 존재하시면 안됩니다."); $("#username").val(""); $("#username").focus();return;}
    //     else if($("#username").val() == "") { alert("이름을 입력하시기 바랍니다."); $("#username").focus(); return;}
    //     else if($("#userphone").val() == "" || $("#userphone2").val() == "" || $("#userphone3").val() == "") { alert("휴대폰번호를 모두 입력하시기 바랍니다."); return;}
    //     else if($("#useremail").val() == "") { alert("이메일주소를 입력하시기 바랍니다."); $("#useremail").focus(); return;}
    //     else if($("#useremail").val() != $("#useremail_check").val()) { alert("이메일 확인을 다시 하시기 바랍니다."); $("#useremail_check").focus(); $("#useremail_check").val(""); return;}
    //     else if($("#userpass").val() == "") { alert("비밀번호를 입력하시기 바랍니다."); $("#userpass_check").focus(); return;}
    //     else if($("#userpass").val() != $("#userpass_check").val()) { alert("비밀번호 확인을 다시 하시기 바랍니다."); $("#userpass_check").focus(); $("#userpass_check").val(""); return;}
    //     else if($("#userpass").val().length < 10) {alert('비밀번호를 10자리 이상 입력해주세요.');$("#userpass").focus(); return;}
    //     else if($("#userpass").val().search(/\s/) != -1){alert('비밀번호는 공백 없이 입력해주세요.');$("#userpass").focus(); return;}
    //     else if(num < 0 || eng < 0 || spe < 0) {alert('영문,숫자, 특수문자를 혼합하여 입력해주세요.');$("#userpass").focus(); return;}
    //
    //
    //     $.post("php/fnc/recruit_step.php",
    //         {
    //             step : 1,
    //             imp_uid : imp_uid,
    //             username : $("#username").val(),
    //             userphone : $("#userphone").val()+$("#userphone2").val()+$("#userphone3").val(),
    //             useremail : $("#useremail").val(),
    //             userpass : $("#userpass").val()
    //         },
    //         function(data,status){
    //             if(status != "fail"){
    //                 if(data == "fail_email"){ alert("동일한 이메일주소가 존재합니다.\n다시 확인 부탁드립니다."); $("#useremail").val(""); $("#useremail_check").val(""); $("#useremail").focus(); return;}
    //                 else if(data == "fail_phone"){ alert("동일한 연락처가 존재합니다.\n다시 확인 부탁드립니다."); $("#userphone").val(""); $("#userphone2").val(""); $("#userphone3").val(""); $("#userphone").focus(); return;}
    //                 else{ alert("입사지원을 시작합니다."); location.href='applicationwrite.html'; }
    //
    //             }
    //             else
    //             {
    //                 alert("네트워크 오류");
    //             }
    //         });
    //
    //
    // });

</script>

<script type="text/javascript">
    let dropdwon = $('.dropdown ul li .btn_conview');
    let dropdwoncon = $('.dropdown ul li .dropdown_con');
    dropdwon.click(function () {
        $(this).parents('li').find(dropdwon).toggleClass('on');
        $(this).parents('li').siblings().find(dropdwon).removeClass('on');
        $(this).parents('li').find(dropdwoncon).slideToggle();
        $(this).parents('li').siblings().find(dropdwoncon).slideUp();
    });
</script>
<script>
    let dropcheck = $('.dropdown ul li .all_agree input');
    $(".all_agree").on("click", "#all", function () {
        var checked = $(this).is(":checked");

        if (checked) {
            dropcheck.prop("checked", true);
        } else {
            dropcheck.prop("checked", false);
        }
        sessionStorage.setItem("checked", checked ? "1" : "");
    });
    $(".dropdown ul li .all_agree").on("click", ".normal", function () {
        var is_checked = true;

        $(".dropdown ul li .all_agree .normal").each(function () {
            is_checked = is_checked && $(this).is(":checked");
        });

        $("#all").prop("checked", is_checked);
    });

</script>
</body>
</html>
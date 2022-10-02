<!DOCTYPE html>
<?php include 'php/common_header.php' ?>
<link rel="stylesheet" href="css/inquiry.css">
<link rel="stylesheet" href="css/login.css">
<body>
<div class="wrap">
    <?php include 'php/common_header_menu.php' ?>
    <div class="contents_wrap">
        <div class="container-fluid">
            <div class="banner flex">
                <div class="flex-direction">
                    <h2>채용문의</h2>
                    <span style="text-align:center;">금번 채용전형과 무관하거나 개인정보 요구 또는 <br/>지적재산권 위배사항 등의 문의는 답변이 불가하거나 내용이 삭제될 수 있습니다.</span>
                </div>
            </div>
        </div>
        <div class="container">

            <div class="title flex">
                <h2>채용문의</h2>
                <div class="flex">
                    <span>Home</span>
                    <img src="images/icons/ic_next.png" alt="">
                    <span class="on">채용문의</span>
                </div>
            </div>
            <div class="login_form" style='display:none;'>
                <div class="login flex-direction">
                    <div class="flex-direction">
                        <span>비밀번호</span>
                        <input type="password" id='pass_check' placeholder="게시물 패스워드를 입력해주세요." required>
                    </div>
                    <div class="btn_login flex" id='user_btn'><span>내용확인</span></div>
                </div>
            </div>
            <script>
                function onUserCheck(Id, state) {
                    if ($("#pass_check").val() == "") {
                        alert("패스워드를 입력하시기 바랍니다.");
                        $("#pass_check").focus();
                        return;
                    }

                    $.post("php/fnc/pass_check.php",
                        {
                            Id: Id,
                            state: state,
                            pass_check: $("#pass_check").val()
                        },
                        function (data, status) {
                            if (status != "fail") {
                                if (data == "fail") {
                                    alert("비밀번호를 잘못 입력하였습니다.");
                                    $("#pass_check").val("");
                                    $("#pass_check").focus();
                                    return;
                                } else {
                                    $("#pass_check").val("");
                                    if (state == 1) {
                                        onDetailView(Id, '공개');
                                    } else {
                                        alert("삭제가 완료되었습니다.");
                                        $("#tr_" + Id).remove();
                                        $('.login_form').hide();
                                        onMainView();

                                    }

                                }

                            } else {
                                alert("네트워크 오류");
                            }
                        });

                }
            </script>


            <?php
            require 'php/mysql.php';
            $sql = "SELECT * FROM manager_faq WHERE id =1";
            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_array($result);

            ?>


            <div class="container">
                <div class="row">
                    <div class="col" style="margin-top: 0.5rem; margin-bottom: 1rem;">
                        <i class="fa-regular fa-circle-dot" style="color: blue"></i> <span
                                style="font-size: 1rem; font-weight: bold; color: #0a0e14">문의내용</span>
                    </div>
                </div>

                <div class="row" style="border-top: 1px solid grey; ">
                    <div class="col-3" style="background: lightgrey">
                        <div style="padding: 1rem">
                            이름
                        </div>
                    </div>
                    <div class="col-9" style="background: white">
                        <div style="padding: 1px">
                            <div style="padding: 1rem">
                                <?php echo $row[1] ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row" style="border-top: 1px solid grey; ">
                    <div class="col-3" style="background: lightgrey">
                        <div style="padding: 1rem">
                            분류
                        </div>
                    </div>
                    <div class="col-9" style="background: white">
                        <div style="padding: 1px">
                            <div style="padding: 1rem">
                                <?php echo $row[2] ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row" style="border-top: 1px solid grey; ">
                    <div class="col-3" style="background: lightgrey">
                        <div style="padding: 1rem">
                            제목
                        </div>
                    </div>
                    <div class="col-9" style="background: white">
                        <div style="padding: 1px">
                            <div style="padding: 1rem">
                                <?php echo $row[2] ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row" style="border-top: 1px solid grey; ">
                    <div class="col-3" style="background: lightgrey">
                        <div style="padding: 1rem">
                            내용
                        </div>
                    </div>
                    <div class="col-9" style="background: white">
                        <div style="padding: 1px">
                            <div style="padding: 1rem">
                                <?php echo $row[7] ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="border-top: 1px solid grey; border-bottom: 1px solid gray ">
                    <div class="col-3" style="background: lightgrey">
                        <div style="padding: 1rem">
                            공개여부
                        </div>
                    </div>
                    <div class="col-9" style="background: white">
                        <div style="padding: 1px">
                            <div style="padding: 1rem">
                                <?php
                                if($row[5] == 0) {
                                    echo "비공개";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div style="display: flex; justify-content: end; align-items: center; margin-top: 0.5rem">
                    <div>
                        <button class="btn btn-light">
                            <a href="./inquiry.php" style="color: black; text-decoration: none">목록</a>
                             </button>
                    </div>
                    <div style="margin-left: 1rem">
                        <button class="btn btn-primary">
                            <a href="./unlock.php" style="text-decoration: none; color: white">삭제</a>
                            </button>
                    </div>
                </div>


                <div class="row">
                    <div class="col" style="margin-top: 0.5rem; margin-bottom: 1rem;">
                        <i class="fa-regular fa-circle-dot" style="color: blue"></i> <span
                                style="font-size: 1rem; font-weight: bold; color: #0a0e14">문의답변</span>
                    </div>
                </div>

                <div class="row" style="border-top: 1px solid grey; border-bottom: 1px solid grey">
                    <div class="col-3" style="background: lightgrey">
                        <div style="padding: 1rem">
                            내용
                        </div>
                    </div>
                    <div class="col-9" style="background: white">
                        <div style="padding: 1px">
                            <div style="padding: 1rem">
                                <?php echo $row[7] ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row" style="display: flex; justify-content: end; align-items: center; margin-top: 1rem;">
                    <div>
                        <button class="btn btn-light">
                            <a href="./inquiry.php" style="color: black; text-decoration: none">목록</a>
                        </button>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <div class="write formbase" style="display:none;">
        <div class="write_title flex">
            <div class="flex">
                <img src="images/icons/ic_writeform.png" alt="문의내용">
                <h6>문의내용</h6>
            </div>
            <span>작성일 : <?= $today ?></span>
        </div>

        <div class="write_form flex-direction">
            <div class="flex">
                <div class="form_hd"><h6>이름</h6></div>
                <div class="form_con"><input type="text" id='username' placeholder='이름을 입력하세요.'></div>
            </div>
            <div class="flex">
                <div class="form_hd"><h6>분류</h6></div>
                <div class="form_con">
                    <select id='inquiry_type'>
                        <option value="">문의 유형을 선택해주세요.</option>
                        <option value="1">직무</option>
                        <option value="2">채용절차</option>
                        <option value="3">자격요건</option>
                        <option value="4">평가전형</option>
                        <option value="5">결과발표</option>
                        <option value="6">기타</option>
                    </select>
                </div>
            </div>
            <div class="flex">
                <div class="form_hd"><h6>제목</h6></div>
                <div class="form_con">
                    <input type="text" id='subject' placeholder='제목을 입력하세요.'>
                </div>
            </div>
            <div class="flex baseline">
                <div class="form_hd"><h6>내용</h6></div>
                <div class="form_con">
                    <textarea id='contents' placeholder='내용을 입력하세요.'></textarea>
                </div>
            </div>
            <div class="flex">
                <div class="form_hd"><h6>공개여부</h6></div>
                <div class="form_con">
                    <select id='viewtype'>
                        <option value="1">공개</option>
                        <option value="2">비공개</option>
                    </select>
                    <input type="password" id='viewtype_pass' style='margin-top:10px;'
                           placeholder='삭제용 및 비공개 패스워드를 입력하세요. ( 해당 패스워드는 꼭 아셔야 내용을 확인하거나 삭제할 수 있습니다. )'>
                </div>
            </div>
        </div>


        <script>
            function onDetailView(Id, type) {
                if (type == "비공개") {
                    $("#user_btn").attr("onclick", "onUserCheck(" + Id + ",1)");
                    $("#user_btn").html("<span style='color:#fff'>내용확인</span>");
                    $('.formbase').hide();
                    $('.login_form').fadeIn(300);
                    return;
                }
                $.post("php/view/inquiry_detail.php",
                    {
                        Id: Id
                    },
                    function (data, status) {
                        if (status != "fail") {
                            var arr = data.split("::::");
                            $("#write_detail").html(arr[0]);
                            $('.login_form').hide();
                            $("#write_detail_date").html(arr[1]);
                            $("#write_detail_btn").html(arr[2]);
                            $("#answer_detail_date").html(arr[3]);
                            $("#answer_detail").html(arr[4]);

                            $('.formbase').hide();
                            $('.write_view').fadeIn(300);
                        } else {
                            alert("네트워크 오류");
                        }
                    });

            }

            function onInquirySave() {
                if ($("#username").val() == "") {
                    alert("작성자명을 입력하시기 바랍니다.");
                    $("#username").focus();
                    return;
                } else if ($("#inquiry_type").val() == "") {
                    alert("문의 유형을 선택해주세요.");
                    $("#inquiry_type").focus();
                    return;
                } else if ($("#subject").val() == "") {
                    alert("제목을 입력하시기 바랍니다.");
                    $("#subject").focus();
                    return;
                } else if ($("#contents").val() == "") {
                    alert("내용을 입력하시기 바랍니다.");
                    $("#contents").focus();
                    return;
                } else if ($("#viewtype_pass").val() == "") {
                    alert("패스워드는 필수 입니다.");
                    $("#viewtype_pass").focus();
                    return;
                }

                $.post("php/fnc/inquiry_save.php",
                    {
                        username: $("#username").val(),
                        contents: $("#contents").val(),
                        viewtype: $("#viewtype").val(),
                        subject: $("#subject").val(),
                        viewtype_pass: $("#viewtype_pass").find(":selected").val(),
                        inquiry_type: $("#inquiry_type").find(":selected").text()
                    },
                    function (data, status) {
                        if (status != "fail") {
                            alert("채용문의 접수가 완료되었습니다.");
                            location.reload();
                        } else {
                            alert("네트워크 오류");
                        }
                    });

            }

            function onContentDel(Id) {
                $.post("php/fnc/inquiry_del.php",
                    {
                        Id: Id,
                        pass_check: $("#pass_check").val()
                    },
                    function (data, status) {
                        if (status != "fail") {
                            if (data == "fail") {
                                alert("해당 패스워드가 존재하지 않습니다.");
                                $("#pass_check").val("");
                                return;
                            }
                            alert("해당 채용문의가 삭제되었습니다.");
                            location.reload();
                        } else {
                            alert("네트워크 오류");
                        }
                    });
            }

            function onInquiryDel(Id) {
                $("#user_btn").attr("onclick", "onUserCheck(" + Id + ",2)");
                $("#user_btn").html("<span style='color:#fff'>삭제요청</span>");
                $('.formbase').hide();
                $('.login_form').fadeIn(300);
                return;
                /*
                if(confirm("해당 문의를 삭제하시겠습니까?"))
                {
                  $("#user_btn").attr("onclick","onContentDel("+Id+")");
                  $('.formbase').hide();
                  $('.login_form').fadeIn(300);
                  return;

                }
                */
            }

            function onMainView() {
                $(".write_view").hide();
                $(".write").hide();
                $(".list").show();
            }
        </script>
        <div class="wrtiebtns flex">
            <div class="btn btn_writecancel flex"><span>취소</span></div>
            <div class="btn_writecomplete flex btn" onclick='onInquirySave()'><span>등록</span></div>
        </div>
    </div>
    <div class="write_view formbase" style="display:none;">
        <div>
            <div class="write_title flex">
                <div class="flex">
                    <img src="images/icons/ic_writeform.png" alt="문의내용">
                    <h6>문의내용</h6>
                </div>
                <span id='write_detail_date'></span>
            </div>
            <div class="write_form flex-direction" id='write_detail'>
                <!-- 내용 -->
            </div>
            <div class="wrtiebtns flex" id='write_detail_btn'>

            </div>
        </div>
        <div class="answer">
            <div class="write_title flex">
                <div class="flex">
                    <img src="images/icons/ic_writeform.png" alt="문의내용">
                    <h6>문의답변</h6>
                </div>
                <span id='answer_detail_date'></span>
            </div>
            <div class="write_form flex-direction">
                <div class="flex">
                    <div class="form_hd"><h6>내용</h6></div>
                    <div class="form_con">
                  <span id='answer_detail'>
                  </span>
                    </div>
                </div>
            </div>
            <div class="wrtiebtns flex">
                <div class="btn_listview flex btn"><span>목록</span></div>
            </div>
        </div>
    </div>

</div>
</div>
<div style="margin-top: 10rem;">
    <?php include 'php/common_footer.php' ?>
</div>
</div>
<?php include 'php/common_script.php' ?>
<script>
    let btnWrite = $('.btn_write');
    btnWrite.click(function () {
        $('.formbase').hide();
        $('.write').fadeIn(300);
    });
    let btnWritecancel = $('.btn_writecancel');
    btnWritecancel.click(function () {
        $('.formbase').hide();
        $('.list').fadeIn(300);
    });
    let btnWritecorrection = $('.btn_writecorrection');
    btnWritecorrection.click(function () {
        $('.formbase').hide();
        $('.write_correction').fadeIn(300);
    });
    let btnListview = $('.btn_listview');
    btnListview.click(function () {
        $('.formbase').hide();
        $('.list').fadeIn(300);
    });
</script>
</body>
</html>

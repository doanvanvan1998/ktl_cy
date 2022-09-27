<!DOCTYPE html>
<?php include 'php/common_header.php' ?>
<link rel="stylesheet" href="css/login.css">
<body>
<div class="wrap">
    <?php include 'php/common_header_menu.php' ?>
    <?php
    $email = $_GET['email'];
    ?>
    <div class="contents_wrap" >
        <div class="container" style=" margin-top: 10rem;">
            <div class="login_form">
                <form action="../ktl/php/fnc/confirm_rand_code.php" method="post" class="login flex-direction">
                    <div class="flex-direction">
                        <span>   코드 확인</span>
                        <input name="code"  type="number" id='code' placeholder="코드를 입력.">
                        <input type="hidden" name="email" value="<?php echo $email  ?>">
                    </div>
                    <button class="btn_login flex" id="onSubmit" onclick='handSubmit()' style="height: 2.5rem"><span>
                            확인하다
                        </span></button>
                </form>
            </div>
            <script type="text/javascript" src="https://cdn.iamport.kr/js/iamport.payment-1.1.5.js"></script>

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
                        <span>작성일 : <?= $today ?></span>
                    </div>
                    <div class="write_form flex-direction">
                        <div class="flex">
                            <div class="form_hd"><h6>채용공고</h6></div>
                            <div class="form_con">
                                <select id='objection_title'>
                                    <option>2022년 한국산업기술시험원 기간제 장애 문화 예술인 채용</option>
                                </select>
                            </div>
                        </div>
                        <div class="flex">
                            <div class="form_hd"><h6>문의형태</h6></div>
                            <div class="form_con">
                                <select id='objection_type'>
                                    <option value=0>문의형태를 선택해주세요.</option>
                                    <option>채용절차</option>
                                    <option>채용결과</option>
                                    <option>시스템오류</option>
                                    <option>기타</option>
                                </select>
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
                            <div class="form_hd"><h6>이메일</h6></div>
                            <div class="form_con sht">
                                <input type="email" id='objection_email' disabled required/>
                            </div>
                        </div>
                        <div class="flex">
                            <div class="form_hd"><h6>제목</h6></div>
                            <div class="form_con">
                                <input type="text" placeholder="제목을 입력하세요." id='objection_subject' required/>
                            </div>
                        </div>
                        <div class="flex baseline">
                            <div class="form_hd"><h6>내용</h6></div>
                            <div class="form_con">
                                <textarea placeholder="내용을 입력하세요." id='objection_contents' required></textarea>
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
                            <span>- 개인정보 보관 기간: 3년 <br/><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>(전자상거래 등에서의 소비자 보호에 관련 법률 시행령 제 6조에 근거)</span>
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

    <div style="position: absolute; bottom: 0; left: 0; right: 0">
        <?php include 'php/common_footer.php' ?>
    </div>
</div>
<?php include 'php/common_script.php' ?>

<script>
    function handSubmit(){
        $('#onSubmit').submit();
    }
</script>
</body>
</html>

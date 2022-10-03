<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="#">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/slide.min.css">
    <link rel="stylesheet" href="css/common.css?v=2022-09-27 02:49:53">
    <script src="js/jquery.js" charset="utf-8"></script>
    <script src="js/swiper.min.js" charset="utf-8"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
          integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
          integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <script src="js/signup.js"></script>

    <title>한국산업기술시험원</title>
</head>
<link rel="stylesheet" href="css/signup.css">
<body>
<?php include 'php/common_header_menu.php' ?>
<div class="wrap">
    <br>
    <div class="container">
        <div class="signup_form">

            <div class="tab-wrapper">
                <div class="tab-heading d-flex cursor">
                    <div class="tab-item active" tabindex="1">
                        기본정보
                    </div>
                    <div class="tab-item" tabindex="2">
                        학력/경럭/교육활동
                    </div>
                    <div class="tab-item" tabindex="3">자격증/수상/포트폴리오</div>
                    <div class="tab-item" tabindex="4">자기 소개서</div>
                    <div class="tab-item" tabindex="5">
                        최종제출
                    </div>
                </div>

                <form id="form_step_1">

                    <div class="tab-content">
                        <h3>기본정보 </h3>
                        <hr>
                        <div>
                            <div class="row form-item">
                                <div class="col-md-3">
                                    <label for="">
                                        이름
                                    </label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="validate-required" id="field-name"
                                           placeholder="이름을　입력해주세요．">
                                    <div class="error-msg">
                                    </div>
                                </div>
                            </div>

                            <div class="row form-item ">
                                <div class="col-md-3">
                                    <label for="">
                                        연락처
                                    </label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="validate-required" id="field-phone"
                                           placeholder="연락처를　입력해주세요．">
                                    <div class="error-msg">
                                    </div>
                                </div>
                            </div>

                            <div class="row form-item">
                                <div class="col-md-3">
                                    <label for="">
                                        이메일
                                    </label>
                                </div>
                                <div class="col-md-9">
                                    <input type="email" class="validate-required" id="field-email"
                                           placeholder="이메일을　입력해주세요．">
                                    <div class="error-msg">
                                    </div>
                                </div>

                            </div>

                            <div class="row form-item">
                                <div class="col-md-3">
                                    <label for="">
                                        주소
                                    </label>
                                </div>
                                <div class="col-md-9">
                                    <div>
                                        <input type="text" name="address＿ccid" class="validate-required"
                                               id="field-address"
                                               placeholder="시민 등록증상 주소를 입력하세요.">
                                        <div class="error-msg">
                                        </div>
                                    </div>

                                    <div class="mt-1 mb-1">
                                        <input type="text" name="address" class="validate-required" id="field-address"
                                               placeholder="주소를　입력해주세요．">
                                        <div class="error-msg">
                                        </div>
                                    </div>

                                    <div>
                                        <input type="text" name="address_now" class="validate-required"
                                               id="field-address"
                                               placeholder="상세 주소를 입력하세요．">
                                        <div class="error-msg">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row form-item">
                                <div class="col-md-3">
                                    <label for="">장애여부</label>
                                </div>


                                <div class="col-md-9">
                                    <div class="d-flex" style="gap:0.5rem">
                                        <div>
                                            <div class="radio-required disabilities">
                                                <label>
                                                    <input type="radio" name="disabilities" value="1">
                                                    <span>
                                                <span>대상</span>
                                            </span>
                                                </label>

                                                <label>
                                                    <input type="radio" name="disabilities" value="0">
                                                    <span>
                                                <span>비대상</span>
                                            </span>
                                                </label>

                                            </div>
                                            <div class="error-msg">
                                            </div>
                                        </div>

                                        <select name="level_disabilities " class="form-control" id="level_disabilities"
                                                style="width: 30%;margin-left:0.1rem">
                                            <option value="0">중증 (기존1~3급)</option>
                                            <option value="1">경증 (기본 4~6급)</option>

                                        </select>

                                        <div>
                                            <select name="content_disabilities " class="form-control"
                                                    id="content_disabilities"
                                                    style="width: 30%;margin-left:0.1rem">
                                                <option value="">내용</option>
                                                <option value="0">간장애</option>

                                                <option value="0">뇌전증장애 (간질장애)</option>
                                                <option value="0">뇌병변장애</option>
                                                <option value="0">시각장애</option>
                                                <option value="0">신장장애</option>

                                                <option value="0">심장장애</option>
                                                <option value="0">안면변형장애</option>
                                                <option value="0">장루/요루장애</option>
                                                <option value="0">정신장애</option>

                                                <option value="0">청각장애</option>
                                                <option value="0">호흡기장애</option>
                                                <option value="0">지체장애</option>
                                                <option value="0">언어장애</option>

                                                <option value="0">지적장애</option>
                                                <option value="0">자폐장애</option>
                                                <option value="0">기타장애</option>
                                                <option value="0">병역구분</option>
                                            </select>
                                            <div class="error-msg">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row form-item">
                                <div class="col-md-3">
                                    <label for="">병역사항</label>
                                </div>

                                <div class="col-md-9 ">
                                    <span>
                                         "<b>[병역사항]</b> <br>
                                        복무 중인 경우에는 미필로 선택하시기 바랍니다.
                                        여성의 경우 “비대상”을 선택하시면 됩니다."
                                    </span>

                                </div>
                            </div>


                            <div class="row form-item">
                                <div class="col-md-3">
                                    <label for="">병역구분</label>
                                </div>

                                <div class="col-md-9">
                                    <div class="d-flex flex-wrap radio-required" style="gap:0.5rem">
                                        <label>
                                            <input type="radio" name="duty" value="0">
                                            <span>비대상</span>
                                        </label>
                                        <label>
                                            <input type="radio" name="duty" value="1">
                                            <span>군필</span>
                                        </label>
                                        <label>
                                            <input type="radio" name="duty" value="2">
                                            <span>미필</span>
                                        </label>
                                        <label>
                                            <input type="radio" name="duty" value="3">
                                            <span>면제</span>
                                        </label>
                                        <label>
                                            <input type="radio" name="duty" value="4">
                                            <span>복우중</span>
                                        </label>
                                    </div>
                                    <div class="error-msg">
                                    </div>
                                </div>
                            </div>

                            <div class="row form-item">
                                <div class="col-md-3">
                                    작성자
                                </div>
                                <div class="col-md-9">
                                    <div class="d-flex radio-required writer" style="gap:0.5rem">
                                        <label>
                                            <input type="radio" name="single_user" value="0">
                                            <span>본인</span>
                                        </label>

                                        <label>
                                            <input type="radio" name="single_user" value="1">
                                            <span>보호자</span>
                                        </label>

                                        <label>
                                            <input type="radio" name="single_user" value="2">
                                            <span>대리인</span>
                                        </label>
                                    </div>
                                    <div class="error-msg">
                                    </div>
                                    <div class="col-md-9 none more_info_writer">
                                        *첨부파일 형식은 PDF로 제출부탁드립니다.
                                        <input type="file" id="writer" style="margin-top: 0.5rem">
                                        <div class="error-msg">
                                        </div>
                                        <a style="color: black; font-size: 17px; text-decoration: underline"
                                           href="uploads/위임장_신청서류%20작성%20대리인.pdf" download="">※정보제공동의서 파일 다운로드</a>
                                    </div>

                                </div>
                            </div>

                            <div class="row form-item">
                                <div class="col-md-3">
                                    우대사항
                                </div>
                                <div class="col-md-9">

                                    <div>보훈 여부</div>
                                    <div class="d-flex radio-required" style="margin-top:0.5rem;gap:0.5rem">
                                        <label>
                                            <input type="radio" name="meritorious_person" value="1">
                                            <span>대상</span>
                                        </label>
                                        <label>
                                            <input type="radio" name="meritorious_person" value="0">
                                            <span>비대상</span>
                                        </label>
                                    </div>
                                    <div class="error-msg">
                                    </div>


                                    <div>저소득증</div>
                                    <div class="d-flex radio-required" style="margin-top:0.5rem;gap:0.5rem">
                                        <label>
                                            <input type="radio" name="low_benefit" value="1">
                                            <span>대상</span>
                                        </label>
                                        <label>
                                            <input type="radio" name="low_benefit" value="0">
                                            <span>비대상</span>
                                        </label>
                                    </div>
                                    <div class="error-msg">
                                    </div>

                                    <div>북한이탈주민</div>
                                    <div class="d-flex radio-required" style="margin-top:0.5rem;gap:0.5rem">
                                        <label>
                                            <input type="radio" name="korea_migrate" value="1">
                                            <span>대상</span>
                                        </label>
                                        <label>
                                            <input type="radio" name="korea_migrate" value="0">
                                            <span>비대상</span>
                                        </label>
                                    </div>
                                    <div class="error-msg radio-required">
                                    </div>

                                    <div>다문화가족자녀</div>
                                    <div class="d-flex radio-required" style="margin-top:0.5rem;gap:0.5rem">
                                        <label>
                                            <input type="radio" name="son-of-korea-migrate" value="1">
                                            <span>대상</span>
                                        </label>
                                        <label>
                                            <input type="radio" name="son-of-korea-migrate" value="0">
                                            <span>비대상</span>
                                        </label>
                                    </div>
                                    <div class="error-msg">
                                    </div>
                                </div>
                            </div>

                            <div class="row form-item d-flex justify-content-center pt-2 pb-2" style="gap:0.5rem;">
                                <button type="submit" class="btn btn-secondary">임시저장</button>
                                <button type="button" class="btn btn-primary" onclick="nextStep()">다음단계</button>
                            </div>
                        </div>
                    </div>
                </form>

                <form method="post" id="form_step_2">
                    <input type="hidden" name="step" value="2">
                    <div class="tab-content hidden">
                        <h3>학력/경럭/교육활동</h3>
                        <hr>
                        <div class="row form-item high-school-row disable-input">
                            <div class="col-md-3 disable-section">
                                <label for="">
                                    고등학교 학력
                                </label>
                            </div>

                            <div class="col-md-9">
                                <div class="" style="gap:0.5rem">
                                    <div class="d-flex disable-section" style="gap:0.5rem;flex-basis: 80%">
                                        <div style="width:50%">
                                            <input type="text" name="high_school"
                                                   class="high_school validate-required" id="high_school"
                                                   placeholder="학교명">
                                            <div class="error-msg"></div>
                                        </div>

                                        <div style="width:50%">
                                            <input type="date" class="date_graduate_school validate-required"
                                                   name="graduation_high_school_year"
                                                   id="date_graduate_school"
                                                   placeholder="졸업연도">
                                            <div class="error-msg"></div>
                                        </div>

                                    </div>

                                    <div class="d-flex"
                                         style="margin-top:0.5rem;gap:0.5rem;flex-wrap: wrap;align-items: center">
                                        <select class="form-control disable-input" style="width:30%"
                                                name="status_graduate"
                                                id="status_graduate">
                                            <!--Chưa TN-->
                                            <option value="1">졸업</option>
                                            <!--ĐÃ TN-->
                                            <option value="0">졸업예정</option>
                                        </select>

                                        <label class="custom-circle-radio injoin_university">
                                            <input type="radio" name="injoin_university" value="1">
                                            <span class="icon">
                                    <i class="fas fa-check"></i>
                                </span>
                                            <span class="text">대입검정고시</span>
                                        </label>
                                        <label class="custom-circle-radio injoin_university">
                                            <input type="radio" name="injoin_university" value="0">
                                            <span class="icon">
                                    <i class="fas fa-check"></i>
                                </span>
                                            <span class="text">고등학교미만 졸업</span>
                                        </label>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="row form-item academy-row">
                            <div class="col-md-3">
                                <label>대학교 학력</label>
                            </div>

                            <div class="col-md-9">
                                <div class="duplicate-section academy">
                                    <div class="d-flex" style="gap:0.5rem">
                                        <div>
                                            <input type="date" class="academy_start_date validate-required"
                                                   placeholder="입학년월"
                                                   id="academy_start_date">
                                            <div class="error-msg"></div>
                                        </div>

                                        <div>
                                            <input type="date" class="academy_end_date validate-required"
                                                   placeholder="졸업년월"
                                                   id="academy_end_date">

                                            <div class="error-msg"></div>
                                        </div>


                                        <select class="academy_status">
                                            <!--Chưa TN-->
                                            <option value="1">졸업</option>
                                            <!--ĐÃ TN-->
                                            <option value="0">졸업예정</option>
                                        </select>

                                        <div class="btn-add-more">+</div>
                                    </div>

                                    <div class="d-flex" style="margin-top:0.5rem;gap:0.5rem">
                                        <div>
                                            <input type="text" class="academy_name validate-required"
                                                   placeholder="학교명"
                                                   id="academy_name">
                                            <div class="error-msg">
                                            </div>
                                        </div>
                                        <div>
                                            <input type="text" class="academy_major validate-required"
                                                   placeholder="전공명">
                                            <div class="error-msg"></div>
                                        </div>
                                        <div>
                                            <input type="text" class="academy_gpa validate-required"
                                                   placeholder="전공명">
                                            <div class="error-msg"></div>
                                        </div>
                                        <div>
                                            <input type="text" class="academy_total_score validate-required"
                                                   placeholder="학점">
                                            <div class="error-msg"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row form-item postgraduate-row">
                            <div class="col-md-3">
                                대학원 학력
                            </div>
                            <div class="col-md-9">
                                <div class="duplicate-section postgraduate">
                                    <div class="d-flex" style="gap:0.5rem">
                                        <div>
                                            <input type="date" class="postgraduate_start_date validate-required"
                                                   placeholder="입학년월">
                                            <div class="error-msg"></div>
                                        </div>
                                        <div>
                                            <input type="date" class="postgraduate_end_date validate-required"
                                                   placeholder="졸업년월">
                                            <div class="error-msg"></div>
                                        </div>
                                        <select class="postgraduate_status">
                                            <option value="1">졸업</option>
                                            <option value="0">졸업예정</option>
                                        </select>

                                        <div class="btn-add-more">+</div>
                                    </div>
                                    <div class="d-flex" style="margin-top: 0.5rem;gap:0.5rem">
                                        <div>
                                            <input type="text" class="postgraduate_name validate-required"
                                                   placeholder="학교명">
                                            <div class="error-msg"></div>
                                        </div>
                                        <div>
                                            <input type="text" class="postgraduate_major validate-required"
                                                   placeholder="전공명">
                                            <div class="error-msg"></div>
                                        </div>

                                        <div>
                                            <input type="text" class="postgraduate_gpa validate-required"
                                                   placeholder="학점">
                                            <div class="error-msg"></div>
                                        </div>

                                        <div>
                                            <input type="text" class="postgraduate_total_score validate-required"
                                                   placeholder="총점">
                                            <div class="error-msg"></div>
                                        </div>

                                        <div>
                                            <select class="postgraduate_degree">
                                                <option value="0">석사</option>
                                                <option value="1">박사</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row form-item">
                            <div class="col-md-3">
                                경력
                            </div>
                            <div class="col-md-9">
                                <div class="d-flex" style="gap:0.5rem">
                                    <select name="main_experience">
                                        <option value="">주 전공명을 선택해주세요</option>
                                        <option value="1">피아노</option>
                                        <option value="2">풀루트</option>
                                        <option value="3">베이스</option>

                                        <option value="4">바이올린</option>
                                        <option value="5">첼로</option>
                                        <option value="6">하프</option>
                                        <option value="7">오보에</option>
                                        <option value="8">클라리넷</option>
                                        <option value="9">바순</option>
                                        <option value="10">트럼폣</option>
                                        <option value="11">호른</option>
                                        <option value="12">비올라</option>
                                        <option value="13">팀파니</option>
                                        <option value="14">기타 (직접작성)</option>
                                        <option value="15">부 전공을 선택해주세요</option>
                                        <option value="16">주요이력</option>
                                        <option value="17">(중복선택가능)</option>


                                    </select>
                                    <select name="extra_experience" id="">
                                        <option value="">부전공</option>
                                        <option value="1">피아노</option>
                                        <option value="2">풀루트</option>
                                        <option value="3">베이스</option>

                                        <option value="4">바이올린</option>
                                        <option value="5">첼로</option>
                                        <option value="6">하프</option>
                                        <option value="7">오보에</option>
                                        <option value="8">클라리넷</option>
                                        <option value="9">바순</option>
                                        <option value="10">트럼폣</option>
                                        <option value="11">호른</option>
                                        <option value="12">비올라</option>
                                        <option value="13">팀파니</option>
                                        <option value="14">기타 (직접작성)</option>
                                        <option value="15">부 전공을 선택해주세요</option>
                                        <option value="16">주요이력</option>
                                        <option value="17">(중복선택가능)</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row form-item">
                            <div class="col-md-3">
                                주요이력
                            </div>
                            <div class="col-md-9">
                                <div style="flex-wrap: wrap;gap:0.5rem" class="d-flex main-profile-wrapper">
                                    <label class="custom-checkbox">
                                        <input type="checkbox" name="main_profile[]" value="1">
                                        <span class="icon">
                                    <i class="fas fa-check"></i>
                                </span>
                                        <span class="text">
전국규모 (콩쿨)대회 및 연주회 참여</span>
                                    </label>
                                    <label class="custom-checkbox">
                                        <input type="checkbox" name="main_profile[]" value="2">
                                        <span class="icon">
                                    <i class="fas fa-check"></i>
                                </span>
                                        <span class="text">시·도규모 (콩쿨) 대회 및 연주회 참여</span>
                                    </label>
                                    <label class="custom-checkbox">
                                        <input type="checkbox" name="main_profile[]" value="3">
                                        <span class="icon">
                                    <i class="fas fa-check"></i>
                                </span>
                                        <span class="text">공공·민간기관 주최 (콩쿨) 대회 및 연주회 참여</span>
                                    </label>
                                    <label class="custom-checkbox">
                                        <input type="checkbox" name="main_profile[]" value="4">
                                        <span class="icon">
                                    <i class="fas fa-check"></i>
                                </span>
                                        <span class="text">기관 및 기업소속 연주단 소속 경력</span>
                                    </label>
                                    <label class="custom-checkbox">
                                        <input type="checkbox" name="main_profile[]" value="5">
                                        <span class="icon">
                                    <i class="fas fa-check"></i>
                                </span>
                                        <span class="text">프리랜서 연주자 활동</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row form-item">
                            <div class="col-md-3">
                                활동내용
                            </div>
                            <div class="col-md-9">
                                <div class="duplicate-section activity">
                                    <div class="d-flex" style="gap:0.5rem">
                                        <div style="width:33%">
                                            <input type="date" class="activity_start_date validate-required"
                                                   placeholder="년도 월 일" style="width:100%">
                                            <div class="error-msg"></div>
                                        </div>

                                        <div style="width:33%">
                                            <input type="date" class="activity_end_date validate-required"
                                                   placeholder="년도 월 일" style="width:100%">
                                            <div class="error-msg"></div>
                                        </div>

                                        <div style="width:33%">
                                            <input type="text"
                                                   class="activity_organization validate-required"
                                                   style="width:100%"
                                                   placeholder="소속/기관/단체명 또는 대회/연주회명을 입력해주세요.">
                                            <div class="error-msg"></div>
                                        </div>

                                        <div class="btn-add-more">+</div>
                                    </div>

                                    <div style="margin-top:0.5rem">
                                        <input class="activity_content validate-required" type="text"
                                               style="width:100%"
                                               placeholder="직무와 관련한 교육한 교육의 내용을 요약하여 작성해주세요. (50자이내)">
                                        <div class="error-msg"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row form-item">
                            <div class="col-md-3">
                                교육
                            </div>
                            <div class="col-md-9">
                                <div class="duplicate-section training">
                                    <div class="d-flex" style="gap:0.5rem">
                                        <div>
                                            <input type="text" class="training_name"
                                                   placeholder="교육명">
                                            <div class="error-msg"></div>
                                        </div>

                                        <div>
                                            <input type="text" class="training_organization"
                                                   placeholder="교육기관">
                                            <div class="error-msg"></div>
                                        </div>

                                        <div>
                                            <input type="date" class="training_start_date" placeholder="년도 월 일">
                                            <div class="error-msg"></div>
                                        </div>

                                        <div>
                                            <input type="date" class="training_end_date" placeholder="년도 월 일">
                                            <div class="error-msg"></div>
                                        </div>


                                        <div class="btn-add-more">+</div>
                                    </div>
                                    <div>
                                        <input type="text" class="validate-required training_content"
                                               style="width:100%;margin-top:0.5rem"
                                               placeholder="직무와 관련한 교육한 교육의 내용을 요약하여 작성해주세요. (50자이내)"
                                               name="training_content">
                                        <div class="error-msg"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div style="width: fit-content; " class="pt-2 m-auto">
                            <div class="btn btn-light border">이전단계</div>
                            <div class="btn btn-secondary">임시저장</div>
                            <button class="btn btn-primary" type="submit">다음단계
                            </button>
                        </div>
                    </div>
                </form>

                <div class="tab-content hidden">
                    <form id="form_step_3" method="post" class="needs-validation">
                        <h3>자격증/수상/포트폴리오</h3>
                        <hr>
                        <div class="row form-item">
                            <div class="col-md-3">
                                자격증
                            </div>
                            <div class="col-md-9">
                                <div class="duplicate-section certificate form-item">
                                    <div class="d-flex" style="gap:0.5rem">
                                        <div>
                                            <input type="text" class="certificate_name validate-required"
                                                   placeholder="자격증명">
                                            <div class="error-msg"></div>
                                        </div>
                                        <div>
                                            <input type="text" class="certificate_issued_by validate-required"
                                                   placeholder="발행처">
                                            <div class="error-msg"></div>
                                        </div>
                                        <div>
                                            <input type="date" class="certificate_date_issued validate-required"
                                                   placeholder="dd-mm-yyyy"
                                                   value="1997-01-01">
                                            <div class="error-msg"></div>
                                        </div>
                                        <button class="btn-add-more" type="button">+</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row form-item">
                            <div class="col-md-3">
                                수상
                            </div>
                            <div class="col-md-9">
                                <div class="duplicate-section award form-item">
                                    <div class="d-flex" style="gap:0.5rem">
                                        <div>
                                            <input type="text" class="award_name validate-required"
                                                   placeholder="대회/수상명">
                                            <div class="error-msg"></div>
                                        </div>
                                        <div>
                                            <input type="text" class="award_issued_by validate-required"
                                                   placeholder="수여기관">
                                            <div class="error-msg"></div>
                                        </div>
                                        <div>
                                            <input type="date" class="award_date_issued validate-required"
                                                   placeholder="Ngày-tháng-năm">
                                            <div class="error-msg"></div>
                                        </div>
                                        <div>
                                            <select class="award_type validate-required" style="width: fit-content">
                                                <option value="">수상구분</option>
                                                <option value="1">입상</option>
                                                d
                                                <option value="2">금상</option>
                                                d
                                                <option value="3">은상</option>
                                                d
                                                <option value="4">동상</option>
                                                d

                                                <option value="5">1위</option>
                                                <option value="6">2위</option>
                                                <option value="7">3위</option>
                                            </select>
                                            <div class="error-msg"></div>
                                        </div>
                                        <button class="btn-add-more" type="button">+</button>
                                    </div>
                                    <div style="gap:0.5rem;margin-top:0.5rem">
                                        <input type="text" class="award_content validate-required"
                                               placeholder="수상내용을 입력해주세요.(30자이내)">
                                        <div class="error-msg"></div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="row form-item">
                            <div class="col-md-3">
                                포트폴리오
                            </div>
                            <div class="col-md-9">
                                <div style="gap:0.5rem;margin-top:0.5rem">
                                    <input type="file" id="portfolio_file" accept="image/*"
                                           class="validate-required"
                                           placeholder="Chưa có file nào được chọn">
                                    <div class="error-msg"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row form-item">
                            <div class="col-md-3">
                                링크
                            </div>
                            <div class="col-md-9">
                                <div style="gap:0.5rem;margin-top:0.5rem">
                                    <input type="url" id="step4Url" class="validate-required" placeholder="https://">
                                    <div class="error-msg"></div>
                                </div>
                            </div>
                        </div>
                        <div style="display: flex; justify-content: center; align-items: center; margin-top: 1rem;">
                            <div>
                                <button class="btn btn-light border" type="button">이전단계</button>
                            </div>

                            <div style="margin-left: 0.5rem; margin-right: 0.5rem">
                                <button class="btn btn-secondary" type="submit">임시저장</button>
                            </div>

                            <div>
                                <button class="btn btn-primary" type="button">다음단계</button>
                            </div>

                        </div>
                    </form>

                </div>
                </form>
                <form action="../ktl/php/fnc/signup_step_4.php" method="post" id="form_step_4">
                    <div class="tab-content hidden">
                        <h3>자기 소개서</h3>
                        <div class="row form-item">
                            <div class="col-md-3">
                                항목구분
                            </div>
                            <div class="col-md-9">
                                <div class="duplicate-section self-introduction">
                                    <div class="d-flex" style="gap:0.5rem">
                                        <select class="self_introduction_type" value="">
                                            <option value="0" checked>성장과정</option>
                                            <option value="1">지원동기</option>
                                            <option value="2">성격의 장단점</option>
                                            <option value="3">입사 후 포부</option>
                                            <option value="4">자신이 타인에 비해 차별화 된 점과 이를 갖추기 위해 어떤 노력을 했는지 기술
                                            </option>
                                            <option value="5">
                                                어려운 일을 끝까지 수행해내어 성공하였거나, 노력 했지만 실패한 경험들 중 한 가지 사례를 선태하여 서술
                                            </option>
                                            <option value="6">
                                                직접 입력
                                            </option>

                                        </select>
                                        <div class="btn-add-more">+</div>
                                    </div>
                                    <div>
                                        <textarea class="form-control self_introduction_content validate-required"
                                                  style="margin-top:0.5rem;height: 10rem"></textarea>
                                        <div class="error-msg"></div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div style="display: flex; justify-content: center; align-items: center; margin-top: 1rem;">
                            <div>
                                <button class="btn btn-light border" type="button">이전단계</button>
                            </div>

                            <div style="margin-left: 0.5rem; margin-right: 0.5rem">
                                <button class="btn btn-secondary" type="submit">임시저장</button>
                            </div>

                            <div>
                                <button class="btn btn-primary" type="button">다음단계</button>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="tab-content hidden">
                    <h3>자기소개서 (최대 3개 입력가능)
                    </h3>
                    <hr>
                    <div style="background:rgba(191,182,182,0.26);padding:0.8rem;border-radius: 0.5rem">
                        <p>지원자 동의 서약서</p>
                        <p>
                            1. 본인은 “[한국산업기술시험원] 장애인 전형 단기계약근로자(사무보조) 추가채용”에 지원함에 있어 인사 청탁 등 불명예스러운 일을 하지 않을 것이며,
                            이를 어길 시 어떠한 불이익도 감수 할 것을 서약합니다.

                            2. 지원서 상의 모든 기재 사항은 사실과 다름이 없음을 증명하며, 차후 지원서 상의 내용이 허위로 판명되어 합격 또는 입사가 취소 되더라도
                            이의를 제기하지 않을것을 서약합니다.
                        </p>
                        <p>
                            <span>제출일</span>
                            <span>2022-12-01</span>
                        </p>
                        <p>
                            <span>지원자</span>
                            <span>Nguyễn Thành Luân</span>
                        </p>
                    </div>


                    <div class="float-right clear">
                        <label class="accept">
                            <input type="checkbox">&nbsp;위 내용을 모두 확인하였으며, 이에 동의합니다.
                        </label>
                    </div>

                    <hr class="clear">

                    <div>
                        <div class="form-item row">
                            <div class="col-md-3">
                                필수 첨부자료
                            </div>

                            <div class="col-md-9">
                                *첨부파일 형식은 PDF Word, JPEG, PNG로 제출부탁드립니다.
                                <input type="file" style="margin-top: 0.5rem">
                                <a style="color: black; font-size: 17px; text-decoration: underline"
                                   href="uploads/[별첨1] 개인정보제공동의서.pdf" download="">※정보제공동의서 파일 다운로드</a>
                            </div>
                        </div>
                        <div class="m-auto pt-2" style="width: fit-content">
                            <button class="btn btn-light border">이전단계</button>
                            <button class="btn btn-primary">최종제출</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <?php include 'php/common_footer.php' ?>
</div>

</body>

<script>

    document.querySelectorAll('.writer input').forEach((item, index) => {
        item.addEventListener('click', () => {
            if (index === 0) {
                $('.more_info_writer').addClass('none')
                    .find('input').val('')
                    .next('.error-msg').text('');
            } else {
                $('.more_info_writer').removeClass('none')
            }
        });
    })

    // handle submit step 1
    $('#form_step_1').submit(function (event) {
        console.log('submit step 3');

        event.preventDefault();

        //validate step 1
        let isValid = true;

        $('#form_step_1 .radio-required').each(function (index, value) {
            console.log('radio-required', $(this).hasClass('disabilities'));

            if ($(this).hasClass('disabilities')) {
                if ($(this).find('input[type=radio]')[0].checked)
                    $('#content_disabilities').addClass('validate-required');
                else
                    $('#content_disabilities').removeClass('validate-required').next('.error-msg').html('');
            } else if ($(this).hasClass('writer')) {
                const radioTags = $(this).find('input[type=radio]');
                if (radioTags[1].checked || radioTags[2].checked) {
                    $(this).parent()
                        .find('.more_info_writer')
                        .removeClass('none')
                        .find('input').addClass('validate-required');
                } else {
                    $(this).parent().find('.more_info_writer')
                        .addClass('none')
                        .find('input')
                        .val('')
                        .removeClass('validate-required')
                        .next('.error-msg').html('');
                }
            }

            if ($(this).find('input[type=radio]:checked').length == 0) {
                $(this).next('.error-msg')
                    .html('이 필드는 필수 항목입니다.');
                isValid = false;
            } else {
                isValid = true;
                $(this).next('.error-msg').html('');
            }
        });


        $('#form_step_1 .validate-required').each(function (index, value) {
            if ($(this).val() == '' && !$(this).closest('.form-item').hasClass('disable-input')) {
                $(this).next('.error-msg')
                    .html('이 필드는 필수 항목입니다.');
                isValid = false;
            } else {
                $(this).next('.error-msg').html('');
            }
        });


        console.log('is valid', isValid);
        if (!isValid) {
            alert("누락된 정보를 확인해주세요.");
            return;
        }

        //    handle ajax step1
        save();
    });

    //    handle submit step3
    $('#form_step_3').submit(function (event) {
        console.log('submit step 3');

        event.preventDefault();


        //validate step 3
        let isValid = true;
        $('#form_step_3 .validate-required').each(function (index, value) {
            if ($(this).val() == '' && !$(this).closest('.form-item').hasClass('disable-input')) {
                $(this).next('.error-msg').html('이 필드는 필수 항목입니다.');
                isValid = false;
            } else {
                $(this).next('.error-msg').html('');
            }
        });

        console.log('is valid', isValid);
        if (!isValid) {
            alert("Vui lòng nhập đầy đủ thông tin");
            return;
        }
        //end validate

        //    handle ajax step2
        const payload = handSubmitTempStep3();

        const formData = new FormData();
        formData.append('data', JSON.stringify(payload));
        formData.append('portfolio', payload.portfolio);
        delete payload.portfolio;

        $.ajax({
            url: 'php/fnc/signup_step3.php',
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function (data) {
                if (data == 1) {
                    $('#form_step_3')[0].reset();
                    alert('Đăng ký thành công')
                } else {
                    alert('Đăng ký thất bại')
                }

            },
            error: function (data) {
                alert('Server got error!')
            }
        });

    });

    //    handle submit step4
    $('#form_step_4').submit(function (event) {
        console.log('submit step 4');
        event.preventDefault();


        //validate step 3
        let isValid = true;
        $('#form_step_4 .validate-required').each(function (index, value) {
            if ($(this).val() == '' && !$(this).closest('.form-item').hasClass('disable-input')) {
                $(this).next('.error-msg').html('이 필드는 필수 항목입니다.');
                isValid = false;
            } else {
                $(this).next('.error-msg').html('');
            }
        });

        console.log('is valid', isValid);
        if (!isValid) {
            alert("Vui lòng nhập đầy đủ thông tin");
            return;
        }
        //end validate

        //    handle ajax step4
        const payload = handSubmitTempStep4();

        const formData = new FormData();
        formData.append('data', JSON.stringify(payload));

        $.ajax({
            url: 'php/fnc/signup_step_4.php',
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function (data) {
                if (data == 1) {
                    // reset original form
                    $("#form_step_4 .self-introduction:not(#form_step_4 .self-introduction:first)").remove();
                    $("#form_step_4 .self_introduction_content:first").val('');
                    alert('Đăng ký thành công')
                } else {
                    alert('Đăng ký thất bại')
                }

            },
            error: function (data) {
                alert('Server got error!')
            }
        });


    });


    // function handSubmitStep2() {
    //     $('#form_step_2').submit(function (){
    //          alert($("#hight_school").val());
    //         //  alert($("#status_graduate").val());
    //         // alert($("#date_graduate_school").val());
    //         //  alert($('input[name="injoin_university"]:checked').val());
    //
    //         // alert($('input[name="not_injoin_university"]:checked').val());
    //
    //          alert($("#academy_name").val());
    //         // alert($("#academy_start_date").val());
    //         // alert($("#academy_end_date").val());
    //         // alert($("#academy_major").val());
    //         // alert($("#academy_avager_gpa").val());
    //         // alert($("#academy_total_gpa").val());
    //         // alert($("#postgraduate_name").val());
    //         // alert($("#postgraduate_start_date").val());
    //         // alert($("#postgraduate_end_date").val());
    //         // alert($("#postgraduate_major").val());
    //         // alert($("#postgraduate_avage_gpa").val());
    //         // alert($("#postgraduate_total_gpa").val());
    //         //
    //         // alert($("#activity_start_date").val());
    //         // alert($("#activity_end_date").val());
    //         // alert($("#activity_organization").val());
    //         // alert($("#activity_content").val());
    //         // alert($("#postgraduate_total_gpa").val());
    //         //
    //         //
    //         // alert($("#training_name").val());
    //         // alert($("#training_organization").val());
    //         // alert($("#training_date_start").val());
    //         // alert($("#training_end_date").val());
    //         // alert($("#training_content").val());
    //
    //
    //
    //     });
    // }


    function changePlusToMinus(index, removeDuplicateSection) {
        if (index > 0) {
            $(this).html('-');
            $(this).click(function () {
                removeDuplicateSection($(this));
            });
        }
    }

    $('.btn-add-more').each(function (index, value) {
        $(this).attr('data-count', 0);
    });

    function reIndex() {
        $('.self-introduction').each(function (index, value) {
            $(this).find('select.self_introduction_type')
                .attr('name', `self_introduction[${index}][type]`)
                .attr('data-index', index);

            console.log('current index', index);
            $(this).find('textarea.self_introduction_content').attr('name', `self_introduction[${index}][content]`);
        });

        $('.academy').each(function (index, value) {
            $(this).find('input.academy_type').attr('name', `academy[${index}][type]`);
            $(this).find('input.academy_name').attr('name', `academy[${index}][name]`);
            $(this).find('input.academy_start_date').attr('name', `academy[${index}][start_date]`);
            $(this).find('input.academy_end_date').attr('name', `academy[${index}][end_date]`);
            $(this).find('input.academy_major').attr('name', `academy[${index}][major]`);
            $(this).find('input.academy_gpa').attr('name', `academy[${index}][gpa]`);
            $(this).find('input.academy_total_score').attr('name', `academy[${index}][total_score]`);
            $(this).find('select.academy_status').attr('name', `academy[${index}][status]`);
        });

        $('.postgraduate').each(function (index, value) {
            $(this).find('input.postgraduate_type').attr('name', `postgraduate[${index}][type]`);
            $(this).find('input.postgraduate_name').attr('name', `postgraduate[${index}][name]`);
            $(this).find('input.postgraduate_start_date').attr('name', `postgraduate[${index}][start_date]`);
            $(this).find('input.postgraduate_end_date').attr('name', `postgraduate[${index}][end_date]`);
            $(this).find('input.postgraduate_major').attr('name', `postgraduate[${index}][major]`);
            $(this).find('input.postgraduate_gpa').attr('name', `postgraduate[${index}][gpa]`);
            $(this).find('input.postgraduate_total_score').attr('name', `postgraduate[${index}][total_score]`);
            $(this).find('select.postgraduate_status').attr('name', `postgraduate[${index}][status]`);
            $(this).find('select.postgraduate_degree').attr('name', `postgraduate[${index}][degree]`);
        });

        $('.activity').each(function (index, value) {
            $(this).find('input.activity_start_date').attr('name', `activity[${index}][start_date]`);
            $(this).find('input.activity_end_date').attr('name', `activity[${index}][end_date]`);
            $(this).find('input.activity_organization').attr('name', `activity[${index}][organization]`);
            $(this).find('input.activity_content').attr('name', `activity[${index}][content]`);
        });

        $('.training').each(function (index, value) {
            $(this).find('input.training_name').attr('name', `training[${index}][name]`);
            $(this).find('input.training_start_date').attr('name', `training[${index}][start_date]`);
            $(this).find('input.training_end_date').attr('name', `training[${index}][end_date]`);
            $(this).find('input.training_organization').attr('name', `training[${index}][organization]`);
            $(this).find('input.training_content').attr('name', `training[${index}][content]`);
        });

        $('.certificate').each(function (index, value) {
            $(this).find('input.certificate_name').attr('certificate_name', `certificate[${index}][name]`);
            $(this).find('input.certificate_issued_by').attr('certificate_issued_by', `certificate[${index}][issued_by]`);
            $(this).find('input.certificate_date_issued').attr('certificate_date_issued', `certificate[${index}][date_issued]`);
        });

        $('.award').each(function (index, value) {
            $(this).find('input.award_name').attr('award_name', `award[${index}][name]`);
            $(this).find('input.award_issued_by').attr('award_issued_by', `award[${index}][issued_by]`);
            $(this).find('input.award_date_issued').attr('award_date_issued', `award[${index}][date_issued]`);
            $(this).find('input.award_type').attr('award_type', `award[${index}][type]`);
            $(this).find('input.award_content').attr('award_content', `award[${index}][content]`);
        });
    }


    $(document).ready(function () {
        $('.injoin_university input[type="radio"]').change(function () {
            if ($(this).is(':checked') && $(this).val() == 1) {
                $('.disable-input').removeClass('disable-input');
                $(this).closest('.high-school-row').addClass('disable-input');
                $(this).closest('.high-school-row').find('select[name="status_graduate"]').addClass('disable-input');
            } else {
                $('.disable-input').removeClass('disable-input');
                $(this).closest('.high-school-row').parent().find('.academy-row')
                    .addClass('disable-input');
                $(this).closest('.high-school-row').parent().find('.postgraduate-row')
                    .addClass('disable-input');
            }
        });
        reIndex();
        $('.tab-heading .tab-item').click(function () {
            $(this).closest('.tab-wrapper').find('.tab-item').removeClass('active');
            $(this).addClass('active');
            const tabIndex = parseInt($(this).attr('tabindex')) - 1;
            $('.tab-wrapper .tab-content').addClass('hidden');
            $(this).closest('.tab-wrapper').find('.tab-content').eq(tabIndex).removeClass('hidden');
        })

        $('.btn-add-more').click(function () {
            let dataCount = parseInt($(this).attr('data-count'));
            if (dataCount < 3) {
                const duplicateSection = $(this).closest('.duplicate-section');
                console.log(duplicateSection.html());
                $(this).closest('.duplicate-section').parent().append(duplicateSection.clone());
                indexing();
                dataCount++;
                $(this).closest('.duplicate-section').parent().find('.duplicate-section').last().find('select').val('');
                $(this).closest('.duplicate-section').parent().find('.duplicate-section').last().find('textarea').val('');
                $(this).attr('data-count', dataCount);
            }
        })

        const indexing = () => {
            reIndex();

            $('.self-introduction .btn-add-more').each(function (index, value) {
                changePlusToMinus.call(this, index, removeDuplicateSection);
                setTimeout(() => {
                    const lastSelectTag = $('select.self_introduction_type:last');
                    lastSelectTag.val(lastSelectTag.attr('data-index'));
                }, 100);
            });

            $('.academy .btn-add-more').each(function (index, value) {
                changePlusToMinus.call(this, index, removeDuplicateSection);
            });
            $('.postgraduate .btn-add-more').each(function (index, value) {
                changePlusToMinus.call(this, index, removeDuplicateSection);
            });
            $('.activity .btn-add-more').each(function (index, value) {
                changePlusToMinus.call(this, index, removeDuplicateSection);
            });
            $('.training .btn-add-more').each(function (index, value) {
                changePlusToMinus.call(this, index, removeDuplicateSection);
            });
            $('.certificate .btn-add-more').each(function (index, value) {
                changePlusToMinus.call(this, index, removeDuplicateSection);
            });
            $('.award .btn-add-more').each(function (index, value) {
                changePlusToMinus.call(this, index, removeDuplicateSection);
            });
        }


        const removeDuplicateSection = (element) => {
            console.log($(element)
                .closest('.duplicate-section')
                .parent().find('.btn-add-more').attr('data-count'));
            let dataCount = parseInt($(element)
                .closest('.duplicate-section')
                .parent().find('.btn-add-more').attr('data-count'));
            if (dataCount > 0) {
                dataCount--;
                $(element)
                    .closest('.duplicate-section')
                    .parent().find('.btn-add-more')
                    .attr('data-count', dataCount);
            }

            $(element).closest('.duplicate-section').remove();
            indexing();
        }


    });
</script>
<script>
    $('#form_step_2').submit(function (event) {
        event.preventDefault();
        //validate step 2
        let isValid = true;
        $('#form_step_2 .validate-required').each(function (index, value) {
            if ($(this).val() == '' && !$(this).closest('.form-item').hasClass('disable-input')) {
                $(this).next('.error-msg').html('이 필드는 필수 항목입니다.');
                isValid = false;
            } else {
                $(this).next('.error-msg').html('');
            }
        });
        if (!isValid) {
            alert("Vui lòng nhập đầy đủ thông tin");
            return;
        }
        //end validate


        const payload = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "ajax/save-signup.php",
            data: payload,
            success: function () {
                alert("Add OK");
            },
            error: function () {
                alert("Add Lỗi");
            }
        });
    });
</script>

<style>
    .hidden {
        display: none
    }

    .tab-wrapper .tab-content {
        padding-left: 2rem;
        padding-right: 2rem;
    }

    .tab-wrapper .tab-item {
        cursor: pointer;
        width: 100%;
        font-size: 1rem;
        padding: 8px 2px 8px 2px;
        text-align: center;
        box-sizing: border-box;
        margin: 0.4rem 0 1rem;
        background: #f0f0f0;
    }

    .tab-wrapper .tab-item {
        border-right: 0.5px solid #cdcdcd
    }

    .tab-wrapper .tab-item:last-child {
        border: none
    }

    .tab-wrapper .tab-item.active {
        color: white;
        background: linear-gradient(to right, #3b73e4 0%, #0559b5 100%);
    }

    .form-item {
        border-bottom: 1px solid #e8e8ea;
    }

    .form-item > div:first-child {
        background: rgba(232, 232, 234, 0.45);
        display: flex;
        align-items: center;
    }

    .form-item > div:last-child {
        padding-top: 16px;
        padding-bottom: 16px;
    }

    input:not([type='radio']),
    select {
        width: 100%;
        height: 2.4rem;
        border-radius: 0.2rem;
        box-sizing: border-box;
        padding: 0 0.9rem;
        border: 1px solid #e4e4e4;
        font-size: 1rem;
        letter-spacing: -0.35px;
        color: #222;
        font-weight: var(--medium);
    }

    input[type="checkbox"] {
        width: 1.2rem;
    }

    .accept {
        cursor: pointer;
        margin-top: 0.5rem;
    }

    .accept input {
        width: 1.2rem;
        height: 1.2rem;
        cursor: pointer;
    }

    input:focus, select:focus {
        border-color: #4880ef;
    }

    label input[type="radio"] + span {
        border: 2px solid #e4e4e4;
        cursor: pointer;
        display: inline-block;
        min-width: 4rem;
        text-align: center;
        border-radius: 0.2rem;
        height: 2.4rem;
        padding-top: 0.3rem;
        padding-left: 0.6rem;
        padding-right: 0.6rem;
    }

    label.custom-checkbox input[type="radio"] + span {
        border: unset;
        cursor: unset;
        display: unset;
        min-width: unset;
        text-align: unset;
        height: unset;
        padding-top: unset;
        padding-left: unset;
        padding-right: unset;
    }

    label input[type="radio"] {
        display: none;
    }

    input[type="file"] {
        height: unset;
        padding-top: 0.5rem;
        padding-bottom: 0.5rem
    }

    label input[type="radio"]:checked + span {
        color: #4880ef;
        border: 2px solid #4880ef;
    }

    .container {
        min-width: unset;
    }

    .btn-add-more {
        padding: 0.2rem 1rem;
        border-radius: 0.2rem;
        background: black;
        color: white;
        margin-bottom: auto;
        margin-top: 0.2rem;
        cursor: pointer;
    }

    h3 {
        font-size: 1.6rem;
        letter-spacing: -0.24px;
        color: #212121;
        font-weight: var(--bold);
    }

    .custom-checkbox input {
        display: none;
    }

    .custom-checkbox .text {
        float: left;
        margin-left: 0.2rem;
    }

    .custom-checkbox .icon {
        display: inline-block;
        margin-top: 0.2rem;
        width: 1.2rem;
        height: 1.2rem;
        border: 1px solid #e4e4e4;
        border-radius: 999px;
        float: left
    }


    .custom-checkbox .icon .fas {
        display: none;
        cursor: pointer;
        color: white;
        margin-top: 0.1rem;
    }

    .custom-checkbox input:checked + .icon {
        background: #0077ff;
    }

    .custom-checkbox input:checked + .icon .fas {
        display: block;
    }

    .duplicate-section {
        margin-top: 0.5rem;
    }

    label.custom-circle-radio .icon {
        display: inline-block;
        margin-top: 0.2rem;
        width: 1.2rem;
        height: 1.2rem;
        border: 1px solid #e4e4e4;
        border-radius: 999px;
        float: left;
        min-width: unset;
        padding: unset;
    }

    label.custom-circle-radio .icon .fas {
        display: none;
        cursor: pointer;
        color: white;
        margin-top: 0.1rem;
    }

    label.custom-circle-radio input:checked + .icon {
        background: #0077ff;
    }

    label.custom-circle-radio input:checked + .icon .fas {
        display: block;
    }

    label.custom-circle-radio .text {
        margin-left: 0.2rem
    }

    .academy-row.disable-input,
    .postgraduate-row.disable-input {
        pointer-events: none;
        opacity: 0.5;
    }

    select.disable-input {
        pointer-events: none;
        opacity: 0.5;
    }

    .high-school-row.disable-input .disable-section {
        pointer-events: none;
        opacity: 0.5;
    }

    .error-msg {
        font-size: 0.6rem;
        color: red;
    }
</style>


<script src="js/sign_up_step1.js" charset="utf-8"></script>
</html>

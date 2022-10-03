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
    <script src="js/sign_up_step1.js" charset="utf-8"></script>
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
                        Thông tin cơ bản
                    </div>
                    <div class="tab-item" tabindex="2">
                        Học lực/ kinh nghiệm
                    </div>
                    <div class="tab-item" tabindex="3">Chứng chỉ/giải thưởng</div>
                    <div class="tab-item" tabindex="4">Bản giới thiệu bản thân</div>
                    <div class="tab-item" tabindex="5">
                        Nộp
                    </div>
                </div>

                <form id="form_step_1">
                    <div class="tab-content">
                        <h3>Thông tin cơ bản</h3>
                        <hr>
                        <div>
                            <div class="row form-item">
                                <div class="col-md-3">
                                    <label for="">
                                        Tên
                                    </label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="" id="field-name"
                                           placeholder="Enter Name">
                                </div>
                            </div>

                            <div class="row form-item">
                                <div class="col-md-3">
                                    <label for="">
                                        SDT
                                    </label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="" id="field-phone"
                                           placeholder="Enter Phone">
                                </div>
                            </div>

                            <div class="row form-item">
                                <div class="col-md-3">
                                    <label for="">
                                        Email
                                    </label>
                                </div>
                                <div class="col-md-9">
                                    <input type="email" class="" id="field-email"
                                           placeholder="Enter Email">
                                </div>
                            </div>


                            <div class="row form-item">
                                <div class="col-md-3">
                                    <label for="">
                                        Địa chỉ
                                    </label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="address" class="" id="field-address"
                                           placeholder="Enter address">
                                </div>
                            </div>

                            <div class="row form-item">
                                <div class="col-md-3">
                                    <label for="">Khuyết tật</label>
                                </div>


                                <div class="col-md-9">
                                    <div class="d-flex" style="gap:0.5rem">
                                        <label>
                                            <input type="radio" name="disabilities" value="1">
                                            <span>
                                                <span>Có</span>
                                            </span>
                                        </label>

                                        <label>
                                            <input type="radio" name="disabilities" value="0">
                                            <span>
                                                <span>Không</span>
                                            </span>
                                        </label>

                                        <select name="level_disabilities " class="form-control" id="level_disabilities"
                                                style="width: 30%;margin-left:0.1rem">
                                            <option value="0">Nhẹ</option>
                                            <option value="1">Nặng</option>

                                        </select>

                                        <select name="content_disabilities " class="form-control"
                                                id="content_disabilities"
                                                style="width: 30%;margin-left:0.1rem">
                                            <option value="">Nội dung khuyết tật</option>
                                            <option value="0">Nội dung khuyết tật</option>
                                            <option value="1">Nội dung khuyết tật</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row form-item">
                                <div class="col-md-3">
                                    <label for="">Nghĩa vụ quân sự</label>
                                </div>

                                <div class="col-md-9">

                                </div>
                            </div>


                            <div class="row form-item">
                                <div class="col-md-3">
                                    <label for="">Đối tượng nghĩa vụ quân sự</label>
                                </div>

                                <div class="col-md-9">
                                    <div class="d-flex flex-wrap" style="gap:0.5rem">
                                        <label>
                                            <input type="radio" name="duty" value="0">
                                            <span>Không thuộc đối tượng</span>
                                        </label>
                                        <label>
                                            <input type="radio" name="duty" value="1">
                                            <span>Đã xuất ngũ</span>
                                        </label>
                                        <label>
                                            <input type="radio" name="duty" value="2">
                                            <span>Chưa tham gia</span>
                                        </label>
                                        <label>
                                            <input type="radio" name="duty" value="3">
                                            <span>Được miễn</span>
                                        </label>
                                        <label>
                                            <input type="radio" name="duty" value="4">
                                            <span>Đang tại ngũ</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row form-item">
                                <div class="col-md-3">
                                    Người điền đơn
                                </div>
                                <div class="col-md-9">
                                    <div class="d-flex" style="gap:0.5rem">
                                        <label>
                                            <input type="radio" name="single_user " value="0">
                                            <span>Tôi</span>
                                        </label>

                                        <label>
                                            <input type="radio" name="single_user " value="1">
                                            <span>Người bảo hộ</span>
                                        </label>

                                        <label>
                                            <input type="radio" name="single_user " value="2">
                                            <span>Người uỷ thác</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row form-item">
                                <div class="col-md-3">
                                    Chế độ ưu tiên
                                </div>
                                <div class="col-md-9">

                                    <div>Người có công</div>
                                    <div class="d-flex" style="margin-top:0.5rem;gap:0.5rem">
                                        <label>
                                            <input type="radio" name="meritorious_person " value="0">
                                            <span>Không</span>
                                        </label>

                                        <label>
                                            <input type="radio" name="meritorious_person " value="1">
                                            <span>Có</span>
                                        </label>
                                    </div>


                                    <div>Tầng lớp thu nhập thấp</div>
                                    <div class="d-flex" style="margin-top:0.5rem;gap:0.5rem">
                                        <label>
                                            <input type="radio" name="low_benefit " value="0">
                                            <span>Không</span>
                                        </label>

                                        <label>
                                            <input type="radio" name="low_benefit " value="1">
                                            <span>Có</span>
                                        </label>
                                    </div>

                                    <div>Người Triều Tiên di cư</div>
                                    <div class="d-flex" style="margin-top:0.5rem;gap:0.5rem">
                                        <label>
                                            <input type="radio" name="korea_migrate " value="0">
                                            <span>Không</span>
                                        </label>

                                        <label>
                                            <input type="radio" name="korea_migrate " value="1">
                                            <span>Có</span>
                                        </label>
                                    </div>

                                    <div>Con của gia đình di cư</div>
                                    <div class="d-flex" style="margin-top:0.5rem;gap:0.5rem">
                                        <label>
                                            <input type="radio" name="son-of-korea-migrate" value="0">
                                            <span>Không</span>
                                        </label>

                                        <label>
                                            <input type="radio" name="son-of-korea-migrate" value="1">
                                            <span>Có</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row form-item d-flex justify-content-center" style="gap:0.5rem;margin-top:1rem">
                                <button type="submit" class="btn btn-primary" onclick="save()">Submit</button>
                                <button type="submit" class="btn btn-primary" onclick="nextStep()">Tiếp theo</button>
                            </div>
                        </div>
                    </div>
                </form>

                <form method="post" id="form_step_2">
                    <input type="hidden" name="step" value="2">
                    <div class="tab-content hidden">
                        <h3>Học vấn/ Kinh nghiệm/ Chương trình giáo dục</h3>
                        <hr>
                        <div class="row form-item high-school-row">
                            <div class="col-md-3 disable-section">
                                <label for="">
                                    고등학교 학력
                                </label>
                            </div>

                            <div class="col-md-9">
                                <div class="d-flex" style="gap:0.5rem">
                                    <div class="d-flex disable-section" style="gap:0.5rem;flex-basis: 80%">
                                        <input type="text" name="high_school_name" class="high_school" id="high_school"
                                               placeholder="학교명" style="width:30%">
                                        <input type="date" class="date_graduate_school" id="date_graduate_school"
                                               placeholder="Năm tốt nghiệp" style="width: 30%">
                                        <select class="form-control" style="width:30%" name="status_graduate"
                                                id="status_graduate">
                                            <option value="1">Tốt nghiệp</option>
                                            <option value="0">Chưa tốt nghiệp</option>
                                        </select>
                                    </div>

                                    <div style="flex-wrap: wrap;gap:0.5rem" class="d-flex main-profile-wrapper">
                                        <label class="custom-circle-radio injoin_university">
                                            <input type="radio" name="injoin_university" value="1">
                                            <span class="icon">
                                    <i class="fas fa-check"></i>
                                </span>
                                            <span class="text">Tham gia tuyển sinh đại học</span>
                                        </label>


                                        <label class="custom-circle-radio injoin_university">
                                            <input type="radio" name="injoin_university" value="0">
                                            <span class="icon">
                                    <i class="fas fa-check"></i>
                                </span>
                                            <span class="text">Chưa tốt nghiệp THPT</span>
                                        </label>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row form-item academy-row">
                            <div class="col-md-3">
                                <label>Đại học</label>
                            </div>

                            <div class="col-md-9">
                                <div class="duplicate-section academy">
                                    <div class="d-flex" style="gap:0.5rem">
                                        <input type="text" class="academy_name" placeholder="Tên trường"
                                               id="academy_name">
                                        <input type="date" class="academy_start_date" placeholder="Tháng  năm nhập học"
                                               id="academy_start_date">
                                        <input type="date" class="academy_end_date" placeholder="Tháng năm tốt nghiệp"
                                               id="academy_end_date">
                                        <select class="academy_status">
                                            <option value="1">Tốt nghiệp</option>
                                            <option value="0">Chưa tốt nghiệp</option>
                                        </select>

                                        <div class="btn-add-more">+</div>
                                    </div>

                                    <div class="d-flex" style="margin-top:0.5rem;gap:0.5rem">
                                        <input type="text" class="academy_major" placeholder="Tên chuyên ngành">
                                        <input type="text" class="academy_gpa" placeholder="Điểm trung bình">
                                        <input type="text" class="academy_total_score" placeholder="Tổng điểm">

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row form-item postgraduate-row">
                            <div class="col-md-3">
                                Cao học
                            </div>
                            <div class="col-md-9">
                                <div class="duplicate-section postgraduate">
                                    <div class="d-flex" style="gap:0.5rem">
                                        <input type="text" class="postgraduate_name" placeholder="Tên trường">
                                        <input type="date" class="postgraduate_start_date"
                                               placeholder="Tháng năm nhập học">
                                        <input type="date" class="postgraduate_end_date"
                                               placeholder="Tháng năm tốt nghiệp">
                                        <select class="postgraduate_type">
                                            <option value="1"> Tốt nghiệp</option>
                                            <option value="0">Chưa tốt nghiệp</option>
                                        </select>
                                        <div class="btn-add-more">+</div>
                                    </div>
                                    <div class="d-flex" style="margin-top: 0.5rem;gap:0.5rem">
                                        <input type="text" class="postgraduate_major" placeholder="Tên chuyên ngành">
                                        <input type="text" class="postgraduate_gpa" placeholder="Điểm trung bình">
                                        <input type="text" class="postgraduate_total_score" placeholder="Tổng điểm">

                                        <select class="postgraduate_degree">
                                            <option value="0">Thạc sĩ</option>
                                            <option value="1">Tiến sĩ</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row form-item">
                            <div class="col-md-3">
                                Kinh nghiệm
                            </div>
                            <div class="col-md-9">
                                <div class="d-flex" style="gap:0.5rem">
                                    <select name="main_experience">
                                        <option value="0">바이올린</option>
                                        <option value="1">첼로</option>
                                        <option value="2">하프</option>
                                        <option value="3">풀루트</option>
                                        <option value="4">오보에</option>
                                        <option value="5">클라리넷</option>
                                        <option value="6">바순</option>
                                        <option value="7">트럼폣</option>
                                        <option value="8">호른</option>
                                        <option value="9">비올라</option>
                                        <option value="10">팀파니</option>
                                        <option value="11">기타 (직접작성)</option>
                                        <option value="12">부 전공을 선택해주세요</option>
                                        <option value="13">주요이력</option>
                                        <option value="14">(중복선택가능)</option>


                                    </select>
                                    <select name="extra_experience" id="">
                                        <option value="0">바이올린</option>
                                        <option value="1">첼로</option>
                                        <option value="2">하프</option>
                                        <option value="3">풀루트</option>
                                        <option value="4">오보에</option>
                                        <option value="5">클라리넷</option>
                                        <option value="6">바순</option>
                                        <option value="7">트럼폣</option>
                                        <option value="8">호른</option>
                                        <option value="9">비올라</option>
                                        <option value="10">팀파니</option>
                                        <option value="11">기타 (직접작성)</option>
                                        <option value="12">부 전공을 선택해주세요</option>
                                        <option value="13">주요이력</option>
                                        <option value="14">(중복선택가능)</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row form-item">
                            <div class="col-md-3">
                                Lý lịch chính
                            </div>
                            <div class="col-md-9">
                                <div style="flex-wrap: wrap;gap:0.5rem" class="d-flex main-profile-wrapper">
                                    <label class="custom-checkbox">
                                        <input type="checkbox" name="main_portfolio[]">
                                        <span class="icon">
                                    <i class="fas fa-check"></i>
                                </span>
                                        <span class="text">Tham gia cuộc thi buổi biễn diễn quy mô toàn quốc</span>
                                    </label>
                                    <label class="custom-checkbox">
                                        <input type="checkbox" name="main_portfolio[]">
                                        <span class="icon">
                                    <i class="fas fa-check"></i>
                                </span>
                                        <span class="text">Tham gia buổi biểu diễn quy mô tỉnh</span>
                                    </label>
                                    <label class="custom-checkbox">
                                        <input type="checkbox" name="main_portfolio[]">
                                        <span class="icon">
                                    <i class="fas fa-check"></i>
                                </span>
                                        <span class="text">Tham gia cuộc thi buổi biểu diễn do các tổ chức công tổ chức</span>
                                    </label>
                                    <label class="custom-checkbox">
                                        <input type="checkbox" name="main_portfolio[]">
                                        <span class="icon">
                                    <i class="fas fa-check"></i>
                                </span>
                                        <span class="text"> Từng tham gia đoàn diễn của cơ quan, xí nghiệp nhỏ</span>
                                    </label>
                                    <label class="custom-checkbox">
                                        <input type="checkbox" name="main_portfolio[]">
                                        <span class="icon">
                                    <i class="fas fa-check"></i>
                                </span>
                                        <span class="text">Đi diễn tự do</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row form-item">
                            <div class="col-md-3">
                                Nội dung hoạt động
                            </div>
                            <div class="col-md-9">
                                <div class="duplicate-section activity">
                                    <div class="d-flex" style="gap:0.5rem">
                                        <input type="date" class="activity_start_date" style="width:30%"
                                               placeholder="Năm/Tháng/Ngày">
                                        <input type="date" class="activity_end_date" style="width: 30%"
                                               placeholder="Năm/Tháng/Ngày">
                                        <input type="text" style="width:60%"
                                               class="activity_organization"
                                               placeholder=" Vui lòng nhập tên chi nhánh / tổ chức / nhóm hoặc tên cuộc thi / buổi hòa nhạc bạn đã tham gia.">
                                    </div>
                                    <div class="d-flex" style="margin-top:0.5rem;gap:0.5rem">
                                        <input class="activity_content" type="text"
                                               placeholder="Nhập nội dung hoạt động">
                                        <div class="btn-add-more">+</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row form-item">
                            <div class="col-md-3">
                                Đào tạo
                            </div>
                            <div class="col-md-9">
                                <div class="duplicate-section training">
                                    <div class="d-flex" style="gap:0.5rem">
                                        <input type="text" class="training_name" placeholder="Tên Chương trình đào tạo">
                                        <input type="text" class="training_organization"
                                               placeholder="Tên tổ chức đào tạo">
                                        <input type="date" class="training_date_start" placeholder="Ngày bắt đầu">
                                        <input type="date" class="training_end_date" placeholder="Ngày kết thúc">
                                        <div class="btn-add-more">+</div>
                                    </div>
                                    <div class="d-flex" style="margin-top:0.5rem">
                                        <input type="text" placeholder="Tóm tắt nội dung đào tạo"
                                               name="training_content">
                                    </div>
                                </div>
                            </div>
                            <div style="display: flex; justify-content: center; align-items: center; margin-top: 1rem;">
                                <div>
                                    <div class="btn btn-light">Bước trước</div>
                                </div>
                                <div style="margin-left: 0.5rem; margin-right: 0.5rem">
                                    <div class="btn btn-secondary"> Lưu tạm thời</div>
                                </div>
                                <div>
                                    <button class="btn btn-primary" type="submit" onclick="handSubmitStep2()"> Submit
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="tab-content hidden">
                    <h3>Bằng cấp, giải thưởng</h3>
                    <hr>
                    <div class="row form-item">
                        <div class="col-md-3">
                            Bằng cấp
                        </div>
                        <div class="col-md-9">
                            <div class="duplicate-section certificate">
                                <div class="d-flex" style="gap:0.5rem">
                                    <input type="text" class="certificate_name" placeholder="Tên bằng cấp/chứng chỉ">
                                    <input type="text" class="certificate_issued_by" placeholder="Nơi cấp">
                                    <input type="date" class="certificate_date_issued" placeholder="Ngày-tháng-năm">
                                    <button class="btn-add-more">+</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row form-item">
                        <div class="col-md-3">
                            Giải thưởng
                        </div>
                        <div class="col-md-9">
                            <div class="duplicate-section award">
                                <div class="d-flex" style="gap:0.5rem">
                                    <input type="text" class="award_name" placeholder="Tên cuộc thi/giải thưởng">
                                    <input type="text" class="award_issued_by" placeholder="Cơ quan cấp">
                                    <input type="date" class="award_date_issued" placeholder="Ngày-tháng-năm">
                                    <select class="cert_type">
                                        <option value="">Cert type</option>
                                        <option value="1">Động cơ</option>
                                        <option value="2">Điểm mạnh và điểm yếu của nhân các</option>
                                        <option value="3">Nguyện vọng sau khi tham gia</option>

                                    </select>
                                    <button class="btn-add-more">+</button>
                                </div>
                                <div class="d-flex" style="gap:0.5rem;margin-top:0.5rem">
                                    <input type="text" class="award_content" placeholder="Nhập nội dung giải thưởng">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row form-item">
                        <div class="col-md-3">
                            Portfolio
                        </div>
                        <div class="col-md-9">
                            <div class="d-flex" style="gap:0.5rem;margin-top:0.5rem">
                                <input type="file" id="portfolio_file" accept="image/*"
                                       placeholder="Chưa có file nào được chọn">
                            </div>
                        </div>
                    </div>

                    <div class="row form-item">
                        <div class="col-md-3">
                            Link
                        </div>
                        <div class="col-md-9">
                            <div class="d-flex" style="gap:0.5rem;margin-top:0.5rem">
                                <input type="url" id="step4Url" placeholder="https://">
                            </div>
                        </div>
                    </div>
                    <div style="display: flex; justify-content: center; align-items: center; margin-top: 1rem;">
                        <div>
                            <button class="btn btn-light">Bước trước</button>
                        </div>
                        <div style="margin-left: 0.5rem; margin-right: 0.5rem">
                            <button class="btn btn-secondary" onclick="handSubmitTempStep3()"> Lưu tạm thời</button>
                        </div>
                        <div>
                            <button class="btn btn-primary" onclick="handSubmitStep3()"> Submit</button>
                        </div>
                    </div>

                </div>
                </form>
                <form action="../ktl/php/fnc/signup_step_4.php" method="post" id="form_step_4">
                    <div class="tab-content hidden">
                        <h3>Bản giới thiệu bản thân</h3>
                        <div class="row form-item">
                            <div class="col-md-3">
                                Quá trình trưởng thành
                            </div>
                            <div class="col-md-9">
                                <div class="duplicate-section self-introduction">
                                    <div class="d-flex" style="gap:0.5rem">
                                        <select class="self_introduction_type" value="0">
                                            <option value="0" checked>Quá trình trưởng thành</option>
                                            <option value="1">Động cơ</option>
                                            <option value="2">Điểm mạnh và điểm yếu của nhân các</option>
                                            <option value="3">Nguyện vọng sau khi tham gia</option>
                                            <option value="4">Mô tả điều gì khác biệt với những người khác và những nỗ
                                                lực
                                                bạn đã thực
                                                hiện để đạt được điều đó
                                            </option>
                                            <option value="5">
                                                Chọn và mô tả một ví dụ về trải nghiệm mà bạn đã thành công khi hoàn
                                                thành
                                                một
                                                nhiệm vụ khó khăn và bạn thử nhưng không thành công
                                            </option>

                                        </select>
                                        <div class="btn-add-more">+</div>
                                    </div>
                                    <textarea class="form-control self_introduction_content"
                                              style="margin-top:0.5rem;height: 10rem"></textarea>

                                </div>
                            </div>
                        </div>
                        <div style="display: flex; justify-content: center; align-items: center; margin-top: 1rem;">
                            <div>
                                <button class="btn btn-light">Bước trước</button>
                            </div>
                            <div style="margin-left: 0.5rem; margin-right: 0.5rem">
                                <button class="btn btn-secondary" id="tempStep5" onclick="handSubmitTempStep4()"
                                        type="button"> Lưu tạm thời
                                </button>
                            </div>
                            <div>
                                <button class="btn btn-primary" onclick="handSubmitStep4()" type="button"> Submit
                                </button>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="tab-content hidden">
                    <h3>Bản thân</h3>
                    <hr>
                    <div style="background:rgba(191,182,182,0.26);padding:0.8rem;border-radius: 0.5rem">
                        <p>Cam kết đồng ý của ứng viên</p>
                        <p>
                            is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                            industry's standard dummy text ever since the 1500s, when an unknown printer took a
                            galley
                            of type and scrambled it to make a type specimen book
                        </p>
                        <p>
                            <span>Ngày gửi</span>
                            <span>2022-12-01</span>
                        </p>
                        <p>
                            <span>Người gửi</span>
                            <span>Nguyễn Thành Luân</span>
                        </p>
                    </div>


                    <div class="float-right clear">
                        <label class="accept">
                            <input type="checkbox">
                            Click để đồng ý tất cả nội dung trên</label>
                    </div>

                    <hr class="clear">

                    <div>
                        <div class="form-item row">
                            <div class="col-md-3">

                            </div>

                            <div class="col-md-9">
                                Thêm tệp đính kèm bằng cách định dạng như PDF, Word, JPEG, PNG (thêm ghi chú)
                                <input type="file" style="margin-top: 0.5rem">
                            </div>
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

    function handSubmitStep3() {
        console.log('submit step3')

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
                    alert('Đăng ký thành công')
                } else {
                    alert('Đăng ký thất bại')
                }

            },
            error: function (data) {
                alert('Server got error!')
            }
        });


    }

    function handSubmitStep4() {
        console.log('submit step4');

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
                    alert('Đăng ký thành công')
                } else {
                    alert('Đăng ký thất bại')
                }

            },
            error: function (data) {
                alert('Server got error!')
            }
        });
    }

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
            $(this).find('select.self_introduction_type').attr('name', `self_introduction[${index}][type]`);
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
        });

        const indexing = () => {
            reIndex();

            $('.self-introduction .btn-add-more').each(function (index, value) {
                changePlusToMinus.call(this, index, removeDuplicateSection);
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
    .postgraduate-row.disable-input
    {
        pointer-events: none;
        opacity: 0.5;
    }

    .high-school-row.disable-input .disable-section {
        pointer-events: none;
        opacity: 0.5;
    }
</style>


<script>
    $('#form_step_2').submit(function (event) {
        event.preventDefault();
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
</html>

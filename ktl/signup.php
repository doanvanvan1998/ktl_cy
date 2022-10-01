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

    <title>한국산업기술시험원</title>
</head>
<link rel="stylesheet" href="css/signup.css">
<body>

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
            <!--            action="../ktl/php/fnc/signup.php"-->
            <form method="post" id="onSubmit">
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
                                       placeholder="Enter email">
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
                                       placeholder="Enter email">
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
                                <input type="text" class="" id="field-address" name="address"
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

                                    <select name="level_disabilities" class="form-control"
                                            style="width: 30%;margin-left:0.1rem">
                                        <option value="">Mức độ khuyết tật</option>
                                        <option value="1">Nhẹ</option>
                                        <option value="2">Nặng</option>
                                        <option value="3">Niệm</option>
                                    </select>

                                    <select name="content_disabilities" class="form-control"
                                            style="width: 30%;margin-left:0.1rem">
                                        <option>Nội dung khuyết tật</option>
                                        <option value="0">
                                            không
                                        </option>
                                        <option value="1">
                                            có
                                        </option>
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
                                        <input type="radio" name="duty" value="không thuộc đối tượng">
                                        <span>Không thuộc đối tượng</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="duty" value="đã xuất ngũ">
                                        <span>Đã xuất ngũ</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="duty" value="chưa tham gia">
                                        <span>Chưa tham gia</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="duty" value="được miễn">
                                        <span>Được miễn</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="duty" value="đang xuất ngũ">
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
                                        <input type="radio" name="single_user" value="tôi">
                                        <span>Tôi</span>
                                    </label>

                                    <label>
                                        <input type="radio" name="single_user" value="người nội bộ">
                                        <span>Người bảo hộ</span>
                                    </label>

                                    <label>
                                        <input type="radio" name="single_user" value="người ủy thác">
                                        <span>Người uỷ thác</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row form-item">
                            <div class="col-md-3">
                                Người có công
                            </div>
                            <div class="col-md-9">
                                <div class="d-flex" style="gap:0.5rem">
                                    <label>
                                        <input type="radio" name="meritorious_person" value="0">
                                        <span>Không</span>
                                    </label>

                                    <label>
                                        <input type="radio" name="meritorious_person" value="1">
                                        <span>Có</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row form-item">
                            <div class="col-md-3">
                                Chế độ ưu tiên
                            </div>
                            <div class="col-md-9">
                                <div>Tầng lớp thu nhập thấp</div>
                                <div class="d-flex" style="margin-top:0.5rem;gap:0.5rem">
                                    <label>
                                        <input type="radio" name="low_benefit" value="0">
                                        <span>Không</span>
                                    </label>

                                    <label>
                                        <input type="radio" name="low_benefit" value="1">
                                        <span>Có</span>
                                    </label>
                                </div>

                                <div>Người Triều Tiên di cư</div>
                                <div class="d-flex" style="margin-top:0.5rem;gap:0.5rem">
                                    <label>
                                        <input type="radio" name="korea_migrate" value="0">
                                        <span>Không</span>
                                    </label>

                                    <label>
                                        <input type="radio" name="korea_migrate" value="1">
                                        <span>Có</span>
                                    </label>
                                </div>

                                <div>Con của gia đình di cư</div>
                                <div class="d-flex" style="margin-top:0.5rem;gap:0.5rem">
                                    <label>
                                        <input type="radio" name="son_of_korea_migrate" value="0">
                                        <span>Không</span>
                                    </label>

                                    <label>
                                        <input type="radio" name="son_of_korea_migrate" value="1">
                                        <span>Có</span>
                                    </label>
                                </div>
                            </div>
                        </div>

            </form>


            <div class="row form-item d-flex justify-content-center" style="gap:0.5rem;margin-top:1rem">
                <button onclick="handSubmit()" type="submit" class="btn btn-primary">Submit</button>
                <button type="submit" class="btn btn-primary">Tiếp theo</button>
            </div>
            <!--            end step1-->

        </div>
    </div>

    <div class="tab-content hidden">
        <h3>Học vấn/ Kinh nghiệm/ Chương trình giáo dục</h3>
        <hr>
        <div class="row form-item">
            <div class="col-md-3">
                <label for="">
                    Trường
                </label>
            </div>
            <div class="col-md-9">
                <div class="d-flex" style="gap:0.5rem">
                    <input type="text" class="" id="field-name"
                           placeholder="Tên trường" style="width:20%">
                    <input type="text" class="" id="field-name"
                           placeholder="Năm tốt nghiệp" style="width: 20%">
                    <select class="form-control" style="width:20%" name="" id="">
                        <option value="">Tình trạng TN</option>
                    </select>
                    <label>
                        <input type="radio" name="disabilities">
                        <span>
                                                <span>Tham gia tuyển sinh đại học</span>
                                            </span>
                    </label>
                    <label>
                        <input type="radio" name="disabilities">
                        <span>
                                                <span>Chưa tốt nghiệp THPT</span>
                                            </span>
                    </label>
                </div>
            </div>
        </div>


        <div class="row form-item">
            <div class="col-md-3">
                <label>Đại học</label>
            </div>

            <div class="col-md-9">
                <div class="d-flex" style="gap:0.5rem">
                    <select>
                        <option>Phân loại trường</option>
                    </select>

                    <input type="text" placeholder="Tên trường">
                    <input type="text" placeholder="Tháng  năm nhập học">
                    <input type="text" placeholder="Tháng năm tốt nghiệp">
                    <select>
                        <option>Tình trạng tốt nghiệp</option>
                    </select>
                </div>

                <div class="d-flex" style="margin-top:0.5rem;gap:0.5rem">
                    <input type="text" placeholder="Tên chuyên ngành">
                    <input type="text" placeholder="Điểm trung bình">
                    <select>
                        <option>Tổng điểm</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row form-item">
            <div class="col-md-3">
                Cao học
            </div>
            <div class="col-md-9">
                <div class="d-flex" style="gap:0.5rem">
                    <input type="text" placeholder="Tên trường">
                    <input type="text" placeholder="Tháng năm nhập học">
                    <input type="text" placeholder="Tháng năm tốt nghiệp">
                    <select name="">
                        <option>Tình trạng tốt nghiệp</option>
                    </select>
                </div>
                <div class="d-flex" style="margin-top: 0.5rem;gap:0.5rem">
                    <input type="text" placeholder="Tên chuyên ngành">
                    <input type="text" placeholder="Điểm trung bình">
                    <select>
                        <option>Tổng điểm</option>
                    </select>
                    <select>
                        <option value="">Học vị</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row form-item">
            <div class="col-md-3">
                Kinh nghiệm
            </div>
            <div class="col-md-9">
                <div class="d-flex" style="gap:0.5rem">
                    <select>
                        <option value="">Chọn chuyên nghành chính</option>
                    </select>
                    <select name="" id="">
                        <option>Chọn chuyên ngành phụ</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row form-item">
            <div class="col-md-3">
                Lý lịch chính
            </div>
            <div class="col-md-9">
                <div style="flex-wrap: wrap;gap:0.5rem" class="d-flex">
                    <label>
                        <input type="radio">
                        <span>Tham gia cuộc thi buổi biễn diễn quy mô toàn quốc</span>
                    </label>
                    <label for="">
                        <input type="radio">
                        <span>Tham gia buổi biểu diễn quy mô tỉnh/thành</span>
                    </label>
                    <label for="">
                        <input type="radio">
                        <span>Tham gia cuộc thi buổi biểu diễn do các tổ chức công tổ chức</span>
                    </label>
                    <label for="">
                        <input type="radio">
                        <span>
                                            Từng tham gia đoàn diễn của cơ quan, xí nghiệp nhỏ
                                        </span>
                    </label>
                    <label for="">
                        <input type="radio">
                        <span>Đi diễn tự do</span>
                    </label>
                </div>
            </div>
        </div>

        <div class="row form-item">
            <div class="col-md-3">
                Nội dung hoạt động
            </div>
            <div class="col-md-9">
                <div class="d-flex" style="gap:0.5rem">
                    <input type="date" style="width:30%" placeholder="Năm/Tháng/Ngày">
                    <input type="date" style="width: 30%" placeholder="Năm/Tháng/Ngày">
                    <input type="text" style="width:60%"
                           placeholder=" Vui lòng nhập tên chi nhánh / tổ chức / nhóm hoặc tên cuộc thi / buổi hòa nhạc bạn đã tham gia.">
                </div>
                <div class="d-flex" style="margin-top:0.5rem">
                    <input type="text" placeholder="Nhập nội dung hoạt động">
                </div>
            </div>
        </div>

        <div class="row form-item">
            <div class="col-md-3">
                Đào tạo
            </div>
            <div class="col-md-9">
                <div class="d-flex" style="gap:0.5rem">
                    <input type="text" placeholder="Tên chương trình">
                    <input type="text" placeholder="Tên chương trình đào tạo">
                    <input type="date" placeholder="Năm-Tháng-Ngày">
                    <input type="date" placeholder="Năm-Tháng-Ngày">
                </div>
                <div class="d-flex" style="margin-top:0.5rem">
                    <input type="text" placeholder="Tóm tắt nội dung đào tạo">
                </div>
            </div>
        </div>
    </div>


    <!--    step 3-->
    <form action="../ktl/php/fnc/signup_step3.php" method="post" id="form_step_3">

        <div class="tab-content hidden">
            <h3>Bằng cấp, giải thưởng</h3>
            <hr>
            <div class="row form-item">
                <div class="col-md-3">
                    Bằng cấp
                </div>
                <div class="col-md-9">
                    <div class="d-flex" style="gap:0.5rem">
                        <input type="text" name="name_equals" placeholder="Tên bằng cấp/chứng chỉ" value="">
                        <input type="text" name="issued_by" placeholder="Nơi cấp" value="">
                        <input type="date" name="time_equals" placeholder="Ngày-tháng-năm" value="">
                    </div>
                </div>
            </div>

            <div class="row form-item">
                <div class="col-md-3">
                    Giải thưởng
                </div>
                <div class="col-md-9">
                    <div class="d-flex" style="gap:0.5rem">
                        <input type="text" name="contest_name" placeholder="Tên cuộc thi/giải thưởng" value="">
                        <input type="text" name="granting_agencies" value="" placeholder="Cơ quan cấp">
                        <input type="date" name="time_start" placeholder="Ngày-tháng-năm" value="">
                        <input type="date" name="time_end" placeholder="Ngày-tháng-năm" value="">
                    </div>
                    <div class="d-flex" style="gap:0.5rem;margin-top:0.5rem">
                        <input value="" type="text" name="content_prize" placeholder="Nhập nội dung giải thưởng">
                    </div>
                </div>
            </div>

            <div class="row form-item">
                <div class="col-md-3">
                    Portfolio
                </div>
                <div class="col-md-9">
                    <div class="d-flex" style="gap:0.5rem;margin-top:0.5rem">
                        <input type="file" name="file" placeholder="Chưa có file nào được chọn" value="">
                    </div>
                </div>
            </div>

            <div class="row form-item">
                <div class="col-md-3">
                    Link
                </div>
                <div class="col-md-9">
                    <div class="d-flex" style="gap:0.5rem;margin-top:0.5rem">
                        <input type="url" name="link" placeholder="https://" value="">
                    </div>
                </div>
            </div>

            <div class="row form-item d-flex justify-content-center" style="gap:0.5rem;margin-top:1rem">
                <button onclick="handStep3()" type="submit" class="btn btn-primary">Submit</button>
                <button type="submit" class="btn btn-primary">Tiếp theo</button>
            </div>
        </div>


    </form>

    <!--  step 4-->
    <form action="../ktl/php/fnc/signup_step_4.php" method="post" id="form_step_4">
        <div class="tab-content hidden">
            <h3>Bản giới thiệu bản thân</h3>
            <div class="row form-item">
                <div class="col-md-3">
                    Quá trình trưởng thành
                </div>
                <div class="col-md-9">
                    <div class="duplicate-section">
                        <div class="d-flex" style="gap:0.5rem">
                            <select>
                                <option>Quá trình trưởng thành</option>
                            </select>
                            <div class="btn-add-more"
                                 style="display: flex; justify-content: center; align-items: center; cursor: pointer">+
                            </div>
                        </div>
                        <textarea name="contents" class="form-control"
                                  style="margin-top:0.5rem;height: 10rem"></textarea>
                    </div>
                </div>
            </div>
            <div class="row form-item d-flex justify-content-center" style="gap:0.5rem;margin-top:1rem">
                <button onclick="handStep4()" type="submit" class="btn btn-primary">Submit</button>
                <button type="submit" class="btn btn-primary">Tiếp theo</button>
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

</body>


<script>


    function handStep4() {
        $('#form_step_4').submit();
    }

    function handSubmit() {
        $('#onSubmit').submit();
    }

    function handStep3() {
        $('#form_step_3').submit();
    }

    // function openTab(evt, tabName) {
    //     var i, tabcontent, tablinks;
    //     tabcontent = document.getElementsByClassName("tab-content");
    //     for (i = 0; i < tabcontent.length; i++) {
    //         tabcontent[i].classList.add('hidden');
    //     }
    //     tablinks = document.getElementsByClassName("tablinks");
    //     for (i = 0; i < tablinks.length; i++) {
    //         tablinks[i].className = tablinks[i].className.replace(" active", "");
    //     }
    //     document.getElementById(tabName).classList.remove('hidden');
    //     evt.currentTarget.className += " active";
    // }
    $(document).ready(function () {
        $('.tab-heading .tab-item').click(function () {
            $(this).closest('.tab-wrapper').find('.tab-item').removeClass('active');
            $(this).addClass('active');
            const tabIndex = parseInt($(this).attr('tabindex')) - 1;
            $('.tab-wrapper .tab-content').addClass('hidden');
            $(this).closest('.tab-wrapper').find('.tab-content').eq(tabIndex).removeClass('hidden');
        })
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

    .title {
        border-bottom: 1px solid #e8e8ea;
        margin-top: 4rem;
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
</style>

<script>

    $(document).ready(function () {
        $('.btn-add-more').click(function () {
            // const duplicateSection = $(this).closest('.duplicate-section').parent().html();
            // $(this).closest('.duplicate-section').append(duplicateSection);
            const duplicateSection = $(this).closest('.duplicate-section');
            duplicateSection.clone().insertAfter(duplicateSection);
            duplicateSection.find('textarea').val('');
            duplicateSection.find('select').val('');
        });
    })
</script>
</html>

<!DOCTYPE html>
<?php include 'php/common_header.php' ?>
<link rel="stylesheet" href="css/signup.css">
<body>
<div class="wrap">
    <?php include 'php/common_header_menu.php' ?>
    <div class="contents_wrap">
        <div class="container">
            <div class="signup_form">
                <h2>로그인</h2>
                <hr>
                <div class="tab-wrapper">
                    <div class="tab-heading">
                        <div class="tab-item">
                            Thông tin cơ bản
                        </div>
                        <div class="tab-item">
                            Học lực/ kinh nghiệm
                        </div>
                        <div class="tab-item">Chứng chỉ/giải thưởng</div>
                        <div class="tab-item">Bản giới thiệu bản thân</div>
                        <div class="tab-item">
                            Nộp
                        </div>
                    </div>


                    <div class="tab-content">
                        <h3>Thông tin cơ bản</h3>
                        <hr>
                        <div>
                            <div class="form-group">
                                <label for="field-name">Tên</label>
                                <input type="text" class="form-control" id="field-name"
                                       placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="field-phone">SDT</label>
                                <input type="phone" class="form-control" id="field-phone"
                                       placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="field-email">Email</label>
                                <input type="email" class="form-control" id="field-email"
                                       placeholder="Enter Email">
                            </div>
                            <div class="form-group">
                                <label for="field-address">Địa chỉ</label>
                                <input type="text" class="form-control" id="field-address"
                                       placeholder="Enter Email">
                            </div>
                            <div class="form-group">
                                <label for="field-address">Khuyết tật</label>
                                <input type="radio" value="1" class="form-control" id="field-address"
                                       placeholder="Enter Email">
                                <input type="radio" value="0" class="form-control" id="field-address"
                                       placeholder="Enter Email">
                                <input type="text" placeholder="Mức độ khuyết tật">
                                <input type="text" placeholder="Nội dung"/>
                            </div>

                            <div class="form-group">
                                <label for="">Nghĩa vụ Quân sự</label>
                            </div>

                            <div class="form-group">
                                <label for="">Đối tượng nghĩa vụ quân sự</label>
                                <div>
                                   <span>
                                        <input type="radio" value="1"/>
                                        <span>Không thuộc</span>
                                   </span>
                                    <span>
                                        <input type="radio" value="2"/>
                                        <span>Có</span>
                                   </span>
                                    <span>
                                        <input type="radio" value="3"/>
                                        <span>Chưa hoàn tất</span>
                                   </span>
                                    <span>
                                        <input type="radio" value="4"/>
                                        <span>Được miễn</span>
                                   </span>
                                    <span>
                                        <input type="radio" value="5"/>
                                        <span>Đang tại ngũ</span>
                                   </span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Người điền đơn</label>
                                <input type="text" Đ>
                            </div>

                            <div class="form-group">
                                <label for="">Người có công</label>
                                <input type="radio" value="1"/>
                                <input type="radio" value="2"/>
                            </div>

                            <div class="form-group">
                                <label for="">Chế độ ưu tiên</label>
                                <div>
                                    <div>Tầng lớp thu nhập thấp</div>
                                    <div>
                                        <input type="radio" value="1"/>
                                        <input type="radio" value="2"/>
                                    </div>

                                    <div>Người Triều Tiên di cư</div>
                                    <div>
                                        <input type="radio" value="1">
                                        <input type="radio" value="2">
                                    </div>
                                    <div>
                                        Con của gia đình di cư
                                    </div>
                                    <div>
                                        <input type="radio" value="1">
                                        <input type="radio" value="2">
                                    </div>
                                </div>
                            </div>


                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>

                    <div class="tab-content">
                        <h3>Thông tin cơ bản</h3>
                        <div class="form-group">
                            <label for="">THPT</label>
                            <input type="text" placeholder="Tên trường"/>
                            <input type="number" placeholder="năm tốt nghiệp">
                            <select>
                                <option value="">Tình trạng tốt nghiệp</option>
                            </select>
                            <div>
                                <input type="radio" value="1"/>
                                <input type="radio" value="2"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Đại học</label>
                            <div>
                                <div>
                                    <select>
                                        <option>Phân loại trường</option>
                                    </select>
                                    <input type="text" placeholder="Tên trường">
                                    <input type="number" placeholder="Tháng/năm nhập học">
                                    <input type="number" placeholder="Tháng/năm tốt nghiệp"/>
                                    <span>
                                        <input type="radio" value="1">
                                        <input type="radio" value="2">
                                   </span>
                                </div>
                            </div>

                            <div>
                                <input type="text" placeholder="Tên chuyên môn">
                                <input type="text" placeholder="Điểm trung bình">
                                <select>
                                    <option>Tổng điểm</option>
                                </select>
                                <select>
                                    <option>Học vị</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label for="">Kinh nghiệm</label>
                            <div>
                                <select>
                                    <option>Chọn chuyên nghành chính</option>
                                </select>

                                <select>
                                    <option>Chọn chuyên nghành phụ</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label for="">Lý lịch chính</label>
                            <div>
                                <div>
                                    <input type="checkbox"/>
                                </div>
                                <div>
                                    <input type="checkbox"/>
                                </div>
                                <div>
                                    <input type="checkbox"/>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label>Nội dung hoạt động</label>
                            <div>
                                <input type="text">
                                <input type="text">
                                <input type="text">
                            </div>
                            <div>
                                <input type="text">
                            </div>
                        </div>

                        <div>
                            <label>Đào tạo</label>
                            <div>
                                <input type="text"/>
                                <input type="text"/>
                                <input type="text"/>
                                <input type="text"/>
                                <input type="text"/>
                            </div>
                            <div>
                                <textarea></textarea>
                            </div>
                        </div>


                    </div>
                </div>

            </div>
        </div>
    </div>
    <?php include 'php/common_footer.php' ?>
</div>
<?php include 'php/common_script.php' ?>
</body>
</html>

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3308
-- Thời gian đã tạo: Th10 04, 2022 lúc 06:56 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ktl`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `apply_step_1`
--

CREATE TABLE `apply_step_1` (
  `id` int(11) UNSIGNED NOT NULL,
  `able_id` int(11) DEFAULT NULL,
  `able_address` varchar(250) DEFAULT NULL,
  `able_detailAddress` varchar(200) DEFAULT NULL,
  `is_disabilities` tinyint(1) DEFAULT NULL COMMENT 'có khuyết tận : giá 1 or 0',
  `is_military_service` int(11) DEFAULT NULL COMMENT 'thuộc đối tượng NVQS  giá trị từ 0->4',
  `applicator` int(20) DEFAULT NULL COMMENT 'người điền đơn : giá trị 0->2',
  `veterans` bigint(20) DEFAULT NULL COMMENT 'người có công giá trị 0-1',
  `low_income` varchar(90) DEFAULT NULL COMMENT 'thu nhập thấp : giá trị 0 or 1',
  `immigrant` int(11) DEFAULT NULL COMMENT 'người di cư  : giá trị 1 or 0',
  `children_of_migrant_families` int(11) DEFAULT NULL COMMENT 'con của gia đình di cư : giá trị 0 or 1',
  `level_disabilities` int(11) NOT NULL,
  `content_disabilities` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `apply_step_2`
--

CREATE TABLE `apply_step_2` (
  `id` int(10) UNSIGNED NOT NULL,
  `able_id` int(11) DEFAULT NULL,
  `name_high_school` varchar(500) DEFAULT NULL COMMENT 'tên trường cấp 3',
  `graduation_high_school_year` datetime DEFAULT NULL COMMENT 'năm tốt nghiệm THPT',
  `status_graduation_high_school` int(11) DEFAULT NULL COMMENT 'tình trạng tốt nghiệp THPT : giá trị 0 or 1',
  `participate_exam_college` int(11) DEFAULT NULL COMMENT 'tham gia tuyển sinh đại học : giá trị 1 or 0',
  `not_graduated` int(11) DEFAULT NULL COMMENT 'chưa tốt nghiệp : giá trị 0 or 1',
  `degree` int(11) DEFAULT NULL COMMENT 'học vị : giá trị 0 or 1',
  `major_main_id` int(11) DEFAULT NULL COMMENT 'chuyên ngành chính',
  `major_sub` int(11) DEFAULT NULL COMMENT 'chuyên ngành phụ',
  `main_profile` varchar(255) DEFAULT NULL COMMENT 'lý lịch chính',
  `only_highSchool` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `apply_step_3`
--

CREATE TABLE `apply_step_3` (
  `id` int(11) UNSIGNED NOT NULL,
  `userlink` varchar(150) DEFAULT NULL,
  `file_portlio` varchar(500) DEFAULT NULL COMMENT 'file đính kèm',
  `able_id` int(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `apply_step_4`
--

CREATE TABLE `apply_step_4` (
  `id` int(11) NOT NULL,
  `able_id` int(11) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `apply_step_5`
--

CREATE TABLE `apply_step_5` (
  `id` int(11) UNSIGNED NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `sent_date` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `acpet_rule` int(11) DEFAULT NULL,
  `file_infor` varchar(500) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=euckr;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `detail_introduction`
--

CREATE TABLE `detail_introduction` (
  `id` int(11) NOT NULL,
  `option1_grow` varchar(45) DEFAULT NULL,
  `content_option1` varchar(45) DEFAULT NULL,
  `option2_application` varchar(45) DEFAULT NULL,
  `content_application` varchar(45) DEFAULT NULL,
  `detail_introductioncol` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=euckr;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `main_resume`
--

CREATE TABLE `main_resume` (
  `id` int(11) NOT NULL,
  `content` varchar(45) DEFAULT NULL,
  `able_id` int(11) DEFAULT NULL,
  `id_type` int(11) DEFAULT NULL,
  `name_type` varchar(45) CHARACTER SET euckr DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `manager_faq`
--

CREATE TABLE `manager_faq` (
  `id` int(11) NOT NULL,
  `classify` varchar(50) DEFAULT NULL,
  `title` varchar(45) DEFAULT NULL,
  `createby` varchar(45) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `is_public` int(11) DEFAULT NULL,
  `code_allow` varchar(45) DEFAULT NULL,
  `content_reply` varchar(500) DEFAULT NULL,
  `context_question` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=euckr;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `manage_notice`
--

CREATE TABLE `manage_notice` (
  `id` int(11) NOT NULL,
  `title` varchar(500) DEFAULT NULL,
  `content` varchar(500) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `id_createby` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=euckr;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `objection_info`
--

CREATE TABLE `objection_info` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(80) DEFAULT NULL,
  `objection_type` varchar(50) DEFAULT NULL,
  `username` varchar(80) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `subject` varchar(200) DEFAULT NULL,
  `contents` text DEFAULT NULL,
  `objection_pass` text DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `state` varchar(10) DEFAULT '접수중',
  `answer_contents` text DEFAULT NULL,
  `answer_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `recruit_able_activity`
--

CREATE TABLE `recruit_able_activity` (
  `id` int(11) UNSIGNED NOT NULL,
  `able_id` int(11) DEFAULT NULL,
  `date_start_ativity` datetime DEFAULT NULL COMMENT 'ngày bắt đầu hoạt động',
  `date_end_activity` datetime NOT NULL COMMENT 'ngày kết thúc hoạt động',
  `organizational_name` varchar(200) DEFAULT NULL COMMENT 'đơn vị tổ chức hoạt động',
  `contents` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `recruit_able_admin`
--

CREATE TABLE `recruit_able_admin` (
  `id` int(11) UNSIGNED NOT NULL,
  `userid` varchar(200) DEFAULT '',
  `pass` text DEFAULT NULL,
  `username` varchar(150) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `userphone` text DEFAULT NULL,
  `useremail` text DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `recruit_able_admin`
--

INSERT INTO `recruit_able_admin` (`id`, `userid`, `pass`, `username`, `description`, `userphone`, `useremail`, `date`) VALUES
(1, 'ktl_admin', 'dmZrOFJmT0d2eVdNRUVOVFlkanpoQT09', '본사3', '', 'V0dmMklaOUplTmkyT1cxd1UvU2t0UT09', 'MDZ3UHZ3NkZiUlROemVWZklzYkpGZz09', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `recruit_able_apply`
--

CREATE TABLE `recruit_able_apply` (
  `id` int(11) UNSIGNED NOT NULL,
  `info` text DEFAULT NULL,
  `info_2` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `recruit_able_award`
--

CREATE TABLE `recruit_able_award` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(150) DEFAULT NULL,
  `place_of_issue` varchar(150) DEFAULT NULL COMMENT 'nơi cấp',
  `contents` varchar(250) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `able_id` int(11) NOT NULL,
  `award_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `recruit_able_certification`
--

CREATE TABLE `recruit_able_certification` (
  `id` int(11) NOT NULL,
  `name` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `place_of_issue` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_issue` datetime NOT NULL,
  `able_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `recruit_able_claim`
--

CREATE TABLE `recruit_able_claim` (
  `id` int(11) NOT NULL,
  `number_select_news` int(11) DEFAULT NULL,
  `type_of_claim` int(11) DEFAULT NULL,
  `name_creater` varchar(45) DEFAULT NULL,
  `phone_number` varchar(45) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `content` varchar(500) DEFAULT NULL,
  `date_create` date DEFAULT NULL,
  `status_reply` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=euckr;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `recruit_able_college`
--

CREATE TABLE `recruit_able_college` (
  `id` int(11) UNSIGNED NOT NULL,
  `type` varchar(20) DEFAULT NULL,
  `type_detail` varchar(30) DEFAULT NULL,
  `name` varchar(150) DEFAULT NULL,
  `address` varchar(220) DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `recruit_able_detai_resume`
--

CREATE TABLE `recruit_able_detai_resume` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=euckr;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `recruit_able_main_major`
--

CREATE TABLE `recruit_able_main_major` (
  `id` int(11) NOT NULL,
  `name_major` varchar(45) DEFAULT NULL,
  `recruit_able_main_majorcol` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=euckr;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `recruit_able_point`
--

CREATE TABLE `recruit_able_point` (
  `id` int(11) NOT NULL,
  `point` int(11) DEFAULT NULL,
  `able_id` int(11) DEFAULT NULL,
  `id_subadmin` int(11) DEFAULT NULL,
  `point_knowledge` int(11) NOT NULL,
  `point_experience` int(11) NOT NULL,
  `point_attitude` int(11) NOT NULL,
  `verify` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `recruit_able_subadmin`
--

CREATE TABLE `recruit_able_subadmin` (
  `id` int(11) UNSIGNED NOT NULL,
  `userid` varchar(200) DEFAULT '',
  `pass` text DEFAULT NULL,
  `username` varchar(150) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `userphone` text DEFAULT NULL,
  `useremail` text DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `role` int(11) NOT NULL,
  `company` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `recruit_able_user`
--

CREATE TABLE `recruit_able_user` (
  `id` int(11) UNSIGNED NOT NULL,
  `imp_uid` varchar(200) DEFAULT NULL,
  `username` varchar(150) DEFAULT NULL,
  `phone` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `pass` text DEFAULT NULL,
  `acept_rule` int(11) DEFAULT NULL,
  `status_pass` int(11) DEFAULT NULL,
  `round_one` int(11) NOT NULL,
  `round_two` int(11) NOT NULL,
  `round_three` int(11) NOT NULL,
  `note` text NOT NULL,
  `rand_code` int(10) NOT NULL,
  `pointed` int(11) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `recruit_able_user`
--

INSERT INTO `recruit_able_user` (`id`, `imp_uid`, `username`, `phone`, `email`, `pass`, `acept_rule`, `status_pass`, `round_one`, `round_two`, `round_three`, `note`, `rand_code`, `pointed`, `active`) VALUES
(5, NULL, 'quang', 'TUN6aytxdEhkVEMyWHVkR1hNOVNIZz09', 'SVpWbEZJREZ4UW0yM21oMlE0ZDhJaGxRUzRnUkpsbURCRGlrSTBMb2syaz0', 'ZzQ3OVZQNTZKRWlHSnNXUVBDVWtRYUhxMEg5QWdZS2dHdWU4VnNkaEFURT0', 1, 0, 0, 0, 0, '0', 903229, 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `recruit_able_userinfo`
--

CREATE TABLE `recruit_able_userinfo` (
  `id` int(11) UNSIGNED NOT NULL,
  `sel_form` varchar(200) DEFAULT NULL,
  `info` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trainning`
--

CREATE TABLE `trainning` (
  `id` int(10) UNSIGNED NOT NULL,
  `able_id` int(11) DEFAULT NULL,
  `date_start` datetime DEFAULT NULL COMMENT 'ngày bắt đầu hoạt động',
  `date_end` datetime NOT NULL COMMENT 'ngày kết thúc hoạt động',
  `organizational_name` varchar(200) DEFAULT NULL COMMENT 'đơn vị tổ chức hoạt động',
  `contents` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `university`
--

CREATE TABLE `university` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `status_graduate` int(11) DEFAULT NULL,
  `poit_average` float DEFAULT NULL,
  `total_point` float DEFAULT NULL,
  `type_school` varchar(45) DEFAULT NULL,
  `main_major` varchar(45) DEFAULT NULL,
  `able_id` int(11) DEFAULT NULL,
  `degree` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `apply_step_1`
--
ALTER TABLE `apply_step_1`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `apply_step_2`
--
ALTER TABLE `apply_step_2`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `apply_step_3`
--
ALTER TABLE `apply_step_3`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `apply_step_4`
--
ALTER TABLE `apply_step_4`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `apply_step_5`
--
ALTER TABLE `apply_step_5`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `detail_introduction`
--
ALTER TABLE `detail_introduction`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `main_resume`
--
ALTER TABLE `main_resume`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `manager_faq`
--
ALTER TABLE `manager_faq`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `manage_notice`
--
ALTER TABLE `manage_notice`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `objection_info`
--
ALTER TABLE `objection_info`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `recruit_able_activity`
--
ALTER TABLE `recruit_able_activity`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `recruit_able_admin`
--
ALTER TABLE `recruit_able_admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `recruit_able_apply`
--
ALTER TABLE `recruit_able_apply`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `recruit_able_award`
--
ALTER TABLE `recruit_able_award`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `recruit_able_certification`
--
ALTER TABLE `recruit_able_certification`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `recruit_able_claim`
--
ALTER TABLE `recruit_able_claim`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `recruit_able_college`
--
ALTER TABLE `recruit_able_college`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `recruit_able_detai_resume`
--
ALTER TABLE `recruit_able_detai_resume`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `recruit_able_main_major`
--
ALTER TABLE `recruit_able_main_major`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `recruit_able_point`
--
ALTER TABLE `recruit_able_point`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `recruit_able_subadmin`
--
ALTER TABLE `recruit_able_subadmin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `recruit_able_user`
--
ALTER TABLE `recruit_able_user`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `recruit_able_userinfo`
--
ALTER TABLE `recruit_able_userinfo`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `trainning`
--
ALTER TABLE `trainning`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `university`
--
ALTER TABLE `university`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `apply_step_1`
--
ALTER TABLE `apply_step_1`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `apply_step_2`
--
ALTER TABLE `apply_step_2`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT cho bảng `apply_step_3`
--
ALTER TABLE `apply_step_3`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `apply_step_4`
--
ALTER TABLE `apply_step_4`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `apply_step_5`
--
ALTER TABLE `apply_step_5`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `main_resume`
--
ALTER TABLE `main_resume`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `manager_faq`
--
ALTER TABLE `manager_faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `objection_info`
--
ALTER TABLE `objection_info`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `recruit_able_activity`
--
ALTER TABLE `recruit_able_activity`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `recruit_able_admin`
--
ALTER TABLE `recruit_able_admin`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `recruit_able_apply`
--
ALTER TABLE `recruit_able_apply`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `recruit_able_award`
--
ALTER TABLE `recruit_able_award`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `recruit_able_certification`
--
ALTER TABLE `recruit_able_certification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `recruit_able_college`
--
ALTER TABLE `recruit_able_college`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=357;

--
-- AUTO_INCREMENT cho bảng `recruit_able_detai_resume`
--
ALTER TABLE `recruit_able_detai_resume`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `recruit_able_point`
--
ALTER TABLE `recruit_able_point`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT cho bảng `recruit_able_subadmin`
--
ALTER TABLE `recruit_able_subadmin`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `recruit_able_user`
--
ALTER TABLE `recruit_able_user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `recruit_able_userinfo`
--
ALTER TABLE `recruit_able_userinfo`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `trainning`
--
ALTER TABLE `trainning`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

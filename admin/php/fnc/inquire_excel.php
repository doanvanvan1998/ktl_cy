<?php
require "../../lib/PHPExcel/Classes/PHPExcel.php";
include "../mysql.php";
include "../crypt.php";



//Khởi tạo đối tượng
$excel = new PHPExcel();
//Chọn trang cần ghi (là số từ 0->n)
$excel->setActiveSheetIndex(0);
//Tạo tiêu đề cho trang. (có thể không cần)
$excel->getActiveSheet()->setTitle('demo ghi dữ liệu');
//Xét chiều rộng cho từng, nếu muốn set height thì dùng setRowHeight()
$excel->getActiveSheet()->getColumnDimension('A')->setWidth(30);
$excel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
$excel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
$excel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
$excel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
$excel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
$excel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
$excel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
$excel->getActiveSheet()->getColumnDimension('I')->setWidth(30);
$excel->getActiveSheet()->getColumnDimension('J')->setWidth(30);

//Xét in đậm cho khoảng cột
$excel->getActiveSheet()->getStyle('A1:J1')->getFont()->setBold(true);
//Tạo tiêu đề cho từng cột
//Vị trí có dạng như sau:

$excel->getActiveSheet()->setCellValue('A1', 'No');
$excel->getActiveSheet()->setCellValue('B1', '수험번호');
$excel->getActiveSheet()->setCellValue('C1', '지원자명');
$excel->getActiveSheet()->setCellValue('D1', '연락처');
$excel->getActiveSheet()->setCellValue('E1', '이메일');
$excel->getActiveSheet()->setCellValue('F1', '장애정도');
$excel->getActiveSheet()->setCellValue('G1', '주전공');
$excel->getActiveSheet()->setCellValue('H1', '부전공');
$excel->getActiveSheet()->setCellValue('I1', '제출일');
$excel->getActiveSheet()->setCellValue('J1', '적격 검증');

$query="select distinct u.id,a.able_detailAddress,u.username,u.phone,u.email,u.imp_uid,u.status_pass,a3.sent_date,a.is_disabilities,a2.major_main_id, a2.major_sub  , a2.status_graduation_high_school, a2.graduation_high_school_year , a2.name_high_school from recruit_able_user u left join  apply_step_1 a on u.id = a.able_id left join apply_step_2 a2 on u.id = a2.able_id left join apply_step_5 a3 on u.id = a3.userid where u.status_pass !='0'";
$result = mysqli_query($con, $query);
$numRow =2;
$index =1;

while($row = mysqli_fetch_array($result)) {
    switch ($row['major_main_id']) {
        case 1:
            $major_main_id = "바이올린";
            break;
        case 2:
            $major_main_id = "첼로";
            break;
        case 3:
            $major_main_id = "하프";
            break;
        case 4:
            $major_main_id = "풀루트";
            break;
        case 5:
            $major_main_id = "오보에";
            break;
        case 6:
            $major_main_id = "클라리넷";
            break;
        case 7:
            $major_main_id = "바순";
            break;
        case 8:
            $major_main_id = "트럼폣";
            break;
        case 9:
            $major_main_id = "호른";
            break;
        case 10:
            $major_main_id = "비올라";
            break;
        case 11:
            $major_main_id = "베이스";
            break;
        case 12:
            $major_main_id = "팀파니";
            break;
        case 0:
            $major_main_id = "기타 (직접작성)";
            break;
        default:
            echo "error";
    }
    switch ($row['major_sub']) {
        case 1:
            $major_sub = "바이올린";
            break;
        case 2:
            $major_sub = "첼로";
            break;
        case 3:
            $major_sub = "하프";
            break;
        case 4:
            $major_sub = "풀루트";
            break;
        case 5:
            $major_sub = "오보에";
            break;
        case 6:
            $major_sub = "클라리넷";
            break;
        case 7:
            $major_sub = "바순";
            break;
        case 8:
            $major_sub = "트럼폣";
            break;
        case 9:
            $major_sub = "호른";
            break;
        case 10:
            $major_sub = "비올라";
            break;
        case 11:
            $major_sub = "베이스";
            break;
        case 12:
            $major_sub = "팀파니";
            break;
        case 0:
            $major_sub = "기타 (직접작성)";
            break;
        default:
            echo "error";

    }
    $row['phone'] = Decrypt($row['phone'], $secret_key, $secret_iv);
    $row['email'] = Decrypt($row['email'], $secret_key, $secret_iv);
    $excel->getActiveSheet()->setCellValue('A' . $numRow, $index . " ");
    $excel->getActiveSheet()->setCellValue('B' . $numRow, $row['imp_uid'] . " ");
    $excel->getActiveSheet()->setCellValue('C' . $numRow, $row['username'] . " ");
    $excel->getActiveSheet()->setCellValue('D' . $numRow, $row['phone'] . " ");
    $excel->getActiveSheet()->setCellValue('E' . $numRow, $row['email'] . " ");
    $excel->getActiveSheet()->setCellValue('F' . $numRow, $row['is_disabilities'] == 1 ? "중증" : "경증" + " ");

    $excel->getActiveSheet()->setCellValue('G' . $numRow, $major_main_id . " ");
    $excel->getActiveSheet()->setCellValue('H' . $numRow, $major_sub . " ");
    $excel->getActiveSheet()->setCellValue('I' . $numRow, $row['sent_date'] . " ");
    $excel->getActiveSheet()->setCellValue('J' . $numRow, $row['status_pass'] == 1 ? "적격" : "검증선택" + " ");
    $numRow++;
    $index++;
}
$nameExcel = "지원자관리-".date("Y-m-d").".xls" ;

header('Content-type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename='.$nameExcel);
PHPExcel_IOFactory::createWriter($excel, 'Excel2007')->save('php://output');

//header("Location: /ktl_cy/admin/pages/forms/subadmin_list.php");
?>
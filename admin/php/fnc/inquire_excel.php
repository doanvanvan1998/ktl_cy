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

//$query = "select code_profile,username,phone,email,level_disabilities,subject,sub_subject,Verifi,date from objection_info where Verifi !='부적격' ";
//$result = mysqli_query($con, $query);
$numRow =2;
$index =1;

//while($row = mysqli_fetch_array($result))
//{
//    $row['phone'] = Decrypt($row['phone'],$secret_key,$secret_iv);
//    $row['email'] = Decrypt($row['email'],$secret_key,$secret_iv);
    $excel->getActiveSheet()->setCellValue('A2' ," adc");
    $excel->getActiveSheet()->setCellValue('B2' , " adc");
    $excel->getActiveSheet()->setCellValue('C2', "adc ");
    $excel->getActiveSheet()->setCellValue('D2',"adc");
    $excel->getActiveSheet()->setCellValue('E2',"adc");
    $excel->getActiveSheet()->setCellValue('F2'," adc");
    $excel->getActiveSheet()->setCellValue('G2'," adc");
    $excel->getActiveSheet()->setCellValue('H2',"adc ");
    $excel->getActiveSheet()->setCellValue('I2'," adc");
    $excel->getActiveSheet()->setCellValue('J2'," adc");

    $numRow++;
    $index++;
//}
$nameExcel = "지원자관리-".date("Y-m-d").".xls" ;

header('Content-type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename='.$nameExcel);
PHPExcel_IOFactory::createWriter($excel, 'Excel2007')->save('php://output');

//header("Location: /ktl_cy/admin/pages/forms/subadmin_list.php");
?>
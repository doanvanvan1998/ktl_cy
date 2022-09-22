<?php
  include "mysql.php";

  require_once "../PHPExcel-1.8/Classes/PHPExcel.php";
  $objPHPExcel = new PHPExcel();
  require_once "../PHPExcel-1.8/Classes/PHPExcel/IOFactory.php"; // IOFactory.php을 불러옴.

  $uploads_dir  = "2.xlsx";
  $filename     = "2.xlsx";
  try {
      // 업로드 된 엑셀 형식에 맞는 Reader객체를 만든다.

      $objReader = PHPExcel_IOFactory::createReaderForFile($filename);
      // 읽기전용으로 설정
      $objReader->setReadDataOnly(true);
      // 엑셀파일을 읽는다
      $objExcel = $objReader->load($filename);

      // 첫번째 시트를 선택

      $objExcel->setActiveSheetIndex(0);

      $objWorksheet = $objExcel->getActiveSheet();
      $rowIterator = $objWorksheet->getRowIterator();
      foreach ($rowIterator as $row) { // 모든 행에 대해서

        $cellIterator = $row->getCellIterator();

        $cellIterator->setIterateOnlyExistingCells(false);

      }

      $maxRow = $objWorksheet->getHighestRow();

      for ($i = 4 ; $i <= $maxRow ; $i++) {
        $data1 = $objWorksheet->getCell('B' . $i)->getValue(); // B열
        $data2 = $objWorksheet->getCell('C' . $i)->getValue(); // C열
        $data3 = $objWorksheet->getCell('D' . $i)->getValue(); // E열
        $data4 = $objWorksheet->getCell('H' . $i)->getValue(); // E열

        if($data1 == "") continue;
        else if($data2 == "") continue;   //주민번호가 빈값이면 저장이 되지 않음

        $data3 = str_replace("-", "", $data3);

        mysqli_query($con,"insert into recruit_able_college(type,type_detail,name,address,date)
        values('$data1','$data2','$data3','$data4',NOW())");
        //$dataF = PHPExcel_Style_NumberFormat::toFormattedString($dataF, 'YYYY-MM-DD');

      }
    } catch (exception $e) {

      echo '엑셀파일을 읽는도중 오류가 발생하였습니다.<br/>';

    }
  //unlink($filename);

  echo "success";

  mysqli_close($con);
?>

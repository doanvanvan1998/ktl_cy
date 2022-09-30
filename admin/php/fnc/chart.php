<?php
function connect(){
    session_start();
    include "../mysql.php";
    include "../crypt.php";
    // chưa học hết cấp 3
    $a1="select count(*) as total from apply_step_2 a where a.not_graduated = 0 group by not_graduated ";
    $resultA1= mysqli_query($con, $a1);
    // tốt nghiệp cap 3
    $a2="select count(*) from apply_step_2 a  where a.status_graduation_high_school = 0 and a.not_graduated = 1  group by status_graduation_high_school";
    $resultA2= mysqli_query($con, $a2);
    // tôt nghiệp cao đẳng học
    $a3="select count(*) from apply_step_2 a where a.status_graduation_high_school = 1 and status_graduate_university = 0 and date_graduate_postgraduate = 0 group by status_graduation_high_school ";
    $resultA3= mysqli_query($con, $a3);
    // tốt nghiệp đại học
    $a4="select count(*) from apply_step_2 a  where a.status_graduate_university = 1 and date_graduate_postgraduate = 0 group by status_graduate_university";
    $resultA4= mysqli_query($con, $a4);
    // tốt nghiệp cao học
    $a5="select count(*) from apply_step_2 a  where a.date_graduate_postgraduate = 1 group by date_graduate_postgraduate";
    $resultA5= mysqli_query($con, $a5);
    $data1= mysqli_fetch_assoc($resultA1);
    $data2= mysqli_fetch_assoc($resultA2);
    $data3= mysqli_fetch_assoc($resultA3);
    $data4= mysqli_fetch_assoc($resultA4);
    $data5= mysqli_fetch_assoc($resultA5);

    $result = [$data1 == null ? "0" : "1",$data2 == null ? "0" : "1",$data3== null ? "0" : "1",$data4== null ? "0" : "1",$data5== null ? "0" : "1"];
   echo json_encode($result);
   mysqli_close($con);
}
connect();



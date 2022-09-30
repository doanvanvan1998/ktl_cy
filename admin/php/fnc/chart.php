<?php
function connect(){
    session_start();
    include "../mysql.php";
    include "../crypt.php";
    $a1="select count(*) from apply_step_2 a group by not_graduated";
    $resultA1= mysqli_query($con, $a1);
    $a2="select count(*) from apply_step_2 a where a.status_graduation_high_school = 1 and status_graduate_university = 0 and date_graduate_postgraduate = 0 group by status_graduation_high_school ";
    $resultA2= mysqli_query($con, $a2);
    $a3="select count(*) from apply_step_2 a  where a.status_graduation_high_school = 0 group by status_graduation_high_school";
    $resultA3= mysqli_query($con, $a3);
    $a4="select count(*) from apply_step_2 a  where a.status_graduate_university = 1 and date_graduate_postgraduate = 0 group by status_graduate_university";
    $resultA4= mysqli_query($con, $a4);
    $a5="select count(*) from apply_step_2 a  where a.status_graduation_high_school = 1 and status_graduate_university = 0 and date_graduate_postgraduate = 0 group by date_graduate_postgraduate";
    $resultA5= mysqli_query($con, $a5);

    $result = [json_encode($resultA1),json_encode($resultA2),json_encode($resultA3),json_encode($resultA4),json_encode($resultA5)];
   echo json_encode($result);
   mysqli_close($con);
}
connect();



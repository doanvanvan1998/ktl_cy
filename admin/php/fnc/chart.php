<?php
function connect(){
    session_start();
    include "../mysql.php";
    include "../crypt.php";
    // chưa học hết cấp 3
    $a1="select count(*) as total from apply_step_2 a where a.not_graduated = 0 group by not_graduated";
    $resultA1= mysqli_query($con, $a1);
    // tốt nghiệp cap 3

    $a3="select count(*) as total from apply_step_2 a where a.status_graduation_high_school = 1 and a.only_highSchool = 1  group by status_graduation_high_school";
    $resultA3= mysqli_query($con, $a3);
    // tôt nghiệp cao đẳng học
    $a4="select distinct count(*) as total from university a where a.type_school = 'college' and status_graduate = 1 group by a.type_school";
    $resultA4= mysqli_query($con, $a4);
    // tốt nghiệp đại học
    $a5="select distinct count(*) as total from university a where a.type_school = 'university'  and status_graduate = 1  group by a.type_school";
    $resultA5= mysqli_query($con, $a5);
    // tốt nghiệp cao học
    $a6="select distinct count(*) as total from university a where a.type_school = 'postgraduate' and status_graduate = 1 and degree = 0 group by a.type_school";
    $resultA6= mysqli_query($con, $a6);
    $a7="select distinct count(*) as total from university a where a.type_school = 'postgraduate' and status_graduate = 1 and degree = 1 group by a.type_school";
    $resultA7= mysqli_query($con, $a7);

    $data1= mysqli_fetch_assoc($resultA1);
    $data3= mysqli_fetch_assoc($resultA3);
    $data4= mysqli_fetch_assoc($resultA4);
    $data5= mysqli_fetch_assoc($resultA5);
    $data6= mysqli_fetch_assoc($resultA6);
    $data7= mysqli_fetch_assoc($resultA7);

    if ($data4 == null){
        $data4 = "0";
    }else if($data4 != null && $data5 == null){
        $data4 = $data4['total'];
    }else{
        $data4 = $data4['total'] - $data5['total'] . "";
    }

    if ($data5 == null){
        $data5 = "0";
    }else if($data5 != null && $data6 == null){
        $data5 = $data5['total']. "";
    }else{
        $data5 = $data5['total'] - $data6['total'] . "";
    }
    if ($data6 == null){
        $data6 = "0";
    }else if($data6 != null && $data7 == null){
        $data6 = $data6['total'];
    }else{
        $data6 = $data6['total'] - $data7['total'] . "";
    }



    $result = [$data1 == null ? "0" : $data1['total'],$data3 == null ? "0" : $data3['total'] ,$data4,$data5,$data6,$data7 == null ? "0" : $data7['total']];
   echo json_encode($result);
   mysqli_close($con);
}
connect();



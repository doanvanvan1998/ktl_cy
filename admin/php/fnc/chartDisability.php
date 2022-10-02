<?php
function connect(){
    session_start();
    include "../mysql.php";
    include "../crypt.php";
    //
    $a1="select count(*) as total from apply_step_1 a where a.is_disabilities = 0  group by is_disabilities ";
    $resultA1= mysqli_query($con, $a1);
    $row1 = mysqli_fetch_array($resultA1);
    //
    $a2="select count(*) as total from apply_step_1 a where a.is_disabilities = 1 group by is_disabilities ";
    $resultA2= mysqli_query($con, $a2);
    $row2 = mysqli_fetch_array($resultA2);

    $data1 = $row1 == null ? "0" : $row1[0];
    $data2 = $row2 == null ? "0" : $row2[0];
    $result = [$data1 ,$data2];
    echo json_encode($result);
    mysqli_close($con);
}
connect();

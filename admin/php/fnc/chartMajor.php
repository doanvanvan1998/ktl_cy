<?php
function connect(){
    session_start();
    include "../mysql.php";
    include "../crypt.php";
    //
    $a1="select count(*) as total from university a where a.main_major = 1 and a.status_graduate=1 group by a.main_major ";
    $resultA1= mysqli_query($con, $a1);
    $row1 = mysqli_fetch_array($resultA1);
    //
    $a2="select count(*) as total from university a where a.main_major = 2 and a.status_graduate=1 group by a.main_major ";
    $resultA2= mysqli_query($con, $a2);
    $row2 = mysqli_fetch_array($resultA2);
    //
    $a3="select count(*) as total from university a where a.main_major = 3 and a.status_graduate=1 group by a.main_major ";
    $resultA3= mysqli_query($con, $a3);
    $row3 = mysqli_fetch_array($resultA3);
    //
    $a4="select count(*) as total from university a where a.main_major = 4 and a.status_graduate=1 group by a.main_major ";
    $resultA4= mysqli_query($con, $a4);
    $row4 = mysqli_fetch_array($resultA4);
    //
    $a5="select count(*) as total from university a where a.main_major = 5 and a.status_graduate=1 group by a.main_major ";
    $resultA5= mysqli_query($con, $a5);
    $row5 = mysqli_fetch_array($resultA5);
    //
    $a6="select count(*) as total from university a where a.main_major = 6 and a.status_graduate=1 group by a.main_major ";
    $resultA6= mysqli_query($con, $a6);
    $row6 = mysqli_fetch_array($resultA6);
    //
    $a7="select count(*) as total from university a where a.main_major = 7 and a.status_graduate=1 group by a.main_major ";
    $resultA7= mysqli_query($con, $a7);
    $row7 = mysqli_fetch_array($resultA7);
    //
    $a8="select count(*) as total from university a where a.main_major = 8 and a.status_graduate=1 group by a.main_major ";
    $resultA8= mysqli_query($con, $a8);
    $row8 = mysqli_fetch_array($resultA8);

    //
    $a9="select count(*) as total from university a where a.main_major = 9 and a.status_graduate=1 group by a.main_major ";
    $resultA9= mysqli_query($con, $a9);
    $row9 = mysqli_fetch_array($resultA9);

    //
    $a10="select count(*) as total from university a where a.main_major = 10 and a.status_graduate=1 group by a.main_major ";
    $resultA10= mysqli_query($con, $a10);
    $row10 = mysqli_fetch_array($resultA10);
    //
    $a11="select count(*) as total from university a where a.main_major = 11 and a.status_graduate=1 group by a.main_major ";
    $resultA11= mysqli_query($con, $a11);
    $row11 = mysqli_fetch_array($resultA11);
    //
    $a12="select count(*) as total from university a where a.main_major = 12 and a.status_graduate=1 group by a.main_major ";
    $resultA12= mysqli_query($con, $a12);
    $row12 = mysqli_fetch_array($resultA12);
    //
    $a13="select count(*) as total from university a where a.main_major = 0 and a.status_graduate=1 group by a.main_major ";
    $resultA13= mysqli_query($con, $a13);
    $row13 = mysqli_fetch_array($resultA13);
    //


    $data1 = $row1 == null ? "0" : $row1[0];
    $data2 = $row2 == null ? "0" : $row2[0];
    $data3 = $row3 == null ? "0" : $row3[0];
    $data4 = $row4 == null ? "0" : $row4[0];
    $data5 = $row5 == null ? "0" : $row5[0];
    $data6 = $row6 == null ? "0" : $row6[0];
    $data7 = $row7 == null ? "0" : $row7[0];
    $data8 = $row8 == null ? "0" : $row8[0];
    $data9 = $row9 == null ? "0" : $row9[0];
    $data10 = $row10 == null ? "0" : $row10[0];
    $data11 = $row11 == null ? "0" : $row11[0];
    $data12 = $row12 == null ? "0" : $row12[0];
    $data13 = $row13 == null ? "0" : $row13[0];
    $result = [$data1 ,$data2,$data3,$data4,$data5,$data6,$data7,$data8,$data9,$data10,$data11,$data12,$data13];
    echo json_encode($result);
    mysqli_close($con);
}
connect();

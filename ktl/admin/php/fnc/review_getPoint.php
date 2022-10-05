<?php
function connect(){
    session_start();
    include "../mysql.php";
    include "../crypt.php";
    $a1="select a.veterans,u.id,u.username,u.imp_uid,u.status_pass,a.is_disabilities,a.low_income,a.children_of_migrant_families,a.immigrant from recruit_able_user u inner join apply_step_1 a on a.able_id = u.id where u.status_pass !='0'";
    $result= mysqli_query($con, $a1);
    $data = [];
    $index = 0;
    while($row = mysqli_fetch_array($result)){
        $sumOne = 0;
        $sumTwo = 0;
        if ($row['is_disabilities'] == 1){
            $sumOne = 10;

        }else{
            $sumOne = 5;
        }
        $sumTwo = $sumOne;
        if ($row['veterans'] == 1) {
            $sumOne = $sumOne + 10;
        }else if ($row['immigrant'] == 1 || $row['children_of_migrant_families'] == 1 || $row['low_income'] == 1){
            $sumOne = $sumOne + 5;
        }
        if ($sumOne > 15){
            $sumOne = 15;
        }

        $query1 = "select p.point from recruit_able_point p inner join recruit_able_user u on p.able_id = u.id  where u.status_pass !='0' and u.id = ".$row['id'];
        $result1 = mysqli_query($con,$query1);
        $medium = 0;
        while($row1 = mysqli_fetch_array($result1)){
            $medium = $medium +$row1['point'];
        }
        $sumOne = $sumOne + round($medium/2,2);
        $sumTwo = $sumTwo + round($medium/2,2);

        $data[$index] = [$row['id'],$sumOne,$sumTwo];
        $index++;
    }
    echo json_encode($data);
    mysqli_close($con);
}
connect();
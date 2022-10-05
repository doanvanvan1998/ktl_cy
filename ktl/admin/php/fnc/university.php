<?php
function connect(){
    session_start();
    include "../mysql.php";
    include "../crypt.php";
    $Id = $_GET['Id'];
    $a1="select * from university p where p.able_id ='$Id'";
    $result= mysqli_query($con, $a1);
    $data = [];
    $index = 0;
    while($row = mysqli_fetch_array($result)){
        $data[$index] = $row;
        $index++;
    }
    echo json_encode($data);
    mysqli_close($con);
}
connect();
<?php
session_start();


$id = $_SESSION["Id"];
$username = $_SESSION["username"];
$email = $_SESSION["email"];
$phone = $_SESSION["phone"];
if (isset($id)){
    $data = array('id'=>$id,'username'=> $username, 'email'=>$email,'phone'=>$phone);
    echo json_encode($data);
}else{
    echo "hết phiên đăng nhập";
}











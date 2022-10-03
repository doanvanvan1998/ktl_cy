<?php
session_start();
include "../mysql.php";
$Id   = $_POST['Id'];
$status   = $_POST['status'];
$sql = "update recruit_able_point set verify = " .$status ." where id= " .$Id;

mysqli_query($con,$sql);
mysqli_close($con);
?>

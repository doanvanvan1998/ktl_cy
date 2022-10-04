<?php

include "../mysql.php";
include "../crypt.php";

$id      = $_POST['Id'];
$note       = $_POST['note'];
$sql = "update recruit_able_user set note='$note' where id='$id'";

mysqli_query($con,$sql);
echo "update recruit_able_user set note='$note' where id='$id'";
mysqli_close($con);
?>
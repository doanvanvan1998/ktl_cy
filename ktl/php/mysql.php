<?php
$con = mysqli_connect("127.0.0.1", "root", "koodinh@", "ktl", 3306);
if (!$con) {
    echo "error";
}
//	@mysqli_select_db("todito", $con) or die("DB 연결실패");
mysqli_query($con, "set names utf8");

?>

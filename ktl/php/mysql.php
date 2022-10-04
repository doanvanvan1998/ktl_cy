<?php
$con = mysqli_connect("localhost", "root", "", "dy_db",3306);
//	@mysqli_select_db("todito", $con) or die("DB 연결실패");
mysqli_query($con, "set names utf8");

?>

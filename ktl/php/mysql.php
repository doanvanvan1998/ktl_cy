<?php
	$con = mysqli_connect("localhost:3307","root","","ktl");
	if(!$con)
	{
		echo "error";
	}
//	@mysqli_select_db("todito", $con) or die("DB 연결실패");
	mysqli_query("set names utf8");

?>

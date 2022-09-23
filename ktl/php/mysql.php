<?php
	$con = mysqli_connect("localhost","root","","ktl");
	if(!$con)
	{
		echo "error";
	}
//	@mysqli_select_db("todito", $con) or die("DB 연결실패");
	mysqli_query($con,"set names utf8");

?>

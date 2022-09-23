<?php
	$con = mysqli_connect("localhost","root","","ktl",3308);
	if(!$con)
	{
		echo "error";
	}else {
		echo "success";
	}
//	@mysqli_select_db("todito", $con) or die("DB 연결실패");

?>

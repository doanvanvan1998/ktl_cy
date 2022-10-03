<?php
require_once("../lib/message.php");
require_once("../../php/mysql.php");

function Encrypt($str, $secret_key='secret key', $secret_iv='secret iv')
{
		$key = hash('sha256', $secret_key);
		$iv = substr(hash('sha256', $secret_iv), 0, 16);

		return str_replace("=", "", base64_encode(
								 openssl_encrypt($str, "AES-256-CBC", $key, 0, $iv))
		);
}
function Decrypt($str, $secret_key='secret key', $secret_iv='secret iv')
{
		$key = hash('sha256', $secret_key);
		$iv = substr(hash('sha256', $secret_iv), 0, 16);

		return openssl_decrypt(
						base64_decode($str), "AES-256-CBC", $key, 0, $iv
		);
}

$secret_key = "tkit";
$secret_iv = "tkit!!*@0730";

$secret_key2 = "tkit0730";

$state 								= $_POST["state"];
$p 										= $_POST["phone"];

$pay_id 							= $_POST["pay_id"];
$ticket_id						= $_POST["ticket_id"];
$send_userid						= $_POST["userid"];

$query="select base_pay_id,tikit_id from tkit_pay where id='$pay_id'";
$TransResult = mysqli_query($con,$query);
$TransRow = mysqli_fetch_array($TransResult);

$query="select prod_name from tkit_prod where id='$TransRow[1]'";
$ProdResult = mysqli_query($con,$query);
$ProdRow = mysqli_fetch_array($ProdResult);

$title = "[ ".$ProdRow[0]." ]";

$base_id = $TransRow[0];


if($state == 1)
{

	$p 										= $_POST["phone"];
	$send_name 						= $_POST["send_name"];
	$name 								= $_POST["name"];
	$url 									= $_POST["url"];
	$phonechk 						= $_POST["phonechk"];

	//명의닥 상담 등록시 알림톡
	/*
	$str_msg = "{$title}

{$name}님 안녕하세요.
{$send_name}님이 보낸 티켓이 도착했어요!🎉

티켓받기 누르신 다음 성함, 연락처, 비밀번호를 기입하시면 티켓이 발급됩니다.
미가입시 입력하신 정보로 자동 회원가입이 되며, 기존 회원은 마이티켓함으로 전달됩니다.✨";
*/
$str_msg = "{$title}

{$name}님 안녕하세요.
{$send_name}님이 보낸 티켓이 도착했어요!🎉

지금 들어가서 확인해주세요!";

	$messages = array(
		array(
			"to" => $p,
			"from" => "15999642",
			"text" => $str_msg,
			"kakaoOptions" => array(
				"pfId" => "KA01PF2207070159153606rCNRVBME4l",
				"templateId" => "KA01TP220708160751378nLlSHOyRaeM",
				"buttons" => array(
						array(
								"buttonType" => "WL",
								"buttonName" => "티켓 받으러 가기",
								"linkMo" => $url,
								"linkPc" => $url
						)
				)
			)
		)
	);
	//양도 대기중 상태로
	mysqli_query($con,"insert into tkit_ticket(base_id,pay_id,ticket_id,state,date) VALUES('$base_id','$pay_id','$ticket_id','2',NOW())");

	$userid = Encrypt($p,$secret_key,$secret_iv);

	mysqli_query($con,"insert into tkit_pay
	(tikit_num,base_pay_id,pay_id,send_userid,merchant_uid,userid,imp_uid,amount,tikit_id,tikit_count,send_date,memo,date)VALUES('$tikit_Id','$base_id','$pay_id','$send_userid','','$userid','','0','$TransRow[1]','1',NOW(),'양도',NOW())");

	mysqli_close($con);
}

print_r(send_messages($messages));
?>

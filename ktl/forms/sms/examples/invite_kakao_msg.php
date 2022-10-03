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

$Id 							= $_POST["Id"];

$query="select id,grade,prod_Id,play_date,username,userphone,quantity from tkit_invitation where id='$Id'";
$TransResult = mysqli_query($con,$query);
$TransRow = mysqli_fetch_array($TransResult);

$query="select prod_name from tkit_prod where id='$TransRow[2]'";
$ProdResult = mysqli_query($con,$query);
$ProdRow = mysqli_fetch_array($ProdResult);


$title = "◈행사명 : ".$ProdRow[0]."\n◈티켓명 : ".$TransRow[1]."초대권"."\n◈입장일자 :".$TransRow[3];

$state = 1;

if($state == 1)
{

	$p 										= $TransRow[5];
	$send_name 						= "TKIT";
	$name 								= $TransRow[4];
	$url 									= "https://snstkit.com/hidden_tkit_detail.html?Id=2";

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

  mysqli_query($con,"update tkit_invitation set alarm_state='1' where id='$Id'");

	mysqli_close($con);
}

print_r(send_messages($messages));
?>

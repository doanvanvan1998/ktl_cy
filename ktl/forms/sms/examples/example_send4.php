<?php
session_start();
function Encrypt($str, $secret_key='secret key', $secret_iv='secret iv')
{
		$key = hash('sha256', $secret_key);
		$iv = substr(hash('sha256', $secret_iv), 0, 32)    ;

		return str_replace("=", "", base64_encode(
								 openssl_encrypt($str, "AES-256-CBC", $key, 0, $iv))
		);
}


function Decrypt($str, $secret_key='secret key', $secret_iv='secret iv')
{
		$key = hash('sha256', $secret_key);
		$iv = substr(hash('sha256', $secret_iv), 0, 32);

		return openssl_decrypt(
						base64_decode($str), "AES-256-CBC", $key, 0, $iv
		);
}

include_once "../coolsms.php";

/*
 **  api_key and api_secret can be obtained from www.coolsms.co.kr/credentials
 */

include "mysql.php";

$Id         		      = $_POST["Id"];     //병원아이디
$userId               = $_SESSION['allhan_userid'];
$loginId              = $_POST["loginId"];

$query="select h_name,h_address,h_address_detail,h_tel from TinkerBell_hospital where id = '$Id'";
$Hospitalresult = mysql_query($query,$con);
$Hospitalrow = mysql_fetch_array($Hospitalresult);

$query="select phone from hanbang_user where userid = '$loginId'";
$Selresult = mysql_query($query,$con);
$Selrow = mysql_fetch_array($Selresult);


$secret_key = "artidevelp";
$secret_iv = "artidevelp!+0730";

$p = Decrypt($Selrow[phone], $secret_key, $secret_iv);

//$p 										= $_POST["phone"];
$phonechk 						= $_POST["phonechk"];
$loginPhone 						= $_POST["loginPhone"];


//$encrypted = Encrypt($p, $secret_key, $secret_iv);

$rest = new coolsms("NCSPNO8PUHIS7LCV", "NM7SUPS3WKERI7JSK4QGAIOCR3BKANTR");

/*
 **  5 options(timestamp, to, from, type, text) are mandatory. must be filled
 */
$chkNum = rand ( 1000,9999 );
$options = new StdClass();
$options->timestamp = (string)time();
$options->to = $p;
$options->from = '023135667';
$options->text = $Hospitalrow[0]."\n".$Hospitalrow[1]."".$Hospitalrow[2]."\n".$Hospitalrow[3];
$options->app_version = 'test app 1.2';  // application name and version
$options->type = 'SMS'; // SMS, MMS, LMS, ATA

// Alimtalk example. https://www.coolsms.co.kr/AboutAlimTalk
// $options->type = 'ATA';
// $options->sender_key = '#ENTER_YOUR_SENDER_KEY#';
// $options->template_code = '#ENTER_YOUR_TEMPLATE_CODE#';

//  Optional parameters for your own needs
// $options->image = 'test.png'; 			// image for MMS. type must be set as 'MMS'
// $options->refname = '';					// Reference name
$options->country = '82';


// $options->datetime = '20140106153000';	// Format must be(YYYYMMDDHHMISS) 2014 01 06 15 30 00 (2014 Jan 06th 3pm 30 00)
// $options->mid = 'mymsgid01';				// set message id. Server creates automatically if empty
// $options->gid = 'mymsg_group_id01';		// set group id. Server creates automatically if empty
// $options->subject = 'Hello World';		// set msg title for LMS and MMS
// $options->charset = 'euckr';				// For Korean language, set euckr or utf-8

/**
 * added REST API v1.5
 **/
// $options->os_platform = 'Windows 7';		// Operating System. SDK creates automatically if empty
 $options->dev_lang = 'PHP 5.3.3';		// Application development language. SDK creates automatically if empty
// $options->sdk_version = 'PHP SDK 1.1';	// SDK version being used. SDK creates automatically if empty

// send messages
$response = $rest->send($options);

// get result
$result = $response->getResult();

echo $Hospitalrow[0]."\n".$Hospitalrow[1]."".$Hospitalrow[2]."\n".$Hospitalrow[3];

?>

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

$p 										= $_POST["phone"];
$phonechk 						= $_POST["phonechk"];

$secret_iv = "arti@$!develop";
$secret_key = "86730";

$p = Decrypt($p, $secret_key, $secret_iv);
// initiate rest api sdk object
$rest = new coolsms("NCSQOI484NRYYAZB", "NZCQZ4WVOBUNJT1ZKVV6FTXS6EZEASRS");

/*
 **  5 options(timestamp, to, from, type, text) are mandatory. must be filled
 */
$chkNum = rand ( 1000,9999 );
$options = new StdClass();
$options->timestamp = (string)time();
$options->to = $p;
$options->from = '0317550765';
$options->text = "GMC certification number [".$chkNum."] 입니다.";
$options->app_version = 'test app 1.2';  // application name and version
$options->type = 'SMS'; // SMS, MMS, LMS, ATA

// Alimtalk example. https://www.coolsms.co.kr/AboutAlimTalk
// $options->type = 'ATA';
// $options->sender_key = '#ENTER_YOUR_SENDER_KEY#';
// $options->template_code = '#ENTER_YOUR_TEMPLATE_CODE#';

//  Optional parameters for your own needs
// $options->image = 'test.png'; 			// image for MMS. type must be set as 'MMS'
// $options->refname = '';					// Reference name
$options->country = $phonechk;


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

echo $chkNum;

?>

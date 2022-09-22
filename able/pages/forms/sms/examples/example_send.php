<?php
session_start();

include_once "../coolsms.php";

/*
 **  api_key and api_secret can be obtained from www.coolsms.co.kr/credentials
 */

include "mysql.php";
include "crypt.php";

$Id 								= $_POST["Id"];
$txt 								= $_POST["txt"];

$query="select id,username,phone,email,apply_num,result_check_num,result_check from recruit_able_user where id='$Id'";
$TransResult = mysqli_query($con,$query);
$TransRow = mysqli_fetch_array($TransResult);

$TransRow[2] = Decrypt($TransRow[2], $secret_key, $secret_iv);

$rest = new coolsms("NCSXOU8UCIPG01NE", "XCLICLKYKXBPCW0CXVXTYLE2S97OM7OX");

/*
 **  5 options(timestamp, to, from, type, text) are mandatory. must be filled
 */
$chkNum = rand ( 1000,9999 );
$options = new StdClass();
$options->timestamp = (string)time();
$options->to = $TransRow[2];
$options->from = '02-2662-5571';

//$encrypted = Encrypt($p, $secret_key, $secret_iv);

$textq = $txt;
$options->type = 'LMS'; // SMS, MMS, LMS, ATA

$options->text = $textq;
$options->app_version = 'test app 1.2';  // application name and version

// Alimtalk example. https://www.coolsms.co.kr/AboutAlimTalk
// $options->type = 'ATA';
// $options->sender_key = '#ENTER_YOUR_SENDER_KEY#';
// $options->template_code = '#ENTER_YOUR_TEMPLATE_CODE#';

//  Optional parameters for your own needs
// $options->image = 'test.png'; 			// image for MMS. type must be set as 'MMS'
// $options->refname = '';					// Reference name
$options->country = 82;


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

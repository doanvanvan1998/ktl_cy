<?php
session_start();
include "../mysql.php";
include "../crypt.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/phpmailer/phpmailer/src/Exception.php';
require '../../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../../vendor/phpmailer/phpmailer/src/SMTP.php';
$email = Encrypt($_POST['email'], $secret_key, $secret_iv);
//header("Location: ../../confirm_rand_code.php?email=$email");
echo $email;
$query = "select rand_code from recruit_able_user where email='$email'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);



?>
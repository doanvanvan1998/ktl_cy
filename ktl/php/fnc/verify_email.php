<?php
ob_start();
session_start();
include "../mysql.php";
include "../crypt.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/phpmailer/phpmailer/src/Exception.php';
require '../../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../../vendor/phpmailer/phpmailer/src/SMTP.php';
$email = Encrypt($_POST['email'], $secret_key, $secret_iv);

//echo $email;
//die();
$query = "select rand_code from recruit_able_user where email='$email'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);
$mail = new PHPMailer(true);
$emailSend = Decrypt($email, $secret_key, $secret_iv);


try {
    //echo $_POST['email'];
    // die();

    //Server settings
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->Mailer = "smtp";

    $mail->SMTPDebug = false;
    $mail->SMTPAuth = TRUE;
    $mail->SMTPSecure = "tls";
    $mail->Port = 587;
    $mail->Host = "smtp.gmail.com";
    $mail->Username = 'ehgusfn12@gmail.com';
    $mail->Password = "yzdkhwbrivkzijow";

    //Recipients
    $mail->IsHTML(true);
    $mail->AddAddress($_POST['email'], "recipient-name");
    $mail->Subject = "[EMAIL VERIFICATION]";
    $content = "<b>Your verification code is </b> $row[0]";
    $mail->MsgHTML($content);
    if (!$mail->Send()) {
        echo "Error while sending Email.";
    } else {
        echo "Email sent successfully";
    }
} catch (Exception $e) {
    echo "$e";
}
header("Location: ../../confirm_rand_code.php?email=$email");
ob_end_flush();
?>
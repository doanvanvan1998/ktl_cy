<?php
session_start();
include "../mysql.php";
include "../crypt.php";


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/phpmailer/phpmailer/src/Exception.php';
require '../../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../../vendor/phpmailer/phpmailer/src/SMTP.php';


$email = $_POST['email'];
header("Location: ../../confirm_rand_code.php?email=$email");
$query = "select rand_code from recruit_able_user where email='$email'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);
$mail = new PHPMailer(true);
if ($row[0]) {
    try {
        //Server settings
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->Mailer = "smtp";


        $mail->SMTPDebug = 4;
        $mail->SMTPAuth = TRUE;
        $mail->SMTPSecure = "tls";
        $mail->Port = 587;
        $mail->Host = "smtp.gmail.com";
        $mail->Username = $email;
        $mail->Password = "ixripxfqqlgamxpa";

        //Recipients
        $mail->IsHTML(true);
        $mail->AddAddress($email, "recipient-name");
        $mail->SetFrom($email, "from-name");
        $mail->AddReplyTo($email, "reply-to-name");
        $mail->AddCC($email, "cc-recipient-name");
        $mail->Subject = "[EMAIL VERIFICATION]";
        $content = "<b>Your verification code is </b>" . $row[0];
        $mail->MsgHTML($content);
        if (!$mail->Send()) {
            echo "Error while sending Email.";
            var_dump($mail);
        } else {
            echo "Email sent successfully";
        }
    } catch (Exception $e) {
        echo "$e";
    }
}

?>
<?php
session_start();
include "../mysql.php";
include "../crypt.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php';
// send email
$mail = new PHPMailer(true);
try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host = 'smtp.example.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth = true;                                   //Enable SMTP authentication
    $mail->Username = '2502mien@gmail.com';                     //SMTP username
    $mail->Password = 'ixripxfqqlgamxpa';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('2502mien@gmail.com', 'Mailer');
    $mail->addAddress('2502mien@gmail.com');
    $mail->addReplyTo('2502mien@gmail.com', 'Megasoft Money');   //Add a recipient
//    $mail->addAddress('ellen@example.com');               //Name is optional
//    $mail->addReplyTo('info@example.com', 'Information');
//    $mail->addCC('cc@example.com');
//    $mail->addBCC('bcc@example.com');

    //Attachments
//    $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
//    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Hereewjkfnnnbnnn';
    $mail->Body = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


$imp_uid = "1";
$username = $_POST['username'];
$userphone = $_POST['userphone'];
$userpass = $_POST['userpass'];
$useremail = $_POST['useremail'];
$userphone = Encrypt($userphone, $secret_key, $secret_iv);
$useremail = Encrypt($useremail, $secret_key, $secret_iv);
$userpass = Encrypt($userpass, $secret_key, $secret_iv);

//$rand_code = 0;

while (1) {
    //랜덤코드 중복없는걸로 출력
    $rand_code = mt_rand(100, 10000);
    $query = "select COUNT(*) from recruit_able_user where apply_num='$rand_code'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result);

    if ($row[0] == 0) {
        break;
    }
}

$query = "select COUNT(*) from recruit_able_user where email='$useremail'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);

if ($row[0] != 0) {
    echo "fail_email";
    return;
}

$query = "select COUNT(*) from recruit_able_user where phone='$userphone'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);

if ($row[0] != 0) {
    echo "fail_phone";
    return;
}

$query = "INSERT INTO `recruit_able_user`( `imp_uid`, `username`, `phone`, `email`, `pass`,  `identi_check`, `apply_num`, `apply_link`, `portfolio`, `apply_state`, `apply_step`, `result_check`, `result_check_num`, `update_date`) VALUES ('','$username','$userphone','$useremail','$userpass','','','','','','','','','')";
$result = mysqli_query($con, $query);
if ($result) {
    echo "success";
} else {
    echo "fail";
}
mysqli_close($con);
?>

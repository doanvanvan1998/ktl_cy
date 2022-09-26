<?php
session_start();
include "../mysql.php";
include "../crypt.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../../vendor/phpmailer/phpmailer/src/Exception.php';
require '../../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../../vendor/phpmailer/phpmailer/src/SMTP.php';

// send email
$mail = new PHPMailer(true);
try {
    //Server settings
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->Mailer = "smtp";


    $mail->SMTPDebug  = 4;
    $mail->SMTPAuth   = TRUE;
    $mail->SMTPSecure = "tls";
    $mail->Port       = 587;
    $mail->Host       = "smtp.gmail.com";
    $mail->Username   = "2502mien@gmail.com";
    $mail->Password   = "ixripxfqqlgamxpa";

    //Recipients
    $mail->IsHTML(true);
    $mail->AddAddress("2502mien@gmail.com", "recipient-name");
    $mail->SetFrom("2502mien@gmail.com", "from-name");
    $mail->AddReplyTo("2502mien@gmail.com", "reply-to-name");
    $mail->AddCC("2502mien@gmail.com", "cc-recipient-name");
    $mail->Subject = "Test is Test Email sent via Gmail SMTP Server using PHP Mailer";
    $content = "<b>This is a Test Email sent via Gmail SMTP Server using PHP mailer class.</b>";
    $mail->MsgHTML($content);
    if(!$mail->Send()) {
        echo "Error while sending Email.";
        var_dump($mail);
    } else {
        echo "Email sent successfully";
    }
} catch (Exception $e) {
    echo "$e";
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
